<?php
/* @var $this ARTICULOPROVEEDORController */
/* @var $data ARTICULOPROVEEDOR */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dx')); ?>:</b>
	<?php echo CHtml::encode($data->Dx); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dy')); ?>:</b>
	<?php echo CHtml::encode($data->Dy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dz')); ?>:</b>
	<?php echo CHtml::encode($data->Dz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CosteUnitario')); ?>:</b>
	<?php echo CHtml::encode($data->CosteUnitario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Descuento')); ?>:</b>
	<?php echo CHtml::encode($data->Descuento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CantidadMinima')); ?>:</b>
	<?php echo CHtml::encode($data->CantidadMinima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idProveedor); ?>
	<br />

	*/ ?>

</div>