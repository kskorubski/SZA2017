<h1>Panel administracyjny</h1>

<!-- TUTAJ JEST ALERT O ZMIANIE HASŁA-->
<?php if(Yii::app()->user->hasFlash('haslo-zmienione')) {
    $message = Yii::app()->user->getFlash('haslo-zmienione'); 
    echo "<script type='text/javascript'> alert('$message'); </script>"; }?>

<div id="ksRow">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'uzytkownicy-grid',
	'dataProvider'=>$model->search(),
	'enablePagination' => true,
        'ajaxUpdate'=>false,
        'nullDisplay'=>'brak',
	'filter'=>$model,
	'columns'=>array(
		'imie',
		'nazwisko',
		'username',
		'email',
		'telefon',
                array('name'=> 'RoleID', 'value' => 'Role::model()->findByPk($data->RoleID)->nazwa_roli'),
		array('name'=> 'status_kontaID', 'value' => 'StatusKonta::model()->findByPk($data->status_kontaID)->nazwa_statusu'),
            
                array( 
                'type' => 'raw',
                'value' => 'CHtml::button("Zmień hasło", 
                    array(
                       "submit" => Yii::app()->createUrl("/administrator/zmienHasloAdmin" , 
                        array( 
                        "id" => $data->id,
                         )) 
                         ))', 
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'60px'),),
            
                array(
                'type' => 'raw',
                'value' => 'CHtml::button("Edytuj", 
                    array(
                          "submit" => Yii::app()->createUrl("/administrator/uzytkownicy_edycja"."&id=".$data->id)
                         ))', 
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'60px'),),    
            
              array(
                'type' => 'raw',
                'value' => 'CHtml::button("Szczegóły", 
                    array(
                          "submit" => Yii::app()->createUrl("/administrator/uzytkownicy_podglad"."&id=".$data->id)
                         ))', 
                'htmlOptions' => array('style'=>'text-align: center;','width'=>'60px'),),   
	),
)); ?><!-- grid-form -->

</div>

