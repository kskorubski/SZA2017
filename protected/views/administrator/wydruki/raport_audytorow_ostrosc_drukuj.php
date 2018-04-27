<head>    
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
<link rel="stylesheet" type="text/css" href="css/screen.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie ostrości ocen audytorów</h2>
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/gridview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/detalview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/listview/styles.css">
<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
 <style type="text/css">
.moj  {background: "FFFFFF"; font-size: 15px;}
</style>

<?php

$dataProvider = $model->search(); 
$dataProvider->pagination->pageSize = $model->count();

if(Yii::app()->session['metodaDoRaporty'] == '2'){
    echo "<h2>Wybrano: Analogowe</h2>";
}else if (Yii::app()->session['metodaDoRaporty'] == '3'){
    echo "<h2>Wybrano: Cyfrowe</h2>";
}else {
    echo "<h2>Wybrano: Wszystkie</h2>";
}

$srednia_pkt_suma = 0;

$grid = $this->widget('CGridViewPlus', array(
    
    'addingHeaders' => array(
            array(
                array('text' => '','colspan' => 6, 'options' => array('style' => 'background: #778899; height: 5px;')),
                array('text' => 'Pozycjonowanie','colspan' => 4, 'options' => array('style' => 'background:#6495ED; font-size: 10px; text-align: center;  height: 5px;')),
                array('text' => 'Artefakty','colspan' => 2, 'options' => array('style' => 'background: #A9A9A9; font-size: 10px; text-align: center;  height: 5px;')),
                array('text' => 'Inne parametry','colspan' => 2, 'options' => array('style' => 'background:#008B8B; font-size: 10px; text-align: center;  height: 5px;')),    
            ),
            array(
                array('text' => '','colspan' => 6, 'options' => array('style' => 'background: #778899; height: 5px;')),  //id="audyty-grid-drukuj_c0 - kolor tabeli header
                array('text' => 'Gruczołowe','colspan' => 2, 'options' => array('style' => 'background:#DB7093; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Tłuszczowe','colspan' => 2, 'options' => array('style' => 'background:#CD853F; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Gruczołowe','colspan' => 1, 'options' => array('style' => 'background:#DB7093; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Tłuszczowe','colspan' => 1, 'options' => array('style' => 'background:#CD853F; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Gruczołowe','colspan' => 1, 'options' => array('style' => 'background:#DB7093; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Tłuszczowe','colspan' => 1, 'options' => array('style' => 'background:#CD853F; font-size: 10px; text-align: center; height: 5px;')),
            )),

	'id'=>'audyty-grid-drukuj',
	'dataProvider'=> $dataProvider,  
	
//	'filter'=> $model, 
        'enableSorting'=>false,        
    	'enablePagination' => false, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>true, 
	'columns'=> array(
            
        array(
                'header'=>'Lp.',
                'value'=>'$this->grid->dataProvider->pagination->currentPage*
                          $this->grid->dataProvider->pagination->pageSize + $row+1',
                          'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                ),
        array(
                'name' => 'nazwisko',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->nazwisko',
//                'footer'=>'Średnia suma:: '.$model->getTotal($dataProvider->getData(), 'liczba_osrodkow'),
           ), 
        array(
                'name' => 'imie',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->imie', 
                
//                'footer'=>$model->liczba_osrodkow,
//                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
        array(
                'name' => 'username',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->username', 
                
//                'footer'=>$model->liczba_osrodkow,
//                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
        array(
                'name' => 'nazwa_zespolu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->nazwa_zespolu',                              
           ),
        
        array(
                'name' => 'audyty_oceniane',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->audyty_oceniane',
//                'footer'=>'Średnia suma:: '.round($model->getTotal2($dataProvider->getData(), 'id_woj', 1),2),
           ), 
        array(
                'header' => 'Projekcja skośna max[9]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("poz_skosna_L")',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 1),2),
           ),
        array(
                'header' => 'Projekcja kraniokaudalna max[9]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("poz_kranio_L")',                             
           ),
        array(
                'header' => 'Projekcja skośna max[9]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("poz_skosna_P")',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 1),2),
           ),
        array(
                'header' => 'Projekcja kraniokaudalna max[9]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("poz_kranio_P")',                             
           ),
        array(
                'header' => 'Projekcja skośna max[27]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("art_L")',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 1),2),
           ),
        array(
                'header' => 'Projekcja kraniokaudalna max[27]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("art_P")',                             
           ),
        array(
                'header' => 'Projekcja skośna max[15]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("inne_L")',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 1),2),
           ),
        array(
                'header' => 'Projekcja kraniokaudalna max[15]',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->getMyOcenyOstrosc("inne_P")',                             
           ),
        
	),
)); 

echo "<h2>Zestawienie ostrości ocen dla etykiety</h2>";
?>
<table class="items">
    <tr>
        <th id="naglowek_table">Liczba ocenionych etykiet</th><th id="naglowek_table">Etykieta (analogowe)</th><th id="naglowek_table">Dane na etykiecie</th><th id="naglowek_table">Pozostałe paramtery</th><th id="naglowek_table">Etykieta całość</th>
    </tr>
    <tr>
        <td id="row_tabeli"><?php echo $model->getMyOcenyOstroscEtykieta('liczbaEtykiet'); ?></td><td id="row_tabeli"><?php echo $model->getMyOcenyOstroscEtykieta('ety_etykieta'); ?></td><td id="row_tabeli"><?php echo $model->getMyOcenyOstroscEtykieta('ety_dane_na_etykiecie'); ?></td><td id="row_tabeli"><?php echo $model->getMyOcenyOstroscEtykieta('ety_parametry_ekspozycji'); ?></td><td id="row_tabeli"><?php echo $model->getMyOcenyOstroscEtykieta('ety_uzyskane'); ?></td>
    </tr>
</table>
