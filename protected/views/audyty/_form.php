<?php
/* @var $this AudytyController */
/* @var $model Audyty */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'audyty-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rok_audytu'); ?>
		<?php echo $form->textField($model,'rok_audytu'); ?>
		<?php echo $form->error($model,'rok_audytu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'osrodek_id'); ?>
		<?php echo $form->textField($model,'osrodek_id'); ?>
		<?php echo $form->error($model,'osrodek_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'identyfikator_zestawu'); ?>
		<?php echo $form->textField($model,'identyfikator_zestawu',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'identyfikator_zestawu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_ankiety'); ?>
		<?php echo $form->textField($model,'status_ankiety'); ?>
		<?php echo $form->error($model,'status_ankiety'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_etykiety'); ?>
		<?php echo $form->textField($model,'status_etykiety'); ?>
		<?php echo $form->error($model,'status_etykiety'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_odwolania'); ?>
		<?php echo $form->textField($model,'status_odwolania'); ?>
		<?php echo $form->error($model,'status_odwolania'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zaliczenie'); ?>
		<?php echo $form->textField($model,'zaliczenie'); ?>
		<?php echo $form->error($model,'zaliczenie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Zespoly_audytorowID'); ?>
		<?php echo $form->textField($model,'Zespoly_audytorowID'); ?>
		<?php echo $form->error($model,'Zespoly_audytorowID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metodaID'); ?>
		<?php echo $form->textField($model,'metodaID'); ?>
		<?php echo $form->error($model,'metodaID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->