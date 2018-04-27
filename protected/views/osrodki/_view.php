<?php
/* @var $this OsrodkiController */
/* @var $data Osrodki */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nazwa')); ?>:</b>
	<?php echo CHtml::encode($data->nazwa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adres')); ?>:</b>
	<?php echo CHtml::encode($data->adres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kod')); ?>:</b>
	<?php echo CHtml::encode($data->kod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miasto')); ?>:</b>
	<?php echo CHtml::encode($data->miasto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WojewodztwaID')); ?>:</b>
	<?php echo CHtml::encode($data->WojewodztwaID); ?>
	<br />


</div>