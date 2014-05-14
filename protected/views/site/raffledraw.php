<center><h1><b><?php echo "RAFFLE DRAW"; ?></b></h1></center>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'winners-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php $raffle = CHtml::listData(Raffles::model()->findAll(),'id','name');?>
<?php $event = CHtml::listData(Events::model()->findAll(),'id','name');?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->dropDownListRow($model,'event_id',$event,array('class'=>'span5','empty'=>'Choose an event')); ?></div>

<div class="row"><?php echo $form->dropDownListRow($model,'raffle_id',$raffle,array('class'=>'span5','empty'=>'Choose a raffle')); ?></div>

<div id=draw_result>test</div>

<div class="row"><?php echo $form->textFieldRow($model,'participant_id',array('class'=>'span5')); ?></div>

<div class="row"><?php echo $form->textFieldRow($model,'group_id',array('class'=>'span5')); ?></div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
			'htmlOptions'=>array('class'=>'btn-large btn-block'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
