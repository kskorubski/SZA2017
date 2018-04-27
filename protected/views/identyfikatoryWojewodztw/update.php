<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $model IdentyfikatoryWojewodztw */

$this->breadcrumbs=array(
	'Identyfikatory Wojewodztws'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IdentyfikatoryWojewodztw', 'url'=>array('index')),
	array('label'=>'Create IdentyfikatoryWojewodztw', 'url'=>array('create')),
	array('label'=>'View IdentyfikatoryWojewodztw', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage IdentyfikatoryWojewodztw', 'url'=>array('admin')),
);
?>

<h1>Update IdentyfikatoryWojewodztw <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>