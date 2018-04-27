<head>    
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie ilości zaliczonych parametrów wg pwojewództw</h2>
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
                array('text' => 'Liczba zaliczonych parametrów','colspan' => 16, 'options' => array('style' => 'id="audyty-grid-drukuj_c0"')),
            ),
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
                'header' => '7',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'7\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'7\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '6',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'6\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'6\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '5',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'5\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'5\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '4',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'4\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'4\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '3',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'3\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'3\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '2',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'2\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'2\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '1',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'1\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'1\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '0',
                'value'=>'$data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'0\')',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),
        array(                
                'header' => '%',
                'value'=>'round(($data->getMyIloscZalParametrow($data->getMyIdWojewodztwa(), \'0\')/$data->liczba_osrodkow)*100, 2)',
                'type' => 'raw', 
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'50px'),
                'filter'=>false, 
                
                ),

	),
)); 


?>


