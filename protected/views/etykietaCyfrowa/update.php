<?php
/* @var $this EtykietaCyfrowaController */
/* @var $model EtykietaCyfrowa */

$this->breadcrumbs=array(
	'Etykieta Cyfrowas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EtykietaCyfrowa', 'url'=>array('index')),
	array('label'=>'Create EtykietaCyfrowa', 'url'=>array('create')),
	array('label'=>'View EtykietaCyfrowa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EtykietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>Update EtykietaCyfrowa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>