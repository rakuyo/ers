<h1>Groups</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'groups-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'name',
		'description',
		array('name'=>'include','filter'=>array('1'=>'Yes','0'=>'No'),'value'=>'$data->include == 1 ? "Yes" : "No"'),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}',
),
),
)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'link','icon'=>'icon-plus-sign','url'=>Yii::app()->createUrl('groups/create'),'label'=>'Add Group'));?>
