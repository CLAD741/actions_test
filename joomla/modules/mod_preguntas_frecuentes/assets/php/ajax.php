<?php

define('_JEXEC', 1);
define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../../../'));

require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

$html = '';

$key = $_POST['key'];
$key = strip_tags($key);
if ($key == '') {

}else{

	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select('*');
	$query->from($db->quoteName('#__preguntas_frecuentes_preguntas'));
	$query->where($db->quoteName('pregunta') . ' LIKE '. $db->quote('%'.$key.'%'));
	$query->order('ordering ASC');
	$db->setQuery($query);
	$result = $db->loadObjectList();

	foreach ($result as $row ) {
		 $html .= '<div><a class="suggest-element" data="'.$row->pregunta.'" id="product_'.$row->id.'">'.$row->pregunta.'</a></div>';
	}

	// echo $html;
	$db->disconnect();
}

?>
