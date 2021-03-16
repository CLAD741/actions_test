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

jimport('joomla.application.component.view');

/**
 * Fotos list view
 */
class FotosViewPerfils extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->user			= JFactory::getUser();
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}

		FotosHelpersBackend::addSubmenu('perfils');

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
		$canDo	= FotosHelpersBackend::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_FOTOS_TITLE_PERFILS'), 'perfils.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/perfil';
        if (file_exists($formPath))
		{
            if ($canDo->get('core.create'))
			{
			    JToolBarHelper::addNew('perfil.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0]))
			{
			    JToolBarHelper::editList('perfil.edit','JTOOLBAR_EDIT');
		    }
        }

		if ($canDo->get('core.edit.state'))
		{
            if (isset($this->items[0]->state))
			{
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('perfils.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('perfils.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            }
			else if (isset($this->items[0]))
			{
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'perfils.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state))
			{
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('perfils.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out))
			{
            	JToolBarHelper::custom('perfils.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state))
		{
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
			{
			    JToolBarHelper::deleteList('', 'perfils.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    }
			else if ($canDo->get('core.edit.state'))
			{
			    JToolBarHelper::trash('perfils.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_fotos');
		}

        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_fotos&view=perfils');

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
			'a.id' => JText::_('COM_FOTOS_HEADING_BACKEND_LIST_ID'),
			'a.nombre' => JText::_('COM_FOTOS_PERFIL_NOMBRE_LBL'),
			'a.correo' => JText::_('COM_FOTOS_PERFIL_CORREO_LBL'),
			'a.ext' => JText::_('COM_FOTOS_PERFIL_EXT_LBL'),
			'a.imagen' => JText::_('COM_FOTOS_PERFIL_IMAGEN_LBL'),
  		'a.cita' => JText::_('COM_FOTOS_PERFIL_CITA_LBL'),
			'a.cargo' => JText::_('COM_FOTOS_PERFIL_CARGO_LBL'),
			'a.datos' => JText::_('COM_FOTOS_PERFIL_DATOS_LBL'),
			'a.created_by' => JText::_('COM_FOTOS_PERFIL_CREATED_BY_LBL'),
			'a.state' => JText::_('COM_FOTOS_PERFIL_STATE_LBL'),
			'a.ordering' => JText::_('COM_FOTOS_PERFIL_ORDERING_LBL'),
			'a.cita' => JText::_('COM_FOTOS_PERFIL_CITA_LBL'),
			'a.cargo' => JText::_('COM_FOTOS_PERFIL_CARGO_LBL'),
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
		$document->addStyleSheet('components/com_fotos/assets/css/fotos.css');
		$document->addScript('components/com_fotos/assets/js/list.js');

		$user = JFactory::getUser();
		$this->listOrder = $this->escape($this->state->get('list.ordering'));
		$this->listDirn = $this->escape($this->state->get('list.direction'));
		$user->authorise('core.edit.state', 'com_fotos.category');
		$saveOrder = $this->listOrder == 'a.ordering';

		if ($saveOrder)
		{
			$saveOrderingUrl = 'index.php?option=com_fotos&task=perfils.saveOrderAjax&tmpl=component';
			JHtml::_('sortablelist.sortable', 'perfilList', 'adminForm', strtolower($this->listDirn), $saveOrderingUrl);
		}

		$this->saveOrder = $saveOrder;
	}
}
