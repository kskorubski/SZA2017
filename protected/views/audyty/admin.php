<?php
/* @var $this AudytyController */
/* @var $model Audyty */

$this->breadcrumbs=array(
	'Audyties'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Audyty', 'url'=>array('index')),
	array('label'=>'Create Audyty', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#audyty-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Audyties</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'audyty-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'rok_audytu',
		'osrodek_id',
		'identyfikator_zestawu',
		'status_ankiety',
		'status_etykiety',
		/*
		'status_odwolania',
		'zaliczenie',
		'Zespoly_audytorowID',
		'metodaID',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
