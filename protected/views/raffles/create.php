<?php
$this->breadcrumbs=array(
	'Raffles'=>array('admin'),
	'Add Raffle',
);

$this->menu=array(
array('label'=>'List Raffles','url'=>array('index')),
array('label'=>'Manage Raffles','url'=>array('admin')),
);
?>

<h1>Add Raffle</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
