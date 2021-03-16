<?php
//$con = mysqli_connect("localhost","root","","dbyoobento");
define('_JEXEC', 1);
define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../../'));
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';
// $mainframe = JFactory::getApplication('site');

echo $pregunta = $_POST['txtPregunta'];
echo $respuesta = $_POST['codrespuesta'];
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$columns = array(
			'pregunta',
			'codrespuesta',
		);
		$values = array(
			$db->quote($pregunta),
			$db->quote($respuesta)
		);
		$query
		    ->insert($db->quoteName('#__logchatbot'))
		    ->columns($db->quoteName($columns))
		    ->values(implode(',', $values));
		$db->setQuery($query);
		$db->execute();

?>
