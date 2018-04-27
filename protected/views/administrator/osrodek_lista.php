<h2>Zarządzanie bazą ośrodków.</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'osrodki-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enablePagination' => true,
        'ajaxUpdate'=>false,


//'summaryText' => "Wyświetlono rezultaty {start} - {end} z {count}",
	'columns'=>array(
//		'id',
//		'nazwa',
	array(
                'name' => 'nazwa',
                'type' => 'raw',
                'value' => '$data->nazwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'300px'),
             ),   
//		'adres',
        array(
                'name' => 'adres',
                'type' => 'raw',
                'value' => '$data->adres',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
             ),   
//		'kod',
	array(
                'name' => 'kod',
                'type' => 'raw',
                'value' => '$data->kod',
                'htmlOptions' => array('style'=>'text-align: right;','width'=>'50px'),
             ),   
//		'miasto',
        array(
                'name' => 'miasto',
                'type' => 'raw',
                'value' => '$data->miasto',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
             ),   
            
//		'WojewodztwaID',
        array(
                'name' => 'nazwa_wojewodztwa',
                'type' => 'raw',
                'value' => '$data->wojewodztwa->nazwa_wojewodztwa',
                'htmlOptions' => array('style'=>'text-align: left;','width'=>'100px'),
                'filter' => CHtml::activeDropDownList($model, 'nazwa_wojewodztwa', CHtml::listData(Wojewodztwa::model()->findAll(), 'nazwa_wojewodztwa', 'nazwa_wojewodztwa'), array('prompt' => '<wszystkie>')),
           ),
            
        array( // PRZYCISKI KOLUMNA
                'header'=>'Opcje:',
                'htmlOptions' => array('style'=>'text-align: center;'),
                'class'=>'CButtonColumn',
                'template'=>'{update} {delete} {view}',
                'buttons'=>array (
                    'update'=> array(
                        'label'=>'Edytuj',
                        'url'=>'Yii::app()->createUrl("administrator/osrodek_edytuj", array("id"=>$data->id))',
                        ),
                    'delete'=> array(
                        'label'=>'Usuń',
                        'url'=>'Yii::app()->createUrl("administrator/osrodek_usun", array("id"=>$data->id))',
                        ),
                    'view'=> array(
                        'label'=>'Podgląd',
                        'url'=>'Yii::app()->createUrl("administrator/osrodek_podglad", array("id"=>$data->id))',
                        ),
                    ),
            ),
	),
)); ?>