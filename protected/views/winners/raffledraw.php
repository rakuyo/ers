<center><h1 style="font-size:40px;height:45px"><b><?php echo "RAFFLE DRAW"; ?></b></h1></center>

<center>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'winners-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

<style>

.div_toggle {
  height: 50px;
  font-size: 32px;
  text-align: center;
}

#eve, #raf, #hidden, .required {
  display: none;
}

</style>

<?php $raffle = CHtml::listData(Raffles::model()->findAll(),'id','name');?>
<?php $event = CHtml::listData(Events::model()->findAll(),'id','name');?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<div class="row ee"><?php echo $form->dropDownListRow($model,'event_id',$event,array('id'=>'eid','class'=>'span div_toggle','empty'=>'Choose An Event')); ?></div>
<div id=eve class="clearfix"><h1>event</h1></div>
<div id=hidden><?php echo $form->textFieldRow($model,'event_id',array('id'=>'event','class'=>'span div_toggle')); ?></div>
<div></div><br><div></div>
<div class="row rr"><?php echo $form->dropDownListRow($model,'raffle_id',$raffle,array('id'=>'rid','class'=>'span div_toggle','empty'=>'Choose A Raffle')); ?></div>
<div id=raf class="clearfix"><h1>raffle</h1></div>
<div id=hidden><?php echo $form->textFieldRow($model,'raffle_id',array('id'=>'raffle','class'=>'span div_toggle')); ?></div>


<br>
<div id=draw_result class="clearfix" style="line-height:1em height:55px; font-size:70px;">Prize : </h1></div>
<div id=hidden><?php echo $form->textFieldRow($model,'participant_id',array('id'=>'pid','class'=>'span div_toggle')); ?></div>
<div id=hidden><?php echo $form->textFieldRow($model,'group_id',array('id'=>'gid','class'=>'span div_toggle')); ?></div>
<br>
<?php echo CHtml::link('START DRAW','',array('id'=>'drawBtn','class'=>'btn btn-danger btn-large','style'=>'display:none; font-size:60px; height:20%; padding: 45px 85px;')); ?>
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

var div_style = {"font-size":"50px","display":"inline"};
var div_prize = {"font-size":"70px","display":"inline"};
var before_draw = {"color": "black"};
var after_draw = {"color": "red", 'font-weight' : 'bold'};

$('#eid').change(function(){
  $(this).toggle();
  $('#eve').toggle().css(div_style);
  $('#event').val(this.value);
  var v = this.value - 1;
//  document.getElementById("eve").innerHTML = event_array[v];
  $('#eve').text(event_array[v] + " Event");
  if( $('#raffle').val() > 0) $('#drawBtn').toggle();
});

$('#rid').change(function(){
  $(this).toggle();
  $('#raf').toggle().css(div_style);
  $('#raffle').val(this.value);
  var v = this.value - 1;
//  document.getElementById("raf").innerHTML = raffle_array[v];
  $('#raf').text(raffle_array[v] + " Raffle Draw");
//  document.getElementById("draw_result").innerHTML = "Prize: " + prize_array[v];
  $('#draw_result').text("Prize: " + prize_array[v]).css(div_prize);
  if( $('#event').val() > 0) $('#drawBtn').toggle();
});

$('#drawBtn').click(function () {
    var i = 0;
    var delay = 300;
    $(this).text("Draw Again").toggle();
    $('.btn-success').hide();
    $('#draw_result').css(before_draw);
    //shuffled participant
    $.each(names_array, function (i, val) {
        var remaining = names_array.length - i;

        if (remaining < 15 && remaining > 5) delay = 100;
        if (remaining < 5) delay = 50;

        $("#draw_result").fadeOut(delay, function () {
	    if (remaining == 1){ $('#drawBtn').toggle(); $('.btn-success').toggle(); $(this).css(after_draw)} 
            $(this).html(val);
        }).fadeIn(delay);

    });


    //result of rand
    $("#draw_result").animate({
        'font-size': 100, 'line-height': '1em'
    }, 1, function () {
        var x = Math.floor((Math.random() * (names_array.length)) + 0);
//        document.getElementById("pid").innerHTML = x;
	var z = $('#raffle').val() - 1;
        $(this).html(names_array[x]);
        $(this).append(' Won ').append(prize_array[z]);
    	$('#pid').val(pid_array[x]);
	$('#gid').val(gid_array[x]);
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
