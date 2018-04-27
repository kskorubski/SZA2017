<?php
/* @var $this EtykietaCyfrowaController */
/* @var $model EtykietaCyfrowa */

$this->breadcrumbs=array(
	'Etykieta Cyfrowas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EtykietaCyfrowa', 'url'=>array('index')),
	array('label'=>'Manage EtykietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>Create EtykietaCyfrowa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>