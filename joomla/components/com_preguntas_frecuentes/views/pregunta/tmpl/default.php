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
?>
<?php if ($this->params->get('show_page_heading')) : ?>
    <div class="page-header">
        <h1>
			<?php if ($this->escape($this->params->get('page_heading'))) : ?>
				<?php echo $this->escape($this->params->get('page_heading')); ?>
			<?php else : ?>
				<?php echo $this->escape($this->params->get('page_title')); ?>
			<?php endif; ?>
        </h1>
    </div>
<?php endif; ?>
<div class="table-responsive">
    <table class="table table-striped">
        <tr>
			<th class="item-pregunta">
				<?php echo JText::_('COM_PREGUNTAS_FRECUENTES_HEADING_FRONTEND_DETAIL_PREGUNTA'); ?>
			</th>
			<td>
				<?php echo $this->item->pregunta; ?>
			</td>
		</tr>
		<tr>
			<th class="item-tema">
				<?php echo JText::_('COM_PREGUNTAS_FRECUENTES_HEADING_FRONTEND_DETAIL_TEMA'); ?>
			</th>
			<td>
				<?php echo $this->item->tema; ?>
			</td>
		</tr>
		<tr>
			<th class="item-created_by">
				<?php echo JText::_('COM_PREGUNTAS_FRECUENTES_HEADING_FRONTEND_DETAIL_CREATED_BY'); ?>
			</th>
			<td>
				<?php echo $this->item->created_by; ?>
			</td>
		</tr>
    </table>
</div>
