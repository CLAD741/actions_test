<?php
/**
 * @version     1.1.3.1
 * @package     com_test_1.1.3.1
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Developer name here <developer@email_here.com> - http://www.developer-url-here.com
 */

// No direct access
defined('_JEXEC') or die;

class Preguntas_frecuentesController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			$cachable	If true, the view output will be cached
	 * @param	array			$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		// Set the default view for the component
		$view = JFactory::getApplication()->input->getCmd('view', 'preguntas');
        JFactory::getApplication()->input->set('view', $view);

		parent::display($cachable, $urlparams);

		return $this;
	}
}
