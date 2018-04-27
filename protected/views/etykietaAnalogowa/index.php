<?php
/* @var $this EtykietaAnalogowaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Etykieta Analogowas',
);

$this->menu=array(
	array('label'=>'Create EtykietaAnalogowa', 'url'=>array('create')),
	array('label'=>'Manage EtykietaAnalogowa', 'url'=>array('admin')),
);
?>

<h1>Etykieta Analogowas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
