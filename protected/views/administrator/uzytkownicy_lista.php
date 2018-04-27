<h2>Zarządzaj użytkownikami.</h2>

<!-- TUTAJ JEST ALERT O ZMIANIE HASŁA-->
<?php if(Yii::app()->user->hasFlash('haslo-zmienione')) {
    $message = Yii::app()->user->getFlash('haslo-zmienione'); 
    echo "<script type='text/javascript'> alert('$message'); </script>"; }?>

<div id="ksRow">
<?php 

$dataProvider = $model->search();
$dataProvider->getPagination()->setPageSize(Yii::app()->user->getState('pageSizeUzytkownicyLista', Yii::app()->params['defaultPageSize'])); 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'uzytkownicy-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
    
        'enableSorting'=>false,
        'template' => '{summary} {items}
                       <div id="ksRow"> 
                       <div id="ksRightColumn">Liczba wierszy na strone:'.
                        CHtml::dropDownList(
                        'pageSize',
                        Yii::app()->user->getState( 'pageSizeUzytkownicyLista', Yii::app()->params[ 'defaultPageSize' ]),
                        array(10=>10,20=>20,50=>50,100=>100),
                        array('onchange'=>"$.fn.yiiGridView.update('uzytkownicy-grid',{data:{pageSizeUzytkownicyLista:$(this).val()}});"))
                     .'</div>
                       <div id="ksRow"> {pager}  </div>
                       </div>',
    
        'summaryText'=>'<div id="ksRow"> 
                        <div id="ksLeftColumn"> Tabela nr 1. Lista użytkowników </div> 
                        <div id="ksRightColumn"> Wyświetlono rezultaty {start}-{end} z {count}. </div> 
                        </div>',
        'pager' => array(
                        'class' => 'CLinkPager',
                        'maxButtonCount' => '6',
                        ),
    	'enablePagination' => true, 
        'ajaxUpdate'=>false, 
        'showTableOnEmpty'=>false, 
        'emptyText' => 'Brak zestawów przypisanych do grupy audytorów!',    
    
    
    
    
	'columns'=>array(
		'imie',
		'nazwisko',
		'username',
		'email',
		'telefon',
                array('name'=> 'RoleID', 
                    'value' => 'Role::model()->findByPk($data->RoleID)->nazwa_roli',
                    'filter' => array('1'=>'Administrator', '2'=>'Audytor'),),
            
		array('name'=> 'status_kontaID', 
                    'value' => 'StatusKonta::model()->findByPk($data->status_kontaID)->nazwa_statusu',
                    'filter' => array('1'=>'Aktywne', '2'=>'Zablokowane'),),
            
                array( // PRZYCISKI KOLUMNA
                'header'=>'Opcje:',
                'htmlOptions' => array('style' => 'text-align: center;', 'width' => '30px'),
                'class'=>'CButtonColumn',
                'template'=>'{view}',
                'buttons'=>array (
                    'view'=> array(
                        'label'=>'Podgląd',
                        'url'=>'Yii::app()->createUrl("administrator/uzytkownicy_podglad", array("id"=>$data->id))',
                        ),
                    ),
            ),
            
//            
	),
)); ?><!-- grid-form -->

</div>

