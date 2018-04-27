<?php
/* @var $this EtykietaCyfrowaController */
/* @var $model EtykietaCyfrowa */
/* @var $form CActiveForm */
?>
<p align="right"><b><?php echo date('Y-m-d'); ?></b></p><br />
<h3>Arkusz oceny klinicznej mammogramu (ETYKIETA) - Metoda Cyfrowa</h3>
<h5>Identyfikator zestawu: <?php echo Audyty::model()->findByPk(Yii::app()->session['etykieta-cyfrowa-id-audytu'])->identyfikator_zestawu; ?></h5>
<div class="form">

<?php 
       
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'etykieta-cyfrowa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
        
        <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:13px;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:13px;font-weight:normal;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff}
.tg .tg-yzpx{background-color:#26ade4}
.tg .tg-5y5n{background-color:#ecf4ff}
.tg .tg-kcd4{font-size:13px;background-color:#ffffff;color:#444444;text-align:center}
.tg .tg-7khl{font-size:13px}
.tg .tg-v79x{font-weight:bold;font-size:15px;background-color:#ffffff;color:#444444}
.tg .tg-3sk9{font-weight:bold;font-size:12px;background-color:#ffffff}
.tg .tg-la71{font-weight:bold;font-size:13px;background-color:#ffffff;text-align:center}
.tg .tg-in7r{font-weight:bold;font-size:13px;background-color:#26ade4;text-align:center}
.tg .tg-36xf{font-weight:bold;background-color:#bbdaff}
.tg .tg-c7d0{background-color:#bbdaff}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center}
.tg .tg-ltqa{background-color:#bbdaff;text-align:center}
.tg .tg-w5vg{font-weight:bold;background-color:#f7fdfa;text-align:center}
</style>
<table class="tg">
  <tr>
      <th class="tg-v79x" colspan="2">4. Etykieta mammogramu</th>
    <!--<th class="tg-kcd4"></th>-->
  </tr>
  <tr>
    <td class="tg-3sk9">Punktacja: 0 - 1 pkt.</td>
    <td class="tg-la71">Punkty</td>
  </tr>
  <tr>
    <td class="tg-in7r" colspan="2">Dane na etykiecie</td>
  </tr>
  <tr>
    <td class="tg-7khl">Imię i nazwisko *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_1'); ?>
		<?php // echo $form->textField($model,'x4_1', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_1); ?>
		<?php echo $form->error($model,'x4_1'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Numer identyfikacyjny (przynależny do danej pacjentki) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_2'); ?>
		<?php // echo $form->textField($model,'x4_2', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_2); ?>
		<?php echo $form->error($model,'x4_2'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Dodatkowy numer identyfikacyjny (PESEL lub data urodzenia pacjentki) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_3'); ?>
		<?php // echo $form->textField($model,'x4_3', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_3); ?>
		<?php echo $form->error($model,'x4_3'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Nazwa placówki *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_4'); ?>
		<?php // echo $form->textField($model,'x4_4', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_4); ?>
		<?php echo $form->error($model,'x4_4'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Data badania *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_5'); ?>
		<?php // echo $form->textField($model,'x4_5', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_5); ?>
		<?php echo $form->error($model,'x4_5'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Oznaczenie strony (L / P) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_6'); ?>
		<?php // echo $form->textField($model,'x4_6', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_6); ?>
		<?php echo $form->error($model,'x4_6'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Rodzaj projekcji *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_7'); ?>
		<?php // echo $form->textField($model,'x4_7', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_7); ?>
		<?php echo $form->error($model,'x4_7'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Identyfikator technika *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_8'); ?>
		<?php // echo $form->textField($model,'x4_8', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_8); ?>
		<?php echo $form->error($model,'x4_8'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Dodatkowe oznaczenie strony *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_9'); ?>
		<?php // echo $form->textField($model,'x4_9', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_9); ?>
		<?php echo $form->error($model,'x4_9'); ?>
    </td>
  </tr>
  <tr> 
    <?php $wynik_x_1 = $model->x4_1+$model->x4_2+$model->x4_3+$model->x4_4+$model->x4_5+$model->x4_6+$model->x4_7+$model->x4_8+$model->x4_9; ?>  
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37"><b><?php echo $wynik_x_1; ?> </b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa"><b>9</b></td>
  </tr>
  <tr>
    <td class="tg-in7r" colspan="2">Parametry ekspozycji</td>
  </tr>
  <tr>
    <td class="tg-7khl">Wysokie napięcie (kV) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_10'); ?>
		<?php // echo $form->textField($model,'x4_10', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_10); ?>
		<?php echo $form->error($model,'x4_10'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Obciążenie prądowe - czasowe (mAs) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_11'); ?>
		<?php // echo $form->textField($model,'x4_11', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_11); ?>
		<?php echo $form->error($model,'x4_11'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Rodzaj anodyfiltru *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_12'); ?>
		<?php // echo $form->textField($model,'x4_12', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_12); ?>
		<?php echo $form->error($model,'x4_12'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Siła kompresji *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_13'); ?>
		<?php // echo $form->textField($model,'x4_13', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_13); ?>
		<?php echo $form->error($model,'x4_13'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Grubość piersi po kompresji *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_14'); ?>
		<?php // echo $form->textField($model,'x4_14', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_14); ?>
		<?php echo $form->error($model,'x4_14'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Kąt lampy dla projekcji skośnej *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_15'); ?>
		<?php // echo $form->textField($model,'x4_15', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_15); ?>
		<?php echo $form->error($model,'x4_15'); ?>
    </td>
  </tr>
  <tr> 
    <?php $wynik_x_2 = $model->x4_10+$model->x4_11+$model->x4_12+$model->x4_13+$model->x4_14+$model->x4_15; ?>  
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37"><b><?php echo $wynik_x_2; ?></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa"><b>6</b></td>
  </tr>
  <tr>
    <td class="tg-yzpx" colspan="2"></td>
  </tr>
  <tr>
    <?php $wynik_x_SUMA = $wynik_x_1+$wynik_x_2; ?>  
    <td class="tg-eyl8">Uzyskana łączna liczba punktów</td>
    <td class="tg-ci37"><b><?php echo $wynik_x_SUMA; ?></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna łączna liczba punktów</td>
    <td class="tg-ltqa"><b>15</b></td>
  </tr>
</table>
                <?php echo $form->hiddenField($model,'AudytyID', array('value'=>Yii::app()->session['etykieta-cyfrowa-id-audytu'])); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->