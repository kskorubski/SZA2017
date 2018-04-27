<?php
/* @var $this AudytyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Audyties',
);

$this->menu=array(
	array('label'=>'Create Audyty', 'url'=>array('create')),
	array('label'=>'Manage Audyty', 'url'=>array('admin')),
);
?>

<h1>Audyties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
