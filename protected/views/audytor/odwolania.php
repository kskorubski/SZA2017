
<h1>Wypełnij ankietę dla ODWOŁANIA</h1>

<?php 

    if (!isset(Yii::app()->session['id_zespolu_zestawy_odwolanie'])){
        Yii::app()->session['id_zespolu_zestawy_odwolanie'] = 0;  
        
        echo "<h3>Klikając nazwe zespołu przechodzisz w tryb edycji</h3>";
    } else {
        echo "<h3>Aktualnie edytujesz zespół: ".Yii::app()->session['id_zespolu_audytorow_odwolanie']." - ".Yii::app()->session['nazwa_zespolu_audytorow_odwolanie']."</h3>" ;
    }
    if (!isset(Yii::app()->session['id_zespolu_audytorow_odwolanie'])){
        Yii::app()->session['id_zespolu_audytorow_odwolanie'] = 0; 
    }
    
?>
<div id="ksLeftColumn">
        <?php 
        $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>"tab-lewa",
            'ajaxUpdate'=>false,
            'dataProvider'=> ZespolyAudytorow::model()->pokazZespolyAudytoraDlaOdwolan(), // tutaj musisz napisac wlasna metode!!!
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
        'dataProvider' => $temp = Uzytkownicy::model()->pokazDodanychAudytorowOdwolanie(),
        'enablePagination' => true,
        'ajaxUpdate'=>false,
        'id' => "tab_prawa", 
     	'columns'=>
         array(
//             'id',
//             'uzytkownicyzespolyaudytorows.id',
                array(  
                'header'=>'Imie:',
                'type'=>'raw',
                'value'=>'$data["imie"]',                
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'80px'),
                ),
                array(  
                'header'=>'Nazwisko:',
                'type'=>'raw',
                'value'=>'$data["nazwisko"]',                
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'80px'),
                ),
                            array(  
                'header'=>'Województwo:',
                'type'=>'raw',
                'value'=>'$data->wojewodztwas->nazwa_wojewodztwa',                
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'190px'),
                ),
       
	),
     )); 



?><!-- grid-form -->
</div>


<div id="ksRow">
<?php 
//----------------tablea z audytorami ktorzy nie sa w grupie--------------------
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => Audyty::model()->pokazZestawyDodaneDoGrupyDlaAudytoraOdwolania(),
	'enablePagination' => true,
        'ajaxUpdate'=>false,
        'id' => "tab_prawa",
     	'columns'=>
        array(
//		'.',
                array(  
                'header'=>'Id zestawu:',
                'type'=>'raw',
                'value'=>'$data->identyfikator_zestawu',                
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'120px'),
                ), 
                array(
                     'name'=> 'MetodaID', 
                     'value' => 'Metoda::model()->findByPk($data->metodaID)->nazwa_metody', 
                     'header'=>'Metoda wykonania zdjęcia:',   
                     'type'=>'raw',             
                     'htmlOptions' => array('style'=>'text-align: center;','width'=>'100px')
                 ),
                array( //wypelnij ankiete
                     'type' => 'raw',
                     'value' => 'CHtml::button(($data->status_ankiety==0)?("Wypełnij ankietę Odwołanie"):("Edytuj ankietę Odwołanie"),
                      array(
                       "submit" => Yii::app()->createUrl(($data->status_ankiety==0)?("audytor/wypelnijAnkieteOdwolanie"):("audytor/edytujAnkieteOdwolanie"), 
                        array( 
                        "id_audytu" => $data->id,
                        "metoda" => $data->metodaID
                         )) 
                         ))', 
                        'htmlOptions' => array('style'=>'text-align: center;','width'=>'60px'), 
            ),
                            
	),
     ));

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
                url: '<?php echo Yii::app()->createAbsoluteUrl("audytor/pokazAudytorowOdwolanie"); ?>',
                data: {id_zespolu_audytorow_odwolanie:firstColVal, nazwa_zespolu_audytorow_odwolanie:secondColVal},
                
                success:function(data){
                     document.location.reload(true);
                },
                dataType:'html'
            });
            //document.location.reload(true);
       });
 
</script>


