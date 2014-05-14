<h1>Raffles</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'raffles-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'event_id','filter'=>CHtml::listData(Events::model()->findAll(),'id','name'),'value'=>'$data->event->name'),
		'name',
		'description',
		'prize',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}',
),
),
)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'link','icon'=>'icon-plus-sign','url'=>Yii::app()->createUrl('raffles/create'),'label'=>'Add Raffle'));?>
