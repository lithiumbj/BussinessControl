<?php
/* @var $this PROVEEDORESController */
/* @var $data PROVEEDORES */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CIFEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->CIFEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telefono')); ?>:</b>
	<?php echo CHtml::encode($data->Telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodigoPostal')); ?>:</b>
	<?php echo CHtml::encode($data->CodigoPostal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Poblacion')); ?>:</b>
	<?php echo CHtml::encode($data->Poblacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->Ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pais')); ?>:</b>
	<?php echo CHtml::encode($data->Pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PersonaDeContacto')); ?>:</b>
	<?php echo CHtml::encode($data->PersonaDeContacto); ?>
	<br />

	*/ ?>

</div>