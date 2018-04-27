<?php
/* @var $this IdentyfikatoryWojewodztwController */
/* @var $data IdentyfikatoryWojewodztw */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rok_audytu')); ?>:</b>
	<?php echo CHtml::encode($data->rok_audytu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identyfikator_wojewodztwa')); ?>:</b>
	<?php echo CHtml::encode($data->identyfikator_wojewodztwa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WojewodztwaID')); ?>:</b>
	<?php echo CHtml::encode($data->WojewodztwaID); ?>
	<br />


</div>