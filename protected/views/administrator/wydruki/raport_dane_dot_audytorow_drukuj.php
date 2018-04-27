<head>    
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie wyników dot. Audytorów</h2>
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
//        array(
//                'name' => 'rok_audytu',
//                'type' => 'raw',
//                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
//                'value' => '$data->rok_audytu',                              
//           ),
        
        array(
                'name' => 'audyty_oceniane',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->audyty_oceniane',
//                'footer'=>'Średnia suma:: '.round($model->getTotal2($dataProvider->getData(), 'id_woj', 1),2),
           ), 
        array(
                'name' => 'audyty_etapI',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->audyty_etapI',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 1),2),
           ),
        array(
                'name' => 'audyty_etapII',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->audyty_etapII',                              
           ),
        array(
                'name' => 'zaliczone_audyty',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->zaliczone_audyty',                              
           ),
        array(
                'name' => 'niezaliczone_audyty',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->niezaliczone_audyty',                              
           ),
        
	),
)); 


?>
