<?php //
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array('Login',);
?>

<h1>Logowanie</h1>



<div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'logowanie-view',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->
    
    <div class="form">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
                <p class="hint">
                    Pola z <span class="required">*</span> są wymagane.
                </p>
	</div>


        <div>
		<?php echo CHtml::submitButton('Zaloguj', array('class' => 'przycisk')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

