<h1>Winners</h1>
<style>
  .select2-container{
    width: 235px;
  }
</style>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
  'id'=>'winners-grid',
  'dataProvider'=>$model->search(),
  'afterAjaxUpdate'=>"function() {
    jQuery('#raffle_id').select2({'placeholder':' ','allowClear':true});
    jQuery('#event_id').select2({'placeholder':' ','allowClear':true});
    jQuery('#participant_id').select2({'placeholder':' ','allowClear':true});
    jQuery('#group_id').select2({'placeholder':' ','allowClear':true});
    jQuery('#datetime').datetimepicker({'format':'yyyy-mm-dd hh:ii','autoclose':true,'showMeridian':true,'minuteStep':1});
  }",
  'filter'=>$model,
  'columns'=>array(
    array('name'=>'raffle_id','filter' => $this->widget('bootstrap.widgets.TbSelect2',array(
     'model'=>$model,'attribute'=>'raffle_id','data'=>CHtml::listData(Raffles::model()->findAll(),'id','name'),'options' => array(
       'placeholder' =>' ','allowClear'=>true),'htmlOptions'=>array(
         'style'=>'width:195px','id'=>'raffle_id')),true),'value'=>'$data->raffle->name',),
    array('name'=>'event_id','filter' => $this->widget('bootstrap.widgets.TbSelect2',array(
      'model'=>$model,'attribute'=>'event_id','data'=>CHtml::listData(Events::model()->findAll(),'id','name'),'options' => array(
        'placeholder' => ' ','allowClear'=>true),'htmlOptions'=>array(
          'style'=>'width:195px','id'=>'event_id')),true),'value'=>'$data->event->name',),
    array('name'=>'participant_id','filter' => $this->widget('bootstrap.widgets.TbSelect2',array(
      'model'=>$model,'attribute'=>'participant_id',
        'data'=>CHtml::listData(Participants::model()->findAll(array('order'=>'last_name')),'id','concatened'),'options' => array(
          'placeholder' => ' ','allowClear'=>true),'htmlOptions'=>array(
            'style'=>'width:235px','id'=>'participant_id')),true),'value'=>'Participants::model()->getName($data->participant_id)'),	
     array('name'=>'group_id','filter' => $this->widget('bootstrap.widgets.TbSelect2',array(
       'model'=>$model,'attribute'=>'group_id','data'=>CHtml::listData(Groups::model()->findAll(),'id','name'),'options' => array(
         'placeholder' => ' ','allowClear'=>true),'htmlOptions'=>array(
           'style'=>'width:195px','id'=>'group_id')),true),'value'=>'$data->group->name',),
     array('name'=>'datetime','filter'=>$this->widget('bootstrap.widgets.TbDateTimePicker',array(
       'model'=>$model,'attribute'=>'datetime','options'=>array(
         'format'=>'yyyy-mm-dd hh:ii','autoclose'=>true,'showMeridian'=>true,'minuteStep'=>1),'htmlOptions'=>array(
           'id'=>'datetime','class'=>'input-append date')),true),'sortable'=>true,),
     array('class'=>'bootstrap.widgets.TbButtonColumn','template'=>'{delete}',),
  ),
)); ?>
