<?php
/* @var $this EtykietaCyfrowaController */
/* @var $model EtykietaCyfrowa */

$this->breadcrumbs=array(
	'Etykieta Cyfrowas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EtykietaCyfrowa', 'url'=>array('index')),
	array('label'=>'Create EtykietaCyfrowa', 'url'=>array('create')),
	array('label'=>'Update EtykietaCyfrowa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EtykietaCyfrowa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EtykietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>View EtykietaCyfrowa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'x4_1',
		'x4_2',
		'x4_3',
		'x4_4',
		'x4_5',
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
		'AudytyID',
	),
)); ?>
