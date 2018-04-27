<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $model IdentyfikatoryWojewodztw */

$this->breadcrumbs=array(
	'Identyfikatory Wojewodztws'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List IdentyfikatoryWojewodztw', 'url'=>array('index')),
	array('label'=>'Create IdentyfikatoryWojewodztw', 'url'=>array('create')),
	array('label'=>'Update IdentyfikatoryWojewodztw', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IdentyfikatoryWojewodztw', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IdentyfikatoryWojewodztw', 'url'=>array('admin')),
);
?>

<h1>View IdentyfikatoryWojewodztw #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rok_audytu',
		'identyfikator_wojewodztwa',
		'WojewodztwaID',
	),
)); ?>
