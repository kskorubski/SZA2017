
<h2>Dodaj zespół lub edytuj nazwe już istniejącego.</h2> 

<?php $this->renderPartial('uzytkownicy_zespolyaud_forma_dodaj', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'zespoly-audytorow-grid',
	'dataProvider'=>$model->search(),
        'ajaxUpdate'=>false,
	'filter'=>$model,
	'columns'=>array(
//                'id',
		'nazwa_zespolu',
//		'rok_audytu',
            array(
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'50px'),
                'value' => 'CHtml::button("Zmień nazwę", 
                     array("submit" => Yii::app()->createUrl("administrator/uzytkownicy_zespolyaud_edycja",
                                                             array("id" => $data->id))
                     ))',
                ),
            
            array(
                'type' => 'raw',
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'50px'),
                'value' => 'CHtml::ajaxSubmitButton("Usuń", 
                        array("administrator/usunZespolAudytorow"),
                        array(
                            "type" => "POST",
                            "beforeSend" => "function( request ){
                            var x = confirm(\'Czy na pewno chcesz usunąć zespół?\');
                            if (!x){
                               throw { name: \'FatalError\', message: \'Przerwałem usuwanie\' };}
                            }",  
                            "success" => "function( data ) {
                            document.location.reload(true); 
                            }",
                            "error" => "function( data ){
                            alert(\'Zespół posiada przypisanych audytorów lub audyty i nie może zostać usunięty!\');
                            }", 
                            "data" => array( 
                                            "id" => $data->id,
                                      ),
                            )
                    )',
             ),             
            
            
	),
)); 
?>