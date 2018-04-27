<?php
/* @var $this UzytkownicyController */
/* @var $model Uzytkownicy */
/* @var $form CActiveForm */
?>




<?php 
//$id = $_GET['id'];
//$current_user = Uzytkownicy::model()->findByPk($id);
//?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'uzytkownicy-edycja-form',
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
		<?php echo $form->textField($model,'nazwisko',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'nazwisko'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>50)); ?>
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
                        
	<div class="row">
		<?php echo $form->labelEx($model,'status_kontaID'); ?>
		<?php echo $form->dropDownList($model,'status_kontaID', 
                    CHtml::listData(StatusKonta::model()->findAll(),'id','nazwa_statusu'), 
                        array('style'=>'width: 150px')); ?>
		<?php echo $form->error($model,'status_kontaID'); ?>
	</div>                        

	<div class="row buttons">
            <?php echo CHtml::submitButton('Zapisz'); ?>
            <?php echo CHtml::button('Anuluj', array( 'submit' => Yii::app()->createUrl("/administrator/uzytkownicy_lista"))); ?>
        </div>

<?php $this->endWidget(); ?>
    
    
    
    
    


</div><!-- form -->