<?php
$this->breadcrumbs=array(
	'Raffles'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Raffles','url'=>array('index')),
array('label'=>'Create Raffles','url'=>array('create')),
array('label'=>'Update Raffles','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Raffles','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Raffles','url'=>array('admin')),
);
?>

<h1>View Raffles #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'event_id',
		'name',
		'description',
		'prize',
),
)); ?>
