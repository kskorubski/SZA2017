<?php
/* @var $this AnkietaAnalogowaController */
/* @var $model AnkietaAnalogowa */

$this->breadcrumbs=array(
	'Ankieta Analogowas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AnkietaAnalogowa', 'url'=>array('index')),
	array('label'=>'Create AnkietaAnalogowa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ankieta-analogowa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ankieta Analogowas</h1>

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
	'id'=>'ankieta-analogowa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'x1_1a',
		'x1_1b',
		'x1_1c',
		'x1_1d',
		'x1_2a',
		/*
		'x1_2b',
		'x1_2c',
		'x1_2d',
		'x1_3a',
		'x1_3b',
		'x1_3c',
		'x1_3d',
		'x1_4a',
		'x1_4b',
		'x1_4c',
		'x1_4d',
		'x1_5a',
		'x1_5b',
		'x1_6a',
		'x1_6b',
		'x1_6c',
		'x1_6d',
		'x1_7a',
		'x1_7b',
		'x1_7c',
		'x1_7d',
		'x1_8a',
		'x1_8b',
		'x1_8c',
		'x1_8d',
		'x1_9a',
		'x1_9b',
		'x1_9c',
		'x1_9d',
		'x1_10a',
		'x1_10b',
		'x2_1a',
		'x2_1b',
		'x2_2a',
		'x2_2b',
		'x2_3a',
		'x2_3b',
		'x2_4a',
		'x2_4b',
		'x2_5a',
		'x2_5b',
		'x2_6a',
		'x2_6b',
		'x2_7a',
		'x2_7b',
		'x2_8a',
		'x2_8b',
		'x2_9a',
		'x2_9b',
		'x3_1a',
		'x3_1b',
		'x3_2a',
		'x3_2b',
		'x3_3a',
		'x3_3b',
		'x1_1_podpowiedz',
		'x1_2_podpowiedz',
		'x1_3_podpowiedz',
		'x1_4_podpowiedz',
		'x2_1_podpowiedz',
		'x2_2_podpowiedz',
		'x2_3_podpowiedz',
		'x2_4_podpowiedz',
		'x2_5_podpowiedz',
		'x2_6_podpowiedz',
		'x2_7_podpowiedz',
		'x2_8_podpowiedz',
		'x2_9_podpowiedz',
		'x3_1_podpowiedz',
		'x3_2_podpowiedz',
		'x3_3_podpowiedz',
		'AudytyID',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
