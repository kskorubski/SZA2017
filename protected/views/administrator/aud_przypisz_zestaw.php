<h2>Przypisywanie zestawów do zespołów audytorów.</h2>

<?php 
    if (!isset(Yii::app()->session['id_zespolu_zestawy'])){
        Yii::app()->session['id_zespolu_zestawy'] = 0;    
        echo "<h3>Klikając nazwe zespołu przechodzisz w tryb edycji</h3>";
    } else {
        echo "<h3>Aktualnie edytujesz zespół: ".Yii::app()->session['id_zespolu_zestawy']." - ".Yii::app()->session['nazwa_zespolu_zestawy']."</h3>" ;
    }
?>

<div id="ksLeftColumn">
        <?php 
        $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>"tab-lewa",
            'ajaxUpdate'=>false,
            'dataProvider'=>$model->search(),
            'htmlOptions'=>array('id'=>'MyID'),
            'columns'=>array(
                array(  
                'header'=>'Id:',
                'type'=>'raw',
                'value'=>'$data["id"]',                
                'htmlOptions' => array('style'=>'text-align: right;','width'=>'20px'),
                ),
               array(  
                'header'=>'Nazwa zespołu:',
                'type'=>'raw',
                'value'=>'$data["nazwa_zespolu"]',                
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'120px'),
                ),
            ),
    )); 
        ?>
    
</div>


<div id="ksRightColumn">
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => Audyty::model()->pokazZestawyDodaneDoGrupy(),
	'enablePagination' => true,
        'ajaxUpdate'=>false,
        'id' => "tab_prawa",
     	'columns'=>
        array(
//		'.',
                array(  
                'header'=>'Nazwa ośrodka:',
                'type'=>'raw',
                'value'=>'$data->osrodek->nazwa',                
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'320px'),
                ),
            
                array(  
                'header'=>'Województwo:',
                'type'=>'raw',
                'value'=>'$data->wojewodztwa->nazwa_wojewodztwa',                
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'90px'),
                ),
            
                array(  
                'header'=>'Id zestawu:',
                'type'=>'raw',
                'value'=>'$data->identyfikator_zestawu',                
                'htmlOptions' => array('style'=>'text-align: right;','width'=>'80px'),
                ),            
                            array(

                        'type' => 'raw',
                        'htmlOptions' => array('style'=>'text-align: center;',
                                                'width'=>'50px'),
                        'value' => 'CHtml::ajaxSubmitButton("Usuń", 
                        array(\'administrator/usunPrzypisanyZestaw\'),
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

                            ))',
                    )
	),
     ));



?><!-- grid-form -->
</div>


<div id="ksRow">
<?php 
$dataProvider = $model2->pokazZestawyDoDodania();
$dataProvider->getPagination()->setPageSize(Yii::app()->user->getState('pageSizePrzypiszZestaw', Yii::app()->params['defaultPageSize'])); 


$this->widget('zii.widgets.grid.CGridView', array(
        'id' => "tab_dol_zestawy_do_przypisania",
        'dataProvider' => $dataProvider,
        'filter'=>$model2,
    
        'template' => '{summary} {items}
                       <div id="ksRow"> 
                       <div id="ksRightColumn">Liczba wierszy na strone:'.
                        CHtml::dropDownList(
                        'pageSize',
                        Yii::app()->user->getState( 'pageSizePrzypiszZestaw', Yii::app()->params[ 'defaultPageSize' ]),
                        array(10=>10,20=>20,50=>50,100=>100),
                        array('onchange'=>"$.fn.yiiGridView.update('tab_dol_zestawy_do_przypisania',{data:{pageSizePrzypiszZestaw:$(this).val()}});"))
                     .'</div>
                       <div id="ksRow"> {pager}  </div>
                       </div>',
    
        'summaryText'=>'<div id="ksRow"> 
                        <div id="ksLeftColumn"> Tabela nr 3. Zestawy do dodania. </div> 
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
//                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '50px'),
             ),  
            
            
            
                array(

                        'type' => 'raw',
                        'htmlOptions' => array('style'=>'text-align: center;',
                                                'width'=>'50px'),
                        'value' => 'CHtml::ajaxSubmitButton("Dodaj", 
                        array(\'administrator/przypiszZestaw\'),
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
                                }"),

                            ))',
                    )
            )
        )
    );

?>
</div>
 
<script type="text/javascript">

 $("#MyID table tbody tr").click(
         
            function()
       {
            $this=$(this);
            var firstColVal= $this.find('td:first-child').text();
            var secondColVal= $this.find('td:nth-child(2)').text();
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("administrator/pokazZestawy"); ?>',
                data: {id_zespolu_zestawy:firstColVal, nazwa_zespolu_zestawy:secondColVal},
                
                success:function(data){
                     document.location.reload(true);
                },
                dataType:'html'
            });
       }
           
    );
 
</script>

