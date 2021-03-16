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

/**
 * Fotos helper class
 */
class FotosHelpersBackend
{
	/**
	 * Add the submenus
	 */
	public static function addSubmenu($name = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_FOTOS_TITLE_PERFILS'),
			'index.php?option=com_fotos&view=perfils',
			$name == 'perfils'
		);
	}

	/**
	 * Gets a list of the actions that can be performed
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_fotos';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
	
	/**
	 * Build the query for search from the search columns
	 *
	 * @param	string		$searchWord		Search for this text

	 * @param	string		$searchColumns	The columns in the DB to search for
	 *
	 * @return	string		$query			Append the search to this query
	 */
	public static function buildSearchQuery($searchWord, $searchColumns, $query)
	{
		$db = JFactory::getDbo();

		$where = array();

		foreach ($searchColumns as $i => $searchColumn)
		{
			$where[] = $db->qn($searchColumn) . ' LIKE ' . $db->q('%' . $db->escape($searchWord, true) . '%');
		}

		if (!empty($where))
		{
			$query->where(implode(' OR ', $where));
		}

		return $query;
	}
}
