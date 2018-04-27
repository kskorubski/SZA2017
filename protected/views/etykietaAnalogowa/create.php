<?php
/* @var $this EtykietaAnalogowaController */
/* @var $model EtykietaAnalogowa */

$this->breadcrumbs=array(
	'Etykieta Analogowas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EtykietaAnalogowa', 'url'=>array('index')),
	array('label'=>'Manage EtykietaAnalogowa', 'url'=>array('admin')),
);
?>

<h1>Create EtykietaAnalogowa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>