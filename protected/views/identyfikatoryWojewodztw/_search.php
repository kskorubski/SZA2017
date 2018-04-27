<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $model IdentyfikatoryWojewodztw */
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
		<?php echo $form->label($model,'rok_audytu'); ?>
		<?php echo $form->textField($model,'rok_audytu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'identyfikator_wojewodztwa'); ?>
		<?php echo $form->textField($model,'identyfikator_wojewodztwa'); ?>
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