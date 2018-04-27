<head>    
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie wyników ośrodków wg województw</h2>
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

$srednia_pkt_suma = 0;

$grid = $this->widget('CGridViewPlus', array(
    
        'addingHeaders' => array(
            array(
                array('text' => '','colspan' => 2, 'options' => array('style' => 'id="audyty-grid-drukuj_c0"')),
                array('text' => 'Średnia liczba punktów','colspan' => 3, 'options' => array('style' => 'background:#6495ED; font-size: 12px;')),
                array('text' => 'Zaliczyło audyt','colspan' => 3, 'options' => array('style' => 'background:#008B8B; font-size: 12px;')),
                array('text' => 'Nie zaliczyło audytu','colspan' => 3, 'options' => array('style' => 'background: #A9A9A9; font-size: 12px;')),
                array('text' => 'W tym nie oceniono','colspan' => 2, 'options' => array('style' => 'background: #A9A9A9; font-size: 12px;')),                
                )
            ),

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
                'name' => 'liczba_pkt_srednia',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => 'round($data->getMyWynikiDlaWojewodztw($data->getMyIdWojewodztwa(), 1),2)',
//                'footer'=>'Średnia suma:: '.round($model->getTotal2($dataProvider->getData(), 'id_woj', 1),2),
           ), 
        array(
                'name' => 'srednia_procent',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => 'round($data->getMyWynikiDlaWojewodztwProcentowo($data->getMyIdWojewodztwa(), 1),2)',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 1),2),
           ), 
        array(
                'name' => 'zaliczone',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->zaliczone',
//                'footer'=>'Średnia suma:: '.$model->getTotal($dataProvider->getData(), 'zaliczone'),
           ),   
        array(
                'name' => 'zal_liczba_pkt_srednia',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => 'round($data->getMyWynikiDlaWojewodztw($data->getMyIdWojewodztwa(), 2),2)',
//                'footer'=>'Średnia suma:: '.round($model->getTotal2($dataProvider->getData(), 'id_woj', 2),2),
           ), 
        array(
                'name' => 'zal_srednia_procent',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => 'round($data->getMyWynikiDlaWojewodztwProcentowo($data->getMyIdWojewodztwa(), 2),2)',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 2),2),
           ),            
        array(
                'name' => 'niezaliczone',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => '$data->niezaliczone',
//                'footer'=>'Średnia suma:: '.$model->getTotal($dataProvider->getData(), 'niezaliczone'),
           ),  
        array(
                'name' => 'niezal_liczba_pkt_srednia',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => 'round($data->getMyWynikiDlaWojewodztw($data->getMyIdWojewodztwa(), 3),2)',
//                'footer'=>'Średnia suma:: '.round($model->getTotal2($dataProvider->getData(), 'id_woj', 3),2),
           ), 
        array(
                'name' => 'niezal_srednia_procent',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => 'round($data->getMyWynikiDlaWojewodztwProcentowo($data->getMyIdWojewodztwa(), 3),2)',
//                'footer'=>'Średnia suma:: '.round($model->getTotal4($dataProvider->getData(), 'id_woj', 3),2),
           ), 
        array(
                'name' => 'brak_utkania',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value' => 'round($data->getMyIleBrakUtkania($data->getMyIdWojewodztwa()),2)',
//                'footer'=>'Średnia suma:: '.round($model->getTotal3($dataProvider->getData(), 'id_woj'),2),
           ), 
        array(
                'name' => 'brak_audytu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'100px'),
                'value'=>'$data->brak_audytu',
//                'footer'=>'Średnia suma:: '.$model->getTotal($dataProvider->getData(), 'brak_audytu'),
                ), 
        
	),
)); 


?>
<script>
    $("#drukuj").click(function(){
        $("#audyty-grid-drukuj").addClass("loading");
    });
</script>


