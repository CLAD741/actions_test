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
<form action="<?php echo JRoute::_('index.php?option=com_fotos&layout=edit&id=' . $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<div class="span10 form-horizontal">
            <fieldset class="adminform">
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('id'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('id'); ?>
					</div>
				</div>
            	<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('nombre'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('nombre'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('correo'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('correo'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('ext'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('ext'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('imagen'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('imagen'); ?>
					</div>
				<div class="control-label">
					<?php echo $this->form->getLabel('cita'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('cita'); ?>
				</div>
				<div class="control-label">
					<?php echo $this->form->getLabel('cargo'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('cargo'); ?>
				</div>
			</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('datos'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('datos'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('created_by'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('created_by'); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('state'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('state'); ?>
					</div>
				</div>
            </fieldset>
    	</div>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
	<div id="validation-form-failed" data-backend-detail="perfil" data-message="<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>">
	</div>
</form>
