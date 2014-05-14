<h1>Events</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'events-grid',
'dataProvider'=>$model->search(),
'afterAjaxUpdate'=>"function() {
  jQuery('#datetime').datetimepicker({'format':'yyyy-mm-dd hh:ii','autoclose':true,'showMeridian':true,'minuteStep':1});
}",
'filter'=>$model,
'columns'=>array(
		'name',
		'description',
		array('name'=>'datetime','filter'=>$this->widget('bootstrap.widgets.TbDateTimePicker',
			array('model'=>$model,'attribute'=>'datetime',
				'options'=>array('format'=>'yyyy-mm-dd hh:ii','autoclose'=>true,'showMeridian'=>true,'minuteStep'=>1),
				'htmlOptions'=>array('id'=>'datetime','class'=>'input-append date')),true),'sortable'=>true,
		),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}',
),
),
)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'link','icon'=>'icon-plus-sign','url'=>Yii::app()->createUrl('events/create'),'label'=>'Add Event'));?>
