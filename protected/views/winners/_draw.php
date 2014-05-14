<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'raffle_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'event_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'participant_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'group_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'datetime',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>



<!--test draw-->
<?php 
Yii::app()->clientScript->registerScript('draw', "
$('.draw-button').click(function(){
$('.draw-form').toggle();
return false;
});
$('.draw-form form').submit(function(){
$.fn.yiiGridView.update('winners-form', {
data: $(this).serialize()
});
return false;
});
");

?>
<?php echo CHtml::link('DRAW','#',array('class'=>'draw-button btn btn-primary btn-large btn-block')); ?>
<div class="draw-form" style="display:none">
	<?php $this->renderPartial('_draw',array(
	'model'=>$model,
)); ?>
</div>
<!-- end-test-draw-->
