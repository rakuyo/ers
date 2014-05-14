<?php
$this->breadcrumbs=array(
	'Winners'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Winners','url'=>array('index')),
array('label'=>'Create Winners','url'=>array('create')),
array('label'=>'Update Winners','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Winners','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Winners','url'=>array('admin')),
);
?>

<h1>View Winners #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'raffle_id',
		'event_id',
		'participant_id',
		'group_id',
		'datetime',
),
)); ?>
