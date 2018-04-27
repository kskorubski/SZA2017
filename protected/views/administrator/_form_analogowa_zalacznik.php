<?php
/* @var $this AnkietaAnalogowaController */
/* @var $model AnkietaAnalogowa */
/* @var $form CActiveForm */
//include 'SlownikPodpowiedziAnalogowa.php';
?>
<!--<h5>Identyfikator zestawu: <?php // echo Audyty::model()->findByPk(Yii::app()->session['ankieta-id-audytu'])->identyfikator_zestawu; ?></h5>-->
<!--<p align="right"><b><?php // echo date('Y-m-d'); ?></b></p><br />-->
<?php 
    $status_odwolania = Audyty::model()->findByPk(Yii::app()->session['ankieta-id-audytu'])->status_odwolania; 
    if($status_odwolania == 2){      
        echo "<h3>Załącznik do podsumowania wyników - Metoda Analogowa - <b>ODWOŁANIE</b></h3>";
    }else {   
       echo "<h3>Załącznik do podsumowania wyników - Metoda Analogowa</h3>";
    }
?>
<!--<h3>Załącznik do podsumowania wyników - Metoda Analogowa</h3>-->

<br />
<?php 

$id_ankiety_get = Audyty::model()->findByPk(Yii::app()->session['ankieta-id-audytu'])->osrodek_id;
//$this->widget('zii.widgets.CDetailView', array(
////	'data'=> (new PDF_Osrodek())->model_osrodka_dla_id_audytu(Yii::app()->session['ankieta-id-audytu']),
//	'data'=> (Osrodki::model()->findByPk($id_ankiety_get)),
//	'attributes'=>array(
//              'nazwa' ,
//                'adres',
//                'kod',
//                'miasto',
//            )));
//?>
<br />
<!--<h3>Identyfikator audytu: <?php // echo Yii::app()->session['ankieta-id-audytu'];?></h3>-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ankieta-analogowa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note"><span class="required">Wszystkie pola dotyczące punktancji są wymagane!</span></p>-->

	<?php echo $form->errorSummary($model); ?>
        
        <div id="tab1">
         
   <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:10px;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:10px;font-weight:normal;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff; font-size: 12px;}
.tg .tg-qgy8{font-weight:bold;font-size:15px;color:#444444;text-align:center}
.tg .tg-qgy8-male{font-weight:bold;font-size:13px;color:#444444;text-align:center}
.tg .tg-s6z2{text-align:center; font-size: 10px;}
.tg .tg-031e{text-align:left; font-size: 12px;}
.tg .tg-yzpx{background-color:#26ade4}
.tg .tg-a1rn{background-color:#ffffc7; font-size: 11px;}
.tg .tg-bbbr{background-color:#ffffc7;color:#ffffff}
.tg .tg-e3zv{font-weight:bold}
.tg .tg-by3v{font-weight:bold;font-size:10px;text-align:center}
.tg .tg-v79x{font-weight:bold;font-size: 12px;background-color:#ffffff;color:#444444}
.tg .tg-pi53{font-weight:bold;font-size:8px;text-align:center}
.tg .tg-eqso{font-weight:bold;font-size:12px;background-color:#26ade4;text-align:center}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center; font-size: 12px;}
.tg .tg-36xf{font-weight:bold;background-color:#bbdaffl; font-size: 12px;}
.tg .tg-ltqa{background-color:#bbdaff;text-align:center; font-size: 12px;}
.tg .combo{background-color:#26ade4;font-weight:bold;font-size:11px;color:#444444;text-align:center}
</style>
<table class="tg">
  <tr>
    <th class="tg-v79x" rowspan="3">1. Pozycjonowanie</th>
    <!--<th class="tg-qgy8-male" colspan="2">Piersi z przewagą tkanki gruczołowej</th>-->
    <!--<th class="tg-qgy8-male" colspan="2">Piersi o dużej zawartości tkanki tłuszczowej</th>-->
    <th class="tg-qgy8-male" colspan="2">Pierś gruczołowa</th>
    <th class="tg-qgy8-male" colspan="2">Pierś tłuszczowa</th>
  </tr>
    <tr>
      <td class="combo" colspan="2"><?php echo CHtml::encode($model->x1_1b_podpowiedz); ?></td>
      <td class="combo" colspan="2"><?php echo CHtml::encode($model->x1_1c_podpowiedz); ?></td>
  </tr>
  <tr>
    <td class="tg-by3v">Pierś prawa</td>
    <td class="tg-by3v">Pierś lewa</td>
    <td class="tg-by3v">Pierś prawa</td>
    <td class="tg-by3v">Pierś lewa</td>
  </tr>
  <tr>
    <td class="tg-pi53"></td>
    <td class="tg-pi53">Punkty</td>
    <td class="tg-pi53">Punkty</td>
    <td class="tg-pi53">Punkty</td>
    <td class="tg-pi53">Punkty</td>
  </tr>
  <tr>
    <td class="tg-eqso" colspan="5">Projekcja skośna</td>
  </tr>
  <tr>
    <td class="tg-031e">Cały sutek widoczny na zdjęciu *<br> </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_1a'); ?>
		<?php // echo $form->textField($model,'x1_1a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_1a); ?>
		<?php echo $form->error($model,'x1_1a'); ?>
            
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_1b'); ?>
		<?php // echo $form->textField($model,'x1_1b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_1b); ?>
		<?php echo $form->error($model,'x1_1b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_1c'); ?>
		<?php // echo $form->textField($model,'x1_1c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_1c); ?>
		<?php echo $form->error($model,'x1_1c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_1d'); ?>
		<?php // echo $form->textField($model,'x1_1d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_1d); ?>
		<?php echo $form->error($model,'x1_1d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_1_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_1a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_1a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Mięsień piersiowy widoczny co najmniej do <br>wysokości brodawki sutkowej *</td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_2a'); ?>
		<?php // echo $form->textField($model,'x1_2a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_2a); ?>
		<?php echo $form->error($model,'x1_2a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_2b'); ?>
		<?php // echo $form->textField($model,'x1_2b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_2b); ?>
		<?php echo $form->error($model,'x1_2b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_2c'); ?>
		<?php // echo $form->textField($model,'x1_2c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_2c); ?>
		<?php echo $form->error($model,'x1_2c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_2d'); ?>
		<?php // echo $form->textField($model,'x1_2d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_2d); ?>
		<?php echo $form->error($model,'x1_2d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_2_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_2a_podpowiedz); ?>             
		<?php echo $form->error($model,'x1_2a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Widoczny fałd podsutkowy *<br><br></td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_3a'); ?>
		<?php // echo $form->textField($model,'x1_3a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_3a); ?>
		<?php echo $form->error($model,'x1_3a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_3b'); ?>
		<?php // echo $form->textField($model,'x1_3b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_3b); ?>
		<?php echo $form->error($model,'x1_3b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_3c'); ?>
		<?php // echo $form->textField($model,'x1_3c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_3c); ?>
		<?php echo $form->error($model,'x1_3c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_3d'); ?>
		<?php // echo $form->textField($model,'x1_3d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_3d); ?>
		<?php echo $form->error($model,'x1_3d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_3_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_3a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_3a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Równomierne rozłożenie i uciśnięcie tkanki <br>gruczołowej *</td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_4a'); ?>
		<?php // echo $form->textField($model,'x1_4a', array('size'=>,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_4a); ?>
		<?php echo $form->error($model,'x1_4a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_4b'); ?>
		<?php // echo $form->textField($model,'x1_4b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_4b); ?>
		<?php echo $form->error($model,'x1_4b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_4c'); ?>
		<?php // echo $form->textField($model,'x1_4c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_4c); ?>
		<?php echo $form->error($model,'x1_4c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_4d'); ?>
		<?php // echo $form->textField($model,'x1_4d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_4d); ?>
		<?php echo $form->error($model,'x1_4d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,''); ?>
		<?php echo CHtml::encode($model->x1_4a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_4a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Zachowana symetria ułożenia *<br><br></td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_5a'); ?>
		<?php // echo $form->textField($model,'x1_5a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_5a); ?>
		<?php echo $form->error($model,'x1_5a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_5b'); ?>
		<?php // echo $form->textField($model,'x1_5b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_5b); ?>
		<?php echo $form->error($model,'x1_5b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_5_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_5a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_5a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <?php $wynik1ab = $model->x1_1a+$model->x1_1b+$model->x1_2a+$model->x1_2b+$model->x1_3a+$model->x1_3b+$model->x1_4a+$model->x1_4b+$model->x1_5a; ?>  
    <?php $wynik1cd = $model->x1_1c+$model->x1_1d+$model->x1_2c+$model->x1_2d+$model->x1_3c+$model->x1_3d+$model->x1_4c+$model->x1_4d+$model->x1_5b; ?>  
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik1ab; ?></b></td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik1cd; ?></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
  </tr>
  <tr>
    <td class="tg-eqso" colspan="5">Projekcja kraniokaudalna</td>
  </tr>
  <tr>
    <td class="tg-031e">Cały sutek widoczny na zdjęciu *<br> </td>
    <td class="tg-s6z2">
        	<div class="row">
		<?php // echo $form->labelEx($model,'x1_6a'); ?>
		<?php // echo $form->textField($model,'x1_6a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_6a); ?>
		<?php echo $form->error($model,'x1_6a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_6b'); ?>
		<?php // echo $form->textField($model,'x1_6b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_6b); ?>
		<?php echo $form->error($model,'x1_6b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_6c'); ?>
		<?php // echo $form->textField($model,'x1_6c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_6c); ?>
		<?php echo $form->error($model,'x1_6c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_6d'); ?>
		<?php // echo $form->textField($model,'x1_6d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_6d); ?>
		<?php echo $form->error($model,'x1_6d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
         <div class="row">
		<?php //echo $form->labelEx($model,'x1_6_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_6a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_6a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Położenie brodawki sutkowej centralne<br>lub lekko przyśrodkowe *</td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_7a'); ?>
		<?php // echo $form->textField($model,'x1_7a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_7a); ?>
		<?php echo $form->error($model,'x1_7a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_7b'); ?>
		<?php // echo $form->textField($model,'x1_7b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_7b); ?>
		<?php echo $form->error($model,'x1_7b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_7c'); ?>
		<?php // echo $form->textField($model,'x1_7c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_7c); ?>
		<?php echo $form->error($model,'x1_7c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_7d'); ?>
		<?php // echo $form->textField($model,'x1_7d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_7d); ?>
		<?php echo $form->error($model,'x1_7d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_7_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_7a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_7a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Równomierne rozłożenie i uciśnięcie tkanki <br>gruczołowej *</td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_8a'); ?>
		<?php // echo $form->textField($model,'x1_8a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_8a); ?>
		<?php echo $form->error($model,'x1_8a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_8b'); ?>
		<?php // echo $form->textField($model,'x1_8b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_8b); ?>
		<?php echo $form->error($model,'x1_8b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_8c'); ?>
		<?php // echo $form->textField($model,'x1_8c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_8c); ?>
		<?php echo $form->error($model,'x1_8c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_8d'); ?>
		<?php // echo $form->textField($model,'x1_8d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_8d); ?>
		<?php echo $form->error($model,'x1_8d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_8_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_8a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_8a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Brodawka wyrzutowana w co najmniej jednej <br>projekcji *</td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_9a'); ?>
		<?php // echo $form->textField($model,'x1_9a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_9a); ?>
		<?php echo $form->error($model,'x1_9a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_9b'); ?>
		<?php // echo $form->textField($model,'x1_9b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_9b); ?>
		<?php echo $form->error($model,'x1_9b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_9c'); ?>
		<?php // echo $form->textField($model,'x1_9c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_9c); ?>
		<?php echo $form->error($model,'x1_9c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_9d'); ?>
		<?php // echo $form->textField($model,'x1_9d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_9d); ?>
		<?php echo $form->error($model,'x1_9d'); ?>
	</div>

    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_9_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_9a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_9a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Zachowana symetria ułożenia *<br> </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_10a'); ?>
		<?php // echo $form->textField($model,'x1_10a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_10a); ?>
		<?php echo $form->error($model,'x1_10a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_10b'); ?>
		<?php // echo $form->textField($model,'x1_10b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x1_10b); ?>
		<?php echo $form->error($model,'x1_10b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_10_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x1_10a_podpowiedz); ?>
		<?php echo $form->error($model,'x1_10a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <?php $wynik6ab = $model->x1_6a+$model->x1_6b+$model->x1_7a+$model->x1_7b+$model->x1_8a+$model->x1_8b+$model->x1_9a+$model->x1_9b+$model->x1_10a; ?>  
    <?php $wynik6cd = $model->x1_6c+$model->x1_6d+$model->x1_7c+$model->x1_7d+$model->x1_8c+$model->x1_8d+$model->x1_9c+$model->x1_9d+$model->x1_10b; ?>    
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik6ab; ?></b></td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik6cd; ?></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
  </tr>
  <tr>
    <td class="tg-yzpx" colspan="5"></td>
  </tr>
  <tr>
    <?php // $wynik2a = $model->x2_1a+$model->x2_2a+$model->x2_3a+$model->x2_4a+$model->x2_5a+$model->x2_6a+$model->x2_7a+$model->x2_8a+$model->x2_9a; ?>  
    <?php // $wynik2b = $model->x2_1b+$model->x2_2b+$model->x2_3b+$model->x2_4b+$model->x2_5b+$model->x2_6b+$model->x2_7b+$model->x2_8b+$model->x2_9b; ?>  
    <td class="tg-eyl8">Uzyskana liczba punktów razem</td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik1ab+$wynik6ab; ?></b></td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik1cd+$wynik6cd; ?></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów razem</td>
    <td class="tg-ltqa" colspan="2"><b>18</b></td>
    <td class="tg-ltqa" colspan="2"><b>18</b></td>
  </tr>
</table>	
</div>   
        
<div id="tab1">
    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff}
.tg .tg-s6z2{text-align:center}
.tg .tg-a1rn{background-color:#ffffc7}
.tg .tg-v79x{font-weight:bold;font-size:20px;background-color:#ffffff;color:#444444}
.tg .tg-su49{font-weight:bold;font-size:15px;background-color:#ffffff;color:#444444;text-align:center}
.tg .tg-nl5m{font-weight:bold;font-size:11px}
.tg .tg-in7r{font-weight:bold;font-size:15px;background-color:#26ade4;text-align:center}
.tg .tg-in7r-male{font-weight:bold;font-size:13px;background-color:#26ade4;text-align:center}
.tg .tg-pi53{font-weight:bold;font-size:12px;text-align:center}
.tg .tg-j757{font-size:12px;background-color:#ffffff}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center}
.tg .tg-36xf{font-weight:bold;background-color:#bbdaff}
.tg .tg-ltqa{background-color:#bbdaff;text-align:center}
</style>
<br /><br /><br /><br /><br />
<table class="tg">
  <tr>
    <th class="tg-v79x">2. Ocena artefaktów</th>
    <th class="tg-su49" colspan="4"></th>
  </tr>
  <tr>
    <!--<td class="tg-j09n" rowspan="2">Punktacja:<br>0 - duża ilość, uniemożliwia wiarygodną ocenę<br>1 - średnia ilość, wpływa na ocenę<br>2 - mała ilość, nie wpływa na ocenę<br>3 - brak artefaktów</td>-->
    <td class="tg-pi53" rowspan="2"></td>
    <!--<td class="tg-in7r-male" colspan="2">Piersi z przewagą tkanki gruczołowej</td>-->
    <!--<td class="tg-in7r-male" colspan="2">Piersi o dużej zawartości tkanki tłuszczowej</td>-->
    <td class="tg-in7r-male" colspan="2">Pierś gruczołowa</td>
    <td class="tg-in7r-male" colspan="2">Pierś tłuszczowa</td>
  </tr>
  <tr>
    <td class="tg-pi53" colspan="2">Punkty</td>
    <td class="tg-pi53" colspan="2">Punkty</td>
  </tr>
  <tr>
    <td class="tg-031e">Kurz</td>
    <td class="tg-ga2z" colspan="2">
                <div class="row">
		<?php //echo $form->labelEx($model,'x2_1a'); ?>
		<?php // echo $form->textField($model,'x2_1a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_1a); ?>
		<?php echo $form->error($model,'x2_1a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_1b'); ?>
		<?php // echo $form->textField($model,'x2_1b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_1b); ?>
		<?php echo $form->error($model,'x2_1b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_1_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_1a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_1a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Linie papilarne</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_2a'); ?>
		<?php // echo $form->textField($model,'x2_2a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_2a); ?>
		<?php echo $form->error($model,'x2_2a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_2b'); ?>
		<?php // echo $form->textField($model,'x2_2b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_2b); ?>
		<?php echo $form->error($model,'x2_2b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_2_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_2a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_2a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Rysy</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_3a'); ?>
		<?php // echo $form->textField($model,'x2_3a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_3a); ?>
		<?php echo $form->error($model,'x2_3a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_3b'); ?>
		<?php // echo $form->textField($model,'x2_3b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_3b); ?>
		<?php echo $form->error($model,'x2_3b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_3_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_3a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_3a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Uszkodzenie ekranu wzmacniającego</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_4a'); ?>
		<?php // echo $form->textField($model,'x2_4a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_4a); ?>
		<?php echo $form->error($model,'x2_4a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_4b'); ?>
		<?php // echo $form->textField($model,'x2_4b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_4b); ?>
		<?php echo $form->error($model,'x2_4b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_4_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_4a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_4a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Wałki</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_5a'); ?>
		<?php // echo $form->textField($model,'x2_5a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_5a); ?>
		<?php echo $form->error($model,'x2_5a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_5b'); ?>
		<?php // echo $form->textField($model,'x2_5b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_5b); ?>
		<?php echo $form->error($model,'x2_5b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_5_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_5a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_5a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Widoczne linie kratki</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_6a'); ?>
		<?php // echo $form->textField($model,'x2_6a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_6a); ?>
		<?php echo $form->error($model,'x2_6a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_6b'); ?>
		<?php // echo $form->textField($model,'x2_6b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_6b); ?>
		<?php echo $form->error($model,'x2_6b'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-a1rn" colspan="5"><div class="row">
		<?php //echo $form->labelEx($model,'x2_6_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_6a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_6a_podpowiedz'); ?>
	</div></td>
  </tr>
  <tr>
    <td class="tg-031e">Zacieki/Plamki</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_7a'); ?>
		<?php // echo $form->textField($model,'x2_7a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_7a); ?>
		<?php echo $form->error($model,'x2_7a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_7b'); ?>
		<?php // echo $form->textField($model,'x2_7b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_7b); ?>
		<?php echo $form->error($model,'x2_7b'); ?> 
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_7_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_7a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_7a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Blendy / Kolimacja</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_9a'); ?>
		<?php // echo $form->textField($model,'x2_9a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_9a); ?>
		<?php echo $form->error($model,'x2_9a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_9b'); ?>
		<?php // echo $form->textField($model,'x2_9b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x2_9b); ?>
		<?php echo $form->error($model,'x2_9b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_9_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x2_9a_podpowiedz); ?>
		<?php echo $form->error($model,'x2_9a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <?php $wynik2a = $model->x2_1a+$model->x2_2a+$model->x2_3a+$model->x2_4a+$model->x2_5a+$model->x2_6a+$model->x2_7a+$model->x2_9a; ?>  
  <?php $wynik2b = $model->x2_1b+$model->x2_2b+$model->x2_3b+$model->x2_4b+$model->x2_5b+$model->x2_6b+$model->x2_7b+$model->x2_9b; ?>  
  <tr>
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik2a; ?></b></td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik2b; ?></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa" colspan="2"><b>24</b></td>
    <td class="tg-ltqa" colspan="2"><b>24</b></td>
  </tr>
</table>
    
</div>
<div id="tab1">
        <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-ga2z{background-color:#f7fdfa;text-align:center}
.tg .tg-ub8f{font-size:12px;background-color:#f7fdfa}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff}
.tg .tg-a1rn{background-color:#ffffc7}
.tg .tg-v79x{font-weight:bold;font-size:20px;background-color:#ffffff;color:#444444}
.tg .tg-ze3n{font-weight:bold;font-size:15px;background-color:#26ade4;color:#444444;text-align:center}
.tg .tg-ze3n-male{font-weight:bold;font-size:13px;background-color:#26ade4;color:#444444;text-align:center}
.tg .tg-j09n{font-weight:bold;font-size:11px;background-color:#ffffff}
.tg .tg-wzga{font-weight:bold;font-size:12px;background-color:#ffffff;text-align:center}
.tg .tg-dm0n{background-color:#f7fdfa}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center}
.tg .tg-36xf{font-weight:bold;background-color:#bbdaff}
.tg .tg-ltqa{background-color:#bbdaff;text-align:center}
</style>
<br /><br />
<table class="tg">
  <tr>
    <th class="tg-v79x">3. Inne parametry oceny mammografów</th>
    <!--<th class="tg-ze3n-male" colspan="2">Piersi z przewagą tkanki gruczołowej</th>-->
    <!--<th class="tg-ze3n-male" colspan="2">Piersi o dużej zawartości tkanki tłuszczowej</th>-->
    <th class="tg-ze3n-male" colspan="2">Pierś gruczołowa</th>
    <th class="tg-ze3n-male" colspan="2">Pierś tłuszczowa</th>
  </tr>
  <tr>
    <td class="tg-pi53"><br><br></td>
    <td class="tg-pi53" colspan="2">Punkty</td>
    <td class="tg-pi53" colspan="2">Punkty</td>
  </tr>
  <tr>
    <td class="tg-031e">Ekspozycja</td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_1a'); ?>
		<?php // echo $form->textField($model,'x3_1a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x3_1a); ?>
		<?php echo $form->error($model,'x3_1a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_1b'); ?>
		<?php // echo $form->textField($model,'x3_1b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x3_1b); ?>
		<?php echo $form->error($model,'x3_1b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x3_1_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x3_1a_podpowiedz); ?>
		<?php echo $form->error($model,'x3_1a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Kontrast</td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_2a'); ?>
		<?php // echo $form->textField($model,'x3_2a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x3_2a); ?>
		<?php echo $form->error($model,'x3_2a'); ?>
	</div>

    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_2b'); ?>
		<?php // echo $form->textField($model,'x3_2b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x3_2b); ?>
		<?php echo $form->error($model,'x3_2b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x3_2_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x3_2a_podpowiedz); ?>
		<?php echo $form->error($model,'x3_2a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Ostrość</td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_3a'); ?>
		<?php // echo $form->textField($model,'x3_3a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x3_3a); ?>
		<?php echo $form->error($model,'x3_3a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_3b'); ?>
		<?php // echo $form->textField($model,'x3_3b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo CHtml::encode($model->x3_3b); ?>
		<?php echo $form->error($model,'x3_3b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row" >
		<?php //echo $form->labelEx($model,'x3_3_podpowiedz'); ?>
		<?php echo CHtml::encode($model->x3_3a_podpowiedz); ?>
		<?php echo $form->error($model,'x3_3a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <?php $wynik3a = $model->x3_1a+$model->x3_2a+$model->x3_3a; ?>  
    <?php $wynik3b = $model->x3_1b+$model->x3_2b+$model->x3_3b; ?>    
      
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik3a ?></b></td>
    <td class="tg-ci37" colspan="2"><b><?php echo $wynik3b ?></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
  </tr>
</table> 
</div>

<?php $this->endWidget(); ?>
            <!--<br /><br />-->
<!--<p align="right"><b>Podpisy oceniających:</b></p><br />-->

</div><!-- form -->