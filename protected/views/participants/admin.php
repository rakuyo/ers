<h1>Participants</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'participants-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'group_id','filter'=>CHtml::listData(Groups::model()->findAll(),'id','name'),'value'=>'$data->group->name'),
		'first_name',
		'middle_name',
		'last_name',
		'birthdate',
		'contact_number',
		array('name'=>'include','filter'=>array('1'=>'Yes','0'=>'No'),'value'=>'$data->include == 1 ? "Yes" : "No"'),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}',
),
),
)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'link','icon'=>'icon-plus-sign','url'=>Yii::app()->createUrl('participants/create'),'label'=>'Add Participant'));?>
