<?php
/**
 * @copyright	Copyright © 2018 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @generator	http://xdsoft/joomla-module-generator/
 */
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
// Include assets
$doc->addStyleSheet(JURI::root()."modules/mod_preguntas_frecuentes/assets/css/style.css");
$doc->addScript(JURI::root()."modules/mod_preguntas_frecuentes/assets/js/script.js");
//$doc->addScript("https://code.jquery.com/jquery-3.2.1.js");
//$doc->addScript("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");

// $width 			= $params->get("width");

/*
	$db = JFactory::getDBO();
	$db->setQuery("SELECT * FROM #__mod_preguntas_frecuentes where del=0 and module_id=".$module->id);
	$objects = $db->loadAssocList();
*/
require JModuleHelper::getLayoutPath('mod_preguntas_frecuentes', $params->get('layout', 'default'));
