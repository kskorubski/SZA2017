<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $model IdentyfikatoryWojewodztw */

$this->breadcrumbs=array(
	'Identyfikatory Wojewodztws'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IdentyfikatoryWojewodztw', 'url'=>array('index')),
	array('label'=>'Manage IdentyfikatoryWojewodztw', 'url'=>array('admin')),
);
?>

<h1>Create IdentyfikatoryWojewodztw</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>