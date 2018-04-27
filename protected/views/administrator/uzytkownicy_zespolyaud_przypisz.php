<h1>Zarządzanie składem zespołów audytorów.</h1>


<?php 
     if (!isset(Yii::app()->session['id_zespolu_audytorow'])){
        Yii::app()->session['id_zespolu_audytorow'] = 0;    
        echo "<h3>Klikając nazwe zespołu przechodzisz w tryb edycji</h3>";
    } else {
        echo "<h3>Aktualnie edytujesz zespół: ".Yii::app()->session['id_zespolu_audytorow']." - ".Yii::app()->session['nazwa_zespolu_audytorow']."</h3>" ;
    }
?>


<div id="ksLeftColumn">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'zespoly-audytorow-grid',
            'dataProvider'=>$model->search(),
            'htmlOptions'=>array('id'=>'MyID'),
            'ajaxUpdate'=>false,
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
//------------------------druga tabela z wynikami zapisanych zestrawow---------
   $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $temp = Uzytkownicy::model()->pokazDodanychAudytorow(),
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
        array(
                        'type' => 'raw',
                        'htmlOptions' => array('style'=>'text-align: center;','width'=>'50px'),
                        'value' => 'CHtml::ajaxSubmitButton("Usuń", 
                        array(\'administrator/usunAudytoraZGrupy\'),
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
                                "id_audytora_w_grupie" => "js:function() { 
                                return {$data->uzytkownicyzespolyaudytorows->id};
                                }"),
                            ))',
                    )
	),
     )); 
// echo print_r($temp,true);
?>
    
</div>

<div id="ksRow">
<?php 
//----------------tablea z audytorami ktorzy nie sa w grupie--------------------
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $temp = Uzytkownicy::model()->pokazBezZespolu(),
	'enablePagination' => true,
        'id' => 'tab_audytorzy',
        'ajaxUpdate'=>false,
     	'columns'=>
        array(
//                'id',
		'imie',
		'nazwisko',
		'wojewodztwas.nazwa_wojewodztwa',
                               array(

                        'type' => 'raw',
                        'htmlOptions' => array('style'=>'text-align: center;',
                                                'width'=>'50px'),
                        'value' => 'CHtml::ajaxSubmitButton("Dodaj", 
                        array(\'administrator/przypiszAudytoraDoGrupy\'),
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
                                "id_audytora" => "js:function() { 
                                return {$data->id};
                                }"),

                            ))',
                    )
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
                url: '<?php echo Yii::app()->createAbsoluteUrl("administrator/pokazSkladGrupyAudytorow"); ?>',
                data: {id_zespolu_audytorow:firstColVal, nazwa_zespolu_audytorow:secondColVal},
                success:function(data){
                     document.location.reload(true);
                },
                dataType:'html'
            });
          
       });
       
        
 
</script>

