<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Events','url'=>array('index')),
array('label'=>'Create Events','url'=>array('create')),
array('label'=>'Update Events','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Events','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Events','url'=>array('admin')),
);
?>

<h1>View Events #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'description',
		'date',
		'time',
),
)); ?>
