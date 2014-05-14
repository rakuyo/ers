<?php
$this->breadcrumbs=array(
	'Raffles'=>array('admin'),
	'Update Raffle',
);

	$this->menu=array(
	array('label'=>'List Raffles','url'=>array('index')),
	array('label'=>'Create Raffles','url'=>array('create')),
	array('label'=>'View Raffles','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Raffles','url'=>array('admin')),
	);
	?>

	<h1>Update Raffle</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
