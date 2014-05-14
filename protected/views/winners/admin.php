<h1>Winners</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'winners-grid',
'dataProvider'=>$model->search(),
'afterAjaxUpdate'=>"function() {
  jQuery('#datetime').datetimepicker({'format':'yyyy-mm-dd hh:ii','autoclose':true,'showMeridian':true,'minuteStep':1});
}",
'filter'=>$model,
'columns'=>array(
		array('name'=>'raffle_id','filter'=>CHtml::listData(Raffles::model()->findAll(),'id','name'),'value'=>'$data->raffle->name'),
	//	array('name'=>'raffle_id','filter'=>$this->widget('bootstrap.widgets.TbSelect2'),
	//		array('model'=>$model,'attribute'=>'raffle_id','data'=>CHtml::listData(Raffles::model()->findAll(),'id','name'))),
		array('name'=>'event_id','filter'=>CHtml::listData(Events::model()->findAll(),'id','name'),'value'=>'$data->event->name'),
		array('name'=>'participant_id','filter'=>CHtml::listData(Participants::model()->findAll(array('order'=>'last_name')),'id','concatened'),
			'value'=>'Participants::model()->getName($data->participant_id)'),
		array('name'=>'group_id','filter'=>CHtml::listData(Groups::model()->findAll(),'id','name'),'value'=>'$data->group->name'),
		array('name'=>'datetime','filter'=>$this->widget('bootstrap.widgets.TbDateTimePicker',
			array('model'=>$model,'attribute'=>'datetime','options'=>array('format'=>'yyyy-mm-dd hh:ii','autoclose'=>true,'showMeridian'=>true,'minuteStep'=>1),'htmlOptions'=>array('id'=>'datetime','class'=>'input-append date')),true),'sortable'=>true,
		),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'',
),
),
)); ?>
