<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'raffles-form',
	'enableAjaxValidation'=>false,
)); ?>

<style>
#s2id_Raffles_event_id{
  margin-left: 0px; 
  margin-bottom: 6px;
}
</style>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php $event = CHtml::listData(Events::model()->findAll(),'id','name');?>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->select2Row($model,'event_id',array('data'=>$event,'htmlOptions'=>array(
						'class'=>'span3'),'options'=>array(
						'placeholder'=>'Choose an event','allowClear'=>true,))); ?> </div>

<div class="row"><?php echo $form->textFieldRow($model,'name',array('class'=>'span3','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->textAreaRow($model,'description',array('rows'=>6,'cols'=>50,'class'=>'span3','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->textFieldRow($model,'prize',array('class'=>'span3','maxlength'=>255)); ?></div>

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
			'url'=>Yii::app()->createUrl('raffles/admin'),'label'=>'Cancel',
			'htmlOptions'=>array('class'=>'btn btn-danger'),
		)); ?>

</div>

<?php $this->endWidget(); ?>
