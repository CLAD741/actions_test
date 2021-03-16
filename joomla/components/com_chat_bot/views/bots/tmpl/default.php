<?php
/**
 * @version     1.0.0
 * @package     com_chat_bot_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Juan <jaldanajimenez1@gmail.com> - https://www.developer-url.com
 */

// No direct access
defined('_JEXEC') or die;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="components/com_chat_bot/assets/js/script.js"></script>
<center>
	<h1>Talk to me!</h1>
	<textarea readonly id="areaChat" style="width:80%; height:275px; background-color: #D1D3DA;"></textarea>
	<p><input type="text" name="name" value="" id="txtPregunta" size="50" style="background-color: #D1D3DA;"autofocus></p>
	<p id="resultado1"></p>
	<p id="resultado2"></p>
	<p id="resultado3"></p>
	<p id="resultado4"></p>
	<p id="respuesta"></p>
</center>

<script type="text/javascript">
	var elem = document.getElementById('txtPregunta');
	var elem2 = document.getElementById('areaChat');
	elem.addEventListener('keypress', function(e){
		if (e.keyCode == 13) {
  			elem2.style.color = "Darkblue";
  			evaluarExpresion();
  		}
	});
</script>
