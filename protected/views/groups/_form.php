<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'groups-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->textFieldRow($model,'name',array('class'=>'span3','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->textAreaRow($model,'description',array('rows'=>6,'cols'=>50,'class'=>'span3','maxlength'=>255)); ?></div>

<div class="row"><?php echo $form->dropDownListRow($model,'include',array('1'=>'Yes','0'=>'No'),array('class'=>'span3')); ?></div>

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
			'url'=>Yii::app()->createUrl('groups/admin'),'label'=>'Cancel',
			'htmlOptions'=>array('class'=>'btn btn-danger'),
		)); ?>

</div>


<?php $this->endWidget(); ?>
