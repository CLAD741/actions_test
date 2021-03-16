<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<link rel="stylesheet" href="modules/mod_preguntas_frecuentes/assets/php/recursos/css/style.css">

<?php

define('_JEXEC', 1);
define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../../../'));

require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';


if (isset($_GET['key'])) {
	$key = addslashes($_GET['key']);
}


// preguntas //
/*
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('*');
$query->from($db->quoteName('#__preguntas_frecuentes_preguntas', 'a'));
$query->join('INNER', $db->quoteName('#__preguntas_frecuentes_tema', 'b') . ' ON (' . $db->quoteName('a.dsit_preguntas_frecuentes_tema_id') . ' = ' . $db->quoteName('b.id') . ')');
if (isset($key)) {
	$query->where($db->quoteName('pregunta') . ' LIKE '. $db->quote('%'.$key.'%'));
}

$db->setQuery($query);
$result = $db->loadObjectList();
*/

$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('*');
$query->from($db->quoteName('#__preguntas_frecuentes_preguntas'));
if (isset($key)) {
	$query->where($db->quoteName('pregunta') . ' LIKE '. $db->quote('%'.$key.'%'));
}
$db->setQuery($query);
$result = $db->loadObjectList();
/// fin preguntas //

///temas //
$db->setQuery($query);
$temas = $db->loadObjectList();

$query = $db->getQuery(true);
$query->select('*');
$query->from($db->quoteName('#__preguntas_frecuentes_tema'));
if (isset($key)) {
	if ($key != '' && $result != NULL) {
		$query->where($db->quoteName('id') . '='. $db->quote($result[0]->dsit_preguntas_frecuentes_tema_id));
	}
}
$db->setQuery($query);
$temas = $db->loadObjectList();

if (!$result == NULL) {
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php

foreach ($temas as $tema) {
$i = 0;
?>

			<div class="container" id="contenedor_<?php echo $tema->id ?>">
			  <h2 style="font-size: 25px;"><?php echo $tema->tema ?></h2>

			    <?php foreach ($result as $row) {	  ?>
			    	<?php if ($row->dsit_preguntas_frecuentes_tema_id == $tema->id) {
								   if ($i < 5) {
										 ?>

										 <div class="accordion">
			 						    <div class="accordion-item">
			 						      <a style="font-size: 17px;" ><?php echo $row->pregunta ?></a>
			 						      <div class="content">
			 						        <p style="color: #7b7979;" ><?php echo $row->respuesta ?></p>
			 										<div>
			 											<small>¿Esta información te fue útil?</small><br>
			 											<form id="formulario_si_<?php echo $row->id ?>" style="display: contents;">

			 												<input type="hidden" name="opcion" value="1">
			 												<input type="hidden" name="pregunta" value="<?php echo $row->id ?>">
			 												<button type="submit" class="btn btn-light btn-si" value="<?php echo $row->id ?>">Si</button>
			 											</form>
			 											<button type="button" uk-toggle="target: #my-id_<?php echo $row->id ?>" class="btn btn-light">No</button>
			 										</div>
			 						      </div>
			 						    </div>
			 						  </div>


										 <?php

									 }
									 else{

										 ?>
										<div class="target_<?php echo $tema->id ?>" style="display:none;">
											  <div class="accordion">
				 						    <div class="accordion-item">
				 						      <a style="font-size: 17px;" ><?php echo $row->pregunta ?></a>
				 						      <div class="content">
				 						        <p style="color: #7b7979;" ><?php echo $row->respuesta ?></p>
				 										<div>
				 											<small>¿Esta información te fue útil?</small><br>
				 											<form id="formulario_si_<?php echo $row->id ?>" style="display: contents;">

				 												<input type="hidden" name="opcion" value="1">
				 												<input type="hidden" name="pregunta" value="<?php echo $row->id ?>">
				 												<button type="submit" class="btn btn-light btn-si" value="<?php echo $row->id ?>">Si</button>
			 												</form>
				 											<button type="button" uk-toggle="target: #my-id_<?php echo $row->id ?>" class="btn btn-light">No</button>
				 										</div>
				 						      </div>
				 						    </div>
				 						  </div>
										</div>

										 <?php


									 }
							 ?>


							<div id="my-id_<?php echo $row->id ?>" uk-modal>
							    <div class="uk-modal-dialog uk-modal-body">
							        <h5 class="uk-modal-title" style="font-size: 18px;">Indícanos tu correo para resolver tus dudas</h5>
										<form id="formulario_no_<?php echo $row->id ?>" >
											<input type="hidden" name="opcion" value="2">
				 							<input type="hidden" name="pregunta" value="<?php echo $row->id ?>">
											<div class="uk-margin">
							            <input class="uk-input" type="email" placeholder="Correo" name="correo" required>
							        </div>
											<div class="uk-margin">
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comentario" name="comentario" required></textarea>
							        </div>

											<div class="g-recaptcha" data-sitekey="6LdCj24UAAAAAI84KZacQwVXAWmPR_TE3V-GooZ2"></div>

							        <p class="uk-text-right">
							            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
							            <button class="uk-button uk-button-primary btn-no" type="submit" value="<?php echo $row->id ?>">Enviar</button>
							        </p>
										</form>
							    </div>
							</div>


			 <?php
					$i++;
				}
			 }

				 if ($i > 5) {

				 ?>
				   <!-- <input  class="" type="button" value="ver mas"> -->
					 <button id="t_<?php echo $tema->id ?>" class="uk-button uk-button-default uk-button-small boton" style="float: right;">Ver mas</button>
					</div>
<?php  }} } else { ?>
	<div class="alert alert-dark" role="alert" style="background: #cecaca;" >
		No se han encontrado resultados
	</div>
<?php
}
$db->disconnect();
?>
<script src="modules/mod_preguntas_frecuentes/assets/php/recursos/js/index.js"></script>
<script>

jQuery('.btn-si').on('click', function(e){
	e.preventDefault();
    id_boton = $(this).val();

	jQuery.ajax({
		type: "POST",
        url: "modules/mod_preguntas_frecuentes/assets/php/nota.php",
		data: jQuery("#formulario_si_"+id_boton).serialize(),
		success: function(data) {
			swal({
			     icon: "success",
				 text: "Gracias por tu tiempo",
				});
		}
	});
});


jQuery('.btn-no').on('click', function(e){
	e.preventDefault();
    id_boton = $(this).val();

	jQuery.ajax({
		type: "POST",
        url: "modules/mod_preguntas_frecuentes/assets/php/nota.php",
		data: jQuery("#formulario_no_"+id_boton).serialize(),
		success: function(data) {
 			swal({
			     icon: "success",
				 text: "Gracias por tu tiempo",
				});

		}
	});
});


jQuery(".boton").on( "click", function() {
	 var oID = $(this).attr("id");
	 var targt = '.targe'+oID;
	 var valorB = $(this).text();

	 if (valorB == 'Ver mas') {
		 $(this).text('Ver menos');
	 }
	 jQuery(targt).toggle("fast");
 });
</script>
