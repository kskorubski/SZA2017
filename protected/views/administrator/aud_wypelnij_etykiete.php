<h2>Wypełnij etykietę dla wybranego zestawu.</h2>

<?php

$dataProvider = $model->pokazZapisaneZestawy();
$dataProvider->getPagination()->setPageSize(Yii::app()->user->getState('pageSizeWypelnijEtykiete', Yii::app()->params['defaultPageSize'])); 

$this->widget('zii.widgets.grid.CGridView', array(
        'id' => "tab_wypelnij_etykiete",	
        'dataProvider' => $dataProvider,
        'filter'=>$model,
    
        'template' => '{summary} {items}
                       <div id="ksRow"> 
                       <div id="ksRightColumn">Liczba wierszy na strone:'.
                        CHtml::dropDownList(
                        'pageSize',
                        Yii::app()->user->getState( 'pageSizeWypelnijEtykiete', Yii::app()->params[ 'defaultPageSize' ]),
                        array(10=>10,20=>20,50=>50,100=>100),
                        array('onchange'=>"$.fn.yiiGridView.update('tab_wypelnij_etykiete',{data:{pageSizeWypelnijEtykiete:$(this).val()}});"))
                     .'</div>
                       <div id="ksRow"> {pager}  </div>
                       </div>',
    
        'summaryText'=>'<div id="ksRow"> 
                        <div id="ksLeftColumn"> Tabela nr 1. Utworzone zestawy - etykiety. </div> 
                        <div id="ksRightColumn"> Wyświetlono rezultaty {start}-{end} z {count}. </div> 
                        </div>',
        'pager' => array(
                        'class' => 'CLinkPager',
                        'maxButtonCount' => '6',
                        ),
        'enableSorting'=>true,
    	'enablePagination' => true, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>true, 
        'emptyText' => 'Brak danych dla tabeli nr 1!',     
    
        
    
    
    
    
     	'columns'=>
        array(
//		'id',
            
        array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->osrodek->nazwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),            
        array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->osrodek->miasto',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
           ),            
        array(
                'name' => 'adres',
                'type' => 'raw',
                'value' => '$data->osrodek->adres',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'160px'),
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
                'value' => '$data->identyfikator_zestawu',
                'htmlOptions' => array('style'=>'text-align: right;','width'=>'50px'),
           ),          
        array(
                'name' => 'metodaID',
                'value' => 'CHtml::label(($data->metodaID==2)?("Analog"):("Cyfra"),$data->metodaID, array("style"=>"width:50px;", ))',
                'filter' => array('2'=>'Analogowa', '3'=>'Cyfrowa'),
//                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
             ),  
         array(
                'name' => 'status_etykiety',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'60px'),
                'filter' => array('1'=>'OK', '0'=>'Brak'),
//                'value' =>'($data->status_etykiety==0)?("Brak"):("OK")',
                'value' =>'($data->status_etykiety==0)?("Brak"):(($data->status_etykiety==1)?("OK"):("Niezaliczona"))',
//                'cssClassExpression' => '$data->status_etykiety==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',
                'cssClassExpression' => '$data->status_etykiety==0 ? \'czerwone_tlo_cell_cgridview\' : ($data->status_etykiety==1 ? \'zielone_tlo_cell_cgridview\' : \'niebieskie_tlo_cell_cgridview\');',
               ),
             
  
        array(
//      'header' => 'Akcja:',
            'type' => 'raw',            
            'htmlOptions' => array('style'=>'text-align: center; ','width'=>'50px'),
            'value' => '($data->status_ankiety==1) ? (NULL) : CHtml::ajaxSubmitButton(($data->status_etykiety==0)?("Wypełnij"):("Edytuj"),               
            array(\'administrator/aud_wypelnij_etykiete_wybrana\'),
            array(
                "type" => "POST",
                "beforeSend" => "function( request )
                {
    
                }", 
                "success" => "function( data )
                {

                window.location.href = data;

                }",
                "data" => array( 
                                
                "metoda" => "js:function() { 
                return \'$data->metodaID\';}",
                                
                "id_zestawu" => "js:function() { 
                return \'$data->id\';}",
                                
                "status_etykiety" => "js:function() { 
                return \'$data->status_etykiety\';}",
                ),
                )) ',//v2017 nie wysweitlamy przycisku dla etykiety niezaliczonej
                // 
//            'cssClassExpression' => '$data->status_etykiety==0 ? \'buttonik\' : ($data->status_etykiety==1 ? \'zielone_tlo_cell_cgridview\' : \'niebieskie_tlo_cell_cgridview\');',
                    ),
            
//                array(
////                       'header' => 'Akcja:',
//                        'type' => 'raw',
//                        'htmlOptions' => array('style'=>'text-align: center;',
//                                                'width'=>'50px'),
//                        'value' => '($data->status_etykiety!=0)?(CHtml::ajaxSubmitButton(($data->status_etykiety!=0)?("Usuń"):(null), 
//                        array(\'administrator/aud_usun_etykiete_wybrana\'),
//                            array(
//                                "type" => "POST",
//                                "beforeSend" => "function( request )
//                                {
//                                    var x = confirm(\'Czy na pewno chcesz usunąć etykiete?\');
//                                    if (!x){
//                                        throw { name: \'FatalError\', message: \'Przerwałem usuwanie\' };
//                                    }
//                                }",  
//                                 "success" => "function( data )
//                                {
//                                window.location.href = data;
//                                }",
//                                
//                                "data" => array( 
//                                
//                                "metoda" => "js:function() { 
//                                return \'$data->metodaID\';}",
//                                
//                                "id_zestawu" => "js:function() { 
//                                return \'$data->id\';}",
//                                
//                                "status_etykiety" => "js:function() { 
//                                return \'$data->status_etykiety\';}",
//                                 ),
//                            ))):(null)',
//                    )            
	),
     ));
 

?><!-- grid-form -->
