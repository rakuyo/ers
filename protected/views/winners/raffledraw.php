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

#random_value, #event_div, #raffle_div, #hidden, .required {
  display: none;
}

</style>

<?php $event = CHtml::listData(Events::model()->findAll(array('order' => 'id')),'id','name');?>
<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<div class="row ee"><?php echo $form->dropDownListRow($model,'event_id',$event,array('id'=>'event_id','class'=>'span div_toggle','empty'=>' --Choose An Event-- ','ajax'=>array('type'=>'POST','url'=>CController::createUrl('findRaffle'),'data'=>array('event_id'=>'js:this.value'),'update'=>'#raffle_id'))); ?></div>
<div id=event_div class="clearfix"><h1>event</h1></div>
<div id=hidden><?php echo $form->textFieldRow($model,'event_id',array('id'=>'event_text','class'=>'span div_toggle')); ?></div>

<div></div><br><div></div>

<!--<div class="row rr"><?php //echo $form->dropDownListRow($model,'raffle_id',$raffle,array('id'=>'rid','class'=>'span div_toggle','empty'=>'Choose A Raffle','disabled'=>'true')); ?></div>-->
<div class="row rr"><?php echo CHtml::dropDownList('raffle_id','',array(),array('class'=>'span div_toggle','prompt'=>' --Choose A Raffle-- ')); ?></div>
<div id=raffle_div class="clearfix"><h1>raffle</h1></div>
<div id=hidden><?php echo $form->textFieldRow($model,'raffle_id',array('id'=>'raffle_text','class'=>'span div_toggle')); ?></div>


<br>
<div id=draw_result class="clearfix" style="line-height:1em height:55px; font-size:70px;">Prize : </h1></div>
<div id=hidden><?php echo $form->textFieldRow($model,'participant_id',array('id'=>'pid','class'=>'span div_toggle')); ?></div>
<div id=hidden><?php echo $form->textFieldRow($model,'group_id',array('id'=>'gid','class'=>'span div_toggle')); ?></div>
<br>
<?php echo CHtml::link('START DRAW','',array('id'=>'drawBtn','class'=>'btn btn-danger btn-large','style'=>'display:none; font-size:60px; height:20%; padding: 45px 85px; border-radius:50px;')); ?>
<input id=random_value value='Random.Org'>
<script>
<?php

$participants = Participants::model()->findAllByAttributes(array('include'=>1));
$participants_name = array();
$names = array();

foreach($participants as $p){
if($p->group->include==0) continue;
array_push($names, $p->first_name." ".$p->middle_name." ".$p->last_name);
$participants_name['id'][] = $p->id;
$participants_name['name'][] = $p->first_name." ".$p->middle_name." ".$p->last_name;
$participants_name['group'][] = $p->group->id;
}

$raffles = Raffles::model()->findAll();
$raffles_winner = array();

foreach($raffles as $r){
$raffles_winner['rid'][] = $r->id;
$raffles_winner['eid'][] = $r->event_id;
$raffles_winner['event'][] = $r->event->name;
$raffles_winner['raffle'][] = $r->name;
$raffles_winner['prize'][] = $r->prize;
}
shuffle($names);
$participants_name_array = json_encode($participants_name);
$raffles_winner_array = json_encode($raffles_winner);
$names_array = json_encode($names);

echo "var participants_name_array= ".$participants_name_array.";\n";
echo "var raffles_winner_array= ".$raffles_winner_array.";\n";
echo "var names_array= ".$names_array.";\n";
?>

var div_style = {"font-size":"50px","display":"inline"};
var div_prize = {"font-size":"70px","display":"inline"};
var before_draw = {"color":"black"};
var after_draw = {"color":"red",'font-weight':'bold'};

$( document ).ready(function() {
  var rem = participants_name_array['name'].length - 1;
  var url = 'http://www.random.org/integers/?num=1&min=0&max=' + rem + '&col=1&base=10&format=plain&rnd=new';

  $.get(url, function(data) {
                $('#random_value').val(data);
                })
                .fail(function() {
                        var x = Math.floor((Math.random() * (participants_name_array['name'].length)) + 0);
			$('#random_value').val(x);
                });
});

$('#event_id').change(function(){
  $(this).toggle();
  $('#event_div').toggle().css(div_style);
  $('#event_text').val(this.value);
  var e_index = raffles_winner_array['eid'].indexOf(this.value);
  $('#event_div').text(raffles_winner_array['event'][e_index] + " Event");
});

$('#raffle_id').change(function(){
  $(this).toggle();
  $('#raffle_div').toggle().css(div_style);
  $('#raffle_text').val(this.value);
  var r_index = raffles_winner_array['rid'].indexOf(this.value);
  $('#raffle_div').text(raffles_winner_array['raffle'][r_index] + " Raffle Draw");
  $('#draw_result').text("Prize: " + raffles_winner_array['prize'][r_index]).css(div_prize);
  $('#drawBtn').toggle();
});

$('#drawBtn').click(function () {
    var i = 0;
    var delay = 300;
    $(this).text("Draw Again").toggle();
    $('.btn-success').hide();
    $('#draw_result').css(before_draw);
    //shuffled participant
    $.each(names_array, function (i, val) {
        var remaining = participants_name_array['name'].length - i;

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
	var rem = participants_name_array['name'].length - 1;     
	var url = 'http://www.random.org/integers/?num=1&min=0&max=' + rem + '&col=1&base=10&format=plain&rnd=new';

	$.get(url, function(data) {
		$('#random_value').val(data);		
		})
		.fail(function() {
			var x = Math.floor((Math.random() * (participants_name_array['name'].length)) + 0);
                	$('#random_value').val(x);	
	});
	var y = $('#random_value').val();	
	var z = raffles_winner_array['rid'].indexOf($('#raffle_text').val());
        $(this).html(participants_name_array['name'][y]);
        $(this).append(' Won ').append(raffles_winner_array['prize'][z]);
    	$('#pid').val(participants_name_array['id'][y]);
	$('#gid').val(participants_name_array['group'][y]);
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
