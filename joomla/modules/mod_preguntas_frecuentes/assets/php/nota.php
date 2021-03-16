<?php
 
/*
header('Location: /index.php');
exit;
*/
// sitio = 6LdCj24UAAAAAI84KZacQwVXAWmPR_TE3V-GooZ2
// secreta = 6LdCj24UAAAAABvVdw-PIHwPmOLBRitEkClo5pYb


define('_JEXEC', 1);
define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../../../'));
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

$mainframe = JFactory::getApplication('site');
 
if (isset($_POST['opcion'])) {	

	if ($_POST['opcion'] == 1) {	 

		$fecha = date("Y-n-j H:m:s");

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$columns = array(
			'calificacion',	
			'created_by',
			'state',
			'ordering',
			'dsit_preguntas_frecuentes_preguntas_id'
		);
		$values = array(
			$db->quote(1),	
			$db->quote($fecha),	 
			492,
			1,	
			$db->quote($_POST['pregunta'])
		);
		$query
		    ->insert($db->quoteName('#__preguntas_frecuentes_calificacion'))
		    ->columns($db->quoteName($columns))
		    ->values(implode(',', $values));
		$db->setQuery($query);
		$db->execute();
	} 
  
	if ($_POST['opcion'] == 2) {

		$fecha = date("Y-n-j H:m:s");

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$columns = array(
			'calificacion',	
			'correo',	
			'comentario',	
			'created_by',
			'state',
			'ordering',
			'dsit_preguntas_frecuentes_preguntas_id'
		);
		$values = array(
			$db->quote(2),	
			$db->quote($_POST['correo']),	
			$db->quote($_POST['comentario']),	
			$db->quote($fecha),	 
			492,
			1,	
			$db->quote($_POST['pregunta'])
		);
		$query
		    ->insert($db->quoteName('#__preguntas_frecuentes_calificacion'))
		    ->columns($db->quoteName($columns))
		    ->values(implode(',', $values));
		$db->setQuery($query);
		$db->execute();		 
		 
		$jsondata['title'] = 'Enviado correctamente';
		$jsondata['text'] = 'Gracias por tus cometarios';
		$jsondata['icon'] = 'success';
		$jsondata['button'] = 'Atras';
		$jsondata['recargar'] = 'si';
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata, JSON_FORCE_OBJECT);				 

	}

}
?>