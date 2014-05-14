<?php
$this->breadcrumbs=array(
	'Winners'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Winners','url'=>array('index')),
array('label'=>'Manage Winners','url'=>array('admin')),
);
?>

<h1>Create Winners</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>