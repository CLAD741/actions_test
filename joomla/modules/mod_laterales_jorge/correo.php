<?php

ini_set('allow_url_fopen',1);

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

		JSession::checkToken() or die( 'Invalid Token' );

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select("*");
		$query->from($db->quoteName('#__modules'));
		$query->where($db->quoteName('module')." = ".$db->quote("mod_laterales_jorge"));
		$db->setQuery($query);
		$results = $db->loadObject();
		$correo_host = json_decode($results->params);


		$mailer = JFactory::getMailer();
		$config = JFactory::getConfig();

		$sender = array(
		    $config->get( 'mailfrom' ),
		    $config->get( 'fromname' )
		);


		$mailer->setSender($sender);

		$recipient = $correo_host->correo;

		$mailer->addRecipient($recipient);

		$body=
		"

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Correo desde el Sitio Web DSIT</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 0; padding: 0;'>
	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
		<tr>
			<td style='padding: 10px 0 30px 0;'>
				<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #cccccc; border-collapse: collapse;'>
					<tr>
						<td align='center' bgcolor='#6d1c72' style='padding: 40px 0 30px 0; color: #ffffff; font-size: 28px; font-weight: bold; font-family: Lato, sans-serif;'>
							DSIT

						</td>
					</tr>
					<tr>
						<td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
										<b>".$_POST["nombre"]."</b>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 7px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										<a href='mailto:".$_POST["email"]."'>".$_POST["email"]."</a>
									</td>
								</tr>
								<tr>
									<td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
										".$_POST["comentarios"]."
									</td>
								</tr>
								<tr>
									<td>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor='#1b2831' style='padding: 30px 30px 30px 30px;'>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
								<tr>
									<td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;' width='75%'>
										&reg; Universidad de los Andes | Vigilada Mineducación<br/>
									</td>
									<td align='right' width='25%'>
										<table border='0' cellpadding='0' cellspacing='0'>
											<tr>
												<td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>
												<td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;'>
													<a href='https://dsit.uniandes.edu.co/' style='color: #ffffff;'>
														<img src='https://dsitnewpr.uniandes.edu.co/templates/yootheme/cache/Logo-DSIT-Web-01-0f334f17.png' alt='DSIT' width='100%' height='58'  style='display: block;' border='0' />
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>














		";
		$mailer->isHtml(true);
		$mailer->Encoding = 'base64';
		$mailer->setSubject('Correo desde el sitio Web DSIT');
		$mailer->setBody($body);

		$send = $mailer->Send();
		if ( $send !== true ) {
		    echo 'Error sending email: ';
		}
		else{

		 ?>
				<body>
				<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
					<script language='javascript'>
						swal({
						  title: "Enviado correctamente",
						  text: "Gracias por tus cometarios",
						  icon: "success",
						  button: "Atras",
						})
						.then((willDelete) => {
						  window.history.back();
						});
					</script>
				</body>
			<?php
				}
	}
	else {

		?>
		<body>
			<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
			<script language='javascript'>
				swal({
					title: "¡Error en el captcha!",
					icon: "error",
					button: "Atras",
				})
				.then((willDelete) => {
				  window.history.back();
				});
			</script>
		</body>
		<?php
	}
