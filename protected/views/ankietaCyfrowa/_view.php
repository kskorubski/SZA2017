<?php
/* @var $this AnkietaCyfrowaController */
/* @var $data AnkietaCyfrowa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_1a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_1a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_1b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_1b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_1c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_1c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_1d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_1d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_2a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_2a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_2b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_2b); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_2c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_2c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_2d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_2d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_3a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_3a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_3b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_3b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_3c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_3c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_3d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_3d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_4a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_4a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_4b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_4b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_4c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_4c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_4d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_4d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_5a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_5a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_5b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_5b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_6a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_6a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_6b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_6b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_6c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_6c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_6d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_6d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_7a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_7a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_7b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_7b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_7c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_7c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_7d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_7d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_8a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_8a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_8b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_8b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_8c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_8c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_8d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_8d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_9a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_9a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_9b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_9b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_9c')); ?>:</b>
	<?php echo CHtml::encode($data->x1_9c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_9d')); ?>:</b>
	<?php echo CHtml::encode($data->x1_9d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_10a')); ?>:</b>
	<?php echo CHtml::encode($data->x1_10a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_10b')); ?>:</b>
	<?php echo CHtml::encode($data->x1_10b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x2_1a')); ?>:</b>
	<?php echo CHtml::encode($data->x2_1a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x2_1b')); ?>:</b>
	<?php echo CHtml::encode($data->x2_1b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_1a')); ?>:</b>
	<?php echo CHtml::encode($data->x3_1a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_1b')); ?>:</b>
	<?php echo CHtml::encode($data->x3_1b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_2a')); ?>:</b>
	<?php echo CHtml::encode($data->x3_2a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_2b')); ?>:</b>
	<?php echo CHtml::encode($data->x3_2b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_3a')); ?>:</b>
	<?php echo CHtml::encode($data->x3_3a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_3b')); ?>:</b>
	<?php echo CHtml::encode($data->x3_3b); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_1_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_1_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_2_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_2_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_3_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_3_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_4_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_4_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_5_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_5_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_6_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_6_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_7_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_7_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_8_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_8_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_9_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_9_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x1_10_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x1_10_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x2_1_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x2_1_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_1_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x3_1_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_2_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x3_2_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x3_3_podpowiedz')); ?>:</b>
	<?php echo CHtml::encode($data->x3_3_podpowiedz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AudytyID')); ?>:</b>
	<?php echo CHtml::encode($data->AudytyID); ?>
	<br />

	*/ ?>

</div>