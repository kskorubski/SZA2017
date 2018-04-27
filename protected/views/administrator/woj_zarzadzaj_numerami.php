<h2>Zarządzanie identyfikatorami województw.</h2>

    <?php 
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'forma-wojewodztwo-identyfikator',
    'enableAjaxValidation'=> false,
        'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                             ),
)); 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'identyfikatory-wojewodztw-grid',
	'dataProvider'=>Wojewodztwa::model()->wojewodztwa_bez_identyfikatorow(),
        'summaryText'=>'<div id="ksRow"> <div id="ksLeftColumn"> Tab.1 Województwa bez nadanego identyfikatora. </div> <div id="ksRightColumn"> Wyświetlono rezultaty {start} - {end} z {count} </div> </div>',
        'ajaxUpdate'=>false,
        'emptyText' => 'Dla wszystki województw przypisano identyfikatory!',
        'showTableOnEmpty'=>true, 
	'columns'=>array(
		'id_wojewodztwa',
		'nazwa_wojewodztwa',
        array(  
                'header'=>'Identyfikator:',
                'type'=>'raw',
                'value'=>'CHtml::textField("mText".$data["id_wojewodztwa"], "" ,array("style"=>"width:50px; align:center;"))',                
                'htmlOptions' => array('style'=>'text-align: center;',
                                        'width'=>'60px'),
                ),
            
         array(
              'header'=>'Opcje:',
                'type' => 'raw',
             'htmlOptions' => array('style'=>'text-align: center;',
                                        'width'=>'60px'),
                'value' => 'CHtml::ajaxSubmitButton("Zapisz", 
                     array(\'administrator/identyfikator_wojewodztwa_zapisz\'),
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
                                "id_wojewodztwa" => "js:function() { 
                                return \'$data->id_wojewodztwa\'; 
                                }",
                                
                                "identyfikator" => "js:function() { 
                                var idp = \'$data->id_wojewodztwa\';
                                var nr = $(\'#mText\'+idp).val();
                                
                                if (!isNumber(nr)){
                                alert(\'#02 Wartość Nr musi być liczbą!\');
                                throw { name: \'FatalError\', message: \'Something went badly wrong\' };
                                } else
                                { return nr; }
                                }",

                                ),
                        )
                    )',
             ), 
	),
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'identyfikatory-wojewodztw-grid',
	'dataProvider'=>$model->wojewodztwa_z_nadanym_identyfikatorem(),
//	'filter'=>$model, // czy ma wyświetlać okienka do wpisywania filtrowania
        'summaryText'=>'<div id="ksRow"> <div id="ksLeftColumn"> Tab.2 Województwa z nadanymi identyfikatorami. </div> <div id="ksRightColumn"> Wyświetlono rezultaty {start} - {end} z {count} </div> </div>',
     'ajaxUpdate'=>false,
	'columns'=>array(
//		'id',
//		'rok_audytu',
		'identyfikator_wojewodztwa',
//		'WojewodztwaID',
                'wojewodztwa.nazwa_wojewodztwa',
        array( // PRZYCISKI KOLUMNA
                'header'=>'Opcje:',
                'htmlOptions' => array('style'=>'text-align: center;'),
                'class'=>'CButtonColumn',
                'template'=>'{update} {delete}',
                'buttons'=>array (
                    'update'=> array(
                        'label'=>'Usuń',
                        'url'=>'Yii::app()->createUrl("administrator/identyfikator_wojewodztwa_edytuj", array("id"=>$data->id))',
                        ),                    
                    'delete'=> array(
                        'label'=>'Usuń',
                        'url'=>'Yii::app()->createUrl("administrator/identyfikator_wojewodztwa_usun", array("id"=>$data->id))',
                        ),
                    ),
            ),
	),
)); ?>


<?php $this->endWidget(); ?>

<script type="text/javascript">
 
 function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
</script>