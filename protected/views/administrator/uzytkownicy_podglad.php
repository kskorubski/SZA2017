<h2>Dane użytkownika:</h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'imie',
		'nazwisko',
		'username',
		'email',
		'telefon',
                array('name'=> 'RoleID', 'value' => Role::model()->findByPk($model->RoleID)->nazwa_roli),
		'data_logowania',
		array('name'=> 'Status konta:','type' =>'raw', 'value' => StatusKonta::model()->findByPk($model->status_kontaID)->nazwa_statusu),
                array('name'=> 'Województwo:', 'value' => Wojewodztwa::model()->findByPk($model->WojewodztwaID)->nazwa_wojewodztwa),
	),
)); ?>

<!--    <div id="ksRightColumn">
<?php 
   $rola = $model->RoleID;
   if($rola == 2) {
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
                'header'=>'Lista grup audytora:',
                'type'=>'raw',
                'value'=>'',               
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'80px'),
                ),
//                array(  
//                'header'=>'Nazwisko:',
//                'type'=>'raw',
//                'value'=>'$data["nazwisko"]',                
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'80px'),
//                ),
//                            array(  
//                'header'=>'Województwo:',
//                'type'=>'raw',
//                'value'=>'$data->wojewodztwas->nazwa_wojewodztwa',                
//                'htmlOptions' => array('style'=>'text-align: left;','width'=>'190px'),
//                ),
       
               ),
     )); 


   }
?> grid-form 
</div>-->

      <div class="row buttons">
	<?php echo CHtml::button('Edytuj dane', array('submit' => Yii::app()->createUrl("/administrator/uzytkownicy_edycja", array("id"=> $model->id))  )); ?>
	<?php echo CHtml::button('Zmień hasło', array('submit' => Yii::app()->createUrl("/administrator/zmienHasloAdmin", array("id"=> $model->id))  )); ?>
	<?php echo CHtml::button('Lista użytkowników', array( 'submit' => Yii::app()->createUrl("/administrator/uzytkownicy_lista")  )); ?>
      </div>