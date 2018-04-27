<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Identyfikatory Wojewodztws',
);

$this->menu=array(
	array('label'=>'Create IdentyfikatoryWojewodztw', 'url'=>array('create')),
	array('label'=>'Manage IdentyfikatoryWojewodztw', 'url'=>array('admin')),
);
?>

<h1>Identyfikatory Wojewodztws</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
