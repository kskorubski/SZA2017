<h2>Tworzenie zestawów dla wybranych placówek.</h2>

    <?php 
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'forma-aud-utworz',
    'enableAjaxValidation'=> false,
    'htmlOptions'=>array(
                       'onsubmit'=>"return false;",/* Disable normal form submit */
                       'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                       ),
)); 

//$dataProvider = $model->pokazzestawydoutworzenia();
$dataProvider = $model->pokazzestawydoutworzenia();
$dataProvider->getPagination()->setPageSize(Yii::app()->user->getState('pageSizeAudUtworzGora', Yii::app()->params['defaultPageSize'])); 
    
    
$tab1=$this->widget('zii.widgets.grid.CGridView', array(
    	'id' => 'tab_gora_aud_utworz',
	'dataProvider' => $dataProvider,
        'filter'=>$model, 
    
        'enableSorting'=>false,
        'template' => '{summary} {items}
                       <div id="ksRow"> 
                       <div id="ksRightColumn">Liczba wierszy na strone:'.
                        CHtml::dropDownList(
                        'pageSize',
                        Yii::app()->user->getState( 'pageSizeAudUtworzGora', Yii::app()->params[ 'defaultPageSize' ]),
                        array(10=>10,20=>20,50=>50,100=>100),
                        array('onchange'=>"$.fn.yiiGridView.update('tab_gora_aud_utworz',{data:{pageSizeAudUtworzGora:$(this).val()}});"))
                     .'</div>
                       <div id="ksRow"> {pager}  </div>
                       </div>',
    
        'summaryText'=>'<div id="ksRow"> 
                        <div id="ksLeftColumn"> Tabela nr 1. Placówki bez przypisanych numerów. </div> 
                        <div id="ksRightColumn"> Wyświetlono rezultaty {start}-{end} z {count}. </div> 
                        </div>',
        'pager' => array(
                        'class' => 'CLinkPager',
                        'maxButtonCount' => '6',
                        ),
    	'enablePagination' => true, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>true, 
        'emptyText' => 'Brak danych dla tabeli nr 1!',  
    
    
    
    
     	'columns'=> 
        array(
        array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->nazwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'250px'),
           ),            
        array(
                'name' => 'adres',
                'type' => 'raw',
                'value' => '$data->adres',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'160px'),
           ),            
        array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->miasto',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
           ),            

        array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
//      'WojewodztwaID',
            
        array(
                'header'=>'Id:',
                'name' => 'identyfikator_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->identyfikatory->identyfikator_wojewodztwa',
                'htmlOptions' => array('style'=>'text-align: right;','width'=>'40px'),
             ),           
            
            
        array(  
                'header'=>'Nr:',
                'type'=>'raw',
                'value'=>'CHtml::textField("mText".$data["id"], "" ,array("style"=>"width:35px; align:center;"))',                
                'htmlOptions' => array('style'=>'text-align: center;',
                                        'width'=>'40px'),
                ),
        array(
                'header' => 'Metoda:',
                'type' => 'raw',
                'value' => 'CHtml::dropDownList("metodaWybrana".$data["id"],  $this->id, CHtml::listData(Metoda::model()->findAll(),"id","nazwa_metody"),array("style"=>"width:80px; align:center;"))',                                            
               'htmlOptions' => array('style'=>'text-align: center;',
                                        'width'=>'60px'),
            ),
  
            
         array(
                'header' => 'Akcja:',
                'type' => 'raw',
             'htmlOptions' => array('style'=>'text-align: center;',
                                        'width'=>'50px'),
                'value' => 'CHtml::ajaxSubmitButton("Zapisz", 
                     array(\'administrator/utworzZestaw\'),
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
                                if(data==2){
                                alert(\'#04: Podany numer zestawu już istnieje! Wpisz ponownie inny!!\');
                                throw { name: \'FatalError\', message: \'Something went badly wrong\' };
                                }
                                }",
                    
                    "data" => array( 
                    "id" => "js:function() { 
                     return \'$data->id\';
                    }",
                    
                    "metoda" => "js:function() { 
                     var idp = \'$data->id\';
                     var metoda = $(\'#metodaWybrana\'+idp).val();
                     if (metoda == 1) {
                     alert(\'#03: Wybierz metodę!\');
                     throw { name: \'FatalError\', message: \'Something went badly wrong\' };
                    }
                     else {
                        return metoda; }
                    }",
                    
                     "numer" => "js:function() { 
                     var idp = \'$data->id\';
                     var nr = $(\'#mText\'+idp).val();
                     if (!isNumber(nr)){
                     alert(\'#02 Wartość Nr musi być liczbą!\');
                     throw { name: \'FatalError\', message: \'Something went badly wrong\' };
                     } else
                     { return nr; }
                     }",
                     
                    "idw" => $data->identyfikatory->identyfikator_wojewodztwa,

                    ),
                        )
                    )',
             ),   
	),
     ));



$dataProvider2 = $model2->pokazZapisaneZestawy();
$dataProvider2->getPagination()->setPageSize(Yii::app()->user->getState('pageSizeAudUtworzDol', Yii::app()->params['defaultPageSize'])); 
    
//------------------------druga tabela z wynikami zapisanych zestrawow---------
$this->widget('zii.widgets.grid.CGridView', array(
        'id' => "tab_dol_aud_utworz",	
        'dataProvider' => $dataProvider2,
        'filter'=>$model2,
    
        'enableSorting'=>false,
        'template' => '{summary} {items}
                       <div id="ksRow"> 
                       <div id="ksRightColumn">Liczba wierszy na strone:'.
                        CHtml::dropDownList(
                        'pageSize',
                        Yii::app()->user->getState( 'pageSizeAudUtworzDol', Yii::app()->params[ 'defaultPageSize' ]),
                        array(10=>10,20=>20,50=>50,100=>100),
                        array('onchange'=>"$.fn.yiiGridView.update('tab_dol_aud_utworz',{data:{pageSizeAudUtworzDol:$(this).val()}});"))
                     .'</div>
                       <div id="ksRow"> {pager}  </div>
                       </div>',
    
        'summaryText'=>'<div id="ksRow"> 
                        <div id="ksLeftColumn"> Tabela nr 2. Utworzone zestawy. </div> 
                        <div id="ksRightColumn"> Wyświetlono rezultaty {start}-{end} z {count}. </div> 
                        </div>',
        'pager' => array(
                        'class' => 'CLinkPager',
                        'maxButtonCount' => '6',
                        ),
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
                'name' => 'adres',
                'type' => 'raw',
                'value' => '$data->osrodek->adres',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'160px'),
           ),            
        array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->osrodek->miasto',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
           ),            

        array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
                'filter' => CHtml::activeDropDownList($model2, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
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
//            'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
                    'type' => 'raw',
                    'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
                    ),         
         
         array(
              'header' => 'Akcja:',
              'type' => 'raw',
              'htmlOptions' => array('style'=>'text-align: center;','width'=>'60px'),
              'value' => 'CHtml::ajaxSubmitButton(
                                                 "Usuń", 
                                                 array(\'administrator/usunZestaw\'),
                                                 array(
                                                      "type" => "POST",
                                                      "beforeSend" => "function( request )
                                {
                                    var x = confirm(\'Czy na pewno chcesz usunąć zestaw?\');
                                    if (!x){
                                        throw { name: \'FatalError\', message: \'Przerwałem usuwanie\' };
                                    }
                                }",  
                                "success" => "function( data )
                                {
                                if(data==100) {
                                    alert(\'Zestaw nie może zostać usunięty, ponieważ audyt jest już rozpoczęty i posiada zapisane ankiety lub etykiety!\');
                                }
                                if(data==1){
                                document.location.reload(true); 
                                }
                                }",
                                "data" => array( 
                                "id_audytu" => "js:function() { 
                                return \'$data->id\';
                                }"),
                        )
                    )',
             ), 
	),
     ));


?><!-- grid-form -->

<?php $this->endWidget(); ?>

<script type="text/javascript">
 function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
</script>