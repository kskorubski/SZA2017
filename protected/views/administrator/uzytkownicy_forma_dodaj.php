<?php
/* @var $this UzytkownicyController */
/* @var $model Uzytkownicy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uzytkownicy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'imie'); ?>
		<?php echo $form->textField($model,'imie',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'imie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nazwisko'); ?>
		<?php echo $form->textField($model,'nazwisko',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nazwisko'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->passwordField($model,'password2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefon'); ?>
		<?php echo $form->textField($model,'telefon',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'telefon'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'RoleID'); ?>
		<?php echo $form->dropDownList($model,'RoleID',
                    CHtml::listData(Role::model()->findAll(),'id','nazwa_roli'), 
                        array('style'=>'width: 150px')); ?>
		<?php echo $form->error($model,'RoleID'); ?>
	</div>
   
        <div class="row">
		<?php echo $form->labelEx($model,'WojewodztwaID'); ?>
		<?php echo $form->dropDownList($model,'WojewodztwaID',
                    CHtml::listData(Wojewodztwa::model()->findAll(),'id_wojewodztwa','nazwa_wojewodztwa'), 
                        array('style'=>'width: 150px')); ?>
		<?php echo $form->error($model,'WojewodztwaID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->