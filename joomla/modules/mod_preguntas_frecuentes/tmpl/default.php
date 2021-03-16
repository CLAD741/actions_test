<?php
defined('_JEXEC') or die;
?>
<script>
jQuery(window).load(function () {
    //$(".cssload-pantalla").hide();
    $(".cssload-pantalla").fadeOut(3000);
});

</script>

<div class="cssload-pantalla">
  <div class="spinner">
    <div class="dot1"></div>
    <div class="dot2"></div>
  </div>
</div>

  <!-- <div class="cssload-container">
	 <ul class="cssload-flex-container">
		 <li>
			<span class="cssload-loading"></span>
		 </li>
    </ul>
	</div> -->


<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
-->


<div id="content" class="col-lg-12" >
  <center>
    <form class="form-inline">
        <div class="input-group input-group-sm" style="flex-wrap: unset;">
            <input class="search_query form-control" type="text" name="key" id="key" placeholder="¿Qué deseas consultar?">
            <!-- <span class="fa fa-search"></span> -->
      <!--      <span class="input-group-btn">
                <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
            </span>
          -->
        </div>
    </form>
    </center>
    <div id="suggestions"></div>
</div>

<div class="datagrid" id="datagrid"></div>



<script>

jQuery('form input').on('keypress', function(e) {
    return e.which !== 13;
});

window.onload = function () {
    Cargar();
}

function Cargar(key)
{
    if (key == undefined) {
        key = '';
    }
    url = 'modules/mod_preguntas_frecuentes/assets/php/preguntas.php?'+key
    jQuery('#datagrid').load(url);
}

jQuery(document).ready(function() {
    jQuery('#key').on('keyup', function() {
        var key = jQuery(this).val();
        var dataString = 'key='+key;
	jQuery.ajax({
            type: "POST",
            url: "modules/mod_preguntas_frecuentes/assets/php/ajax.php",
            data: dataString,
            success: function(data) {
                Cargar(dataString);
                //Escribimos las sugerencias que nos manda la consulta
                jQuery("#suggestions").css("background-color", "#b3b2b275");
                jQuery('#suggestions').fadeIn(1000).html(data);
                if (data == '') {
                 jQuery("#suggestions").css("background-color", "");
                }
                console.log(data);

                //Al hacer click en algua de las sugerencias
                jQuery('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = jQuery(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        jQuery('#key').val(jQuery('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        jQuery('#suggestions').fadeOut(1000);
                        //alert('Has seleccionado el '+id+' '+jQuery('#'+id).attr('data'));
                        return false;
                });
            }
        });
    });
});


</script>
