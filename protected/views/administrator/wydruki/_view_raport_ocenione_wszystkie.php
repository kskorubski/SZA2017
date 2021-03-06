<head>    
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Zestawienie Audytów w roku: <?php echo Yii::app()->session['rok']; ?></h2>
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/gridview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/detalview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/listview/styles.css">

<?php

$dataProvider = $model->raport_ocenione_wszystkie(); 
//$dataProvider->getPagination()->setPageSize(100); 
$dataProvider->pagination->pageSize = $model->count();
echo CHtml::button('Drukuj wyniki', array('id'=>'drukuj', 'submit' => Yii::app()->createUrl("/administrator/raport_ocenione_wszystkie_drukuj", array("nazwa" => $model->nazwa, "adres" => $model->adres, "miasto" => $model->miasto,"nazwa_wojewodztwa" => $model->nazwa_wojewodztwa, "zaliczenie" => $model->zaliczenie))  )); 
echo CHtml::button('Eksport csv', array( 'submit' => Yii::app()->createUrl("/administrator/raport_ocenione_wszystkie_csv", array("nazwa" => $model->nazwa, "adres" => $model->adres, "miasto" => $model->miasto,"nazwa_wojewodztwa" => $model->nazwa_wojewodztwa, "zaliczenie" => $model->zaliczenie))  )); 

$grid = $this->widget('zii.widgets.grid.CGridView', array( 
	'id'=>'audyty-grid-drukuj',
	'dataProvider'=> $dataProvider, 
	
	'filter'=> $model, 
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
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),   
            array(
                'name' => 'adres',
                'type' => 'raw',
                'value' => '$data->osrodek->adres',
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
                'header' => 'Zaliczono',
                'name' => 'zaliczenie',
//                'value' => 'CHtml::label(($data->zaliczenie==2)?("Tak"):(($data->zaliczenie==1)?("Nie"):("???")),$data->zaliczenie, array("style"=>"width:50px;", ))',
                'value' => 'CHtml::label(($data->zaliczenie==2)?("Tak"):(($data->zaliczenie==1)?("Nie"):(($data->status_etykiety==2)?("Niezaliczona etykieta"):("???"))),$data->zaliczenie, array("style"=>"width:50px;", ))',
                'filter' => array('1'=>'Nie', '2'=>'Tak', '0'=>'Niezaliczona etykieta'),
//                'cssClassExpression' => '($data->zaliczenie==2) ? (\'zielone_tlo_cell_cgridview\') : (($data->zaliczenie==1) ? (\'czerwone_tlo_cell_cgridview\'):(\'zolte_tlo_cell_cgridview\'));',              
                'cssClassExpression' => '($data->zaliczenie==2) ? (\'zielone_tlo_cell_cgridview\') : (($data->zaliczenie==1) ? (\'czerwone_tlo_cell_cgridview\'):(($data->status_etykiety==2) ? (\'niebieskie_tlo_cell_cgridview\'): (\'zolte_tlo_cell_cgridview\')));',
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),
	),
)); 

 ?> 
<script>
    $("#drukuj").click(function(){
        $("#audyty-grid-drukuj").addClass("loading");
    });
</script>


