<?php
/* @var $this EtykietaAnalogowaController */
/* @var $model EtykietaAnalogowa */
/* @var $form CActiveForm */
?>
<p align="right"><b><?php echo date('Y-m-d'); ?></b></p>
<h3>Arkusz oceny klinicznej mammogramu (ETYKIETA) - Metoda Analogowa</h3>
<h5>Identyfikator zestawu: <?php echo Audyty::model()->findByPk(Yii::app()->session['etykieta-analogowa-id-audytu'])->identyfikator_zestawu; ?></h5>
<div class="form">

<?php 
//        Yii::app()->session['etykieta-analogowa-id-audytu'] = $_GET['id'];
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'etykieta-analogowa-form',
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
.tg .tg-0uf8{font-weight:bold;font-size:12px;background-color:#ffffff}
.tg .tg-y5bo{font-size:15px;background-color:#ffffff;text-align:center}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff}
.tg .tg-yzpx{background-color:#26ade4}
.tg .tg-5y5n{background-color:#ecf4ff}
.tg .tg-3dpa{font-weight:bold;background-color:#ecf4ff;text-align:center}
.tg .tg-u227{font-weight:bold;background-color:#bbdaff;text-align:center}
.tg .tg-w5vg{font-weight:bold;background-color:#f7fdfa;text-align:center}
.tg .tg-kcd4{font-size:13px;background-color:#ffffff;color:#444444;text-align:center}
.tg .tg-7khl{font-size:13px}
.tg .tg-v79x{font-weight:bold;font-size:15px;background-color:#ffffff;color:#444444}
.tg .tg-la71{font-weight:bold;font-size:12px;background-color:#ffffff;text-align:center}
.tg .tg-m6o4{font-size:13px;background-color:#f7fdfa}
.tg .tg-36xf{font-size:13px;font-weight:bold;background-color:#bbdaff}
.tg .tg-in7r{font-weight:bold;font-size:15px;background-color:#26ade4;text-align:center}
.tg .tg-c7d0{background-color:#bbdaff}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center}
.tg .tg-ltqa{background-color:#bbdaff;text-align:center}
</style>
<table class="tg">
  <tr>
    <th class="tg-v79x" colspan="2">4. Etykieta mammogramu</th>
    <!--<th class="tg-kcd4"></th>-->
  </tr>
  <tr>
    <td class="tg-0uf8" rowspan="2">Punktacja: 0 - 1pkt* 0 - 2pkt** 0 - 3pkt***</td>
    <!--<td class="tg-y5bo"></td>-->
  </tr>
  <tr>
    <td class="tg-la71">Punkty</td>
  </tr>
  <tr>
    <td class="tg-m6o4">Trwała etykieta identyfikacyjna ***</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_1'); ?>
		<?php // echo $form->textField($model,'x4_1', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_1); ?>
		<?php echo $form->error($model,'x4_1'); ?>
	</div>
    </td>
  </tr>
  <tr>      
    <td class="tg-m6o4">Przeźroczysta etykieta identyfikacyjna ***</td>
    <td class="tg-w5vg">
        <div class="row" id="lista1">
		<?php // echo $form->labelEx($model,'x4_2'); ?>
		<?php // echo $form->textField($model,'x4_2', array('size'=>2,'maxlength'=>1)); ?>	
                <?php echo CHtml::encode($model->x4_2); ?>
		<?php echo $form->error($model,'x4_2'); ?>
	</div> 
    </td>
  </tr>
  <tr> 
    <td class="tg-m6o4">Nieprzeźroczysta etykieta identyfikacyjna *</td> 
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_3'); ?>
		<?php // echo $form->textField($model,'x4_3', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_3); ?>                                                                 
		<?php echo $form->error($model,'x4_3'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-m6o4">Etykieta pasuje do wyznaczonego miejsca; dane nie są ucięte **</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_4'); ?>
		<?php // echo $form->textField($model,'x4_4', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_4); ?> 
		<?php echo $form->error($model,'x4_4'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <?php $wynik_x_1 = $model->x4_1+$model->x4_2+$model->x4_3+$model->x4_4; ?>  
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-3dpa"><?php echo $wynik_x_1; ?></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-u227"><b>8</b></td>
  </tr>
  <tr>
    <td class="tg-in7r" colspan="2">Dane na etykiecie</td>
    <!--<td class="tg-031e"></td>-->
  </tr>
  <tr>
    <td class="tg-7khl">Imię i nazwisko *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_5'); ?>
		<?php // echo $form->textField($model,'x4_5', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_5); ?>
		<?php echo $form->error($model,'x4_5'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Numer identyfikacyjny (przynależny do danej pacjentki) *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_6'); ?>
		<?php // echo $form->textField($model,'x4_6', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_6); ?>
		<?php echo $form->error($model,'x4_6'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Dodatkowy numer identyfikacyjny (PESEL lub data urodzenia pacjentki) *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_7'); ?>
		<?php // echo $form->textField($model,'x4_7', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_7); ?>
		<?php echo $form->error($model,'x4_7'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Nazwa placówki *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_8'); ?>
		<?php // echo $form->textField($model,'x4_8', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_8); ?>
		<?php echo $form->error($model,'x4_8'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Data badania *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_9'); ?>
		<?php // echo $form->textField($model,'x4_9', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_9); ?>
		<?php echo $form->error($model,'x4_9'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Oznaczenie strony (L / P) *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_10'); ?>
		<?php // echo $form->textField($model,'x4_10', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_10); ?>
		<?php echo $form->error($model,'x4_10'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Rodzaj projekcji *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_11'); ?>
		<?php // echo $form->textField($model,'x4_11', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_11); ?>
		<?php echo $form->error($model,'x4_11'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Identyfikator technika *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_12'); ?>
		<?php // echo $form->textField($model,'x4_12', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_12); ?>
		<?php echo $form->error($model,'x4_12'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Oznaczenie kasety *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_13'); ?>
		<?php // echo $form->textField($model,'x4_13', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_13); ?>
		<?php echo $form->error($model,'x4_13'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Dodatkowe oznaczenie strony *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_14'); ?>
		<?php // echo $form->textField($model,'x4_14', array('ize'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_14); ?>
		<?php echo $form->error($model,'x4_14'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <?php $wynik_x_2 = $model->x4_5+$model->x4_6+$model->x4_7+$model->x4_8+$model->x4_9+$model->x4_10+$model->x4_11+$model->x4_12+$model->x4_13+$model->x4_14; ?>
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-3dpa"><?php echo $wynik_x_2; ?></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-u227"><b>10</b></td>
  </tr>
  <tr>
    <td class="tg-in7r" colspan="2">Parametry ekspozycji</td>
  </tr>
  <tr>
    <td class="tg-7khl">Wysokie napięcie (kV) *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_15'); ?>
		<?php // echo $form->textField($model,'x4_15', array('size'=>2,'maxlength'=>1)); ?> 
                <?php echo CHtml::encode($model->x4_15); ?>
		<?php echo $form->error($model,'x4_15'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Obciążenie prądowe - czasowe (mAs) *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_16'); ?>
		<?php // echo $form->textField($model,'x4_16', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_16); ?>
		<?php echo $form->error($model,'x4_16'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Rodzaj anodyfiltru *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_17'); ?>
		<?php // echo $form->textField($model,'x4_17', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_17); ?>
		<?php echo $form->error($model,'x4_17'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Siła kompresji *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_18'); ?>
		<?php // echo $form->textField($model,'x4_18', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_18); ?>
		<?php echo $form->error($model,'x4_18'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Grubość piersi po kompresji *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_19'); ?>
		<?php // echo $form->textField($model,'x4_19', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_19); ?>
		<?php echo $form->error($model,'x4_19'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Kąt lampy dla projekcji skośnej *</td>
    <td class="tg-w5vg">
        <div class="row">
		<?php // echo $form->labelEx($model,'x4_20'); ?>
		<?php // echo $form->textField($model,'x4_20', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x4_20); ?>
		<?php echo $form->error($model,'x4_20'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <?php $wynik_x_3 = $model->x4_15+$model->x4_16+$model->x4_17+$model->x4_18+$model->x4_19+$model->x4_20; ?>
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-3dpa"><?php echo $wynik_x_3; ?></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-u227"><b>6</b></td>
  </tr>
  <tr>
    <td class="tg-yzpx" colspan="2"></td>
  </tr>
  <tr>
    <?php $wynik_x_SUMA = $wynik_x_1+$wynik_x_2+$wynik_x_3; ?> 
    <td class="tg-eyl8">Uzyskana łączna liczba punktów RAZEM</td>
    <td class="tg-3dpa"><?php echo $wynik_x_SUMA; ?></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna łączna liczba punktów RAZEM</td>
    <td class="tg-u227"><b>24</b></td>
  </tr>
</table>	
                <?php   echo $form->hiddenField($model,'AudytyID', array('value'=>Yii::app()->session['etykieta-analogowa-id-audytu'])); ?>                
<?php $this->endWidget(); ?>
</div><!-- form -->