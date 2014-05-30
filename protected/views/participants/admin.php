<h1>Participants</h1>
<style>
  .select2-container{
    width: 235px;
  }
  #birthdate{
    color: #fff;
  }
</style>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
  'id'=>'participants-grid',
  'dataProvider'=>$model->search(),
  'afterAjaxUpdate'=>"function() {
    jQuery('#group_id').select2({'placeholder':' ','allowClear':true});
    jQuery('#birthdate').datepicker({'format':'yyyy-mm-dd','autoclose':true}).css('color','#555');
  }",
  'filter'=>$model,
  'columns'=>array(
     array('name'=>'group_id','filter' => $this->widget('bootstrap.widgets.TbSelect2',array(
       'model'=>$model,'attribute'=>'group_id','data'=>CHtml::listData(Groups::model()->findAll(),'id','name'),'options' => array(
         'placeholder' => ' ','allowClear'=>true),'htmlOptions'=>array(
           'style'=>'width:190px','id'=>'group_id')),true),'value'=>'$data->group->name'),
     'first_name',
     'middle_name',
     'last_name',
     array('name'=>'birthdate','filter'=>$this->widget('bootstrap.widgets.TbDatePicker',array(
       'model'=>$model,'attribute'=>'birthdate','options'=>array(
         'format'=>'yyyy-mm-dd','autoclose'=>true),'htmlOptions'=>array(
           'id'=>'birthdate','class'=>'input-append date')),true),'sortable'=>true,),
     'contact_number',
     array('name'=>'include','filter'=>array('1'=>'Yes','0'=>'No'),'value'=>'$data->include == 1 ? "Yes" : "No"'),
     array('class'=>'bootstrap.widgets.TbButtonColumn','template'=>'{update}',),
   ),
)); ?>

<div class= "clear-fix">
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'primary','buttonType'=>'link','icon'=>'icon-plus-sign','url'=>Yii::app()->createUrl('participants/create'),'label'=>'Add Participant'));?>
<span class= "pull-right">
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'','buttonType'=>'','icon'=>'icon-check','url'=>Yii::app()->createUrl('participants/includeall'),'label'=>'Include All Participants','htmlOptions'=>array('class'=>'btn-success btn'))); ?>
<span style="width:100px;"></span>
<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'','buttonType'=>'','icon'=>'icon-remove','url'=>Yii::app()->createUrl('participants/excludeall'),'label'=>'Exclude All Participants', 'htmlOptions'=>array('class'=>'btn-warning btn'))); ?>
</span>
</div>

