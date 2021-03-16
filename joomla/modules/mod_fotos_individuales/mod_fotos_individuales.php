<?php
/**
 * @copyright	Copyright © 2018 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @generator	http://xdsoft/joomla-module-generator/
 */
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
/* Available fields: */
// Include assets
$doc->addStyleSheet(JURI::root()."modules/mod_fotos_individuales/assets/css/style.css");
$doc->addScript(JURI::root()."modules/mod_fotos_individuales/assets/js/script.js");
// $width 			= $params->get("width");

/*
	$db = JFactory::getDBO();
	$db->setQuery("SELECT * FROM #__mod_fotos_individuales where del=0 and module_id=".$module->id);
	$objects = $db->loadAssocList();
*/

$datos = json_decode($module->params);
// $modulo = $module->title;
$modulo = $datos->datos;

// $db = JFactory::getDbo();
// $query = $db->getQuery(true);
// $query->select("*");
// $query->from($db->quoteName('#__modules'));
// $query->where($db->quoteName('module')." = ".$db->quote("mod_fotos_individuales"));
// $db->setQuery($query);
// $results = $db->loadObject();
// $datos = json_decode($results->params);
// $dato = $datos->datos;


$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('*');
$query->from($db->quoteName('#__fotos_perfils'));
$query->where($db->quoteName('datos') . ' = '. $db->quote($modulo));
$query->order('ordering ASC');
$db->setQuery($query);
$results = $db->loadObjectList();


require JModuleHelper::getLayoutPath('mod_fotos_individuales', $params->get('layout', 'default'));
