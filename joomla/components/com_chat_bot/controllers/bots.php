<?php
/**
 * @version     1.0.0
 * @package     com_chat_bot_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Juan <jaldanajimenez1@gmail.com> - https://www.developer-url.com
 */

// No direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Chat_bot list controller
 */
class Chat_botControllerBots extends Chat_botController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'bots', $prefix = 'Chat_botModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
