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
<script>
jQuery(window).load(function () {
    $(".cssload-pantalla").hide();
});

</script>

<style>
#botones{
  background-color: #6d1c72;
  color: #ffffff;
  font-family: Lato;
}


</style>
<div class="cssload-pantalla">
  <div class="spinner">
    <div class="dot1"></div>
    <div class="dot2"></div>
  </div>
</div>


<form action="<?php echo JRoute::_('index.php?option=com_fotos&view=perfils'); ?>" method="post" name="adminForm" id="adminForm">
    <div id="filter-bar" class="btn-toolbar">
        <div class="filter-search btn-group pull-left">
            <label for="filter_search" class="element-invisible"><?php echo JText::_('JSEARCH_FILTER');?></label>
            <input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>..." value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('JSEARCH_FILTER'); ?>" />
        </div>
        <button id="botones" class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><?php echo JText::_('JSEARCH_FILTER'); ?></button>
        <button id="botones" class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
    </div>

    <link rel="stylesheet" type="text/css" href="components/com_fotos/assets/css/common.css" />
    <link rel="stylesheet" type="text/css" href="components/com_fotos/assets/css/style2.css" />

    <ul class="ch-grid">
    	<?php foreach ($this->items as $i => $item) : ?>
					<li>
						<div class="ch-item" style="background-image: url(<?php echo JURI::root() . $item->imagen; ?>); background-size: cover;">
							<div class="ch-info">
								<h3 style="font-size: 10px;"><?php echo $item->correo; ?></h3>
								<p>Ext: <?php echo $item->ext; ?> <a><?php echo $item->datos; ?></a></p>
							</div>
						</div>
            <div style="font-size: 13px;"><?php echo $item->nombre; ?></div>
            <a href="mailto:<?php echo $item->correo; ?>"><?php echo $item->correo; ?></a>
					</li>
		  <?php endforeach; ?>
	  </ul>
        <div class="pagination center">
            <?php echo $this->pagination->getListFooter(); ?>
        </div>
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
</form>
