<?php
/**
 * @version     1.0.0
 * @package     com_fotos_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jorge <je.peralta@uniandes.edu.co> - https://www.developer-url.com
 */

// No direct access
defined('_JEXEC') or die;

$user = JFactory::getUser();

// Authorize
if (!$user->authorise('core.manage', 'com_fotos'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Register class prefix
JLoader::registerPrefix('Fotos', JPATH_COMPONENT_ADMINISTRATOR);

// Load the controller
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Fotos');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
