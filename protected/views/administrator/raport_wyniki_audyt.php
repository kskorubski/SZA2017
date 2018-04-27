<h2>Wyniki dla wykonanych audytów.</h2>
<?php



$test = 0;
$dataProvider = $model->raporty_wyniki_lista(); 
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
                        <div id="ksLeftColumn"> Tabela nr 1. Zestawy audytowane, wyniki gotowe do druku. </div> 
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
                'header'=>'Lp.',
                'value'=>'$this->grid->dataProvider->pagination->currentPage*
                          $this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
        array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->osrodek->nazwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),   
            array(
                'name' => 'adres',
                'type' => 'raw',
                'value' => '$data->osrodek->adres',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),   
            
            array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->osrodek->miasto',
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
                'header' => 'Zaliczono',
                'name' => 'zaliczenie',
//                'value' => 'CHtml::label((Audyty::model()->audytCzyZaliczony($data->id,$data->metodaID)==1)?("Tak"):("Nie"),Audyty::model()->audytCzyZaliczony($data->id,$data->metodaID), array("style"=>"width:50px;", ))',
//                'value' => 'CHtml::label(($data->zaliczenie==2)?("Tak"):("Nie"),$data->zaliczenie, array("style"=>"width:50px;", ))',
                'value' => 'CHtml::label(($data->zaliczenie==2)?("Tak"):(($data->zaliczenie==1)?("Nie"):(($data->status_etykiety==2)?("Niezaliczona etykieta"):("???"))),$data->zaliczenie, array("style"=>"width:50px;", ))',
//                'value' => '$data->zaliczenie',
                'filter' => array('1'=>'Nie', '2'=>'Tak', '0'=>'???'),
//                'cssClassExpression' => array('1'=> 'czerwone_tlo_cell_cgridview', '2'=>'zielone_tlo_cell_cgridview'),
                'cssClassExpression' => '($data->zaliczenie==2) ? (\'zielone_tlo_cell_cgridview\') : (($data->zaliczenie==1) ? (\'czerwone_tlo_cell_cgridview\'):(($data->status_etykiety==2) ? (\'niebieskie_tlo_cell_cgridview\'): (\'zolte_tlo_cell_cgridview\')));',
//                'cssClassExpression' => '$data->audytCzyZaliczony($data->id,$data->metodaID)==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',                
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                ),
            
//                        array(
//                'name' => 'zaliczenie',
//                'type' => 'raw',
//                            'filter' => array('0'=>'0', '1'=>'1'),
//                'htmlOptions' => array('style'=>'text-align: right;', 'width'=>'50px'),
//                'value'=>'$data->zaliczenie',
//                ),
//            array(
//                'header' => 'Zaliczono?:',
//                'name' => 'czyzaliczono',
////                'value' => 'CHtml::label((Audyty::model()->audytCzyZaliczony($data->id,$data->metodaID)==1)?(1):(0),$data->czyzaliczono=(Audyty::model()->audytCzyZaliczony($data->id,$data->metodaID)==1)?(1):(0), array("style"=>"width:50px;", ))',
//                'value' => '$data->test',
//                'filter' => array('0'=>'0', '1'=>'1'),
//                'cssClassExpression' => '$data->czyzaliczono==0 ? \'czerwone_tlo_cell_cgridview\' : \'zielone_tlo_cell_cgridview\';',
//                'type' => 'raw',
//                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
//                ),
//            array(
//                'type' => 'raw',
//                'header' => 'Ankieta:',
//                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
//                'value' => '($data->status_ankiety==1)?(CHtml::button("PDF", array( "submit" => Yii::app()->createUrl("/administrator/drukujAnkieteIndex" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))):(null)',
//                ),
            array(
                'type' => 'raw',
                'header' => 'Wyniki:',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
//                'value' => 'CHtml::button("Wyniki audytu", array( "submit" => Yii::app()->createUrl("/administrator/drukujWynikiAudyt" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))',
                'value' => '($data->status_etykiety!=2) ? CHtml::button("Wyniki audytu", array( "submit" => Yii::app()->createUrl("/administrator/drukujWynikiAudyt" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) )) : (NULL)',
                
                ),  
            array(
                'type' => 'raw',
                'header' => 'Ankieta:',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'40px'),
//                'value' => '($data->status_ankiety==1)?(CHtml::button("Załącznik", array( "submit" => Yii::app()->createUrl("/administrator/drukujAnkieteIndex" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))):(null)',
//                'value' => 'CHtml::button("Załącznik", array( "submit" => Yii::app()->createUrl("/administrator/drukujZalacznikWyniki" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) ))',
                'value' => '($data->status_etykiety!=2) ? CHtml::button("Załącznik", array( "submit" => Yii::app()->createUrl("/administrator/drukujZalacznikWyniki" , array("id_audytu" => $data->id, "metoda" => $data->metodaID)) )) : (NULL)',
                ),
            
            
            //428,3
            
            
            // 
	),
)); 

 ?> 
