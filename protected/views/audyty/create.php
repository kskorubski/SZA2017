<?php
/* @var $this AudytyController */
/* @var $model Audyty */

$this->breadcrumbs=array(
	'Audyties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Audyty', 'url'=>array('index')),
	array('label'=>'Manage Audyty', 'url'=>array('admin')),
);
?>

<h1>Create Audyty</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>