<head>    
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie wyników ośrodków z zaliczonymi parametrami wg województw </h2>
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/gridview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/detalview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/listview/styles.css">
<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
 <style type="text/css">
.moj  {background: "FFFFFF"; font-size: 15px;}
</style>


<?php

$dataProvider = $model->raport_wyniki_w_wojewodztwach(); 
$dataProvider->pagination->pageSize = $model->count();

if(Yii::app()->session['metodaDoRaporty'] == '2'){
    echo "<h2>Wybrano: Analogowe</h2>";
}else if (Yii::app()->session['metodaDoRaporty'] == '3'){
    echo "<h2>Wybrano: Cyfrowe</h2>";
}else {
    echo "<h2>Wybrano: Wszystkie</h2>";
}

$grid = $this->widget('CGridViewPlus', array(
    
            'addingHeaders' => array(
            array(
//                array('text' => '','colspan' => 5, 'options' => array('style' => 'background:white; border-left: 2px solid gray; border-top: 2px solid gray; font-size: 5px; height: 20px;')),
                array('text' => '','colspan' => 3, 'options' => array('style' => 'id="audyty-grid-drukuj_c0"')),
                array('text' => 'Pozycjonowanie','colspan' => 4, 'options' => array('style' => 'background:#6495ED; font-size: 12px;')),
                array('text' => 'Artefakty','colspan' => 4, 'options' => array('style' => 'background: #A9A9A9; font-size: 12px;')),
                array('text' => 'Inne parametry','colspan' => 4, 'options' => array('style' => 'background:#008B8B; font-size: 12px;')),
                array('text' => 'Etykieta','colspan' => 2, 'options' => array('style' => 'background:#483D8B; font-size: 12px;')),               
                
            ),
            array(
                array('text' => '','colspan' => 3, 'options' => array('style' => 'id="audyty-grid-drukuj_c0"')),
                array('text' => 'Gruczołowe','colspan' => 2, 'options' => array('style' => 'background:#DB7093; font-size: 12px;')),
                array('text' => 'Tłuszczowe','colspan' => 2, 'options' => array('style' => 'background:#CD853F; font-size: 12px;')),
                array('text' => 'Gruczołowe','colspan' => 2, 'options' => array('style' => 'background:#DB7093; font-size: 12px;')),
                array('text' => 'Tłuszczowe','colspan' => 2, 'options' => array('style' => 'background:#CD853F; font-size: 12px;')),
                array('text' => 'Gruczołowe','colspan' => 2, 'options' => array('style' => 'background:#DB7093; font-size: 12px;')),
                array('text' => 'Tłuszczowe','colspan' => 2, 'options' => array('style' => 'background:#CD853F; font-size: 12px;')),
                array('text' => '','colspan' => 2, 'options' => array('style' => 'id="audyty-grid-drukuj_c0"')), 
                
//                array('text' => '','colspan' => 6, 'options' => array('style' => 'id="audyty-grid-drukuj_c0"')),
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
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
                
//                'footer'=>$model->liczba_osrodkow,
//                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
        array(
                'name' => 'liczba_osrodkow',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->liczba_osrodkow',
//                'footer'=>'Średnia suma:: '.$model->getTotal($dataProvider->getData(), 'liczba_osrodkow'),
           ),    
            
        array(                
                'header' => 'Liczba zal.',
                'value'=>'$data->getMyParamtery($data->getMyIdWojewodztwa(), "poz_L")',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyParamtery($data->getMyIdWojewodztwa(), "poz_L")/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => 'Liczba zal.',
                'value'=>'$data->getMyParamtery($data->getMyIdWojewodztwa(), "poz_P")',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyParamtery($data->getMyIdWojewodztwa(), "poz_P")/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => 'Liczba zal.',
                'value'=>'$data->getMyParamtery($data->getMyIdWojewodztwa(), "art_L")',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyParamtery($data->getMyIdWojewodztwa(), "art_L")/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => 'Liczba zal.',
                'value'=>'$data->getMyParamtery($data->getMyIdWojewodztwa(), "art_P")',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyParamtery($data->getMyIdWojewodztwa(), "art_P")/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => 'Liczba zal.',
                'value'=>'$data->getMyParamtery($data->getMyIdWojewodztwa(), "inne_L")',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyParamtery($data->getMyIdWojewodztwa(), "inne_L")/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => 'Liczba zal.',
                'value'=>'$data->getMyParamtery($data->getMyIdWojewodztwa(), "inne_P")',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyParamtery($data->getMyIdWojewodztwa(), "inne_P")/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => 'Liczba zal.',
                'value'=>'$data->getMyParamtery($data->getMyIdWojewodztwa(), "ety")',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyParamtery($data->getMyIdWojewodztwa(), "ety")/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),

	),
)); 


?>



