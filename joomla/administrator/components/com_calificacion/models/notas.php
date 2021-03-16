<?php
/**
 * @version     1.0.0
 * @package     com_calificacion_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jorge <je.peralta@uniandes.edu.co> - 
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Calificacion model
 */
class CalificacionModelNotas extends JModelList
{
	/**
	 * @var		int		An array with the filtering columns
	 */
	protected	$filter_fields	= null;
	
    /**
     * Constructor
     *
     * @param    array    		An optional associative array of configuration settings
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
				'comentario', 'a.comentario',
				'nota', 'a.nota',
				'fecha', 'a.fecha',
				'usuario', 'a.usuario',
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
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables
		$app = JFactory::getApplication('administrator');

		// Load the filter state
		$search = $app->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $app->getUserStateFromRequest($this->context.'.filter.state', 'filter_published', '', 'string');
		$this->setState('filter.state', $published);

		// List state information
		$value = $app->input->get('limit', $app->get('list_limit', 20), 'uint');
		$this->setState('list.limit', $value);

		$value = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $value);

		// Load the parameters
		$params = JComponentHelper::getParams('com_calificacion');
		$this->setState('params', $params);

		// List state information
		parent::populateState('a.ordering', 'asc');
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery
	 * @since	1.6
	 */
	protected function getListQuery()
	{
		$query	= $this->_db->getQuery(true);

		$query->select('a.id, a.nombre, a.correo');
		$query->select('a.comentario, a.nota, a.fecha');
		$query->select('a.state, a.ordering');

		$query->from('`#__calificacion_notas` AS a');

		$query->select('g.name as usuario');
		$query->leftJoin($this->_db->qn('#__users') . ' AS g ON g.id = a.usuario');
$query->select('h.name as created_by');
		$query->leftJoin($this->_db->qn('#__users') . ' AS h ON h.id = a.created_by');

	    // Filter by published state
	    $published = $this->getState('filter.state');

	    if (is_numeric($published))
	    {
	        $query->where($this->_db->qn('a.state') . ' = ' . (int) $published);
	    }
	    else if ($published === '')
	    {
	        $query->where('(' . $this->_db->qn('a.state') . ' IN (0, 1))');
	    }

		// Search for this word
		$searchWord = $this->getState('filter.search');

		// Search in these columns
		$searchColumns = array(
            'a.nombre',
			'a.correo',
			'a.comentario',
			'a.nota',
			'a.fecha',
			'g.name',
			'h.name',
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
				// Build the search query from the search word and search columns
				$query = CalificacionHelpersBackend::buildSearchQuery($searchWord, $searchColumns, $query);
			}
		}

		// Add the list ordering clause
        $orderCol	= $this->state->get('list.ordering');
        $orderDirn	= $this->state->get('list.direction');

        if ($orderCol && $orderDirn)
        {
            $query->order($this->_db->escape($orderCol.' '.$orderDirn));
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

		include_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/form/nota.php';

		$form = new FormNotaCalificacion;

		$fieldOptions = $form->getFieldOptions();

		foreach ($items as $i => $item)
		{
			foreach ($item as $key => $value)
			{
				// Don't apply to the state
				if ($key == 'state')
				{
					continue;
				}

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
