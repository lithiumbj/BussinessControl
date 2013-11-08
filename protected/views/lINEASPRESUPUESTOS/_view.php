<?php
/* @var $this LINEASPRESUPUESTOSController */
/* @var $data LINEASPRESUPUESTOS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idArticulo')); ?>:</b>
	<?php echo CHtml::encode($data->idArticulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->Cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFactura')); ?>:</b>
	<?php echo CHtml::encode($data->idFactura); ?>
	<br />


</div>