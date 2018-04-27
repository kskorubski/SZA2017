<?php
/* @var $this AnkietaAnalogowaController */
/* @var $model AnkietaAnalogowa */
/* @var $form CActiveForm */
include 'SlownikPodpowiedziAnalogowa.php';
?>
<h1>Arkusz oceny klinicznej mammogramu - Metoda Analogowa</h1>
<h3>Identyfikator zestawu: <?php echo Audyty::model()->findByPk(Yii::app()->session['ankieta-id-audytu'])->identyfikator_zestawu; ?></h3>
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
        <br />

	<?php echo $form->errorSummary($model); ?>
        
        <div id="tab1">
         
   <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff}
.tg .tg-qgy8{font-weight:bold;font-size:15px;color:#444444;text-align:center}
.tg .tg-qgy8-male{font-weight:bold;font-size:13px;color:#444444;text-align:center}
.tg .combo{background-color:#26ade4;font-weight: bold;font-size:15px;color:#444444;text-align:center}
.tg .tg-s6z2{text-align:center}
.tg .tg-yzpx{background-color:#26ade4}
.tg .tg-a1rn{background-color:#ffffc7}
.tg .tg-bbbr{background-color:#ffffc7;color:#ffffff}
.tg .tg-e3zv{font-weight:bold}
.tg .tg-by3v{font-weight:bold;font-size:14px;text-align:center}
.tg .tg-v79x{font-weight:bold;font-size:20px;background-color:#ffffff;color:#444444}
.tg .tg-pi53{font-weight:bold;font-size:12px;text-align:center}
.tg .tg-eqso{font-weight:bold;font-size:16px;background-color:#26ade4;text-align:center}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center}
.tg .tg-36xf{font-weight:bold;background-color:#bbdaff}
.tg .tg-ltqa{background-color:#bbdaff;text-align:center}
</style>
<table class="tg">
  <tr>
    <th class="tg-v79x" rowspan="3">1. Pozycjonowanie</th>
  
    <!--<th class="tg-qgy8" colspan="2">Piersi z przewagą tkanki gruczołowej</th>-->
    <th class="tg-qgy8" colspan="2">Pierś gruczołowa</th>
    
    
    <!--<th class="tg-qgy8" colspan="2">Piersi o dużej zawartości tkanki tłuszczowej</th>-->
    <th class="tg-qgy8" colspan="2">Pierś tłuszczowa</th>
    
   
    
  </tr>
  <tr>
      <td class="combo" colspan="2"><?php echo $form->dropDownList($model,'x1_1b_podpowiedz',array('Spełnione kryterium utkania'=>'Spełnione kryterium utkania', 'Niespełnione kryterium utkania'=>'Niespełnione kryterium utkania'),array('style'=>'width:220px', 'id'=>'x1_1b_podpowiedz')); ?></td>
      <td class="combo" colspan="2"><?php echo $form->dropDownList($model,'x1_1c_podpowiedz',array('Spełnione kryterium utkania'=>'Spełnione kryterium utkania', 'Niespełnione kryterium utkania'=>'Niespełnione kryterium utkania'),array('style'=>'width:220px', 'id'=>'x1_1c_podpowiedz')); ?></td>
  </tr>
  <tr>
    <td class="tg-by3v">Pierś prawa</td>
    <td class="tg-by3v">Pierś lewa</td>
    <td class="tg-by3v">Pierś prawa</td>
    <td class="tg-by3v">Pierś lewa</td>
  </tr>
  <tr>
    <td class="tg-j09n"></td>
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
                <?php echo $form->dropDownList($model,'x1_1a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_1a')); ?>
		<?php echo $form->error($model,'x1_1a'); ?>
            
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_1b'); ?>
		<?php // echo $form->textField($model,'x1_1b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_1b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_1b')); ?>
		<?php echo $form->error($model,'x1_1b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_1c'); ?>
		<?php // echo $form->textField($model,'x1_1c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_1c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_1c')); ?>
		<?php echo $form->error($model,'x1_1c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_1d'); ?>
		<?php // echo $form->textField($model,'x1_1d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_1d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_1d')); ?>
		<?php echo $form->error($model,'x1_1d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_1_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_1a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_1a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x1_2a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_2a')); ?>
		<?php echo $form->error($model,'x1_2a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_2b'); ?>
		<?php // echo $form->textField($model,'x1_2b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_2b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_2b')); ?>
		<?php echo $form->error($model,'x1_2b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_2c'); ?>
		<?php // echo $form->textField($model,'x1_2c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_2c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_2c')); ?>
		<?php echo $form->error($model,'x1_2c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_2d'); ?>
		<?php // echo $form->textField($model,'x1_2d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_2d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_2d')); ?>
		<?php echo $form->error($model,'x1_2d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_2_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_2a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_2a_podpowiedz')); ?>                
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
                <?php echo $form->dropDownList($model,'x1_3a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_3a')); ?>
		<?php echo $form->error($model,'x1_3a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x1_3b'); ?>
		<?php // echo $form->textField($model,'x1_3b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_3b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_3b')); ?>
		<?php echo $form->error($model,'x1_3b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_3c'); ?>
		<?php // echo $form->textField($model,'x1_3c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_3c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_3c')); ?>
		<?php echo $form->error($model,'x1_3c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_3d'); ?>
		<?php // echo $form->textField($model,'x1_3d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_3d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_3d')); ?>
		<?php echo $form->error($model,'x1_3d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_3_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_3a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_3a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x1_4a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_4a')); ?>
		<?php echo $form->error($model,'x1_4a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_4b'); ?>
		<?php // echo $form->textField($model,'x1_4b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_4b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_4b')); ?>
		<?php echo $form->error($model,'x1_4b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_4c'); ?>
		<?php // echo $form->textField($model,'x1_4c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_4c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_4c')); ?>
		<?php echo $form->error($model,'x1_4c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_4d'); ?>
		<?php // echo $form->textField($model,'x1_4d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_4d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_4d')); ?>
		<?php echo $form->error($model,'x1_4d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_4_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_4a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_4a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x1_5a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_5a')); ?>
		<?php echo $form->error($model,'x1_5a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_5b'); ?>
		<?php // echo $form->textField($model,'x1_5b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_5b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_5b')); ?>
		<?php echo $form->error($model,'x1_5b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_5_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_5a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_5a_podpowiedz')); ?>
		<?php echo $form->error($model,'x1_5a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <?php // $wynik1ab = $model->x1_1a+$model->x1_1b+$model->x1_2a+$model->x1_2b+$model->x1_3a+$model->x1_3b+$model->x1_4a+$model->x1_4b+$model->x1_5a; ?>  
    <?php // $wynik1cd = $model->x1_1c+$model->x1_1d+$model->x1_2c+$model->x1_2d+$model->x1_3c+$model->x1_3d+$model->x1_4c+$model->x1_4d+$model->x1_5b; ?>  
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2" ><b><div id="wynik_x_1a"></div></b></td>
    <td class="tg-ci37" colspan="2" ><b><div id="wynik_x_1b"></div></b></td>
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
                <?php echo $form->dropDownList($model,'x1_6a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_6a')); ?>
		<?php echo $form->error($model,'x1_6a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_6b'); ?>
		<?php // echo $form->textField($model,'x1_6b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_6b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_6b')); ?>
		<?php echo $form->error($model,'x1_6b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_6c'); ?>
		<?php // echo $form->textField($model,'x1_6c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_6c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_6c')); ?>
		<?php echo $form->error($model,'x1_6c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_6d'); ?>
		<?php // echo $form->textField($model,'x1_6d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_6d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_6d')); ?>
		<?php echo $form->error($model,'x1_6d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
         <div class="row">
		<?php //echo $form->labelEx($model,'x1_6_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_6a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_6a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x1_7a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_7a')); ?>
		<?php echo $form->error($model,'x1_7a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_7b'); ?>
		<?php // echo $form->textField($model,'x1_7b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_7b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_7b')); ?>
		<?php echo $form->error($model,'x1_7b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_7c'); ?>
		<?php // echo $form->textField($model,'x1_7c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_7c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_7c')); ?>
		<?php echo $form->error($model,'x1_7c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_7d'); ?>
		<?php // echo $form->textField($model,'x1_7d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_7d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_7d')); ?>
		<?php echo $form->error($model,'x1_7d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_7_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_7a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_7a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x1_8a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_8a')); ?>
		<?php echo $form->error($model,'x1_8a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_8b'); ?>
		<?php // echo $form->textField($model,'x1_8b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_8b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_8b')); ?>
		<?php echo $form->error($model,'x1_8b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_8c'); ?>
		<?php // echo $form->textField($model,'x1_8c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_8c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_8c')); ?>
		<?php echo $form->error($model,'x1_8c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_8d'); ?>
		<?php // echo $form->textField($model,'x1_8d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_8d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_8d')); ?>
		<?php echo $form->error($model,'x1_8d'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_8_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_8a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_8a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x1_9a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_9a')); ?>
		<?php echo $form->error($model,'x1_9a'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_9b'); ?>
		<?php // echo $form->textField($model,'x1_9b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_9b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_9b')); ?>
		<?php echo $form->error($model,'x1_9b'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_9c'); ?>
		<?php // echo $form->textField($model,'x1_9c', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_9c',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_9c')); ?>
		<?php echo $form->error($model,'x1_9c'); ?>
	</div>
    </td>
    <td class="tg-s6z2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_9d'); ?>
		<?php // echo $form->textField($model,'x1_9d', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_9d',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_9d')); ?>
		<?php echo $form->error($model,'x1_9d'); ?>
	</div>

    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_9_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_9a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_9a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x1_10a',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_10a')); ?>
		<?php echo $form->error($model,'x1_10a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php // echo $form->labelEx($model,'x1_10b'); ?>
		<?php // echo $form->textField($model,'x1_10b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x1_10b',array(''=>'','0'=>'0','0.5'=>'0.5','1'=>'1'),array('style'=>'width:50px', 'id'=>'x1_10b')); ?>
		<?php echo $form->error($model,'x1_10b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x1_10_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x1_10a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x1_10a_podpowiedz')); ?>
		<?php echo $form->error($model,'x1_10a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <?php // $wynik6ab = $model->x1_6a+$model->x1_6b+$model->x1_7a+$model->x1_7b+$model->x1_8a+$model->x1_8b+$model->x1_9a+$model->x1_9b+$model->x1_10a; ?>  
    <?php // $wynik6cd = $model->x1_6c+$model->x1_6d+$model->x1_7c+$model->x1_7d+$model->x1_8c+$model->x1_8d+$model->x1_9c+$model->x1_9d+$model->x1_10b; ?>    
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2"><b><div id="wynik_x_1c"></div></b></td>
    <td class="tg-ci37" colspan="2"><b><div id="wynik_x_1d"></div></b></td>
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
    <td class="tg-ci37" colspan="2"><b><div id="wynik_x_SUMAa"></div></b></td>
    <td class="tg-ci37" colspan="2"><b><div id="wynik_x_SUMAb"></div></b></td>
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
.tg .tg-ga2z{background-color:#f7fdfa;text-align:center}
.tg .tg-ub8f{font-size:12px;background-color:#f7fdfa}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff}
.tg .tg-a1rn{background-color:#ffffc7}
.tg .tg-v79x{font-weight:bold;font-size:20px;background-color:#ffffff;color:#444444}
.tg .tg-su49{font-weight:bold;font-size:15px;background-color:#ffffff;color:#444444;text-align:center}
.tg .tg-j09n{font-weight:bold;font-size:11px;background-color:#ffffff}
.tg .tg-in7r{font-weight:bold;font-size:15px;background-color:#26ade4;text-align:center}
.tg .tg-in7r-male{font-weight:bold;font-size:153x;background-color:#26ade4;text-align:center}
.tg .tg-wzga{font-weight:bold;font-size:12px;background-color:#ffffff;text-align:center}
.tg .tg-dm0n{background-color:#f7fdfa}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center}
.tg .tg-36xf{font-weight:bold;background-color:#bbdaff}
.tg .tg-ltqa{background-color:#bbdaff;text-align:center}
</style>
<table class="tg">
  <tr>
    <th class="tg-v79x">2. Ocena artefaktów</th>
    <th class="tg-su49" colspan="4"></th>
  </tr>
  <tr>
    <!--<td class="tg-j09n" rowspan="2">Punktacja:<br>0 - duża ilość, uniemożliwia wiarygodną ocenę<br>1 - średnia ilość, wpływa na ocenę<br>2 - mała ilość, nie wpływa na ocenę<br>3 - brak artefaktów</td>-->
    <td class="tg-j09n" rowspan="2"></td>
    <!--<td class="tg-in7r" colspan="2">Piersi z przewagą tkanki gruczołowej</td>-->
    <td class="tg-in7r" colspan="2">Pierś gruczołowa</td>
    <!--<td class="tg-in7r" colspan="2">Piersi o dużej zawartości tkanki tłuszczowej</td>-->
    <td class="tg-in7r" colspan="2">Pierś tłuszczowa</td>
  </tr>
  <tr>
    <td class="tg-wzga" colspan="2">Punkty</td>
    <td class="tg-wzga" colspan="2">Punkty</td>
  </tr>
  <tr>
    <td class="tg-031e">Kurz</td>
    <td class="tg-ga2z" colspan="2">
                <div class="row">
		<?php //echo $form->labelEx($model,'x2_1a'); ?>
		<?php // echo $form->textField($model,'x2_1a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_1a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_1a')); ?>
		<?php echo $form->error($model,'x2_1a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_1b'); ?>
		<?php // echo $form->textField($model,'x2_1b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_1b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_1b')); ?>
		<?php echo $form->error($model,'x2_1b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_1_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_1a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_1a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x2_2a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_2a')); ?>
		<?php echo $form->error($model,'x2_2a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_2b'); ?>
		<?php // echo $form->textField($model,'x2_2b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_2b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_2b')); ?>
		<?php echo $form->error($model,'x2_2b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_2_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_2a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_2a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x2_3a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_3a')); ?>
		<?php echo $form->error($model,'x2_3a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_3b'); ?>
		<?php // echo $form->textField($model,'x2_3b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_3b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_3b')); ?>
		<?php echo $form->error($model,'x2_3b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_3_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_3a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_3a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x2_4a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_4a')); ?>
		<?php echo $form->error($model,'x2_4a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_4b'); ?>
		<?php // echo $form->textField($model,'x2_4b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_4b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_4b')); ?>
		<?php echo $form->error($model,'x2_4b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_4_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_4a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_4a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x2_5a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_5a')); ?>
		<?php echo $form->error($model,'x2_5a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_5b'); ?>
		<?php // echo $form->textField($model,'x2_5b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_5b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_5b')); ?>
		<?php echo $form->error($model,'x2_5b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_5_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_5a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_5a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x2_6a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_6a')); ?>
		<?php echo $form->error($model,'x2_6a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_6b'); ?>
		<?php // echo $form->textField($model,'x2_6b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_6b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_6b')); ?>
		<?php echo $form->error($model,'x2_6b'); ?>
	</div>
    </td>
  </tr>
  <tr>
    <td class="tg-a1rn" colspan="5"><div class="row">
		<?php //echo $form->labelEx($model,'x2_6_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_6a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_6a_podpowiedz')); ?>
		<?php echo $form->error($model,'x2_6a_podpowiedz'); ?>
	</div></td>
  </tr>
  <tr>
    <td class="tg-031e">Zacieki/Plamki</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_7a'); ?>
		<?php // echo $form->textField($model,'x2_7a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_7a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_7a')); ?>
		<?php echo $form->error($model,'x2_7a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_7b'); ?>
		<?php // echo $form->textField($model,'x2_7b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_7b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_7b')); ?>
		<?php echo $form->error($model,'x2_7b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_7_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_7a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_7a_podpowiedz')); ?>
		<?php echo $form->error($model,'x2_7a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <tr>
    <td class="tg-031e">Blendy / kolimacja</td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_9a'); ?>
		<?php // echo $form->textField($model,'x2_9a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_9a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_9a')); ?>
		<?php echo $form->error($model,'x2_9a'); ?>
	</div>
    </td>
    <td class="tg-ga2z" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x2_9b'); ?>
		<?php // echo $form->textField($model,'x2_9b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x2_9b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x2_9b')); ?>
		<?php echo $form->error($model,'x2_9b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x2_9_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x2_9a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x2_9a_podpowiedz')); ?>
		<?php echo $form->error($model,'x2_9a_podpowiedz'); ?>
	</div>
      </td>
  </tr>
  <?php // $wynik2a = $model->x2_1a+$model->x2_2a+$model->x2_3a+$model->x2_4a+$model->x2_5a+$model->x2_6a+$model->x2_7a+$model->x2_9a; ?>  
  <?php // $wynik2b = $model->x2_1b+$model->x2_2b+$model->x2_3b+$model->x2_4b+$model->x2_5b+$model->x2_6b+$model->x2_7b+$model->x2_9b; ?>  
  <tr>
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2"><b><div id="wynik_x_2a"></div></b></td>
    <td class="tg-ci37" colspan="2" ><b><div id="wynik_x_2b"></div></b></td>
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
<table class="tg">
  <tr>
    <th class="tg-v79x">3. Inne parametry oceny mammogramów</th>
    <!--<th class="tg-ze3n" colspan="2">Piersi z przewagą tkanki gruczołowej</th>-->
    <th class="tg-ze3n" colspan="2">Pierś gruczołowa</th>
    <!--<th class="tg-ze3n" colspan="2">Piersi o dużej zawartości tkanki tłuszczowej</th>-->
    <th class="tg-ze3n" colspan="2">Pierś tłuszczowa</th>
  </tr>
  <tr>
    <td class="tg-j09n"><br><br></td>
    <td class="tg-wzga" colspan="2">Punkty</td>
    <td class="tg-wzga" colspan="2">Punkty</td>
  </tr>
  <tr>
    <td class="tg-031e">Ekspozycja</td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_1a'); ?>
		<?php // echo $form->textField($model,'x3_1a', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x3_1a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x3_1a')); ?>
		<?php echo $form->error($model,'x3_1a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_1b'); ?>
		<?php // echo $form->textField($model,'x3_1b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x3_1b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x3_1b')); ?>
		<?php echo $form->error($model,'x3_1b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x3_1_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x3_1a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x3_1a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x3_2a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x3_2a')); ?>
		<?php echo $form->error($model,'x3_2a'); ?>
	</div>

    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_2b'); ?>
		<?php // echo $form->textField($model,'x3_2b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x3_2b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x3_2b')); ?>
		<?php echo $form->error($model,'x3_2b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row">
		<?php //echo $form->labelEx($model,'x3_2_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x3_2a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x3_2a_podpowiedz')); ?>
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
                <?php echo $form->dropDownList($model,'x3_3a',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x3_3a')); ?>
		<?php echo $form->error($model,'x3_3a'); ?>
	</div>
    </td>
    <td class="tg-s6z2" colspan="2">
        <div class="row">
		<?php //echo $form->labelEx($model,'x3_3b'); ?>
		<?php // echo $form->textField($model,'x3_3b', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x3_3b',array(''=>'','0'=>'0','1'=>'1','2'=>'2','3'=>'3'),array('style'=>'width:50px', 'id'=>'x3_3b')); ?>
		<?php echo $form->error($model,'x3_3b'); ?>
	</div>
    </td>
  </tr>
  <tr>
      <td class="tg-a1rn" colspan="5">
          <div class="row" >
		<?php //echo $form->labelEx($model,'x3_3_podpowiedz'); ?>
		<?php echo "Uwagi:<br /> ".$form->textArea($model,'x3_3a_podpowiedz',array('size'=>300,'maxlength'=>300, 'style'=>'height:50px; width:850px;', 'id'=>'x3_3a_podpowiedz')); ?>
		<?php echo $form->error($model,'x3_3a_podpowiedz'); ?>  
	</div>
      </td>
  </tr>
  <tr>
    <?php // $wynik3a = $model->x3_1a+$model->x3_2a+$model->x3_3a; ?>  
    <?php // $wynik3b = $model->x3_1b+$model->x3_2b+$model->x3_3b; ?>    
      
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37" colspan="2"><b><div id="wynik_x_3a"></div></b></td>
    <td class="tg-ci37" colspan="2"><b><div id="wynik_x_3b"></div></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
    <td class="tg-ltqa" colspan="2"><b>9</b></td>
  </tr>
</table> 
</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'AudytyID'); ?>
                <?php 
//                    $index = 1;
//                    echo $form->textField(null,$index); 
                ?>
		<?php 
//                    echo $form->textField($model,'AudytyID'); 
                      echo $form->hiddenField($model,'AudytyID', array('value'=>Yii::app()->session['ankieta-id-audytu']));    
                ?>
		<?php // echo $form->error($model,'AudytyID'); ?>
	</div>

	<div class="row buttons">
		<?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Zapisz ankietę'); ?>
		<?php echo CHtml::submitButton('Zapisz ankietę'); ?>
                <?php 
                if(!$model->isNewRecord){
                     echo CHtml::button('Drukuj', array( 'submit' => Yii::app()->createUrl("/audytor/drukujAnalogowa" , array("id" => $model->id)) ));
                }
                ?>
                <?php echo CHtml::button('Powrót', array( 'submit' => Yii::app()->createUrl("/audytor/audyty")  )); ?>
	</div>
        <div id="flip"><b>Kliknij aby pokazać legendę</b></div>
        <div id="panel">
        <p><b>LEGENDA:</b></p>

        <b>1. Pozycjonowanie: 0 – 1 pkt</b><br />
        <b>1)</b><br />0 pkt – fragment sutka niewidoczny na zdjęciu,<br />
        0,5 pkt – nieznaczny fragment sutka niewidoczny na zdjęciu (np. fragment skóry),<br />
        1 pkt - cały sutek widoczny na zdjęciu,<br /><br />
        <b>2)</b><br />0 pkt – nie spełnione są oba ważne kryteria: mięsień piersiowy nie sięga wysokości brodawki i nie jest uwidoczniona jego wystarczająca część,<br />
        0,5 pkt – jedno kryterium jest niespełnione w nieznacznym zakresie np. wąski mięsień piersiowy lub mięsień piersiowy nie sięga do wysokości brodawki (maksymalnie 5 mm),<br />
        1 pkt - mięsień piersiowy widoczny co najmniej do wysokości brodawki sutkowej,<br /><br />
        <b>3</b>)<br />0 pkt – niewidoczny fałd podsutkowy,<br />
        0,5 pkt – fałd podsutkowy wąski lub fałd z nakładającą się tkanką,<br />
        1 pkt - widoczny fałd podsutkowy,<br /><br />
        <b>4)</b><br />0 pkt - obecność fałdów skórnych/tkankowych w 2 okolicach sutka,<br />
        0,5 pkt - obecność fałdów skórnych/tkankowych tylko w jednej okolicy, nieprzesłaniających stożka gruczołowego,<br />
        1 pkt - równomierne rozłożenie i uciśnięcie tkanki gruczołowej,<br /><br />
        <b>5)</b><br />0 pkt – całkowita asymetria ułożenia,<br />
        0,5 pkt – ułożenie niesymetryczne w niewielkim zakresie (do 10 mm),<br />
        1 pkt - zachowana symetria ułożenia,<br /><br />
        <b>6)</b><br />0 pkt – fragment sutka niewidoczny na zdjęciu,<br />
        0,5 pkt – nieznaczny fragment sutka niewidoczny na zdjęciu (np. fragment skóry),<br />
        1 pkt - cały sutek widoczny na zdjęciu,<br /><br />
        <b>7)</b><br />0 pkt – boczne położenie brodawki lub położenie przyśrodkowe więcej niż 15 mm,<br />
        0,5 pkt – przyśrodkowe położenie brodawki 11-15 mm,<br />
        1 pkt - położenie brodawki sutkowej centralne lub lekko przyśrodkowe,<br /><br />
        <b>8)</b><br />0 pkt - obecność fałdów skórnych/tkankowych w 2 okolicach sutka,<br />
        0,5 pkt - obecność fałdów skórnych/tkankowych tylko w jednej okolicy nieprzesłaniających stożka gruczołowego,<br />
        1 pkt - równomierne rozłożenie i uciśnięcie tkanki gruczołowej,<br /><br />
        <b>9)</b><br />0 pkt – brodawka niewyrzutowana,<br />
        0,5 pkt – brodawka trafiona ortoradialnie,<br />
        1 pkt - brodawka wyrzutowana w co najmniej jednej projekcji,<br /><br />
        <b>10)</b><br />0 pkt – całkowita asymetria ułożenia,<br />
        0,5 pkt – ułożenie niesymetryczne w niewielkim zakresie (do 10 mm),<br />
        1 pkt - zachowana symetria ułożenia.<br /><br />

        <b>2. Ocena artefaktów: 0 – 3 pkt (dotyczy wszystkich parametrów)</b></p>
        0 pkt – duża ilość, uniemożliwia wiarygodną ocenę,<br />
        1 pkt – średnia ilość, wpływa na ocenę,<br />
        2 pkt – mała ilość, nie wpływa na ocenę,<br />
        3 pkt – brak artefaktów.<br /><br />

        <b>3. Inne parametry: 1 – 5 pkt (dotyczy wszystkich parametrów)</b></p>
        <b>1) Ekspozycja – ocenie podlegają warunki ekspozycji pozwalające na uwidocznienie struktur anatomicznych, tj. tkanka gruczołowa, tłuszczowa, włóknista, naczynia:</b><br />
        0 pkt – zła,<br />
        1 pkt – mierna,<br />
        2 pkt – dobra,<br />
        3 pkt – bardzo dobra.<br /><br />
        <b>2) Kontrast – ocenie podlega kontrast pozwalający na odróżnienie struktur anatomicznych tj. elementy gruczołowe, włókniste, naczyniowe:</b></p>
        0 pkt – zła,<br />
        1 pkt – mierna,<br />
        2 pkt – dobra,<br />
        3 pkt – bardzo dobra.<br /><br />
        <b>3) Ostrość – ocenie podlega ostrość granic poszczególnych struktur anatomicznych, tj. zarys skóry, naczyń krwionośnych, tkanki włóknistej, rozetki skórne na tle mięśnia piersiowego:</b></p>
        0 pkt – zła,<br />
        1 pkt – mierna,<br />
        2 pkt – dobra,<br />
        3 pkt – bardzo dobra.<br /><br />
        </div>
         
        <script> 
        $(document).ready(function(){
          $("#flip").click(function(){             
            $("#panel").slideDown("slow");
          });
        });
       
        
        function analizuj(ktora_kategoria, id1, id2, id3, id4, id_tekst, tekst1, tekst2, tekst3, tekst4) {

            var prefix = "";
            
            xa = $(id1).val();
            xb = $(id2).val();
            xc = $(id3).val();
            xd = $(id4).val();
            
            if($('#x1_1b_podpowiedz').val() == 'Niespełnione kryterium utkania'){
                if((xc == null) && (xd == null)){
                    xa = -100;
                }else {
                    xa = xb = -100;
                }
            }
            if($('#x1_1c_podpowiedz').val() == 'Niespełnione kryterium utkania'){
                 if((xc == null) && (xd == null)){
                    xb = -100;
                 }else {
                    xc = xd = -100;
                 }
            }
                                               
            if((xa == '') || (xa == null)) {
                xa = -100;
            }
            if((xb == '') || (xb == null)) {
                xb = -100;
            }
            if((xc == '') || (xc == null)) {
                xc = -100;
            }
            if((xd == '') || (xd == null)) {
                xd = -100;
            }                      
            
            
            var wynik_tekst ="";
//           

            switch(ktora_kategoria) {
                    case '1':
                        var licznik_zer = 0;
                        var licznik_polowek = 0;
                        
                        if(xa == 0){
                            licznik_zer++;
                        }else if(xa == 0.5){
                            licznik_polowek++;
                        }
                        if(xb == 0){
                            licznik_zer++;
                        }else if(xb == 0.5){
                            licznik_polowek++;
                        }
                        if(xc == 0){
                            licznik_zer++;
                        }else if(xc == 0.5){
                            licznik_polowek++;
                        }
                        if(xd == 0){
                            licznik_zer++;
                        }else if(xd == 0.5){
                            licznik_polowek++;
                        }
                        if(licznik_zer>0){
                            wynik_tekst = wynik_tekst+tekst1;
                        }
                        if(licznik_polowek>0) {
                            wynik_tekst = wynik_tekst+tekst2;
                        }                        
                        break;
                    case '2':
                        
                        var licznik_zer = 0;
                        var licznik_jedynek = 0;
                        var licznik_dwojek = 0;
            
                        if(xa == 0){
                            licznik_zer++;
                        }else if(xa == 1){
                            licznik_jedynek++;
                        }else if(xa == 2){
                            licznik_dwojek++;
                        }
                        if(xb == 0){
                            licznik_zer++;
                        }else if(xb == 1){
                            licznik_jedynek++;
                        }else if(xb == 2){
                            licznik_dwojek++;
                        }
                        if(licznik_zer>0){
                            wynik_tekst = wynik_tekst+tekst1; 
                        }
                        if(licznik_jedynek>0) {
                            wynik_tekst = wynik_tekst+tekst2;
                        }
                        if(licznik_dwojek>0) {
                            wynik_tekst = wynik_tekst+tekst3;
                        }
                        break;
                    case '3': 
                        
                        var licznik_zer = 0;
                        var licznik_jedynek = 0;
                        var licznik_dwojek = 0;
            
                        if(xa == 0){
                            licznik_zer++;
                        }else if(xa == 1){
                            licznik_jedynek++;
                        }else if(xa == 2){
                            licznik_dwojek++;
                        }
                        if(xb == 0){
                            licznik_zer++;
                        }else if(xb == 1){
                            licznik_jedynek++;
                        }else if(xb == 2){
                            licznik_dwojek++;
                        }                        
                        
                        if(licznik_zer>0){
                            wynik_tekst = wynik_tekst+tekst1; 
                        }
                        if(licznik_jedynek>0) {
                            wynik_tekst = wynik_tekst+tekst2;
                        }
                        if(licznik_dwojek>0) {
                            wynik_tekst = wynik_tekst+tekst3;
                        }
                        break
                    } 
                    if(wynik_tekst != ""){
                        if(id_tekst == '#x3_1a_podpowiedz'){
                            prefix = x_3_1_prefix;
                        }else if(id_tekst == '#x3_2a_podpowiedz'){
                            prefix = x_3_2_prefix;
                        }else if(id_tekst == '#x3_3a_podpowiedz'){
                            prefix = x_3_3_prefix;
                        }
                } 
                    $(id_tekst).empty();
                    $(id_tekst).append(prefix+wynik_tekst);
        }
                
      
              $('#x1_1a').change(function() {                
                analizuj('1', '#x1_1a', '#x1_1b', '#x1_1c', '#x1_1d', '#x1_1a_podpowiedz', x_1_1_zero, x_1_1_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });      
              $('#x1_1b').change(function() {
                analizuj('1', '#x1_1a', '#x1_1b', '#x1_1c', '#x1_1d', '#x1_1a_podpowiedz', x_1_1_zero, x_1_1_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });
              $('#x1_1c').change(function() {
                analizuj('1', '#x1_1a', '#x1_1b', '#x1_1c', '#x1_1d', '#x1_1a_podpowiedz', x_1_1_zero, x_1_1_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_1d').change(function() {
                analizuj('1', '#x1_1a', '#x1_1b', '#x1_1c', '#x1_1d', '#x1_1a_podpowiedz', x_1_1_zero, x_1_1_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_2a').change(function() {
                analizuj('1', '#x1_2a', '#x1_2b', '#x1_2c', '#x1_2d', '#x1_2a_podpowiedz', x_1_2_zero, x_1_2_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });      
              $('#x1_2b').change(function() {
                analizuj('1', '#x1_2a', '#x1_2b', '#x1_2c', '#x1_2d', '#x1_2a_podpowiedz', x_1_2_zero, x_1_2_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });
              $('#x1_2c').change(function() {
                analizuj('1', '#x1_2a', '#x1_2b', '#x1_2c', '#x1_2d', '#x1_2a_podpowiedz', x_1_2_zero, x_1_2_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_2d').change(function() {
                analizuj('1', '#x1_2a', '#x1_2b', '#x1_2c', '#x1_2d', '#x1_2a_podpowiedz', x_1_2_zero, x_1_2_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_3a').change(function() {
                analizuj('1', '#x1_3a', '#x1_3b', '#x1_3c', '#x1_3d', '#x1_3a_podpowiedz', x_1_3_zero, x_1_3_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });      
              $('#x1_3b').change(function() {
                analizuj('1', '#x1_3a', '#x1_3b', '#x1_3c', '#x1_3d', '#x1_3a_podpowiedz', x_1_3_zero, x_1_3_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });
              $('#x1_3c').change(function() {
                analizuj('1', '#x1_3a', '#x1_3b', '#x1_3c', '#x1_3d', '#x1_3a_podpowiedz', x_1_3_zero, x_1_3_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_3d').change(function() {
                analizuj('1', '#x1_3a', '#x1_3b', '#x1_3c', '#x1_3d', '#x1_3a_podpowiedz', x_1_3_zero, x_1_3_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_4a').change(function() {
                analizuj('1', '#x1_4a', '#x1_4b', '#x1_4c', '#x1_4d', '#x1_4a_podpowiedz', x_1_4_zero, x_1_4_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });      
              $('#x1_4b').change(function() {
                analizuj('1', '#x1_4a', '#x1_4b', '#x1_4c', '#x1_4d', '#x1_4a_podpowiedz', x_1_4_zero, x_1_4_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa');
              });
              $('#x1_4c').change(function() {
                analizuj('1', '#x1_4a', '#x1_4b', '#x1_4c', '#x1_4d', '#x1_4a_podpowiedz', x_1_4_zero, x_1_4_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb'); 
              });
              $('#x1_4d').change(function() {
                analizuj('1', '#x1_4a', '#x1_4b', '#x1_4c', '#x1_4d', '#x1_4a_podpowiedz', x_1_4_zero, x_1_4_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_5a').change(function() {
                analizuj('1', '#x1_5a', '#x1_5b', null, null, '#x1_5a_podpowiedz', x_1_5_zero, x_1_5_pol, null, null );
                policz1('#x1_1a', '#x1_1b', '#x1_2a', '#x1_2b','#x1_3a', '#x1_3b', '#x1_4a', '#x1_4b', '#x1_5a','#wynik_x_1a','#wynik_x_SUMAa'); 
              });      
              $('#x1_5b').change(function() {
                analizuj('1', '#x1_5a', '#x1_5b', null, null, '#x1_5a_podpowiedz', x_1_5_zero, x_1_5_pol, null, null );
                policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
              });
              $('#x1_6a').change(function() {
                analizuj('1', '#x1_6a', '#x1_6b', '#x1_6c', '#x1_6d', '#x1_6a_podpowiedz', x_1_6_zero, x_1_6_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');

              });      
              $('#x1_6b').change(function() {
                analizuj('1', '#x1_6a', '#x1_6b', '#x1_6c', '#x1_6d', '#x1_6a_podpowiedz', x_1_6_zero, x_1_6_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });
              $('#x1_6c').change(function() {
                analizuj('1', '#x1_6a', '#x1_6b', '#x1_6c', '#x1_6d', '#x1_6a_podpowiedz', x_1_6_zero, x_1_6_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');

              });
              $('#x1_6d').change(function() {
                analizuj('1', '#x1_6a', '#x1_6b', '#x1_6c', '#x1_6d', '#x1_6a_podpowiedz', x_1_6_zero, x_1_6_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x1_7a').change(function() {
                analizuj('1', '#x1_7a', '#x1_7b', '#x1_7c', '#x1_7d', '#x1_7a_podpowiedz', x_1_7_zero, x_1_7_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });      
              $('#x1_7b').change(function() {
                analizuj('1', '#x1_7a', '#x1_7b', '#x1_7c', '#x1_7d', '#x1_7a_podpowiedz', x_1_7_zero, x_1_7_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });
              $('#x1_7c').change(function() {
                analizuj('1', '#x1_7a', '#x1_7b', '#x1_7c', '#x1_7d', '#x1_7a_podpowiedz', x_1_7_zero, x_1_7_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x1_7d').change(function() {
                analizuj('1', '#x1_7a', '#x1_7b', '#x1_7c', '#x1_7d', '#x1_7a_podpowiedz', x_1_7_zero, x_1_7_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x1_8a').change(function() {
                analizuj('1', '#x1_8a', '#x1_8b', '#x1_8c', '#x1_8d', '#x1_8a_podpowiedz', x_1_8_zero, x_1_8_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });      
              $('#x1_8b').change(function() {
                analizuj('1', '#x1_8a', '#x1_8b', '#x1_8c', '#x1_8d', '#x1_8a_podpowiedz', x_1_8_zero, x_1_8_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });
              $('#x1_8c').change(function() {
                analizuj('1', '#x1_8a', '#x1_8b', '#x1_8c', '#x1_8d', '#x1_8a_podpowiedz', x_1_8_zero, x_1_8_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x1_8d').change(function() {
                analizuj('1', '#x1_8a', '#x1_8b', '#x1_8c', '#x1_8d', '#x1_8a_podpowiedz', x_1_8_zero, x_1_8_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x1_9a').change(function() {
                analizuj('1', '#x1_9a', '#x1_9b', '#x1_9c', '#x1_9d', '#x1_9a_podpowiedz', x_1_9_zero, x_1_9_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });      
              $('#x1_9b').change(function() {
                analizuj('1', '#x1_9a', '#x1_9b', '#x1_9c', '#x1_9d', '#x1_9a_podpowiedz', x_1_9_zero, x_1_9_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });
              $('#x1_9c').change(function() {
                analizuj('1', '#x1_9a', '#x1_9b', '#x1_9c', '#x1_9d', '#x1_9a_podpowiedz', x_1_9_zero, x_1_9_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x1_9d').change(function() {
                analizuj('1', '#x1_9a', '#x1_9b', '#x1_9c', '#x1_9d', '#x1_9a_podpowiedz', x_1_9_zero, x_1_9_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x1_10a').change(function() {
                analizuj('1', '#x1_10a', '#x1_10b', null, null, '#x1_10a_podpowiedz', x_1_10_zero, x_1_10_pol, null, null );
                policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
              });      
              $('#x1_10b').change(function() {
                analizuj('1', '#x1_10a', '#x1_10b', null, null, '#x1_10a_podpowiedz', x_1_10_zero, x_1_10_pol, null, null );
                policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
              });
              $('#x2_1a').change(function() {
                analizuj('2', '#x2_1a', '#x2_1b', null, null, '#x2_1a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_1b').change(function() {
                analizuj('2', '#x2_1a', '#x2_1b', null, null, '#x2_1a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
              $('#x2_2a').change(function() {
                analizuj('2', '#x2_2a', '#x2_2b', null, null, '#x2_2a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_2b').change(function() {
                analizuj('2', '#x2_2a', '#x2_2b', null, null, '#x2_2a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
               $('#x2_3a').change(function() {
                analizuj('2', '#x2_3a', '#x2_3b', null, null, '#x2_3a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_3b').change(function() {
                analizuj('2', '#x2_3a', '#x2_3b', null, null, '#x2_3a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
               $('#x2_4a').change(function() {
                analizuj('2', '#x2_4a', '#x2_4b', null, null, '#x2_4a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_4b').change(function() {
                analizuj('2', '#x2_4a', '#x2_4b', null, null, '#x2_4a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
               $('#x2_5a').change(function() {
                analizuj('2', '#x2_5a', '#x2_5b', null, null, '#x2_5a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_5b').change(function() {
                analizuj('2', '#x2_5a', '#x2_5b', null, null, '#x2_5a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
               $('#x2_6a').change(function() {
                analizuj('2', '#x2_6a', '#x2_6b', null, null, '#x2_6a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_6b').change(function() {
                analizuj('2', '#x2_6a', '#x2_6b', null, null, '#x2_6a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
               $('#x2_7a').change(function() {
                analizuj('2', '#x2_7a', '#x2_7b', null, null, '#x2_7a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_7b').change(function() {
                analizuj('2', '#x2_7a', '#x2_7b', null, null, '#x2_7a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
              $('#x2_9a').change(function() {
                analizuj('2', '#x2_9a', '#x2_9b', null, null, '#x2_9a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
              });      
              $('#x2_9b').change(function() {
                analizuj('2', '#x2_9a', '#x2_9b', null, null, '#x2_9a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
              });
              $('#x3_1a').change(function() {
                analizuj('3', '#x3_1a', '#x3_1b', null, null, '#x3_1a_podpowiedz', x_3_1_zero, x_3_1_jeden, x_3_1_dwa, null );
                policz1('#x3_1a', '#x3_2a', '#x3_3a', null, null, null, null, null, null,'#wynik_x_3a',null);
              });      
              $('#x3_1b').change(function() {
                analizuj('3', '#x3_1a', '#x3_1b', null, null, '#x3_1a_podpowiedz', x_3_1_zero, x_3_1_jeden, x_3_1_dwa, null );
                policz1('#x3_1b', '#x3_2b', '#x3_3b', null, null, null, null, null, null,'#wynik_x_3b',null);
              });
              $('#x3_2a').change(function() {
                analizuj('3', '#x3_2a', '#x3_2b', null, null, '#x3_2a_podpowiedz', x_3_2_zero, x_3_2_jeden, x_3_2_dwa, null );
                policz1('#x3_1a', '#x3_2a', '#x3_3a', null, null, null, null, null, null,'#wynik_x_3a',null);
              });      
              $('#x3_2b').change(function() {
                analizuj('3', '#x3_2a', '#x3_2b', null, null, '#x3_2a_podpowiedz', x_3_2_zero, x_3_2_jeden, x_3_2_dwa, null );
                policz1('#x3_1b', '#x3_2b', '#x3_3b', null, null, null, null, null, null,'#wynik_x_3b',null);
              });
              $('#x3_3a').change(function() {
                analizuj('3', '#x3_3a', '#x3_3b', null, null, '#x3_3a_podpowiedz', x_3_3_zero, x_3_3_jeden, x_3_3_dwa, null );
                policz1('#x3_1a', '#x3_2a', '#x3_3a', null, null, null, null, null, null,'#wynik_x_3a',null);
              });      
              $('#x3_3b').change(function() {
                analizuj('3', '#x3_3a', '#x3_3b', null, null, '#x3_3a_podpowiedz', x_3_3_zero, x_3_3_jeden, x_3_3_dwa, null);
                policz1('#x3_1b', '#x3_2b', '#x3_3b', null, null, null, null, null, null,'#wynik_x_3b',null);
              });  
              
              $('#x1_1b_podpowiedz').change(function() {
                  
                   if($('#x1_1b_podpowiedz').val() == 'Spełnione kryterium utkania'){
                       
                        $('#x1_1a').prop('disabled',false);   
                        $('#x1_1a').val(<?php echo $model->x1_1a ?>);
                        $('#x1_1b').prop('disabled',false);   
                        $('#x1_1b').val(<?php echo $model->x1_1b ?>);
                        $('#x1_2a').prop('disabled',false);   
                        $('#x1_2a').val(<?php echo $model->x1_2a ?>);
                        $('#x1_2b').prop('disabled',false);   
                        $('#x1_2b').val(<?php echo $model->x1_2b ?>);
                        $('#x1_3a').prop('disabled',false);   
                        $('#x1_3a').val(<?php echo $model->x1_3a ?>);
                        $('#x1_3b').prop('disabled',false);   
                        $('#x1_3b').val(<?php echo $model->x1_3b ?>);
                        $('#x1_4a').prop('disabled',false);   
                        $('#x1_4a').val(<?php echo $model->x1_4a ?>);
                        $('#x1_4b').prop('disabled',false);   
                        $('#x1_4b').val(<?php echo $model->x1_4b ?>);
                        $('#x1_5a').prop('disabled',false); 
                        $('#x1_5a').val(<?php echo $model->x1_5a ?>);
                        $('#x1_6a').prop('disabled',false);   
                        $('#x1_6a').val(<?php echo $model->x1_6a ?>);
                        $('#x1_6b').prop('disabled',false);   
                        $('#x1_6b').val(<?php echo $model->x1_6b ?>);
                        $('#x1_7a').prop('disabled',false);   
                        $('#x1_7a').val(<?php echo $model->x1_7a ?>);
                        $('#x1_7b').prop('disabled',false);   
                        $('#x1_7b').val(<?php echo $model->x1_7b ?>);
                        $('#x1_8a').prop('disabled',false);   
                        $('#x1_8a').val(<?php echo $model->x1_8a ?>);
                        $('#x1_8b').prop('disabled',false);   
                        $('#x1_8b').val(<?php echo $model->x1_8b ?>);
                        $('#x1_9a').prop('disabled',false);   
                        $('#x1_9a').val(<?php echo $model->x1_9a ?>);
                        $('#x1_9b').prop('disabled',false);   
                        $('#x1_9b').val(<?php echo $model->x1_9b ?>);
                        $('#x1_10a').prop('disabled',false);   
                        $('#x1_10a').val(<?php echo $model->x1_10a ?>);
                        
                        $('#x2_1a').prop('disabled',false);   
                        $('#x2_1a').val(<?php echo $model->x2_1a ?>);
                        $('#x2_2a').prop('disabled',false);   
                        $('#x2_2a').val(<?php echo $model->x2_2a ?>);
                        $('#x2_3a').prop('disabled',false);   
                        $('#x2_3a').val(<?php echo $model->x2_3a ?>);
                        $('#x2_4a').prop('disabled',false);   
                        $('#x2_4a').val(<?php echo $model->x2_4a ?>);
                        $('#x2_5a').prop('disabled',false);   
                        $('#x2_5a').val(<?php echo $model->x2_5a ?>);
                        $('#x2_6a').prop('disabled',false);   
                        $('#x2_6a').val(<?php echo $model->x2_6a ?>);
                        $('#x2_7a').prop('disabled',false);   
                        $('#x2_7a').val(<?php echo $model->x2_7a ?>);
                        $('#x2_9a').prop('disabled',false);   
                        $('#x2_9a').val(<?php echo $model->x2_9a ?>);
                        
                        $('#x3_1a').prop('disabled',false);   
                        $('#x3_1a').val(<?php echo $model->x3_1a ?>);
                        $('#x3_2a').prop('disabled',false);   
                        $('#x3_2a').val(<?php echo $model->x3_2a ?>);
                        $('#x3_3a').prop('disabled',false);   
                        $('#x3_3a').val(<?php echo $model->x3_3a ?>);
                                                                                               
                   }else if($('#x1_1b_podpowiedz').val() == 'Niespełnione kryterium utkania'){
                       
                        $('#x1_1a').val('0');
                        $('#x1_1b').val('0');
                        $('#x1_2a').val('0');
                        $('#x1_2b').val('0');
                        $('#x1_3a').val('0');
                        $('#x1_3b').val('0');
                        $('#x1_4a').val('0');
                        $('#x1_4b').val('0');
                        $('#x1_5a').val('0');
                        
                        $('#x1_6a').val('0');
                        $('#x1_6b').val('0');
                        $('#x1_7a').val('0');
                        $('#x1_7b').val('0');
                        $('#x1_8a').val('0');
                        $('#x1_8b').val('0');
                        $('#x1_9a').val('0');
                        $('#x1_9b').val('0');
                        $('#x1_10a').val('0');
                        
                        $('#x2_1a').val('0');
                        $('#x2_2a').val('0');
                        $('#x2_3a').val('0');
                        $('#x2_4a').val('0');
                        $('#x2_5a').val('0');
                        $('#x2_6a').val('0');
                        $('#x2_7a').val('0');
                        $('#x2_9a').val('0');
                        
                        $('#x3_1a').val('0');
                        $('#x3_2a').val('0');
                        $('#x3_3a').val('0');
                        
//                        ustawHiden();
                                                                                      
                   }  
                        analizuj('1', '#x1_1a', '#x1_1b', '#x1_1c', '#x1_1d', '#x1_1a_podpowiedz', x_1_1_zero, x_1_1_pol, null, null );
                        analizuj('1', '#x1_2a', '#x1_2b', '#x1_2c', '#x1_2d', '#x1_2a_podpowiedz', x_1_2_zero, x_1_2_pol, null, null );
                        analizuj('1', '#x1_3a', '#x1_3b', '#x1_3c', '#x1_3d', '#x1_3a_podpowiedz', x_1_3_zero, x_1_3_pol, null, null );
                        analizuj('1', '#x1_4a', '#x1_4b', '#x1_4c', '#x1_4d', '#x1_4a_podpowiedz', x_1_4_zero, x_1_4_pol, null, null );
                        analizuj('1', '#x1_5a', '#x1_5b', null, null, '#x1_5a_podpowiedz', x_1_5_zero, x_1_5_pol, null, null );
                        analizuj('1', '#x1_6a', '#x1_6b', '#x1_6c', '#x1_6d', '#x1_6a_podpowiedz', x_1_6_zero, x_1_6_pol, null, null );
                        analizuj('1', '#x1_7a', '#x1_7b', '#x1_7c', '#x1_7d', '#x1_7a_podpowiedz', x_1_7_zero, x_1_7_pol, null, null );
                        analizuj('1', '#x1_8a', '#x1_8b', '#x1_8c', '#x1_8d', '#x1_8a_podpowiedz', x_1_8_zero, x_1_8_pol, null, null );
                        analizuj('1', '#x1_9a', '#x1_9b', '#x1_9c', '#x1_9d', '#x1_9a_podpowiedz', x_1_9_zero, x_1_9_pol, null, null );
                        analizuj('1', '#x1_10a', '#x1_10b', null, null, '#x1_10a_podpowiedz', x_1_10_zero, x_1_10_pol, null, null );
                        analizuj('2', '#x2_1a', '#x2_1b', null, null, '#x2_1a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_2a', '#x2_2b', null, null, '#x2_2a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_3a', '#x2_3b', null, null, '#x2_3a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_4a', '#x2_4b', null, null, '#x2_4a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_5a', '#x2_5b', null, null, '#x2_5a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_6a', '#x2_6b', null, null, '#x2_6a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_7a', '#x2_7b', null, null, '#x2_7a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_9a', '#x2_9b', null, null, '#x2_9a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('3', '#x3_1a', '#x3_1b', null, null, '#x3_1a_podpowiedz', x_3_1_jeden, x_3_1_dwa, x_3_1_trzy, x_3_1_cztery );
                        analizuj('3', '#x3_2a', '#x3_2b', null, null, '#x3_2a_podpowiedz', x_3_2_jeden, x_3_2_dwa, x_3_2_trzy, x_3_2_cztery );
                        analizuj('3', '#x3_3a', '#x3_3b', null, null, '#x3_3a_podpowiedz', x_3_3_jeden, x_3_3_dwa, x_3_3_trzy, x_3_3_cztery );
              });            
              
              //-----dla utkania prawego----
               $('#x1_1c_podpowiedz').change(function() {
                  
                   if($('#x1_1c_podpowiedz').val() == 'Spełnione kryterium utkania'){
                       
                        $('#x1_1c').prop('disabled',false);   
                        $('#x1_1c').val(<?php echo $model->x1_1c ?>);
                        $('#x1_1d').prop('disabled',false);   
                        $('#x1_1d').val(<?php echo $model->x1_1d ?>);
                        $('#x1_2c').prop('disabled',false);   
                        $('#x1_2c').val(<?php echo $model->x1_2c ?>);
                        $('#x1_2d').prop('disabled',false);   
                        $('#x1_2d').val(<?php echo $model->x1_2d ?>);
                        $('#x1_3c').prop('disabled',false);   
                        $('#x1_3c').val(<?php echo $model->x1_3c ?>);
                        $('#x1_3d').prop('disabled',false);   
                        $('#x1_3d').val(<?php echo $model->x1_3d ?>);
                        $('#x1_4c').prop('disabled',false);   
                        $('#x1_4c').val(<?php echo $model->x1_4c ?>);
                        $('#x1_4d').prop('disabled',false);   
                        $('#x1_4d').val(<?php echo $model->x1_4d ?>);
                        $('#x1_5b').prop('disabled',false); 
                        $('#x1_5b').val(<?php echo $model->x1_5b ?>);
                        $('#x1_6c').prop('disabled',false);   
                        $('#x1_6c').val(<?php echo $model->x1_6c ?>);
                        $('#x1_6d').prop('disabled',false);   
                        $('#x1_6d').val(<?php echo $model->x1_6d ?>);
                        $('#x1_7c').prop('disabled',false);   
                        $('#x1_7c').val(<?php echo $model->x1_7c ?>);
                        $('#x1_7d').prop('disabled',false);   
                        $('#x1_7d').val(<?php echo $model->x1_7d ?>);
                        $('#x1_8c').prop('disabled',false);   
                        $('#x1_8c').val(<?php echo $model->x1_8c ?>);
                        $('#x1_8d').prop('disabled',false);   
                        $('#x1_8d').val(<?php echo $model->x1_8d ?>);
                        $('#x1_9c').prop('disabled',false);   
                        $('#x1_9c').val(<?php echo $model->x1_9c ?>);
                        $('#x1_9d').prop('disabled',false);   
                        $('#x1_9d').val(<?php echo $model->x1_9d ?>);
                        $('#x1_10b').prop('disabled',false);   
                        $('#x1_10b').val(<?php echo $model->x1_10b ?>);
                        
                        $('#x2_1b').prop('disabled',false);   
                        $('#x2_1b').val(<?php echo $model->x2_1b ?>);
                        $('#x2_2b').prop('disabled',false);   
                        $('#x2_2b').val(<?php echo $model->x2_2b ?>);
                        $('#x2_3b').prop('disabled',false);   
                        $('#x2_3b').val(<?php echo $model->x2_3b ?>);
                        $('#x2_4b').prop('disabled',false);   
                        $('#x2_4b').val(<?php echo $model->x2_4b ?>);
                        $('#x2_5b').prop('disabled',false);   
                        $('#x2_5b').val(<?php echo $model->x2_5b ?>);
                        $('#x2_6b').prop('disabled',false);   
                        $('#x2_6b').val(<?php echo $model->x2_6b ?>);
                        $('#x2_7b').prop('disabled',false);   
                        $('#x2_7b').val(<?php echo $model->x2_7b ?>);
                        $('#x2_9b').prop('disabled',false);   
                        $('#x2_9b').val(<?php echo $model->x2_9b ?>);
                        
                        $('#x3_1b').prop('disabled',false);   
                        $('#x3_1b').val(<?php echo $model->x3_1b ?>);
                        $('#x3_2b').prop('disabled',false);   
                        $('#x3_2b').val(<?php echo $model->x3_2b ?>);
                        $('#x3_3b').prop('disabled',false);   
                        $('#x3_3b').val(<?php echo $model->x3_3b ?>);
                                                                                               
                   }else if($('#x1_1c_podpowiedz').val() == 'Niespełnione kryterium utkania'){
                       
                        $('#x1_1c').val('0');
                        $('#x1_1d').val('0');
                        $('#x1_2c').val('0');
                        $('#x1_2d').val('0');
                        $('#x1_3c').val('0');
                        $('#x1_3d').val('0');
                        $('#x1_4c').val('0');
                        $('#x1_4d').val('0');
                        $('#x1_5b').val('0');
                        
                        $('#x1_6c').val('0');
                        $('#x1_6d').val('0');
                        $('#x1_7c').val('0');
                        $('#x1_7d').val('0');
                        $('#x1_8c').val('0');
                        $('#x1_8d').val('0');
                        $('#x1_9c').val('0');
                        $('#x1_9d').val('0');
                        $('#x1_10b').val('0');
                        
                        $('#x2_1b').val('0');
                        $('#x2_2b').val('0');
                        $('#x2_3b').val('0');
                        $('#x2_4b').val('0');
                        $('#x2_5b').val('0');
                        $('#x2_6b').val('0');
                        $('#x2_7b').val('0');
                        $('#x2_9b').val('0');
                        
                        $('#x3_1b').val('0');
                        $('#x3_2b').val('0');
                        $('#x3_3b').val('0');
                        
//                        ustawHiden();
                                                                                      
                   }  
                        analizuj('1', '#x1_1a', '#x1_1b', '#x1_1c', '#x1_1d', '#x1_1a_podpowiedz', x_1_1_zero, x_1_1_pol, null, null );
                        analizuj('1', '#x1_2a', '#x1_2b', '#x1_2c', '#x1_2d', '#x1_2a_podpowiedz', x_1_2_zero, x_1_2_pol, null, null );
                        analizuj('1', '#x1_3a', '#x1_3b', '#x1_3c', '#x1_3d', '#x1_3a_podpowiedz', x_1_3_zero, x_1_3_pol, null, null );
                        analizuj('1', '#x1_4a', '#x1_4b', '#x1_4c', '#x1_4d', '#x1_4a_podpowiedz', x_1_4_zero, x_1_4_pol, null, null );
                        analizuj('1', '#x1_5a', '#x1_5b', null, null, '#x1_5a_podpowiedz', x_1_5_zero, x_1_5_pol, null, null );
                        analizuj('1', '#x1_6a', '#x1_6b', '#x1_6c', '#x1_6d', '#x1_6a_podpowiedz', x_1_6_zero, x_1_6_pol, null, null );
                        analizuj('1', '#x1_7a', '#x1_7b', '#x1_7c', '#x1_7d', '#x1_7a_podpowiedz', x_1_7_zero, x_1_7_pol, null, null );
                        analizuj('1', '#x1_8a', '#x1_8b', '#x1_8c', '#x1_8d', '#x1_8a_podpowiedz', x_1_8_zero, x_1_8_pol, null, null );
                        analizuj('1', '#x1_9a', '#x1_9b', '#x1_9c', '#x1_9d', '#x1_9a_podpowiedz', x_1_9_zero, x_1_9_pol, null, null );
                        analizuj('1', '#x1_10a', '#x1_10b', null, null, '#x1_10a_podpowiedz', x_1_10_zero, x_1_10_pol, null, null );
                        analizuj('2', '#x2_1a', '#x2_1b', null, null, '#x2_1a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_2a', '#x2_2b', null, null, '#x2_2a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_3a', '#x2_3b', null, null, '#x2_3a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_4a', '#x2_4b', null, null, '#x2_4a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_5a', '#x2_5b', null, null, '#x2_5a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_6a', '#x2_6b', null, null, '#x2_6a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_7a', '#x2_7b', null, null, '#x2_7a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('2', '#x2_9a', '#x2_9b', null, null, '#x2_9a_podpowiedz', x_2_all_zero, x_2_all_jeden, x_2_all_dwa, null );
                        analizuj('3', '#x3_1a', '#x3_1b', null, null, '#x3_1a_podpowiedz', x_3_1_jeden, x_3_1_dwa, x_3_1_trzy, x_3_1_cztery );
                        analizuj('3', '#x3_2a', '#x3_2b', null, null, '#x3_2a_podpowiedz', x_3_2_jeden, x_3_2_dwa, x_3_2_trzy, x_3_2_cztery );
                        analizuj('3', '#x3_3a', '#x3_3b', null, null, '#x3_3a_podpowiedz', x_3_3_jeden, x_3_3_dwa, x_3_3_trzy, x_3_3_cztery );
              });              
              
        </script>
        <script>
                        
        function ustawHiden() {
            if($('#x1_1b_podpowiedz').val() == 'Niespełnione kryterium utkania'){
                $('#x1_1a').prop('disabled',true); 
                $('#x1_1b').prop('disabled',true); 
                $('#x1_2a').prop('disabled',true); 
                $('#x1_2b').prop('disabled',true); 
                $('#x1_3a').prop('disabled',true); 
                $('#x1_3b').prop('disabled',true); 
                $('#x1_4a').prop('disabled',true); 
                $('#x1_4b').prop('disabled',true); 
                $('#x1_5a').prop('disabled',true); 
                $('#x1_6a').prop('disabled',true); 
                $('#x1_6b').prop('disabled',true); 
                $('#x1_7a').prop('disabled',true); 
                $('#x1_7b').prop('disabled',true); 
                $('#x1_8a').prop('disabled',true); 
                $('#x1_8b').prop('disabled',true); 
                $('#x1_9a').prop('disabled',true); 
                $('#x1_9b').prop('disabled',true); 
                $('#x1_10a').prop('disabled',true); 
                $('#x2_1a').prop('disabled',true); 
                $('#x2_2a').prop('disabled',true); 
                $('#x2_3a').prop('disabled',true); 
                $('#x2_4a').prop('disabled',true); 
                $('#x2_5a').prop('disabled',true); 
                $('#x2_6a').prop('disabled',true); 
                $('#x2_7a').prop('disabled',true); 
                $('#x2_9a').prop('disabled',true); 
                $('#x3_1a').prop('disabled',true); 
                $('#x3_2a').prop('disabled',true); 
                $('#x3_3a').prop('disabled',true); 
            }

            if($('#x1_1c_podpowiedz').val() == 'Niespełnione kryterium utkania'){
                $('#x1_1c').prop('disabled',true); 
                $('#x1_1d').prop('disabled',true); 
                $('#x1_2c').prop('disabled',true); 
                $('#x1_2d').prop('disabled',true); 
                $('#x1_3c').prop('disabled',true); 
                $('#x1_3d').prop('disabled',true); 
                $('#x1_4c').prop('disabled',true); 
                $('#x1_4d').prop('disabled',true); 
                $('#x1_5b').prop('disabled',true); 
                $('#x1_6c').prop('disabled',true); 
                $('#x1_6d').prop('disabled',true); 
                $('#x1_7c').prop('disabled',true); 
                $('#x1_7d').prop('disabled',true); 
                $('#x1_8c').prop('disabled',true); 
                $('#x1_8d').prop('disabled',true); 
                $('#x1_9c').prop('disabled',true); 
                $('#x1_9d').prop('disabled',true); 
                $('#x1_10b').prop('disabled',true); 
                $('#x2_1b').prop('disabled',true); 
                $('#x2_2b').prop('disabled',true); 
                $('#x2_3b').prop('disabled',true); 
                $('#x2_4b').prop('disabled',true); 
                $('#x2_5b').prop('disabled',true); 
                $('#x2_6b').prop('disabled',true); 
                $('#x2_7b').prop('disabled',true); 
                $('#x2_9b').prop('disabled',true); 
                $('#x3_1b').prop('disabled',true); 
                $('#x3_2b').prop('disabled',true); 
                $('#x3_3b').prop('disabled',true); 
            }
        
        }
                        
        function policz1(id1, id2, id3, id4, id5, id6, id7, id8, id9, wynikId, sumaId) {
            var wynik = 0;
            var sumaa= 0;
            var sumab= 0;
            
             var val1 = parseFloat($(id1).val());
             var val2 = parseFloat($(id2).val());
             var val3 = parseFloat($(id3).val());
             var val4 = parseFloat($(id4).val());             
             var val5 = parseFloat($(id5).val());
             var val6 = parseFloat($(id6).val());
             var val7 = parseFloat($(id7).val());
             var val8 = parseFloat($(id8).val());
             var val9 = parseFloat($(id9).val());
                           
                    if(val1 >= 0){
                        wynik = wynik+val1;
                    }
                    if(val2 >= 0){
                        wynik = wynik+val2;
                    }
                    if(val3 >= 0){
                        wynik = wynik+val3;
                    }
                    if(val4 >= 0){
                        wynik = wynik+val4;
                    }
                    if(val5 >= 0){
                        wynik = wynik+val5;
                    }
                    if(val6 >= 0){
                        wynik = wynik+val6;
                    }
                    if(val7 >= 0){
                        wynik = wynik+val7;
                    }
                    if(val8 >= 0){
                        wynik = wynik+val8;
                    }
                    if(val9 >= 0){
                        wynik = wynik+val9;
                    }
                   
                $(wynikId).empty();
                $(wynikId).html(wynik);    
                
                //dla wyswitlania lacznej liczby punktow
                var val1_1a = parseFloat($('#wynik_x_1a').text());
                var val1_1b = parseFloat($('#wynik_x_1b').text());
                var val1_2a = parseFloat($('#wynik_x_1c').text());
                var val2_2b = parseFloat($('#wynik_x_1d').text());
                
                if(sumaId != null){
                    if(val1_1a >= 0){
                         sumaa = sumaa+val1_1a;
                    }
                    if(val1_1b >= 0){
                         sumab = sumab+val1_1b;
                    }
                    if(val1_2a >= 0){
                         sumaa = sumaa+val1_2a;
                    }
                    if(val2_2b >= 0){
                         sumab = sumab+val2_2b;
                    }
                
                $("#wynik_x_SUMAa").empty();
                $("#wynik_x_SUMAa").html(sumaa);
                $("#wynik_x_SUMAb").empty();
                $("#wynik_x_SUMAb").html(sumab);
                
                }

             }
        policz1("#x1_1a", "#x1_1b", "#x1_2a", "#x1_2b","#x1_3a", "#x1_3b", "#x1_4a", "#x1_4b", "#x1_5a","#wynik_x_1a","#wynik_x_SUMAa");  
        policz1('#x1_1c', '#x1_1d', '#x1_2c', '#x1_2d','#x1_3c', '#x1_3d', '#x1_4c', '#x1_4d', '#x1_5b','#wynik_x_1b','#wynik_x_SUMAb');
        policz1('#x1_6c', '#x1_6d', '#x1_7c', '#x1_7d','#x1_8c', '#x1_8d', '#x1_9c', '#x1_9d', '#x1_10b','#wynik_x_1d','#wynik_x_SUMAb');
        policz1('#x1_6a', '#x1_6b', '#x1_7a', '#x1_7b','#x1_8a', '#x1_8b', '#x1_9a', '#x1_9b', '#x1_10a','#wynik_x_1c','#wynik_x_SUMAa');
        
        policz1('#x2_1a', '#x2_2a', '#x2_3a', '#x2_4a','#x2_5a', '#x2_6a', '#x2_7a', '#x2_9a', null,'#wynik_x_2a',null);
        policz1('#x2_1b', '#x2_2b', '#x2_3b', '#x2_4b','#x2_5b', '#x2_6b', '#x2_7b', '#x2_9b', null,'#wynik_x_2b',null);
        
        policz1('#x3_1a', '#x3_2a', '#x3_3a', null, null, null, null, null, null,'#wynik_x_3a',null);
        policz1('#x3_1b', '#x3_2b', '#x3_3b', null, null, null, null, null, null,'#wynik_x_3b',null);
        
        ustawHiden();


                $('#x1_1b_podpowiedz').change(function() {
                    if($('#x1_1b_podpowiedz').val() == 'Spełnione kryterium utkania'){
                             $("#x3_1a option[value='0']").hide();
                              $("#x3_2a option[value='0']").hide();
                               $("#x3_3a option[value='0']").hide();
                                        
                    }                                       
              });  
               $('#x1_1c_podpowiedz').change(function() {
                    if($('#x1_1c_podpowiedz').val() == 'Spełnione kryterium utkania'){
                             $("#x3_1b option[value='0']").hide();
                              $("#x3_2b option[value='0']").hide();
                               $("#x3_3b option[value='0']").hide();
                
                    }                                       
              });  
          
        </script>                
        
    
        
       


<?php $this->endWidget(); ?>

</div><!-- form -->