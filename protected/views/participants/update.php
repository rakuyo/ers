<?php
$this->breadcrumbs=array(
	'Participants'=>array('admin'),
	'Update Participant',
);

	$this->menu=array(
	array('label'=>'List Participants','url'=>array('index')),
	array('label'=>'Create Participants','url'=>array('create')),
	array('label'=>'View Participants','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Participants','url'=>array('admin')),
	);
	?>

	<h1>Update Participant</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
