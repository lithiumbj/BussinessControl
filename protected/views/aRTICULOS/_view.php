<?php
/* @var $this ARTICULOSController */
/* @var $data ARTICULOS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Stock')); ?>:</b>
	<?php echo CHtml::encode($data->Stock); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Peso')); ?>:</b>
	<?php echo CHtml::encode($data->Peso); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idArtProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idArtProveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pvp')); ?>:</b>
	<?php echo CHtml::encode($data->pvp); ?>
	<br />

	*/ ?>

</div>