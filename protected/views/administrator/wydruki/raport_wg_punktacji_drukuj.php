<head>    
<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie wyników ośrodków wg punktacji</h2>
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/gridview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/detalview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/listview/styles.css">
<?php

$dataProvider = $model->raport_wg_punktacji();  
//$dataProvider->getPagination()->setPageSize(100); 
$dataProvider->pagination->pageSize = $model->count();

$grid = $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'audyty-grid-drukuj',
	'dataProvider'=> $dataProvider,
	
//	'filter'=> $model,
        'enableSorting'=>false,
//        'template' => '{summary} {items}
//                       <div id="ksRow"> 
//                       <div id="ksRightColumn">Liczba wierszy na strone:'.
//                        CHtml::dropDownList(
//                        'pageSize',
//                        Yii::app()->user->getState( 'pageSizeIndex', Yii::app()->params[ 'defaultPageSize' ]),
//                        array(10=>10,20=>20,50=>50,100=>100),                   
//                        array('onchange'=>"$.fn.yiiGridView.update('audyty-grid',{data:{pageSizeIndex:$(this).val()}});"))
//                     .'</div>
//                       <div id="ksRow"> {pager}  </div>
//                       </div>',   
//        'summaryText'=>'<div id="ksTextBlock"> 
//                        <div id="ksTextLeft"> Tabela nr 1. Zestawy audytowane, wyniki gotowe do druku. </div> 
//                        <div id="ksTextLeft"> Wyświetlono rezultaty {start}-{end} z {count}. </div> 
//                        <br />
//                        </div>',
//        'pager' => array(
//                        'class' => 'CLinkPager',
//                        'maxButtonCount' => '6',
//                        ),
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
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),   
//            array(
//                'name' => 'adres',
//                'type' => 'raw',
//                'value' => '$data->osrodek->adres',
////                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
//           ),   
            
            array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->osrodek->miasto',
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
           ),  
            array(
                'name' => 'identyfikator_zestawu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: right;', 'width'=>'50px'),
                'value'=>'$data->identyfikator_zestawu',
                ),
        array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
//                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
            array(
                'name' => 'metodaID',
                'value' => 'CHtml::label(($data->metodaID==2)?("Analog"):("Cyfra"),$data->metodaID, array("style"=>"width:50px;", ))',
                'filter' => array('2'=>'Analogowa', '3'=>'Cyfrowa'),
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),   
            array(
                
                'name' => 'punktacja',
                'value'=>'$data->getMyUzyskanaRazemWynik()',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false,
                
                ),
            array(
                
                'name' => 'procent',
                'value'=>'$data->getMyUzyskanaRazemPercent()',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false,
                
                ),
            array(
                
                'name' => 'parametr',
                'value'=>'$data->getMyLiczbaZaliczonychParametrow()',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
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

