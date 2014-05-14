<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'participants-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php $group = CHtml::listData(Groups::model()->findAll(),'id','name');?>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->dropDownListRow($model,'group_id',$group,array('class'=>'span2','empty'=>'Choose a group')); ?></div>

<div class="row"><?php echo $form->textFieldRow($model,'first_name',array('class'=>'span2','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->textFieldRow($model,'middle_name',array('class'=>'span2','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->textFieldRow($model,'last_name',array('class'=>'span2','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->datepickerRow($model,'birthdate',array('options'=>array('format'=>'yyyy-mm-dd','todayBtn'=>'linked','todayHighlight'=>true,'autoclose'=>true),'htmlOptions'=>array('class'=>'span12')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'<i class="icon-calendar"></i>')); ?></div>

<div class="row"><?php echo $form->textFieldRow($model,'contact_number',array('class'=>'span2','maxlength'=>11)); ?></div>

<div class="row"><?php echo $form->dropDownListRow($model,'include',array('1'=>'Yes','0'=>'No'),array('class'=>'span2')); ?></div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'icon-plus-sign',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Update',
			'htmlOptions'=>array('class'=>'btn btn-success'),
		)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'',
			'icon'=>'icon-remove-circle',
			'type'=>'',
			'url'=>Yii::app()->createUrl('participants/admin'),'label'=>'Cancel',
			'htmlOptions'=>array('class'=>'btn btn-danger'),
		)); ?>

</div>

<?php $this->endWidget(); ?>
