<?php
$this->breadcrumbs=array(
	'Winners',
);

$this->menu=array(
array('label'=>'Create Winners','url'=>array('create')),
array('label'=>'Manage Winners','url'=>array('admin')),
);
?>

<h1>Winners</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
