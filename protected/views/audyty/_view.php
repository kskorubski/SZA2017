<?php
/* @var $this AudytyController */
/* @var $data Audyty */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rok_audytu')); ?>:</b>
	<?php echo CHtml::encode($data->rok_audytu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('osrodek_id')); ?>:</b>
	<?php echo CHtml::encode($data->osrodek_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identyfikator_zestawu')); ?>:</b>
	<?php echo CHtml::encode($data->identyfikator_zestawu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_ankiety')); ?>:</b>
	<?php echo CHtml::encode($data->status_ankiety); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_etykiety')); ?>:</b>
	<?php echo CHtml::encode($data->status_etykiety); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_odwolania')); ?>:</b>
	<?php echo CHtml::encode($data->status_odwolania); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zaliczenie')); ?>:</b>
	<?php echo CHtml::encode($data->zaliczenie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Zespoly_audytorowID')); ?>:</b>
	<?php echo CHtml::encode($data->Zespoly_audytorowID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metodaID')); ?>:</b>
	<?php echo CHtml::encode($data->metodaID); ?>
	<br />

	*/ ?>

</div>