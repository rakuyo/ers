<?php
$this->breadcrumbs=array(
	'Winners'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Winners','url'=>array('index')),
	array('label'=>'Create Winners','url'=>array('create')),
	array('label'=>'View Winners','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Winners','url'=>array('admin')),
	);
	?>

	<h1>Update Winners <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>