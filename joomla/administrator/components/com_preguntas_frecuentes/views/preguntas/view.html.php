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

jimport('joomla.application.component.view');

/**
 * Preguntas_frecuentes list view
 */
class Preguntas_frecuentesViewPreguntas extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
	  
		   

		 /*
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__preguntas_frecuentes_preguntas')); 
		$query->order('ordering ASC');
		$db->setQuery($query);
		$results = $db->loadObjectList();
		*/
 /*
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select(array('a.*', 'b.tema'));
	    $query->from($db->quoteName('#__preguntas_frecuentes_preguntas', 'a'));
	    $query->join('INNER', 
	    			$db->quoteName('#__preguntas_frecuentes_tema', 'b') . ' ON (' . $db->quoteName('a.dsit_preguntas_frecuentes_tema_id') . ' = ' . $db->quoteName('b.id') . ')'
	    		   );	   
	    $query->order($db->quoteName('a.id') . ' DESC');
	    $db->setQuery($query);
		$results = $db->loadObjectList();
	  
		$this->state		= $this->get('State');
		$this->items		= $results; 

  		Preguntas_frecuentesHelpersBackend::addSubmenu('preguntas');

  		$this->addToolbar();
		$this->sortFields = $this->getSortFields();
        $this->sidebar = JHtmlSidebar::render(); 

		$this->loadTemplateHeader();
		parent::display($tpl);
 */		
		$this->user			= JFactory::getUser();
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
 
        
		Preguntas_frecuentesHelpersBackend::addSubmenu('preguntas');

		$this->addToolbar();

		$this->sortFields = $this->getSortFields();

        $this->sidebar = JHtmlSidebar::render();

		// Load the template header here to simplify the template
		$this->loadTemplateHeader();

		parent::display($tpl);



	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.'/helpers/backend.php';

		$state	= $this->get('State');
		$canDo	= Preguntas_frecuentesHelpersBackend::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_PREGUNTAS_FRECUENTES_TITLE_PREGUNTAS'), 'preguntas.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/pregunta';
        if (file_exists($formPath))
		{
            if ($canDo->get('core.create'))
			{
			    JToolBarHelper::addNew('pregunta.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0]))
			{
			    JToolBarHelper::editList('pregunta.edit','JTOOLBAR_EDIT');
		    }
        }

		if ($canDo->get('core.edit.state'))
		{
            if (isset($this->items[0]->state))
			{
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('preguntas.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('preguntas.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            }
			else if (isset($this->items[0]))
			{
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'preguntas.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state))
			{
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('preguntas.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out))
			{
            	JToolBarHelper::custom('preguntas.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}
        
        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state))
		{
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
			{
			    JToolBarHelper::deleteList('', 'preguntas.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    }
			else if ($canDo->get('core.edit.state'))
			{
			    JToolBarHelper::trash('preguntas.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_preguntas_frecuentes');
		}
        
        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_preguntas_frecuentes&view=preguntas');
        
        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'filter_published',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)
		);
	}

	/**
	 * Get the fields for sorting
	 *
	 * @return	$sortFields		array	An array with the sort fields
	 */
	protected function getSortFields()
	{
		$sortFields = array(
			'a.id' => JText::_('COM_PREGUNTAS_FRECUENTES_HEADING_BACKEND_LIST_ID'),
			'a.pregunta' => JText::_('COM_PREGUNTAS_FRECUENTES_PREGUNTA_PREGUNTA_LBL'),
			'a.tema' => JText::_('COM_PREGUNTAS_FRECUENTES_PREGUNTA_TEMA_LBL'),
			'a.created_by' => JText::_('COM_PREGUNTAS_FRECUENTES_PREGUNTA_CREATED_BY_LBL'),
			'a.state' => JText::_('COM_PREGUNTAS_FRECUENTES_PREGUNTA_STATE_LBL'),
			'a.ordering' => JText::_('COM_PREGUNTAS_FRECUENTES_PREGUNTA_ORDERING_LBL'),
		);

		return $sortFields;
	}

	/**
	 * Load the template header data here to simplify the template
	 */
	protected function loadTemplateHeader()
	{
		JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

		JHtml::_('bootstrap.tooltip');
		JHtml::_('behavior.multiselect');
		JHtml::_('formbehavior.chosen', 'select');

		$document = JFactory::getDocument();
		$document->addStyleSheet('components/com_preguntas_frecuentes/assets/css/preguntas_frecuentes.css');
		$document->addScript('components/com_preguntas_frecuentes/assets/js/list.js');

		$user = JFactory::getUser();
		$this->listOrder = $this->escape($this->state->get('list.ordering'));
		$this->listDirn = $this->escape($this->state->get('list.direction'));
		$user->authorise('core.edit.state', 'com_preguntas_frecuentes.category');
		$saveOrder = $this->listOrder == 'a.ordering';

		if ($saveOrder)
		{
			$saveOrderingUrl = 'index.php?option=com_preguntas_frecuentes&task=preguntas.saveOrderAjax&tmpl=component';
			JHtml::_('sortablelist.sortable', 'preguntaList', 'adminForm', strtolower($this->listDirn), $saveOrderingUrl);
		}

		$this->saveOrder = $saveOrder;
	}
}
