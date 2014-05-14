<?php
$this->breadcrumbs=array(
	'Participants'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Participants','url'=>array('index')),
array('label'=>'Create Participants','url'=>array('create')),
array('label'=>'Update Participants','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Participants','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Participants','url'=>array('admin')),
);
?>

<h1>View Participants #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'group_id',
		'first_name',
		'middle_name',
		'last_name',
		'birthdate',
		'contact_number',
		'include',
),
)); ?>
