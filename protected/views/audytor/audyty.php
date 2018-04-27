
<h1>Wypełnij ankietę dla wybranego zestawu.</h1>

<?php 

    if (!isset(Yii::app()->session['id_zespolu_zestawy'])){
        Yii::app()->session['id_zespolu_zestawy'] = 0;  
        
        echo "<h3>Klikając nazwe zespołu przechodzisz w tryb edycji</h3>";
    } else {
        echo "<h3>Aktualnie edytujesz zespół: ".Yii::app()->session['id_zespolu_audytorow']." - ".Yii::app()->session['nazwa_zespolu_audytorow']."</h3>" ;
    }
    if (!isset(Yii::app()->session['id_zespolu_audytorow'])){
        Yii::app()->session['id_zespolu_audytorow'] = 0; 
    }
    
?>
<div id="ksLeftColumn">
        <?php 
        $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>"tab-lewa",
            'ajaxUpdate'=>false,
            'dataProvider'=> ZespolyAudytorow::model()->pokazZespolyAudytora(), // tutaj musisz napisac wlasna metode!!!
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
        'dataProvider' => $temp = Uzytkownicy::model()->pokazDodanychAudytorow(),
        'enablePagination' => true,
        'ajaxUpdate'=>false,
        'id' => "tab_prawa", 
     	'columns'=>
         array(
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
//if(Audyty::model()->findByPk($data->)->status_ankiety == 0){
//if ((Audyty::model()->findByPk($data->id)->status_ankiety) == 0)
//$audytyAnkieta = Audyty::model()->findByPk(243);
//$statusAnkiety = $audytyAnkieta->status_ankiety;
//if ($statusAnkiety == 0)
//{
////if(Audyty::model()->status_ankiety == 0){Audyty::model()->findByPk($data->)->status_ankiety
//    $button_opis = "Wypełnij ankietę";
//    $dir = "audytor/wypelnijAnkiete";
//    
//}else {
//    $button_opis = "Edytuj ankietę";
//    $dir = "audytor/edytujAnkiete"; 
//    
//}


$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => Audyty::model()->pokazZestawyDodaneDoGrupyDlaAudytora(),
	'enablePagination' => true,
        'ajaxUpdate' => false,
     	'columns'=>
        array(
//           
            
                array(  
                'header'=>'Id zestawu:',
                'type'=>'raw',
                'value'=>'$data->identyfikator_zestawu',                
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'240px')
             ),

                 array(
                 'name'=> 'MetodaID', 
                 'value' => 'Metoda::model()->findByPk($data->metodaID)->nazwa_metody', 
                 'header'=>'Metoda wykonania zdjęcia:',   
                 'type'=>'raw',             
                 'htmlOptions' => array('style'=>'text-align: center;','width'=>'100px')
             ),  
                 array(
                'name' => 'status_etykiety',
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'60px'),
                'filter' => array('1'=>'Wypełniona', '0'=>'Niewypełniona'),
                'value' =>'($data->status_etykiety==0)?("Niewypełniona"):("Wypełniona")',
             ),
                array(
                'name' => 'status_ankiety',
//                'type' => 'raw',
                
//                'htmlOptions' => '($data->status_ankiety==0)?("array('style'=>'text-align: center;', 'width'=>'60px'))":"array('style'=>'text-align: center;', 'width'=>'60px')",
//                'value' =>'$data->status_ankiety',
                'htmlOptions' => array('style'=>'text-align: center;', 'width'=>'60px'),
                'filter' => array('1'=>'Wypełniona', '0'=>'Niewypełniona'),
                'value' => '($data->status_ankiety==0)?("Niewypełniona"):("Wypełniona")',
//                'cssClassExpression' =>'($data->status_ankiety==0)?("TEST"):("Wypełniona")',
//                'value' =>'($data->status_ankiety==0)?("Niewypełniona"):("Wypełniona")',
                
                    
             ),
               
            array( //wypelnij ankiete
                'type' => 'raw',
                'value' => 'CHtml::button(($data->status_ankiety==0)?("Wypełnij ankietę"):("Edytuj ankietę"),
                    array(
                       "submit" => Yii::app()->createUrl(($data->status_ankiety==0)?("audytor/wypelnijAnkiete"):("audytor/edytujAnkiete"), 
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
                url: '<?php echo Yii::app()->createAbsoluteUrl("audytor/pokazAudytorow"); ?>',
                data: {id_zespolu_audytorow:firstColVal, nazwa_zespolu_audytorow:secondColVal},
                
                success:function(data){
                     document.location.reload(true);
                },
                dataType:'html'
            });
       });
 
</script>


