<?php
/* @var $this EtykietaCyfrowaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etykieta Cyfrowas',
);

$this->menu=array(
	array('label'=>'Create EtykietaCyfrowa', 'url'=>array('create')),
	array('label'=>'Manage EtykietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>Etykieta Cyfrowas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
