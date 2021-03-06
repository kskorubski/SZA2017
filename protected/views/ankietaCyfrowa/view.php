<?php
/* @var $this AnkietaCyfrowaController */
/* @var $model AnkietaCyfrowa */

$this->breadcrumbs=array(
	'Ankieta Cyfrowas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AnkietaCyfrowa', 'url'=>array('index')),
	array('label'=>'Create AnkietaCyfrowa', 'url'=>array('create')),
	array('label'=>'Update AnkietaCyfrowa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AnkietaCyfrowa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnkietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>View AnkietaCyfrowa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'x1_1a',
		'x1_1b',
		'x1_1c',
		'x1_1d',
		'x1_2a',
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
		'x1_5_podpowiedz',
		'x1_6_podpowiedz',
		'x1_7_podpowiedz',
		'x1_8_podpowiedz',
		'x1_9_podpowiedz',
		'x1_10_podpowiedz',
		'x2_1_podpowiedz',
		'x3_1_podpowiedz',
		'x3_2_podpowiedz',
		'x3_3_podpowiedz',
		'AudytyID',
	),
)); ?>
