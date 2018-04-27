<h2>Podgląd przebiegu audytów.</h2>

<?php
$dataProvider = $model->search_audyty_w_trakcie_realizacji_admin();
$dataProvider->getPagination()->setPageSize(Yii::app()->user->getState('pageSizeIndex', Yii::app()->params['defaultPageSize'])); 




$grid = $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'audyty-grid',
	'dataProvider'=> $dataProvider,
	'filter'=> $model,
    
        'enableSorting'=>true,
        'template' => '{summary} {items}
                       <div id="ksRow"> 
                       <div id="ksRightColumn">Liczba wierszy na strone:'.
                        CHtml::dropDownList(
                        'pageSize',
                        Yii::app()->user->getState( 'pageSizeIndex', Yii::app()->params[ 'defaultPageSize' ]),
                        array(10=>10,20=>20,50=>50,100=>100),
                        array('onchange'=>"$.fn.yiiGridView.update('audyty-grid',{data:{pageSizeIndex:$(this).val()}});"))
                     .'</div>
                       <div id="ksRow"> {pager}  </div>
                       </div>',
    
        'summaryText'=>'<div id="ksRow"> 
                        <div id="ksLeftColumn"> Tabela nr 1. Zestawy przypisane do grup - w trakcie realizacji. </div> 
                        <div id="ksRightColumn"> Wyświetlono rezultaty {start}-{end} z {count}. </div> 
                        </div>',
        'pager' => array(
                        'class' => 'CLinkPager',
                        'maxButtonCount' => '6',
                        ),
    	'enablePagination' => true, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>true, 
        'emptyText' => 'Brak danych.', 
    
	'columns'=> array(
            
        array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->osrodek->nazwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),   
        array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
            array(
                'name' => 'identyfikator_zestawu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: right;', 'width'=>'50px'),
                'value'=>'$data->identyfikator_zestawu',
                ),
            array(
                'name' => 'nazwa_zespolu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: left;', 'width'=>'50px'),
                'value'=>'$data->zespolyAudytorow->nazwa_zespolu',
                ),
            array(
                'name' => 'metodaID',
                'value' => 'CHtml::label(($data->metodaID==2)?("Analog"):("Cyfra"),$data->metodaID, array("style"=>"width:50px;", ))',
                'filter' => array('2'=>'Analogowa', '3'=>'Cyfrowa'),
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),            
            array(
                'name' => 'status_ankiety',
                'value' => 'CHtml::label(($data->status_ankiety==0)?("Brak"):("OK"),$data->status_ankiety, array("style"=>"width:50px;", ))',
                'filter' => array('0'=>'Brak', '1'=>'OK'),
                'cssClassExpression' => '$data->status_ankiety==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',
                'cssClassExpression' => '$data->status_etykiety==2 ? \'niebieskie_tlo_cell_cgridview\' : ($data->status_ankiety==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\');',
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),
            array(
                'name' => 'status_etykiety',
                'value' => 'CHtml::label(($data->status_etykiety==0)?("Brak"):(($data->status_etykiety==1)?("OK"):("Niezaliczona")),$data->status_etykiety, array("style"=>"width:50px;", ))',
                'filter' => array('0'=>'Brak', '1'=>'OK', '2'=>'Niezaliczona'),
                'cssClassExpression' => '$data->status_etykiety==0 ? \'czerwone_tlo_cell_cgridview\' : ($data->status_etykiety==1 ? \'zielone_tlo_cell_cgridview\' : \'niebieskie_tlo_cell_cgridview\');',
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),
            array(
                'type' => 'raw',
                'header' => 'Ankieta:',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
                'value' => '($data->status_ankiety==1)?(CHtml::button("PDF", array( "submit" => Yii::app()->createUrl("/administrator/drukujAnkieteIndex" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))):(null)',
                ),
            array(
                'type' => 'raw',
                'header' => 'Etykieta:',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
                'value' => '($data->status_etykiety!=0)?(CHtml::button("PDF", array( "submit" => Yii::app()->createUrl("/administrator/drukujEtykieteIndex" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))):(null)',
                ),  
	),
)); 

 ?> 
<br />
<br />
<h2>Podgląd przebiegu odwołań audytów</h2>

<?php
$dataProvider_odwolanie = $model_odwolanie->search_audyty_odwolania_admin();
$dataProvider_odwolanie->getPagination()->setPageSize(Yii::app()->user->getState('pageSizeIndex', Yii::app()->params['defaultPageSize'])); 

$grid2 = $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'audyty-grid-odwolanie',
	'dataProvider'=> $dataProvider_odwolanie, 
	'filter'=> $model_odwolanie,
    
        'enableSorting'=>true,
        'template' => '{summary} {items}
                       <div id="ksRow"> 
                       <div id="ksRightColumn">Liczba wierszy na strone:'.
                        CHtml::dropDownList(
                        'pageSize',
                        Yii::app()->user->getState( 'pageSizeIndex', Yii::app()->params[ 'defaultPageSize' ]),
                        array(10=>10,20=>20,50=>50,100=>100),
                        array('onchange'=>"$.fn.yiiGridView.update('audyty-grid-odwolanie',{data:{pageSizeIndex:$(this).val()}});"))
                     .'</div>
                       <div id="ksRow"> {pager}  </div>
                       </div>',
    
        'summaryText'=>'<div id="ksRow"> 
                        <div id="ksLeftColumn"> Tabela nr 2. Zestawy przypisane do grup - odwołanie audytu. </div> 
                        <div id="ksRightColumn"> Wyświetlono rezultaty {start}-{end} z {count}. </div> 
                        </div>',
        'pager' => array(
                        'class' => 'CLinkPager',
                        'maxButtonCount' => '6',
                        ),
    	'enablePagination' => true, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>true, 
        'emptyText' => 'Brak danych.', 
    
	'columns'=> array(
//        array(
//                'name' => 'id',
//                'type' => 'raw',
//                'value' =>'$data->id',
//                'htmlOptions' => array('style'=>'text-align: center;','width'=>'50px'),
//                //'filter' => array('0'=>'NIE', '1'=>'TAK'),
//                //'cssClassExpression' => '$data->priorytet==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',
//           ),
//        array(
//                'type' => 'raw',
//                'header' => '',
//                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
//                'value' => '($data->priorytet==1)?(CHtml::button("USTAW", array( "submit" => Yii::app()->createUrl("/administrator/ustawPriorytet" , array("id_audytu" => $data->id, "identyfikator_zestawu" => $data->identyfikator_zestawu)) ))):("")',
////                'cssClassExpression' => '$data->status_etykiety==0 ? \'zolte_tlo_cell_cgridview\' : \'\';',
//                ),            
        array(
                'name' => 'priorytet',
                'type' => 'raw',
//                'value' =>'CHtml::label(($data->priorytet==1)?(CHtml::button("USTAW", array( "submit" => Yii::app()->createUrl("/administrator/ustawPriorytet" , array("id_audytu" => $data->id, "identyfikator_zestawu" => $data->identyfikator_zestawu)) ))):("Ustawiony"),$data->priorytet, array("style"=>"width:80px;", ))',
                'value' => 'CHtml::label(($data->priorytet==1) ? CHtml::ajaxSubmitButton("USTAW", 
                    array(\'administrator/ustawPriorytet\'),
                        array(
                            "type" => "POST",
                                "beforeSend" => "function( request )
                                {
                                }", 
                                 "success" => "function( data )
                                {
                                if(data==1){
                                document.location.reload(true); 
                                }
                                }",
                                 "data" => array( 
                                "id_audytu" => "js:function() { 
                                return \'$data->id\';
                                }",
                                "identyfikator_zestawu" => "js:function() { 
                                return \'$data->identyfikator_zestawu\';
                                }"),

                            )): ("Ustawiony"),$data->priorytet, array("style"=>"width:80px;", ))',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'80px'),
                'filter' => array('0'=>'Nieustawiony', '1'=>'Ustawiony'),
                'cssClassExpression' => '$data->priorytet==1 ? : \'niebieskie_tlo_cell_cgridview\';',
           ),
        array(
                'name' => 'status_odwolania',
                'type' => 'raw',
                'value' =>'CHtml::label(($data->status_odwolania==1)?("NIE"):("TAK"),$data->status_odwolania, array("style"=>"width:50px;", ))',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'50px'),
                'filter' => array('1'=>'NIE', '2'=>'TAK'),
                'cssClassExpression' => '$data->status_etykiety==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',
           ),   
            
        array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->osrodek->nazwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),   
        array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
                'filter' => CHtml::activeDropDownList($model_odwolanie, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
            array(
                'name' => 'identyfikator_zestawu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: right;', 'width'=>'50px'),
                'value'=>'$data->identyfikator_zestawu',
                ),
            array(
                'name' => 'nazwa_zespolu',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: left;', 'width'=>'50px'),
                'value'=>'$data->zespolyAudytorow->nazwa_zespolu',
                ),
            array(
                'name' => 'metodaID',
                'value' => 'CHtml::label(($data->metodaID==2)?("Analog"):("Cyfra"),$data->metodaID, array("style"=>"width:50px;", ))',
                'filter' => array('2'=>'Analogowa', '3'=>'Cyfrowa'),
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),            
            array(
                'name' => 'status_ankiety',
                'value' => 'CHtml::label(($data->status_ankiety==0)?("Brak"):("OK"),$data->status_ankiety, array("style"=>"width:50px;", ))',
                'filter' => array('0'=>'Brak', '1'=>'OK'),
                'cssClassExpression' => '$data->status_ankiety==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),
            array(
                'name' => 'status_etykiety',
                'value' => 'CHtml::label(($data->status_etykiety==0)?("Nie dotyczy"):("OK"),$data->status_etykiety, array("style"=>"width:50px;", ))',
                'filter' => array('0'=>'Nie dotyczy', '1'=>'OK'),
                'cssClassExpression' => '$data->status_etykiety==0 ? \'zolte_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),

            array(
                'type' => 'raw',
                'header' => 'Ankieta:',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
                'value' => '($data->status_ankiety==1)?(CHtml::button("PDF", array( "submit" => Yii::app()->createUrl("/administrator/drukujAnkieteIndex" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))):(null)',
                ),
            array(
                'type' => 'raw',
                'header' => 'Etykieta:',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
                'value' => '($data->status_etykiety==1)?(CHtml::button("PDF", array( "submit" => Yii::app()->createUrl("/administrator/drukujEtykieteIndex" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))):("Nie dotyczy")',
                'cssClassExpression' => '$data->status_etykiety==0 ? \'zolte_tlo_cell_cgridview\' : \'\';',
                ),  
	),
)); 

 ?> 