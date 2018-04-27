<?php
/* @var $this OsrodkiController */
/* @var $model Osrodki */

$this->breadcrumbs=array(
	'Osrodkis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Osrodki', 'url'=>array('index')),
	array('label'=>'Create Osrodki', 'url'=>array('create')),
	array('label'=>'Update Osrodki', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Osrodki', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Osrodki', 'url'=>array('admin')),
);
?>

<h1>View Osrodki #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nazwa',
		'adres',
		'kod',
		'miasto',
		'WojewodztwaID',
	),
)); ?>
