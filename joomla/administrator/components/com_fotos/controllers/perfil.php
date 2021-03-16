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

jimport('joomla.application.component.controllerform');

/**
 * Fotos detail controller
 */
class FotosControllerPerfil extends JControllerForm
{
    function __construct()
    {
        $this->view_list = 'perfils';
        parent::__construct();
    }
}
