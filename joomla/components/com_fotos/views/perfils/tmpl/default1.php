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

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
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
<form action="<?php echo JRoute::_('index.php?option=com_fotos&view=perfils'); ?>" method="post" name="adminForm" id="adminForm">
    <div id="filter-bar" class="btn-toolbar">
        <div class="filter-search btn-group pull-left">
            <label for="filter_search" class="element-invisible"><?php echo JText::_('JSEARCH_FILTER');?></label>
            <input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>..." value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('JSEARCH_FILTER'); ?>" />
        </div>
        <button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><?php echo JText::_('JSEARCH_FILTER'); ?></button>
        <button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="item-nombre">
						<?php echo JHtml::_('grid.sort',  'COM_FOTOS_HEADING_FRONTEND_LIST_NOMBRE', 'a.nombre', $listDirn, $listOrder); ?>
					</th>
					<th class="item-correo">
						<?php echo JHtml::_('grid.sort',  'COM_FOTOS_HEADING_FRONTEND_LIST_CORREO', 'a.correo', $listDirn, $listOrder); ?>
					</th>
					<th class="item-ext">
						<?php echo JHtml::_('grid.sort',  'COM_FOTOS_HEADING_FRONTEND_LIST_EXT', 'a.ext', $listDirn, $listOrder); ?>
					</th>
					<th class="item-imagen">
						<?php echo JHtml::_('grid.sort',  'COM_FOTOS_HEADING_FRONTEND_LIST_IMAGEN', 'a.imagen', $listDirn, $listOrder); ?>
					</th>
					<th class="item-datos">
						<?php echo JHtml::_('grid.sort',  'COM_FOTOS_HEADING_FRONTEND_LIST_DATOS', 'a.datos', $listDirn, $listOrder); ?>
					</th>
					<th class="item-created_by">
						<?php echo JHtml::_('grid.sort',  'COM_FOTOS_HEADING_FRONTEND_LIST_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
					</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $i => $item) : ?>
                <tr class="<?php echo ($i % 2) ? "odd" : "even"; ?>">
                    <td class="item-nombre">
						<a href="<?php echo JRoute::_('index.php?option=com_fotos&view=perfil&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->nombre; ?>
						</a>
					</td>
					<td class="item-correo">
						<a href="<?php echo JRoute::_('index.php?option=com_fotos&view=perfil&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->correo; ?>
						</a>
					</td>
					<td class="item-ext">
						<a href="<?php echo JRoute::_('index.php?option=com_fotos&view=perfil&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->ext; ?>
						</a>
					</td>
					<td class="item-imagen">
						<a href="<?php echo JRoute::_('index.php?option=com_fotos&view=perfil&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php if(!empty($item->imagen)) : ?>
								<img src="<?php echo JURI::root() . $item->imagen; ?>" class="list-media" />
							<?php endif; ?>
						</a>
					</td>
					<td class="item-datos">
						<a href="<?php echo JRoute::_('index.php?option=com_fotos&view=perfil&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->datos; ?>
						</a>
					</td>
					<td class="item-created_by">
						<?php echo $item->created_by; ?>
					</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination center">
            <?php echo $this->pagination->getListFooter(); ?>
        </div>
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    </div>
</form>
