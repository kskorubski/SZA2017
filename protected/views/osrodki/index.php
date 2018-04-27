<?php
/* @var $this OsrodkiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Osrodkis',
);

$this->menu=array(
	array('label'=>'Create Osrodki', 'url'=>array('create')),
	array('label'=>'Manage Osrodki', 'url'=>array('admin')),
);
?>

<h1>Osrodkis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
