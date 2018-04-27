<?php
/* @var $this AudytyController */
/* @var $model Audyty */

$this->breadcrumbs=array(
	'Audyties'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Audyty', 'url'=>array('index')),
	array('label'=>'Create Audyty', 'url'=>array('create')),
	array('label'=>'Update Audyty', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Audyty', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Audyty', 'url'=>array('admin')),
);
?>

<h1>View Audyty #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rok_audytu',
		'osrodek_id',
		'identyfikator_zestawu',
		'status_ankiety',
		'status_etykiety',
		'status_odwolania',
		'zaliczenie',
		'Zespoly_audytorowID',
		'metodaID',
	),
)); ?>
