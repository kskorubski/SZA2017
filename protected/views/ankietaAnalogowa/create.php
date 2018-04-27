<?php
/* @var $this AnkietaAnalogowaController */
/* @var $model AnkietaAnalogowa */

$this->breadcrumbs=array(
	'Ankieta Analogowas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnkietaAnalogowa', 'url'=>array('index')),
	array('label'=>'Manage AnkietaAnalogowa', 'url'=>array('admin')),
);
?>

<h1>Create AnkietaAnalogowa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>