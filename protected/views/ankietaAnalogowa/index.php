<?php
/* @var $this AnkietaAnalogowaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ankieta Analogowas',
);

$this->menu=array(
	array('label'=>'Create AnkietaAnalogowa', 'url'=>array('create')),
	array('label'=>'Manage AnkietaAnalogowa', 'url'=>array('admin')),
);
?>

<h1>Ankieta Analogowas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
