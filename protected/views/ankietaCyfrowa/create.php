<?php
/* @var $this AnkietaCyfrowaController */
/* @var $model AnkietaCyfrowa */

$this->breadcrumbs=array(
	'Ankieta Cyfrowas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnkietaCyfrowa', 'url'=>array('index')),
	array('label'=>'Manage AnkietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>Create AnkietaCyfrowa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>