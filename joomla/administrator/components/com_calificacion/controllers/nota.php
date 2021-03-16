<?php
/**
 * @version     1.0.0
 * @package     com_calificacion_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jorge <je.peralta@uniandes.edu.co> - 
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Calificacion detail controller
 */
class CalificacionControllerNota extends JControllerForm
{
    function __construct()
    {
        $this->view_list = 'notas';
        parent::__construct();
    }
}
