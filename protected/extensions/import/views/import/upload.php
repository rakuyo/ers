<?php
/* @var $this DealsController */


$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'csv-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'action'=>array('/import/import/upload'),
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
                    ),
    )
);

?>


<h1>Import <?php echo get_class($m);?></h1>

<p><a class="u" target="_blank" href="template?model=<?php echo get_class($m);?>">View Template</a></p>
<?php

echo $form->label($model, 'csv_file',array('style'=>'width:145px'));
echo $form->fileField($model, 'csv_file');

echo "<br><br>".$form->error($model, 'csv_file',array('style'=>'margin-left:0px'));

echo $form->hiddenField($model, 'model', array('value'=>get_class($m)));
echo $form->hiddenField($model, 'returnUrl', array('value'=>$m->import->returnUrl));
?>
<br><br><br>
    <div>
        <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-info','style'=>'margin-left:0px;')); ?>
    </div>
    <div>
	<a class="btn btn-warning" style="margin-left:1em" href="<?php echo $this->createUrl($m->import->returnUrl);?>">Cancel</a>
    </div>

    <?php
$this->endWidget();
