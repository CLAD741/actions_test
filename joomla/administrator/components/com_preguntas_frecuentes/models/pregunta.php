<?php
/**
 * @version     1.0.0
 * @package     com_preguntas_frecuentes_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jorge <je.peralta@uniandes.edu.co> - https://www.developer-url.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Preguntas_frecuentes model
 */
class Preguntas_frecuentesModelPregunta extends JModelAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_PREGUNTAS_FRECUENTES';

	/**
	 * Returns a reference to the a Table object, always creating it
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional
	 * @param	array	Configuration array for model. Optional
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'pregunta', $prefix = 'Preguntas_frecuentesTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		An optional array of data for the form to interogate
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form
		$form = $this->loadForm('com_preguntas_frecuentes.pregunta', 'pregunta', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form
	 *
	 * @return	mixed	The data for the form
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data
		$data = JFactory::getApplication()->getUserState('com_preguntas_frecuentes.edit.pregunta.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	 * Prepare and sanitise the table prior to saving
	 *
	 * @since	1.6
	 */
	protected function prepareTable($table)
	{
		jimport('joomla.filter.output');

		if (empty($table->id))
		{
			// Set ordering to the last item if not set
			if (@$table->ordering === '') {
				$db = JFactory::getDbo();
				$db->setQuery('SELECT MAX(ordering) FROM #__preguntas_frecuentes_preguntas');
				$max = $db->loadResult();
				$table->ordering = $max+1;
			}
		}
	}
}
