<?php
/* @var $this AJUSTESController */
/* @var $data AJUSTES */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CIFEmpresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CIFEmpresa), array('view', 'id'=>$data->CIFEmpresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IVA')); ?>:</b>
	<?php echo CHtml::encode($data->IVA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RecargoEquivalencia')); ?>:</b>
	<?php echo CHtml::encode($data->RecargoEquivalencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->NombreEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreCEO')); ?>:</b>
	<?php echo CHtml::encode($data->NombreCEO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ApellidosCEO')); ?>:</b>
	<?php echo CHtml::encode($data->ApellidosCEO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DireccionEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->DireccionEmpresa); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PoblacionEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->PoblacionEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CiudadEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->CiudadEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CPEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->CPEmpresa); ?>
	<br />

	*/ ?>

</div>