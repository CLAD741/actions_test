<?php
$para      = 'je.peralta@uniandes.edu.co';
$titulo    = 'la Prueba';
$mensaje   = 'Hola';
$cabeceras = 'From: je.peralta@uniandes.edu.co' . "\r\n" .
    'Reply-To: je.peralta@uniandes.edu.co' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
?>