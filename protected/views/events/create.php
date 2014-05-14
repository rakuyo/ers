<?php
$this->breadcrumbs=array(
	'Events'=>array('admin'),
	'Add Event',
);

$this->menu=array(
array('label'=>'List Events','url'=>array('index')),
array('label'=>'Manage Events','url'=>array('admin')),
);
?>

<h1>Add Event</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
