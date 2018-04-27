<head>    
<link rel="stylesheet" type="text/css" href="css/screen_druki.css">
</head>
<h2>Audyt kliniczny <?php echo Yii::app()->session['rok']; ?></h2>
<h2>Zestawienie wyników ośrodków wg punktacji</h2>
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/gridview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/detalview/styles.css">
<link rel="stylesheet" type="text/css" href="yii/framework/zii/widgets/assets/listview/styles.css">
<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
 <style type="text/css">
.moj  {background: "FFFFFF"; font-size: 15px;}
</style>



<?php

$dataProvider = $model->raport_wg_punktacji(); 
$dataProvider->pagination->pageSize = $model->count();

//echo CHtml::ajaxButton ('Drukuj wyniki',
//                        array( 'submit' => Yii::app()->createUrl("/administrator/raport_wg_punktacji_drukuj", array("nazwa" => $model->nazwa, "miasto" => $model->miasto, "identyfikator_zestawu" => $model->identyfikator_zestawu,"nazwa_wojewodztwa" => $model->nazwa_wojewodztwa, "metodaID" => $model->metodaID, "zaliczenie" => $model->zaliczenie))), 
//                        array ('beforeSend' => 'function(){$("#audyty-grid-drukuj").addClass("loading"); }',
//                                                            
//                                                         
//                               'complete' => 'function(){
//                                                            $("#audyty-grid-drukuj").removeClass("loading");
//                                                        }',
//                               )
//                        );

echo CHtml::button('Drukuj wyniki', array('id'=>'drukuj', 'submit' => Yii::app()->createUrl("/administrator/raport_wg_punktacji_drukuj",  array("nazwa" => $model->nazwa, "miasto" => $model->miasto, "identyfikator_zestawu" => $model->identyfikator_zestawu,"nazwa_wojewodztwa" => $model->nazwa_wojewodztwa, "metodaID" => $model->metodaID, "zaliczenie" => $model->zaliczenie)))); 
echo CHtml::button('Eksport csv', array( 'submit' => Yii::app()->createUrl("/administrator/raport_wg_punktacji_csv", array("nazwa" => $model->nazwa, "miasto" => $model->miasto, "identyfikator_zestawu" => $model->identyfikator_zestawu,"nazwa_wojewodztwa" => $model->nazwa_wojewodztwa, "metodaID" => $model->metodaID, "zaliczenie" => $model->zaliczenie))  )); 




$grid = $this->widget('CGridViewPlus', array(

	'id'=>'audyty-grid-drukuj',
	'dataProvider'=> $dataProvider,  
	
	'filter'=> $model, 
        'enableSorting'=>false,        
    	'enablePagination' => false, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>true, 
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
           ),    
            
            array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->osrodek->miasto',
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
                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
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
<script>
    $("#drukuj").click(function(){
        $("#audyty-grid-drukuj").addClass("loading");
    });
</script>


