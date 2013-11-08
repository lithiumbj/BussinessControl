<?php
/* @var $this LINEASALBARANController */
/* @var $data LINEASALBARAN */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->Cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idArticulo')); ?>:</b>
	<?php echo CHtml::encode($data->idArticulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAlbaran')); ?>:</b>
	<?php echo CHtml::encode($data->idAlbaran); ?>
	<br />


</div>