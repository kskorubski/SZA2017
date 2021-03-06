<?php
/* @var $this EtykietaAnalogowaController */
/* @var $model EtykietaAnalogowa */

$this->breadcrumbs=array(
	'Etykieta Analogowas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EtykietaAnalogowa', 'url'=>array('index')),
	array('label'=>'Create EtykietaAnalogowa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#etykieta-analogowa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Etykieta Analogowas</h1>

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
	'id'=>'etykieta-analogowa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'x4_1',
		'x4_2',
		'x4_3',
		'x4_4',
		'x4_5',
		/*
		'x4_6',
		'x4_7',
		'x4_8',
		'x4_9',
		'x4_10',
		'x4_11',
		'x4_12',
		'x4_13',
		'x4_14',
		'x4_15',
		'x4_16',
		'x4_17',
		'x4_18',
		'x4_19',
		'x4_20',
		'x4_1_podpowiedz',
		'x4_2_podpowiedz',
		'x4_3_podpowiedz',
		'x4_4_podpowiedz',
		'x4_5_podpowiedz',
		'x4_6_podpowiedz',
		'x4_7_podpowiedz',
		'x4_8_podpowiedz',
		'x4_9_podpowiedz',
		'x4_10_podpowiedz',
		'x4_11_podpowiedz',
		'x4_12_podpowiedz',
		'x4_13_podpowiedz',
		'x4_14_podpowiedz',
		'x4_15_podpowiedz',
		'x4_16_podpowiedz',
		'x4_17_podpowiedz',
		'x4_18_podpowiedz',
		'x4_19_podpowiedz',
		'x4_20_podpowiedz',
		'AudytyID',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
