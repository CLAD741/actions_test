<?php
/**
 * @version     1.0.0
 * @package     com_fotos_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jorge <je.peralta@uniandes.edu.co> - https://www.developer-url.com
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Fotos list model
 */
class FotosModelPerfils extends JModelList
{
    /**
     * Constructor
     *
     * @param    array          An optional associative array of configuration settings
     *
     * @see      JController
     * @since    1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id', 'a.id',
				'nombre', 'a.nombre',
				'correo', 'a.correo',
				'ext', 'a.ext',
				'imagen', 'a.imagen',
				'datos', 'a.datos',
				'created_by', 'a.created_by',
				'state', 'a.state',
				'ordering', 'a.ordering',
            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state
     *
     * Note. Calling getState in this method will result in recursion
     *
     * @param   string  $ordering   An optional ordering field
     * @param   string  $direction  An optional direction (asc|desc)
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();
        $input = $app->input;

        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        // Load the list state
        $this->setState('list.start', $input->get('limitstart', 0, 'uint'));
        $this->setState('list.limit', $input->get('limit', $app->get('list_limit', 20), 'uint'));

        // List state information
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data
     *
     * @return    JDatabaseQuery
     * @since    1.6
     */
    protected function getListQuery()
    {
        $query = $this->_db->getQuery(true);

        $query->select('a.id, a.nombre, a.correo');
		$query->select('a.ext, a.imagen, a.datos');
		$query->select('a.state, a.ordering');

        $query->from('`#__fotos_perfils` AS a');

        $query->select('g.name as created_by');
		$query->leftJoin($this->_db->qn('#__users') . ' AS g ON g.id = a.created_by');

        $query->where('a.state = 1');

        // Search for this word
        $searchWord = $this->getState('filter.search');

        // Search in these columns
        $searchColumns = array(
            'a.nombre',
			'a.correo',
			'a.ext',
			'a.imagen',
			'a.datos',
			'g.name',
        );

        if (!empty($searchWord))
        {
            if (stripos($searchWord, 'id:') === 0)
            {
                // Build the ID search
                $idPart = (int) substr($searchWord, 3);
                $query->where($this->_db->qn('a.id') . ' = ' . $this->_db->q($idPart));
            }
            else
            {
                $query = FotosHelpersFrontend::buildSearchQuery($searchWord, $searchColumns, $query);
            }
        }

        // Add the list ordering clause
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');

        if ($orderCol && $orderDirn)
        {
            $query->order($this->_db->escape($orderCol . ' ' . $orderDirn));
        }
        else
        {
            $query->order('a.ordering');
        }

        return $query;
    }

    /** Method to get an array of data items
     *
	 * @return  mixed An array of data on success, false on failure.
	 */
	public function getItems()
    {
        $items = parent::getItems();

        include_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/form/perfil.php';

        $form = new FormPerfilFotos;

        $fieldOptions = $form->getFieldOptions();

        foreach ($items as $i => $item)
        {
            foreach ($item as $key => $value)
            {
                // If this field has options
                if (isset($fieldOptions[$key]))
                {
                    // Update the item key with the field option
                    $item->{$key} = JText::_($fieldOptions[$key][$value]);
                }
            }

            $items[$i] = $item;
        }

        return $items;
    }
}
