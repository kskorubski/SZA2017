<?php
/* @var $this EtykietaAnalogowaController */
/* @var $model EtykietaAnalogowa */

$this->breadcrumbs=array(
	'Etykieta Analogowas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EtykietaAnalogowa', 'url'=>array('index')),
	array('label'=>'Create EtykietaAnalogowa', 'url'=>array('create')),
	array('label'=>'View EtykietaAnalogowa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EtykietaAnalogowa', 'url'=>array('admin')),
);
?>

<h1>Update EtykietaAnalogowa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>