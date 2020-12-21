$(document).ready(function () {
    $('.sidebar-menu').tree();

    $('#registros').DataTable({
      'paging'      : true,
      'pageLength'  : 4, 
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    : {
        paginate: {
          next: 'Siguiente',
          previous: 'Anterior',
          last: 'Último',
          first: 'Primero'
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        emptyTable: 'No hay registros',
        infoEmpty: '0 resultados',
        search: 'Buscar'
      }
    });

    $('#btn-new').attr('disabled',true);

    $('#password_repit').on('input', function(){
      var pass= $('#password').val();

      if ($(this).val() == pass){
        $('#resultado_password').text('Correcto');
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input #password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#btn-new').attr('disabled',false);
      }else{
        $('#resultado_password').text('Contraseñas distintas');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input #password').parents('.form-group').addClass('has-error').removeClass('has-success');
      }
    });

})