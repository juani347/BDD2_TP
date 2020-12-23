$(document).ready(function(){
    var res= document.getElementById('resultado');

    $('#consulta').on('submit', consultar);

    $('#registrarse').on('submit', registro);

    function consultar(e){
        e.preventDefault();
        let datos= $(this).serializeArray();
        var error= document.getElementById('error');
        console.log(datos);

        if (validarcampos(datos)){
            error.style.display='none';
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType:'html',
                //async: false,
                success: function(data){
                    console.log(data);
                    
                    var cond=false;
                    var msj;
                    if (data.includes('<div')){ //devuelve registros
                        const div= document.createElement('div');
                        div.innerHTML=data;
                        msj= div;
                        cond=true;
                    }
                    else{
                        cond= data.includes('<p>');
                        const p= document.createElement('p');
                        if (!cond){ //hubo un error
                            p.innerHTML=data.substr(data.indexOf('"Problema'));
                        }else{
                            p.innerHTML=data;
                        }
                        msj=p;
                    };

                    if (cond){
                        swal.fire(
                            'Consulta realizada!',
                            '',
                            'success'
                          )
                        
                    } else {
                        swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'No se pudo realizar la consultar...',
                          })
                    }
                    res.appendChild(msj);
                },
                error: function(XHR,status){
                    console.log(XHR);
                    console.log(status);
                }
                /* complete: function(data){
                    jQuery('[id="resultado"]').removeClass('oculto');
                    jQuery('[id="resultado"]').addClass('mostrar');
                    //$("#resultado").load(" #resultado > *");
    
                } */
                
                
                /* function(XMLHttpRequest, textStatus, errorThrown) {
                    //console.log(XMLHttpRequest.responseText);
                    console.log("Status: " + textStatus, "Error: " + errorThrown);
                } */
            });
        }else{
            error.style.display="block";
            error.innerHTML="* Consulta vacía";
        }
        
    };

    function registro(e){
        e.preventDefault();
        let datos= $(this).serializeArray();
        var error= document.getElementById('error');

        if (validarcampos(datos)){
            error.style.display='none';
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType:'html',
                success: function(data){
                    console.log(data);

                    if (data.res="exito"){
                        swal.fire(
                            'Usuario registrado!',
                            '',
                            'success'
                          )
                    } else {
                        
                        swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'No se pudo crear el usuario...',
                          })
                    }
                },
                error: function(XHR,status){
                    console.log(XHR);
                    console.log(status);
                }
            });
        }else{
            error.style.display="block";
            error.innerHTML="* Consulta vacía";
        }
    }

    $('#login-admin').on('submit', logeo);
    
    function logeo(e){
        e.preventDefault();

        var datos= $(this).serializeArray();

        const tipo= $(this).attr('data-tipo');    //admin o admin-sistema.. no se usa por ahora

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log('adentro');
                var resultado= data;
                if (data.respuesta== 'exito'){
                    swal.fire(
                        'Bienvenido!',
                        '',
                        'success'
                      )
                    setTimeout(function(){
                        window.location.href= 'consultar.php';
                    },2000);
                } else {
                    swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Usuario o contraseña incorrectos',
                      })
                }
            },
            error: function(XHR,status){
                console.log(XHR);
                console.log(status);
            }

        })
    }



    $('.content #usuario').keypress(function(tecla){
      if(tecla.charCode == 32){
         return false;
      }
    });


    function validarcampos(datos){
        var i=0;
        while ((i < datos.length) && (datos[i].value.replace(/ /g, "")!='')){
            i++;
        };
        if (i < datos.length){
            return 0;   //hay un campo en blanco
        }else{
            return 1;
        }
    }
});