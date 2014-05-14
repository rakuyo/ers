<?php
$this->breadcrumbs=array(
	'Participants'=>array('admin'),
	'Add Participant',
);

$this->menu=array(
array('label'=>'List Participants','url'=>array('index')),
array('label'=>'Manage Participants','url'=>array('admin')),
);
?>

<h1>Add Participant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
