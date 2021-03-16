<?php
/**
 * @version     1.0.0
 * @package     com_fotos_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jorge <je.peralta@uniandes.edu.co> - https://www.developer-url.com
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');
jimport('joomla.event.dispatcher');

/**
 * Fotos detail model
 */
class FotosModelPerfil extends JModelLegacy
{
	/**
	 * The item to hold data
	 *
	 * @return object
	 */
    var $_item = null;

	/**
	 * Get the data
	 *
	 * @return  object
	 *
	 * @since   1.6
	 */
	public function getItem()
	{
		if (isset($this->_item))
		{
			return $this->_item;
		}

		$app = JFactory::getApplication();

		$id = $app->input->getInt('id');
		$params = $app->getParams();

		$paramId = $params->get('id');

		if ($paramId)
		{
			$id = $paramId;
		}

		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select('a.id, a.nombre, a.correo');
		$query->select('a.ext, a.imagen, a.datos');
		$query->select('a.state, a.ordering');

		$query->from('#__fotos_perfils as a');

		$query->select('g.name as created_by');
		$query->leftJoin($this->_db->qn('#__users') . ' AS g ON g.id = a.created_by');

		$query->where('a.id = ' . intval($id));
		$db->setQuery($query);

		try
		{
			$db->execute();
		}
		catch (RuntimeException $e)
		{
			JError::raiseError(500, $e->getMessage());
		}

		$this->_item = $db->loadObject();

		include_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/form/perfil.php';

		$form = new FormPerfilFotos;

        $fieldOptions = $form->getFieldOptions();

		foreach ($this->_item as $key => $value)
		{
			// If this field has options
			if (isset($fieldOptions[$key]))
			{
				// Update the item key with the field option
				$this->_item->{$key} = JText::_($fieldOptions[$key][$value]);
			}
		}

		return $this->_item;
	}
}
