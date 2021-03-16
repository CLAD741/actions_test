<?php

/*
header('Location: /index.php');
exit;
*/
// sitio = 6LdCj24UAAAAAI84KZacQwVXAWmPR_TE3V-GooZ2
// secreta = 6LdCj24UAAAAABvVdw-PIHwPmOLBRitEkClo5pYb


define('_JEXEC', 1);
define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../'));
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

$mainframe = JFactory::getApplication('site');

JSession::checkToken() or die( 'Invalid Token' );
$session = JFactory::getSession();

$jsondata = array();
$recaptcha = $_POST["g-recaptcha-response"];

$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6LdCj24UAAAAABvVdw-PIHwPmOLBRitEkClo5pYb',
		'response' => $recaptcha
	);
	$options = array(
		'http' => array (
			'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
			'method' => 'POST',
			'content' => http_build_query($data)
		),
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);

	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success = json_decode($verify);

if ($captcha_success->success) {

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$comentarios = $_POST["comentarios"];
$nota = $_POST["nota"];
$fecha = date("j/n/Y");
$usuario = $session->get('id');

$db = JFactory::getDbo();
$query = $db->getQuery(true);
$columns = array('nombre','correo','comentario','nota', 'fecha', 'usuario', 'created_by','state','ordering');
$values = array($db->quote($nombre),$db->quote($email),$db->quote($comentarios),$db->quote($nota),$db->quote($fecha),$db->quote($usuario),492,1,0);
$query
    ->insert($db->quoteName('#__calificacion_notas'))
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
else
{
	$jsondata['title'] = '¡Error en el captcha!';
	$jsondata['text'] = 'Intente nuevamente';
	$jsondata['icon'] = 'error';
	$jsondata['recargar'] = 'no';
	header('Content-type: application/json; charset=utf-8');
  echo json_encode($jsondata, JSON_FORCE_OBJECT);
}
$db->disconnect();
?>
