<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $model IdentyfikatoryWojewodztw */
/* @var $form CActiveForm */
?>
<h2>Edycja nadanego numeru województwa.</h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'identyfikatory-wojewodztw-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'identyfikator_wojewodztwa'); ?>
		<?php echo $form->textField($model,'identyfikator_wojewodztwa'); ?>
		<?php echo $form->error($model,'identyfikator_wojewodztwa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->