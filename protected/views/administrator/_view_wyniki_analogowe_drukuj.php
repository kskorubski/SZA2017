<?php
/* @var $this EtykietaAnalogowaController */
/* @var $model EtykietaAnalogowa */
/* @var $form CActiveForm */
?>
<p align="right"><b><?php echo date('Y-m-d'); ?></b></p>
<?php 
    $status_odwolania = Audyty::model()->findByPk(Yii::app()->session['wyniki-analogowe-id-audytu'])->status_odwolania; 
    if($status_odwolania == 2){      
        echo "<h3>Podsumowanie wyników oceny mammogramu - metoda analogowa - <b>ODWOŁANIE</b></h3>";
    }else {   
       echo "<h3>Podsumowanie wyników oceny mammogramu - metoda analogowa</h3>";
    }
?>

<h5>Identyfikator zestawu: <?php echo Audyty::model()->findByPk(Yii::app()->session['wyniki-analogowe-id-audytu'])->identyfikator_zestawu; ?></h5>
<br />
<div class="form">
<?php // include_once "TWynikiAudytow.php"; ?>  
<?php // include_once 'TWynikiAudytowTeksty.php'; ?>
<?php $wynikiAudytow = new TWynikiAudytow($model2, $model, 'analogowa'); ?>
<?php 
$id_osrodka = Audyty::model()->findByPk(Yii::app()->session['wyniki-analogowe-id-audytu'])->osrodek_id;
$this->widget('zii.widgets.CDetailView', array(
//	'data'=> (new PDF_Osrodek())->model_osrodka_dla_id_audytu(Yii::app()->session['ankieta-id-audytu']),
	'data'=> (Osrodki::model()->findByPk($id_osrodka)), 
	'attributes'=>array(
              'nazwa' ,
                'adres',
                'kod',
                'miasto',
            )));
?>    
</div>
<br />
<br />
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0; width: 650px;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-pre4{font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;color:#3531ff}
.tg .tg-kihn{background-color:#ecf4ff;font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;color:#3531ff}
.tg .tg-kihnC{background-color:#ecf4ff;font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;color:#3531ff;text-align:center;}
.tg .tg-ikdt{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;background-color:#f56b00;text-align:center}
.tg .tg-ikdt-male{font-weight:bold;font-size:13px;font-family:Arial, Helvetica, sans-serif !important;;background-color:#f56b00;text-align:center}
.tg .tg-t5k3{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;background-color:#26ade4;text-align:center}
.tg .tg-8o21{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-8o21C{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important; text-align: center;}
.tg .tg-6dx4{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;background-color:#f8ff00;text-align:center;}
.tg .tg-6dx4-male{font-weight:bold;font-size:13px;font-family:Arial, Helvetica, sans-serif !important;;background-color:#f8ff00;text-align:center;}
.tg .tg-vk2n{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;background-color:#26ade4}
.tg .tg-yqef{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;color:#963400}
.tg .tg-yqefC{font-weight:bold;font-size:15px;font-family:Arial, Helvetica, sans-serif !important;;color:#963400;text-align:center;}
.tg .tg-ci37{background-color:#ecf4ff;text-align:center}
.tg .tg-a1rn{background-color:#ffffc7;font-size: 10px;}
.tg .tg-a2rn{background-color:#ffffc7; font-size: 10px;}
.tg .tg-a3rn{background-color:#ffffc7; font-size: 15px; text-align: center;}
.tg .tg-k6pi{font-size:12px; text-align: left;}
#red{font-size:18px; text-align: center; font-weight: bold; color: red;}
#green{font-size:18px; text-align: center; font-weight: bold; color: green;}
</style>
<table class="tg">
  <tr>
    <td class="tg-8o21" colspan="3">1. Pozycjonowanie</td>
  </tr>
  <tr>
      <td class="tg-a2rn" ></td>
    <th class="tg-a2rn"><?php echo $wynikiAudytow->getUtkanie_L(); ?></th>
    <th class="tg-a2rn"><?php echo $wynikiAudytow->getUtkanie_P();; ?></th> 
  </tr>
  <tr>  
    <td class="tg-8o21" ></td>
    <!--<th class="tg-ikdt-male">Piersi z przewagą tkanki gruczołowej</th>-->
    <!--<th class="tg-6dx4-male">Piersi o dużej zawartości tkanki tłuszczowej</th>-->
    <th class="tg-ikdt-male">Pierś gruczołowa</th>
    <th class="tg-6dx4-male">Pierś tłuszczowa</th>
  </tr>  
  <tr>
    <td class="tg-t5k3" colspan="3">Projekcja skośna</td>
  </tr>
  <tr>
    <td class="tg-kihn">Uzyskana liczba punktów</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_skosna_uzyskana_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_skosna_uzyskana_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-8o21">Maksymalna liczba punktów</td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getPOZ_SKOSNA_MAX_L(); ?></td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getPOZ_SKOSNA_MAX_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-t5k3" colspan="3">Projekcja kraniokaudalna</td>
  </tr>
  <tr>
    <td class="tg-kihn">Uzyskana liczba punktów</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_kranio_uzyskana_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_kranio_uzyskana_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-8o21">Maksymalna liczba punktów</td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getPOZ_KRANIO_MAX_L(); ?></td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getPOZ_KRANIO_MAX_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-vk2n" colspan="3"></td>
  </tr>
  <tr>
    <td class="tg-kihn">Uzyskana łączna liczba punktów</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_suma_uzyskana_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_suma_uzyskana_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-8o21">Maksymalna łączna liczba punktów</td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getPOZ_SUMA_MAX_L(); ?></td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getPOZ_SUMA_MAX_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-yqef">Uzyskana łączna liczba punktów [%]</td>
    <td class="tg-yqefC"><?php echo $wynikiAudytow->getPoz_suma_uzyskana_percent_L()."%"; ?></td>
    <td class="tg-yqefC"><?php echo $wynikiAudytow->getPoz_suma_uzyskana_percent_P()."%"; ?></td>
  </tr>
<!-- v2017 nie wyswietlamy czy zaliczono -->
<!--  <tr>
    <td class="tg-kihn">Zaliczono</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_zaliczono_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getPoz_zaliczono_P(); ?></td>
  </tr>-->

</table>
<pagebreak />
<table class="tg">
  <tr>
    <td class="tg-8o21" colspan="3">2. Artefakty</td>
  </tr>
  <tr>
    <td class="tg-a2rn" ></td>
    <th class="tg-a2rn"><?php echo $wynikiAudytow->getUtkanie_L(); ?></th>
    <th class="tg-a2rn"><?php echo $wynikiAudytow->getUtkanie_P();; ?></th> 
  </tr>
  <tr>  
    <th class="tg-k6pi">Elementy znajdowane na zdjęciu mammograficznym, które nie mają związku ze strukturami anatomicznymi piersi i/lub występują na kliszy poza obrazem.</th>
    <!--<th class="tg-ikdt-male">Piersi z przewagą tkanki gruczołowej</th>-->
    <!--<th class="tg-6dx4-male">Piersi o dużej zawartości tkanki tłuszczowej</th>-->
    <th class="tg-ikdt-male">Pierś gruczołowa</th>
    <th class="tg-6dx4-male">Pierś tłuszczowa</th>
  </tr>
  <tr>
    <td class="tg-kihn">Uzyskana łączna liczba punktów</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getArt_uzyskana_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getArt_uzyskana_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-8o21">Maksymalna łączna liczba punktów</td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getART_MAX_ANALOG_L(); ?></td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getART_MAX_ANALOG_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-yqef">Uzyskana łączna liczba punktów [%]</td>
    <td class="tg-yqefC"><?php echo $wynikiAudytow->getArt_uzyskana_percent_L()."%"; ?></td>
    <td class="tg-yqefC"><?php echo $wynikiAudytow->getArt_uzyskana_percent_P()."%"; ?></td>
  </tr>
<!-- v2017 nie wyswietlamy czy zaliczono -->  
<!--  <tr>
    <td class="tg-kihn">Zaliczono</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getArt_zaliczono_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getArt_zaliczono_P(); ?></td>
  </tr>-->

</table>
<br /><br />
<table class="tg">
  <tr>
    <td class="tg-8o21" colspan="3">3. Inne parametry oceny mammogramów</td>
  </tr>
  <tr>
    <td class="tg-a2rn" ></td>
    <th class="tg-a2rn"><?php echo $wynikiAudytow->getUtkanie_L(); ?></th>
    <th class="tg-a2rn"><?php echo $wynikiAudytow->getUtkanie_P();; ?></th> 
  </tr>
  <tr>  
    <th class="tg-k6pi">Ekspozycja, kontrast, ostrość</th>
    <!--<th class="tg-ikdt-male">Piersi z przewagą tkanki gruczołowej</th>-->
    <!--<th class="tg-6dx4-male">Piersi o dużej zawartości tkanki tłuszczowej</th>-->
    <th class="tg-ikdt-male">Pierś gruczołowa</th>
    <th class="tg-6dx4-male">Pierś tłuszczowa</th>
  </tr>
  <tr>
    <td class="tg-kihn">Uzyskana łączna liczba punktów</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getInne_uzyskana_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getInne_uzyskana_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-8o21">Maksymalna łączna liczba punktów</td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getINNE_MAX_L(); ?></td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getINNE_MAX_P(); ?></td>
  </tr>
  <tr>
    <td class="tg-yqef">Uzyskana łączna liczba punktów [%]</td>
    <td class="tg-yqefC"><?php echo $wynikiAudytow->getInne_uzyskana_percent_L()."%"; ?></td>
    <td class="tg-yqefC"><?php echo $wynikiAudytow->getInne_uzyskana_percent_P()."%"; ?></td>
  </tr>
<!-- v2017 nie wyswietlamy czy zaliczono -->  
<!--  <tr>
    <td class="tg-kihn">Zaliczono</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getInne_zaliczono_L(); ?></td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getInne_zaliczono_P(); ?></td>
  </tr>-->

</table>
<pagebreak />
<table class="tg">
  <tr>
    <td class="tg-8o21" colspan="2">4. Etykieta mammogramu</td>
  </tr>
  <tr>  
    <th class="tg-k6pi"></th>
    <th class="tg-ikdt">Dane na etykiecie</th>
  </tr>
  <tr>
    <td class="tg-kihn">Uzyskana łączna liczba punktów</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getEty_uzyskana(); ?></td>
  </tr>
  <tr>
    <td class="tg-8o21">Maksymalna łączna liczba punktów</td>
    <td class="tg-8o21C"><?php echo $wynikiAudytow->getETY_MAX_ANALOG(); ?></td>
  </tr>
  <tr>
    <td class="tg-yqef">Uzyskana łączna liczba punktów [%]</td>
    <td class="tg-yqefC"><?php echo $wynikiAudytow->getEty_uzyskana_percent()."%"; ?></td>
  </tr>
<!-- v2017 nie wyswietlamy czy zaliczono -->  
<!--  <tr>
    <td class="tg-kihn">Zaliczono</td>
    <td class="tg-kihnC"><?php echo $wynikiAudytow->getEty_zaliczono(); ?></td>
  </tr>-->
</table>
<br /><br />
<table class="tg">
  <tr>
      <td class="tg-a2rn">
          <b>Kryteria zaliczeń:</b><br />
          <!-- v2017 nie wyswietlamy czy zaliczono -->
            <!--zaliczone pozycjonowanie -  6 pkt dodatkowo<br />-->
            <!--zaliczone artefakty - 5 pkt dodatkowo<br />-->
            <!--zaliczone inne parametry - 5 pkt dodatkowo<br />-->
            <!--zaliczona etykieta - 3 pkt dodatkowo<br />-->
            <br />
            zaliczony - ( >= 112,7 pkt,  >= 70 %)<br />
            niezaliczony -  ( < 112,7 pkt,  < 70 %)<br />
      </td> 
      <td class="tg-a3rn">
          Uzyskana łączna liczba punktów (bez etykiety): <b><?php echo $wynikiAudytow->getUzyskana_razem_wagi(); ?></b> na <b><?php echo $wynikiAudytow->getMax_razem_wagi(); ?></b><br />  
          <b><?php echo $wynikiAudytow->getUzyskana_razem_percent()."%"; ?></b><br /><br />
            <?php
            $zaliczono = $wynikiAudytow->czy_zaliczono();
            if($zaliczono == true){
                echo "<div id='green'>Zaliczono</div><br />";
            }else if($zaliczono == false){
                echo "<div id='red'>Nie zaliczono</div><br />";
            }
                
            ?>
            
      </td>
  </tr>
</table>


