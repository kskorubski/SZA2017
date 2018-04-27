<?php
/* @var $this AnkietaAnalogowaController */
/* @var $model AnkietaAnalogowa */

$this->breadcrumbs=array(
	'Ankieta Analogowas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnkietaAnalogowa', 'url'=>array('index')),
	array('label'=>'Create AnkietaAnalogowa', 'url'=>array('create')),
	array('label'=>'View AnkietaAnalogowa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AnkietaAnalogowa', 'url'=>array('admin')),
);
?>

<h1>Update AnkietaAnalogowa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>