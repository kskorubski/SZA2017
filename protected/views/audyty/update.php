<?php
/* @var $this AudytyController */
/* @var $model Audyty */

$this->breadcrumbs=array(
	'Audyties'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Audyty', 'url'=>array('index')),
	array('label'=>'Create Audyty', 'url'=>array('create')),
	array('label'=>'View Audyty', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Audyty', 'url'=>array('admin')),
);
?>

<h1>Update Audyty <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>