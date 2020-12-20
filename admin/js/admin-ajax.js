$(document).ready(function(){
    var res= document.getElementById('resultado');
    /* const aux= document.createElement('p');
    aux.innerHTML="";
    var cont= document.getElementById('contenedor'); */

    $('#consulta').on('submit', actualizar);

    function actualizar(e){
        e.preventDefault();
        let datos= $(this).serializeArray();
        var error= document.getElementById('error');

        const origen=$(this).attr('id'); 

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
                    /* jQuery('[id="resultado"]').removeClass('oculto');
                    jQuery('[id="resultado"]').addClass('mostrar'); */
                    //$(".content").load(" #resultado"); // > *"

                    //$("#resultado").load(" #resultado");
                       // var aux2= document.getElementById('tabla').innerHTML;
                      //  var aux= document.createElement('p');
                        
                    //aux.innerHTML= "";
                    
                    //cont.appendChild(res);
                    //document.getElementById('resultado').appendChild(aux);
                    
                    var cond;
                    if (data.includes('div')){
                        const div= document.createElement('div');
                        div.innerHTML=data;
                        res.appendChild(div);
                        cond=true;
                    }
                    else{
                        cond= data.includes('p');
                        const p= document.createElement('p');
                        p.innerHTML=data;
                        res.appendChild(p);
                    }

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