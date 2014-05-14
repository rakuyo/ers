<center><h1 style="font-size:40px;height:45px"><b><?php echo "RAFFLE DRAW"; ?></b></h1></center>

<center>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'winners-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

<?php $raffle = CHtml::listData(Raffles::model()->findAll(),'id','name');?>
<?php $event = CHtml::listData(Events::model()->findAll(),'id','name');?>
<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->
<div class="row"><?php echo $form->dropDownListRow($model,'event_id',$event,array('style'=>'height:50px;font-size:32px;text-align:center','class'=>'span','empty'=>'Choose An Event','id'=>'eid')); ?></div>
<div id=eve style="display:none"><h1 style="font-size:50px;height:55px">event</h1></div>
<div style="display:none"><?php echo $form->textFieldRow($model,'event_id',array('style'=>'height:50px;font-size:32px;text-align:center','id'=>'event','class'=>'span')); ?></div>

<div class="row"><?php echo $form->dropDownListRow($model,'raffle_id',$raffle,array('style'=>'height:50px;font-size:32px;text-align:center','class'=>'span','empty'=>'Choose A Raffle','id'=>'rid')); ?></div>
<div id=raf style="display:none"><h1 style="font-size:50px;height:55px">raffle</h1></div>
<div style="display:none"><?php echo $form->textFieldRow($model,'raffle_id',array('style'=>'height:50px;font-size:32px;text-align:center','id'=>'raffle','class'=>'span')); ?></div>


<br><br>
<div id=draw_result><h1 style="font-size:50px;height:55px">Prize : </h1></div>
<div style="display:none"><?php echo $form->textFieldRow($model,'participant_id',array('style'=>'height:50px;font-size:32px;text-align:center','id'=>'pid','class'=>'span')); ?></div>
<div style="display:none"><?php echo $form->textFieldRow($model,'group_id',array('style'=>'height:50px;font-size:32px;text-align:center','id'=>'gid','class'=>'span')); ?></div>
<br><br>

<?php echo CHtml::link('START DRAW','',array('id'=>'drawBtn','class'=>'btn btn-danger btn-large','style'=>'display:none;font-size:60px;height:20%;padding: 45px 85px;')); ?>
<script>
<?php

$participants = Participants::model()->findAllByAttributes(array('include'=>1));
$names = array();
$pid = array();
$gid = array();

foreach($participants as $p){
if($p->group->include==0) continue;
array_push($names, $p->first_name." ".$p->middle_name." ".$p->last_name);
array_push($pid, $p->id);
array_push($gid, $p->group->id);
}

$raffles = Raffles::model()->findAll();
$event_names = array();
$raffle_names = array();
$prize_names = array();
foreach($raffles as $r){
array_push($prize_names,$r->prize);
array_push($event_names, $r->event->name);
array_push($raffle_names,$r->name);
}

$names_array = json_encode($names);
$pid_array = json_encode($pid);
$gid_array = json_encode($gid);
$event_array = json_encode($event_names);
$raffle_array = json_encode($raffle_names);
$prize_array = json_encode($prize_names);

echo "var names_array= ".$names_array.";\n";
echo "var pid_array= ".$pid_array.";\n";
echo "var gid_array= ".$gid_array.";\n";
echo "var event_array= ".$event_array.";\n";
echo "var raffle_array= ".$raffle_array.";\n";
echo "var prize_array= ".$prize_array.";\n";
?>

$('#eid').change(function(){
  $('#eid').toggle();
  $('#eve').toggle();
  $('#event').val(this.value);
  var v = this.value - 1;
  document.getElementById("eve").innerHTML = event_array[v];
  if( $('#raffle').val() > 0) $('#drawBtn').toggle();
});

$('#rid').change(function(){
  $('#rid').toggle();
  $('#raf').toggle();
  $('#raffle').val(this.value);
  var v = this.value - 1;
  document.getElementById("raf").innerHTML = raffle_array[v];
  document.getElementById("draw_result").innerHTML = "Prize: " + prize_array[v];
  if( $('#event').val() > 0) $('#drawBtn').toggle();
});

$('#drawBtn').click(function () {
    var i = 0;
    var delay = 300;
    $(this).hide();
    //shuffled participant
    $.each(names_array, function (i, val) {
        var remaining = names_array.length - i;

        if (remaining < 15 && remaining > 5) delay = 100;
        if (remaining < 5) delay = 50;

        $("#draw_result").fadeOut(delay, function () {
            $(this).html(val);
        }).fadeIn(delay);
    });

    //result of rand
    $("#draw_result").animate({
        'font-size': 50
    }, 100, function () {
        var x = Math.floor((Math.random() * (names_array.length)) + 0);
//        document.getElementById("pid").innerHTML = x;
	var z = $('#raffle').val() - 1;
        $(this).html(names_array[x]);
        $(this).append(' Won ').append(prize_array[z]);
    	$('#pid').val(pid_array[x]);
	$('#gid').val(gid_array[x]);
	$('.btn-success').toggle();
    });
});
</script>
<?php /*$participant = Participants::model()->findAllByAttributes(array('include'=>1));
$names=array();
$pID=array();
foreach($participant as $p){
// echo $p->group->include;
array_push($names, $p->first_name." ".$p->middle_name." ".$p->last_name);
array_push($pID, $p->id);
}
print_r($names);
print_r($pID);*/
?>
<br><br>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
			'htmlOptions'=>array('class'=>'btn-success btn-large' ,'style'=>'display:none;font-size:40px;height:50%;padding 45px; 85px;'),
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'',
			'type'=>'',
			'url'=>Yii::app()->createUrl('winners/raffledraw'),'label'=>'Reset',
			'htmlOptions'=>array('class'=>'btn-warning btn-large' ,'style'=>'font-size:40px;height:50%;padding 45px 85px;'),
	)); ?>
</div>

<?php $this->endWidget(); ?>
</center>
