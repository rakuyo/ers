<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'events-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->textFieldRow($model,'name',array('class'=>'span2','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->textAreaRow($model,'description',array('rows'=>6,'cols'=>50,'class'=>'span2','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->datetimepickerRow($model,'datetime',array('options'=>array('format'=>'yyyy-mm-dd hh:ii','todayBtn'=>'linked','todayHighlight'=>true,'autoclose'=>true,'showMeridian'=>true,'minuteStep'=>1),'htmlOptions'=>array('class'=>'span12')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'<i class="icon-time"></i>')); ?></div>

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
			'url'=>Yii::app()->createUrl('events/admin'),'label'=>'Cancel',
			'htmlOptions'=>array('class'=>'btn btn-danger'),
		)); ?>

</div>

<?php $this->endWidget(); ?>

