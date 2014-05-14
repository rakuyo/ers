<?php
$this->breadcrumbs=array(
	'Raffles',
);

$this->menu=array(
array('label'=>'Create Raffles','url'=>array('create')),
array('label'=>'Manage Raffles','url'=>array('admin')),
);
?>

<h1>Raffles</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
