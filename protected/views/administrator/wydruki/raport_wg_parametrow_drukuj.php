<head>    
<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie wyników ośrodków wg poszczególnych parametrów</h2>
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/gridview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/detalview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/listview/styles.css">
 <style type="text/css">
    .moj  {background: "FFFFFF"; font-size: 15px;}
</style>
<?php

$dataProvider = $model->raport_wg_punktacji();  
//$dataProvider->getPagination()->setPageSize(100); 
$dataProvider->pagination->pageSize = $model->count();

$grid = $this->widget('CGridViewPlus', array(
    'addingHeaders' => array(
            array(
//                array('text' => '','colspan' => 5, 'options' => array('style' => 'background:white; border-left: 2px solid gray; border-top: 2px solid gray; font-size: 5px; height: 20px;')),
                array('text' => '','colspan' => 5, 'options' => array('style' => 'background: #778899; height: 5px;')),
                array('text' => 'Pozycjonowanie','colspan' => 6, 'options' => array('style' => 'background:#6495ED; font-size: 10px; text-align: center;  height: 5px;')),
                array('text' => 'Artefakty','colspan' => 6, 'options' => array('style' => 'background: #A9A9A9; font-size: 10px; text-align: center;  height: 5px;')),
                array('text' => 'Inne parametry','colspan' => 6, 'options' => array('style' => 'background:#008B8B; font-size: 10px; text-align: center;  height: 5px;')),
                array('text' => '','colspan' => 3, 'options' => array('style' => 'background:#483D8B; font-size: 10px; text-align: center;  height: 5px;')),
                array('text' => '','colspan' => 6, 'options' => array('style' => 'background: #778899;  height: 5px;')),           
                
            ),
            array(
                array('text' => '','colspan' => 5, 'options' => array('style' => 'background: #778899; height: 5px;')),  //id="audyty-grid-drukuj_c0 - kolor tabeli header
                array('text' => 'Gruczołowe','colspan' => 3, 'options' => array('style' => 'background:#DB7093; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Tłuszczowe','colspan' => 3, 'options' => array('style' => 'background:#CD853F; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Gruczołowe','colspan' => 3, 'options' => array('style' => 'background:#DB7093; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Tłuszczowe','colspan' => 3, 'options' => array('style' => 'background:#CD853F; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Gruczołowe','colspan' => 3, 'options' => array('style' => 'background:#DB7093; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Tłuszczowe','colspan' => 3, 'options' => array('style' => 'background:#CD853F; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => 'Etykieta','colspan' => 3, 'options' => array('style' => 'background:#483D8B; font-size: 10px; text-align: center; height: 5px;')),
                array('text' => '','colspan' => 6, 'options' => array('style' => 'background: #778899; height: 5px;')), //#A9A9A9
            )),
	'id'=>'audyty-grid-drukuj',
	'dataProvider'=> $dataProvider,
	
//	'filter'=> $model,
        'enableSorting'=>false,
    	'enablePagination' => false, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>true, 
        'emptyText' => 'Brak danych.', 
    
	'columns'=> array(
            
        array(
                'header'=>'Lp.',
                'value'=>'$this->grid->dataProvider->pagination->currentPage*
                          $this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
        array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->osrodek->nazwa',
//            'footer' => 'nazwa',
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),   
            
        array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->osrodek->miasto',
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
           ),  
        array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
        array(
                'name' => 'identyfikator_zestawu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'value'=>'$data->identyfikator_zestawu',
                ), 
        
         array(
                
                'header' => 'pkt',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'poz_grucz_pkt\']),($data->getMyWynikiParametrow()[\'poz_grucz_pkt\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-left:2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),  
                'filter'=>false,
                
                ),          
         array(
                
                'header' => '(%)',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'poz_grucz_procent\']),($data->getMyWynikiParametrow()[\'poz_grucz_procent\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'zal',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'poz_grucz_zal\']),($data->getMyWynikiParametrow()[\'poz_grucz_zal\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'pkt',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'poz_tluszcz_pkt\']),($data->getMyWynikiParametrow()[\'poz_tluszcz_pkt\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-left:2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),          
         array(
                
                'header' =>'(%)',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'poz_tluszcz_procent\']),($data->getMyWynikiParametrow()[\'poz_tluszcz_procent\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'zal',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'poz_tluszcz_zal\']),($data->getMyWynikiParametrow()[\'poz_tluszcz_zal\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'pkt',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'art_grucz_pkt\']),($data->getMyWynikiParametrow()[\'art_grucz_pkt\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-left:2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),          
         array(
                
                'header' =>'(%)',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'art_grucz_procent\']),($data->getMyWynikiParametrow()[\'art_grucz_procent\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'zal',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'art_grucz_zal\']),($data->getMyWynikiParametrow()[\'art_grucz_zal\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'pkt',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'art_tluszcz_pkt\']),($data->getMyWynikiParametrow()[\'art_tluszcz_pkt\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-left:2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),          
         array(
                
                'header' =>'(%)',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'art_tluszcz_procent\']),($data->getMyWynikiParametrow()[\'art_tluszcz_procent\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'zal',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'art_tluszcz_zal\']),($data->getMyWynikiParametrow()[\'art_tluszcz_zal\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
          array(
                
                'header' => 'pkt',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'inne_grucz_pkt\']),($data->getMyWynikiParametrow()[\'inne_grucz_pkt\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-left:2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),          
         array(
                
                'header' =>'(%)',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'inne_grucz_procent\']),($data->getMyWynikiParametrow()[\'inne_grucz_procent\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'zal',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'inne_grucz_zal\']),($data->getMyWynikiParametrow()[\'inne_grucz_zal\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'pkt',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'inne_tluszcz_pkt\']),($data->getMyWynikiParametrow()[\'inne_tluszcz_pkt\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-left:2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),          
         array(
                
                'header' =>'(%)',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'inne_tluszcz_procent\']),($data->getMyWynikiParametrow()[\'inne_tluszcz_procent\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'zal',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'inne_tluszcz_zal\']),($data->getMyWynikiParametrow()[\'inne_tluszcz_zal\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'pkt',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'ety_pkt\']),($data->getMyWynikiParametrow()[\'ety_pkt\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-left: 2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),          
         array(
                
                'header' =>'(%)',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'ety_procent\']),($data->getMyWynikiParametrow()[\'ety_procent\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
         array(
                
                'header' => 'zal',
                'value'=>'CHtml::label(($data->getMyWynikiParametrow()[\'ety_zal\']),($data->getMyWynikiParametrow()[\'ety_zal\']), array("style"=>"font-weight: bold;",))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'border-right: 2px solid #A9A9A9;','text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
        array(
                'header'=>'Punkty (%)',
                'name' => 'punktacja',
                'value'=>'$data->getMyUzyskanaRazemWynik()',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
        
        array(
                
                'name' => 'procent',
                'value'=>'$data->getMyUzyskanaRazemPercent()',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
        array(
                
                'name' => 'parametr',
                'value'=>'$data->getMyLiczbaZaliczonychParametrow()',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'10px'),
                'filter'=>false,
                
                ),
        array(
                
                'name' => 'utkanie',
                'value'=>'$data->getMyCzySpelnioneUtkanie()',
//                'value'=>'CHtml::label(($data->getMyCzySpelnioneUtkanie()=="Spełnione")?("<div id="green">Spełnione</div>"):("<div id="red">Niespełnione</div>"), $data->etMyCzySpelnioneUtkanie(), array("style"=>"width:50px;", ))',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'cssClassExpression' => '($data->getMyCzySpelnioneUtkanie()=="Spełnione") ? (\'green\') : (\'red\');',   
                'filter'=>false,
                
                ),
        array(
                'name' => 'metodaID',
                'value' => 'CHtml::label(($data->metodaID==2)?("Analog"):("Cyfra"),$data->metodaID, array("style"=>"width:50px;", ))',
                'filter' => array('2'=>'Analogowa', '3'=>'Cyfrowa'),
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),
        array(
                'header' => 'Zaliczono',
                'name' => 'zaliczenie',
                'value' => 'CHtml::label(($data->zaliczenie==2)?("Tak"):(($data->zaliczenie==1)?("Nie"):("???")),$data->zaliczenie, array("style"=>"width:50px;", ))',
                'filter' => array('1'=>'Nie', '2'=>'Tak', '0'=>'???'),
                'cssClassExpression' => '($data->zaliczenie==2) ? (\'zielone_tlo_cell_cgridview\') : (($data->zaliczenie==1) ? (\'czerwone_tlo_cell_cgridview\'):(\'zolte_tlo_cell_cgridview\'));',              
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),


	),
    
)); 

 ?> 

