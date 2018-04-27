<?php
/* @var $this AnkietaCyfrowaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ankieta Cyfrowas',
);

$this->menu=array(
	array('label'=>'Create AnkietaCyfrowa', 'url'=>array('create')),
	array('label'=>'Manage AnkietaCyfrowa', 'url'=>array('admin')),
);
?>

<h1>Ankieta Cyfrowas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
