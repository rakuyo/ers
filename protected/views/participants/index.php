<?php
$this->breadcrumbs=array(
	'Participants',
);

$this->menu=array(
array('label'=>'Create Participants','url'=>array('create')),
array('label'=>'Manage Participants','url'=>array('admin')),
);
?>

<h1>Participants</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
