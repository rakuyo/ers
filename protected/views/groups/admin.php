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
<div class= "clear-fix">
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'link','icon'=>'icon-plus-sign','url'=>Yii::app()->createUrl('groups/create'),'label'=>'Add Group'));?>
<span style="width:100px;"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'','buttonType'=>'','icon'=>'icon-file','url'=>Yii::app()->createUrl('groups/import'),'label'=>'Import CSV file','htmlOptions'=>array('class'=>'btn-info btn'))); ?>
<span class="pull-right">
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'','buttonType'=>'','icon'=>'icon-check','url'=>Yii::app()->createUrl('groups/includeall'),'label'=>'Include All Groups','htmlOptions'=>array('class'=>'btn-success btn'))); ?>
<span style="width:100px;"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'','buttonType'=>'','icon'=>'icon-remove','url'=>Yii::app()->createUrl('groups/excludeall'),'label'=>'Exclude All Groups', 'htmlOptions'=>array('class'=>'btn-warning btn'))); ?>
</span>
</div>

