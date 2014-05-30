<h1>Raffles</h1>
<style>
  .select2-container{
    width: 235px;
  }
</style>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'raffles-grid',
'dataProvider'=>$model->search(),
 'afterAjaxUpdate'=>"function() {
    jQuery('#event_id').select2({'placeholder':' ','allowClear':true});
  }",
'filter'=>$model,
'columns'=>array(

     array('name'=>'event_id','filter' => $this->widget('bootstrap.widgets.TbSelect2',array(
       'model'=>$model,'attribute'=>'event_id','data'=>CHtml::listData(Events::model()->findAll(),'id','name'),'options' => array(
         'placeholder' => ' ','allowClear'=>true),'htmlOptions'=>array(
           'style'=>'width:190px','id'=>'event_id')),true),'value'=>'$data->event->name'),
	//	array('name'=>'event_id','filter'=>CHtml::listData(Events::model()->findAll(),'id','name'),'value'=>'$data->event->name'),
		'name',
		'description',
		'prize',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}',
),
),
)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'link','icon'=>'icon-plus-sign','url'=>Yii::app()->createUrl('raffles/create'),'label'=>'Add Raffle'));?>
