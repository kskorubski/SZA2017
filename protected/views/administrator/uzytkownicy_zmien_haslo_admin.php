
<h1>Zmiana hasła użytkownika: 
    <?php echo Uzytkownicy::model()->findByPk($_GET['id'])->nazwisko." "
              .Uzytkownicy::model()->findByPk($_GET['id'])->imie; ?></h1>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ZmienHasloAdmin',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model);
        ?>

        <div class="row">
		<?php echo $form->labelEx($model,'uzytkownik_nowehaslo'); ?>
		<?php echo $form->passwordField($model,'uzytkownik_nowehaslo'); ?>
		<?php echo $form->error($model,'uzytkownik_nowehaslo'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'uzytkownik_nowehaslo2'); ?>
		<?php echo $form->passwordField($model,'uzytkownik_nowehaslo2'); ?>
		<?php echo $form->error($model,'uzytkownik_nowehaslo2'); ?>
	</div>
        
      <div class="row buttons">
	<?php echo CHtml::submitButton('Zapisz'); ?>
        <?php echo CHtml::button('Anuluj', array('submit' => Yii::app()->createUrl("/administrator/uzytkownicy_podglad", array("id"=> $_GET['id']))  )); ?>
      </div>
    
    <?php $this->endWidget(); ?>
</div>
