<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $model IdentyfikatoryWojewodztw */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'identyfikatory-wojewodztw-form',
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
		<?php echo $form->labelEx($model,'identyfikator_wojewodztwa'); ?>
		<?php echo $form->textField($model,'identyfikator_wojewodztwa'); ?>
		<?php echo $form->error($model,'identyfikator_wojewodztwa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WojewodztwaID'); ?>
		<?php echo $form->textField($model,'WojewodztwaID'); ?>
		<?php echo $form->error($model,'WojewodztwaID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->