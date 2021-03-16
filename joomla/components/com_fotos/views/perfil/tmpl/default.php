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
			<th class="item-nombre">
				<?php echo JText::_('COM_FOTOS_HEADING_FRONTEND_DETAIL_NOMBRE'); ?>
			</th>
			<td>
				<?php echo $this->item->nombre; ?>
			</td>
		</tr>
		<tr>
			<th class="item-correo">
				<?php echo JText::_('COM_FOTOS_HEADING_FRONTEND_DETAIL_CORREO'); ?>
			</th>
			<td>
				<?php echo $this->item->correo; ?>
			</td>
		</tr>
		<tr>
			<th class="item-ext">
				<?php echo JText::_('COM_FOTOS_HEADING_FRONTEND_DETAIL_EXT'); ?>
			</th>
			<td>
				<?php echo $this->item->ext; ?>
			</td>
		</tr>
		<tr>
			<th class="item-imagen">
				<?php echo JText::_('COM_FOTOS_HEADING_FRONTEND_DETAIL_IMAGEN'); ?>
			</th>
			<td>
				<?php if(!empty($this->item->imagen)) : ?>
					<img src="<?php echo JURI::root() . $this->item->imagen; ?>" class="list-media" />
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th class="item-datos">
				<?php echo JText::_('COM_FOTOS_HEADING_FRONTEND_DETAIL_DATOS'); ?>
			</th>
			<td>
				<?php echo $this->item->datos; ?>
			</td>
		</tr>
		<tr>
			<th class="item-created_by">
				<?php echo JText::_('COM_FOTOS_HEADING_FRONTEND_DETAIL_CREATED_BY'); ?>
			</th>
			<td>
				<?php echo $this->item->created_by; ?>
			</td>
		</tr>
    </table>
</div>
