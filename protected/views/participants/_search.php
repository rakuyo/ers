<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'group_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'middle_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->datepickerRow($model,'birthdate',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textFieldRow($model,'contact_number',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'include',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
