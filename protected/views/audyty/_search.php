<?php
/* @var $this AudytyController */
/* @var $model Audyty */
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
		<?php echo $form->label($model,'osrodek_id'); ?>
		<?php echo $form->textField($model,'osrodek_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'identyfikator_zestawu'); ?>
		<?php echo $form->textField($model,'identyfikator_zestawu',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_ankiety'); ?>
		<?php echo $form->textField($model,'status_ankiety'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_etykiety'); ?>
		<?php echo $form->textField($model,'status_etykiety'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_odwolania'); ?>
		<?php echo $form->textField($model,'status_odwolania'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zaliczenie'); ?>
		<?php echo $form->textField($model,'zaliczenie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Zespoly_audytorowID'); ?>
		<?php echo $form->textField($model,'Zespoly_audytorowID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metodaID'); ?>
		<?php echo $form->textField($model,'metodaID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->