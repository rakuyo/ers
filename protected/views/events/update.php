<?php
$this->breadcrumbs=array(
	'Events'=>array('admin'),
	'Update Event',
);

	$this->menu=array(
	array('label'=>'List Events','url'=>array('index')),
	array('label'=>'Create Events','url'=>array('create')),
	array('label'=>'View Events','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Events','url'=>array('admin')),
	);
	?>

	<h1>Update Event></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
