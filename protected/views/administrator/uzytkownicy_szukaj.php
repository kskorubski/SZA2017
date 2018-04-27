<?php
/* @var $this UzytkownicyController */
/* @var $model Uzytkownicy */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'imie'); ?>
		<?php echo $form->textField($model,'imie',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nazwisko'); ?>
		<?php echo $form->textField($model,'nazwisko',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefon'); ?>
		<?php echo $form->textField($model,'telefon',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RoleID'); ?>
		<?php echo $form->textField($model,'RoleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_logowania'); ?>
		<?php echo $form->textField($model,'data_logowania'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_kontaID'); ?>
		<?php echo $form->textField($model,'status_kontaID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WojewodztwaID'); ?>
		<?php echo $form->textField($model,'WojewodztwaID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->