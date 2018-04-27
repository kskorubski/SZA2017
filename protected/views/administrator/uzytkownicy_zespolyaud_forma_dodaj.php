<?php
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zespoly-audytorow-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nazwa_zespolu'); ?>
		<?php echo $form->textField($model,'nazwa_zespolu',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nazwa_zespolu'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj zespół' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->