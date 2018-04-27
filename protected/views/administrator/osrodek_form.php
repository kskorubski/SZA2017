<?php
/* @var $this OsrodkiController */
/* @var $model Osrodki */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'osrodki-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nazwa'); ?>
		<?php echo $form->textField($model,'nazwa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nazwa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adres'); ?>
		<?php echo $form->textField($model,'adres',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'adres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kod'); ?>
		<?php echo $form->textField($model,'kod',array('size'=>7,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'kod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'miasto'); ?>
		<?php echo $form->textField($model,'miasto',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'miasto'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'WojewodztwaID'); ?>
		<?php echo $form->dropDownList($model,'WojewodztwaID',
                CHtml::listData(Wojewodztwa::model()->findAll(array('order' => 't.id_wojewodztwa DESC')),
                'id_wojewodztwa','nazwa_wojewodztwa'),array('style'=>'width: 150px')); ?>
		<?php echo $form->error($model,'WojewodztwaID'); ?>
	</div>
        
    	<p class="note">Pola z <span class="required">*</span> są wymagane.</p>
        
	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
            <?php echo CHtml::button('Anuluj', array( 'submit' => Yii::app()->createUrl("/administrator/osrodek_lista"))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->