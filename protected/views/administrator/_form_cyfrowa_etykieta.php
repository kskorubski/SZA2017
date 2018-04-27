<?php
/* @var $this EtykietaCyfrowaController */
/* @var $model EtykietaCyfrowa */
/* @var $form CActiveForm */
?>
<h1>Arkusz oceny klinicznej mammogramu (ETYKIETA) - Metoda Cyfrowa</h1>
<h3>Identyfikator zestawu: <?php echo Audyty::model()->findByPk(Yii::app()->session['etykieta-cyfrowa-id-audytu'])->identyfikator_zestawu; ?></h3>
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

	<p class="note"><span class="required">Wszystkie pola dotyczące punktancji są wymagane!</span></p>

	<?php echo $form->errorSummary($model); ?>
        
        <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
.tg .tg-eyl8{font-weight:bold;background-color:#ecf4ff}
.tg .tg-yzpx{background-color:#26ade4}
.tg .tg-5y5n{background-color:#ecf4ff}
.tg .tg-kcd4{font-size:15px;background-color:#ffffff;color:#444444;text-align:center}
.tg .tg-7khl{font-size:15px}
.tg .tg-v79x{font-weight:bold;font-size:20px;background-color:#ffffff;color:#444444}
.tg .tg-3sk9{font-weight:bold;font-size:12px;background-color:#ffffff}
.tg .tg-la71{font-weight:bold;font-size:15px;background-color:#ffffff;text-align:center}
.tg .tg-in7r{font-weight:bold;font-size:15px;background-color:#26ade4;text-align:center}
.tg .tg-36xf{font-weight:bold;background-color:#bbdaff}
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
    <td class="tg-3sk9">Punktacja: 0 - 1 pkt.</td>
    <td class="tg-la71">Punkty</td>
  </tr>
  <tr>
    <td class="tg-in7r" colspan="2">Dane na etykiecie</td>
  </tr>
  <tr>
    <td class="tg-7khl">Imię i nazwisko *</td>
    <td class="tg-s6z2">
                <?php // echo $form->labelEx($model,'x4_1'); ?>
		<?php // echo $form->textField($model,'x4_1', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_1',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_1')); ?>
		<?php echo $form->error($model,'x4_1'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Numer identyfikacyjny (przynależny do danej pacjentki) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_2'); ?>
		<?php // echo $form->textField($model,'x4_2', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_2',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_2')); ?>
		<?php echo $form->error($model,'x4_2'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Dodatkowy numer identyfikacyjny (PESEL lub data urodzenia pacjentki) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_3'); ?>
		<?php // echo $form->textField($model,'x4_3', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_3',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_3')); ?>
		<?php echo $form->error($model,'x4_3'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Nazwa placówki *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_4'); ?>
		<?php // echo $form->textField($model,'x4_4', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_4',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_4')); ?>
		<?php echo $form->error($model,'x4_4'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Data badania *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_5'); ?>
		<?php // echo $form->textField($model,'x4_5', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_5',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_5')); ?>
		<?php echo $form->error($model,'x4_5'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Oznaczenie strony (L / P) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_6'); ?>
		<?php // echo $form->textField($model,'x4_6', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_6',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_6')); ?>
		<?php echo $form->error($model,'x4_6'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Rodzaj projekcji *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_7'); ?>
		<?php // echo $form->textField($model,'x4_7', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_7',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_7')); ?>
		<?php echo $form->error($model,'x4_7'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Identyfikator technika *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_8'); ?>
		<?php // echo $form->textField($model,'x4_8', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_8',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_8')); ?>
		<?php echo $form->error($model,'x4_8'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Dodatkowe oznaczenie strony *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_9'); ?>
		<?php // echo $form->textField($model,'x4_9', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_9',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_9')); ?>
		<?php echo $form->error($model,'x4_9'); ?>
    </td>
  </tr>
  <tr> 
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37"><b><div id="wynik_x_1"></div></b></td>
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
                <?php echo $form->dropDownList($model,'x4_10',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_10')); ?>
		<?php echo $form->error($model,'x4_10'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Obciążenie prądowe - czasowe (mAs) *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_11'); ?>
		<?php // echo $form->textField($model,'x4_11', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_11',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_11')); ?>
		<?php echo $form->error($model,'x4_11'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Rodzaj anodyfiltru *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_12'); ?>
		<?php // echo $form->textField($model,'x4_12', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_12',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_12')); ?>
		<?php echo $form->error($model,'x4_12'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Siła kompresji *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_13'); ?>
		<?php // echo $form->textField($model,'x4_13', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_13',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_13')); ?>
		<?php echo $form->error($model,'x4_13'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Grubość piersi po kompresji *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_14'); ?>
		<?php // echo $form->textField($model,'x4_14', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_14',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_14')); ?>
		<?php echo $form->error($model,'x4_14'); ?>
    </td>
  </tr>
  <tr>
    <td class="tg-7khl">Kąt lampy dla projekcji skośnej *</td>
    <td class="tg-w5vg">
                <?php // echo $form->labelEx($model,'x4_15'); ?>
		<?php // echo $form->textField($model,'x4_15', array('size'=>2,'maxlength'=>1)); ?>
                <?php echo $form->dropDownList($model,'x4_15',array(''=>'','0'=>'0','1'=>'1'),array('style'=>'width:50px','id'=>'x4_15')); ?>
		<?php echo $form->error($model,'x4_15'); ?>
    </td>
  </tr>
  <tr> 
    <td class="tg-eyl8">Uzyskana liczba punktów</td>
    <td class="tg-ci37"><b><div id="wynik_x_2"></div></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna liczba punktów</td>
    <td class="tg-ltqa"><b>6</b></td>
  </tr>
  <tr>
    <td class="tg-yzpx" colspan="2"></td>
  </tr>
  <tr>
    <td class="tg-eyl8">Uzyskana łączna liczba punktów</td>
    <td class="tg-ci37"><b><div id="wynik_x_SUMA"></div></b></td>
  </tr>
  <tr>
    <td class="tg-36xf">Maksymalna łączna liczba punktów</td>
    <td class="tg-ltqa"><b>15</b></td>
  </tr>
</table>
                <?php echo $form->hiddenField($model,'AudytyID', array('value'=>Yii::app()->session['etykieta-cyfrowa-id-audytu'])); ?>

        <div class="row buttons">
		<?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                <?php echo CHtml::submitButton('Zapisz etykietę'); ?>
                <?php
                if(!$model->isNewRecord){
                     echo CHtml::button('Drukuj', array( 'submit' => Yii::app()->createUrl("/administrator/drukujCyfrowaEtykieta" , array("id" => $model->id)) ));
                }
                ?>
                <?php echo CHtml::button('Powrót', array( 'submit' => Yii::app()->createUrl("/administrator/aud_etykiety")  )); ?>
	</div>
        <div id="flip"><b>Kliknij aby pokazać legendę</b></div>
        <div id="panel">
            <p><b>LEGENDA:</b></p>

            <b>Dane na etykiecie:</b><br />
            1 pkt – jest,<br />
            0 pkt – brak.<br /><br />

            <b>Parametry ekspozycji:</b><br />
            1 pkt – jest,<br />
            0 pkt – brak.<br /><br /> 

        </div>
        <script>
        $(document).ready(function(){
          $("#flip").click(function(){             
            $("#panel").slideDown("slow");
          });
        });
        </script>
        <script>
            
            policz();
            policz2();
        
        $('#x4_1').change(function() {
            policz();
        });
        $('#x4_2').change(function() {
            policz();
        });
        $('#x4_3').change(function() {
            policz();
        });
        $('#x4_4').change(function() {
            policz();
        });        
        $('#x4_5').change(function() {
            policz();
        });
        $('#x4_6').change(function() {
            policz();
        });
        $('#x4_7').change(function() {
            policz();
        });
        $('#x4_8').change(function() {
            policz();
        });
        $('#x4_9').change(function() {
            policz();
        });
        
        $('#x4_10').change(function() {
            policz2();
        });
        $('#x4_11').change(function() {
            policz2();
        });
        $('#x4_12').change(function() {
            policz2();
        });
        $('#x4_13').change(function() {
            policz2();
        });
        $('#x4_14').change(function() {
            policz2();
        });        
        $('#x4_15').change(function() {
            policz2();
        });
        
         function policz() {
            var wynik = 0;
             var val1 = parseInt($('#x4_1').val());
              var val2 = parseInt($('#x4_2').val());
               var val3 = parseInt($('#x4_3').val());
                var val4 = parseInt($('#x4_4').val());
                 var val5 = parseInt($('#x4_5').val());
                  var val6 = parseInt($('#x4_6').val());
                   var val7 = parseInt($('#x4_7').val());
                    var val8 = parseInt($('#x4_8').val());
                     var val9 = parseInt($('#x4_9').val());                                      
                                                     
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
                   
                $("#wynik_x_1").empty();
                $("#wynik_x_1").html(wynik);    
                
                //dla wyswitlania lacznej liczby punktow
                var val1_1 = parseInt($('#wynik_x_1').text());
                 var val2_1 = parseInt($('#wynik_x_2').text());
                  
                var suma = val1_1+val2_1;
                $("#wynik_x_SUMA").empty();
                $("#wynik_x_SUMA").html(suma);
             }
             
        function policz2() {
            var wynik = 0;
             var val10 = parseInt($('#x4_10').val());
              var val11 = parseInt($('#x4_11').val());
               var val12 = parseInt($('#x4_12').val());
                var val13 = parseInt($('#x4_13').val());
                 var val14 = parseInt($('#x4_14').val());
                  var val15 = parseInt($('#x4_15').val());                
                                                     
                    if(val10 >= 0){
                        wynik = wynik+val10;
                    }
                    if(val11 >= 0){
                        wynik = wynik+val11;
                    }
                    if(val12 >= 0){
                        wynik = wynik+val12;
                    }
                    if(val13 >= 0){
                        wynik = wynik+val13;
                    }
                    if(val14 >= 0){
                        wynik = wynik+val14;
                    }
                    if(val15 >= 0){
                        wynik = wynik+val15;
                    }                  
                 
                $("#wynik_x_2").empty();
                $("#wynik_x_2").html(wynik);    
                                                                                                                                              
                 //dla wyswitlania lacznej liczby punktow
                var val1_1 = parseInt($('#wynik_x_1').text());
                 var val2_1 = parseInt($('#wynik_x_2').text());
                  
                var suma = val1_1+val2_1;
                $("#wynik_x_SUMA").empty();
                $("#wynik_x_SUMA").html(suma);
             }
             
        </script>
	

<?php $this->endWidget(); ?>

</div><!-- form -->