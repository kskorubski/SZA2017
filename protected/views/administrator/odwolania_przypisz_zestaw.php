<h2>Utwórz odwołanie przypisując zestaw do zespołu audytorów.</h2>

<?php 
    if (!isset(Yii::app()->session['id_zespolu_zestawy_odwolanie'])){
        Yii::app()->session['id_zespolu_zestawy_odwolanie'] = 0;    
        echo "<h3>Klikając nazwe zespołu przechodzisz w tryb edycji</h3>";
    } else {
        echo "<h3>Aktualnie edytujesz zespół: ".Yii::app()->session['id_zespolu_zestawy_odwolanie']." - ".Yii::app()->session['nazwa_zespolu_zestawy_odwolanie']."</h3>" ;
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
	'dataProvider' => Audyty::model()->pokazZestawyDodaneDoGrupyOdwolania(),
      
//	'enablePagination' => true,
        'ajaxUpdate'=>false,
//        'htmlOptions'=>array('style'=>'text-align: left;'),
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
                        array(\'administrator/usunPrzypisanyZestawOdwolanie\'),
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
                                if(data==1){
                                document.location.reload(true); 
                                }
                                }",
                                "error" => "function( data ){
                                    alert(\'Zestaw nie może zostać usunięty, ponieważ audyt jest już rozpoczęty i posiada zapisane ankiety lub etykiety!\');
                                }", 
                                "data" => array( 
                                "id_audytu" => "js:function() { 
                                return \'$data->id\';
                                }", "identyfikator_zestawu" => "js:function() { 
                                return \'$data->identyfikator_zestawu\';
                                }"),
                               

                            ))',
                    )
	),
     ));

?><!-- grid-form -->
</div>


<div id="ksRow">
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
//	'dataProvider' => Audyty::model()->pokazZestawyDoDodaniaOdwolanie(),
	'dataProvider' => $model_audyty->pokazZestawyDoDodaniaOdwolanie(),
	'enablePagination' => true,
        'ajaxUpdate'=>false,
        'filter'=> $model_audyty,
        'id' => "tab_dol",
     	'columns'=>
        array(

	    array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->osrodek->nazwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'350px'),
           ),  

            array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'200px'),
                'filter' => CHtml::activeDropDownList($model_audyty, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
		'identyfikator_zestawu',
	    array(
                'name' => 'metodaID',
                'value' => 'CHtml::label(($data->metodaID==2)?("Analog"):("Cyfra"),$data->metodaID, array("style"=>"width:50px;", ))',
                'filter' => array('2'=>'Analogowa', '3'=>'Cyfrowa'),
                'type' => 'raw',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '100px'),
                ), 
            array(

                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;',
                                                'width'=>'50px'),
                'value' => 'CHtml::ajaxSubmitButton("Dodaj", 
                    array(\'administrator/przypiszZestawOdwolanie\'),
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

 $("#MyID table tbody tr").click(function()
       {
            $this=$(this);
            var firstColVal= $this.find('td:first-child').text();
            var secondColVal= $this.find('td:nth-child(2)').text();
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("administrator/pokazZestawyOdwolanie"); ?>',
                data: {id_zespolu_zestawy_odwolanie:firstColVal, nazwa_zespolu_zestawy_odwolanie:secondColVal},
                
                success:function(data){
                     document.location.reload(true);
                },
                dataType:'html'
            });
            //document.location.reload(true);
       });
 
</script>


