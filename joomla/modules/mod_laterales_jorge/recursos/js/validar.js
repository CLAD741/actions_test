jQuery(document).on('ready',function(){
    jQuery('#enviar').click(function(e){
       e.preventDefault();

       var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
       if (regex.test($('#email').val().trim())) {
            if ($('#nombre').val() === '' ) {
              swal({
                title: 'El nombre no puede estar vacío',
                text: 'Intente nuevamente',
                icon: 'error',
                button: 'Atrás',
              })
            }
            else
            {
              var url = "/modules/mod_laterales_jorge/califica.php";
              jQuery.ajax({
                type: "POST",
                url: url,
                data: jQuery("#formulario_contacto").serialize(),
                success: function(data)
                {
                  swal({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
                    button: data.button,
                  })
                  .then((willDelete) => {
                    if (data.recargar == 'si') {
                      location.reload(true);
                    }
                  });
                }
              });
            }

       }
       else {
         swal({
           title: 'La direccón de correo no es válida',
           text: 'Intente nuevamente',
           icon: 'error',
           button: 'Atrás',
         })
       }
     });
   });
