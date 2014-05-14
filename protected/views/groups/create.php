<?php
$this->breadcrumbs=array(
	'Groups'=>array('admin'),
	'Add Group',
);

$this->menu=array(
array('label'=>'List Groups','url'=>array('index')),
array('label'=>'Manage Groups','url'=>array('admin')),
);
?>

<h1>Add Group</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
