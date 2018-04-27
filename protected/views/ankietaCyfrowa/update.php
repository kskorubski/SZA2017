<?php
/* @var $this AnkietaCyfrowaController */
/* @var $model AnkietaCyfrowa */

$this->breadcrumbs=array(
	'Ankieta Cyfrowas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnkietaCyfrowa', 'url'=>array('index')),
	array('label'=>'Create AnkietaCyfrowa', 'url'=>array('create')),
	array('label'=>'View AnkietaCyfrowa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnkietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>Update AnkietaCyfrowa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>