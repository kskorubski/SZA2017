<?php
/* @var $this EtykietaAnalogowaController */
/* @var $data EtykietaAnalogowa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_1')); ?>:</b>
	<?php echo CHtml::encode($data->x4_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_2')); ?>:</b>
	<?php echo CHtml::encode($data->x4_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_3')); ?>:</b>
	<?php echo CHtml::encode($data->x4_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_4')); ?>:</b>
	<?php echo CHtml::encode($data->x4_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_5')); ?>:</b>
	<?php echo CHtml::encode($data->x4_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_6')); ?>:</b>
	<?php echo CHtml::encode($data->x4_6); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_7')); ?>:</b>
	<?php echo CHtml::encode($data->x4_7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_8')); ?>:</b>
	<?php echo CHtml::encode($data->x4_8); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_9')); ?>:</b>
	<?php echo CHtml::encode($data->x4_9); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_10')); ?>:</b>
	<?php echo CHtml::encode($data->x4_10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_11')); ?>:</b>
	<?php echo CHtml::encode($data->x4_11); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_12')); ?>:</b>
	<?php echo CHtml::encode($data->x4_12); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_13')); ?>:</b>
	<?php echo CHtml::encode($data->x4_13); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_14')); ?>:</b>
	<?php echo CHtml::encode($data->x4_14); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_15')); ?>:</b>
	<?php echo CHtml::encode($data->x4_15); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_16')); ?>:</b>
	<?php echo CHtml::encode($data->x4_16); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_17')); ?>:</b>
	<?php echo CHtml::encode($data->x4_17); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_18')); ?>:</b>
	<?php echo CHtml::encode($data->x4_18); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_19')); ?>:</b>
	<?php echo CHtml::encode($data->x4_19); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_20')); ?>:</b>
	<?php echo CHtml::encode($data->x4_20); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_1_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_1_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_2_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_2_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_3_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_3_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_4_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_4_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_5_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_5_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_6_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_6_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_7_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_7_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_8_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_8_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_9_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_9_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_10_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_10_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_11_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_11_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_12_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_12_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_13_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_13_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_14_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_14_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_15_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_15_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_16_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_16_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_17_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_17_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_18_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_18_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_19_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_19_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_20_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x4_20_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AudytyID')); ?>:</b>
	<?php echo CHtml::encode($data->AudytyID); ?>
	<br />

	*/ ?>

</div>