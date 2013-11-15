<?php
/* @var $this AJUSTESController */
/* @var $model AJUSTES */

$this->breadcrumbs=array(
	'Ajustes'=>array('index'),
	$model->CIFEmpresa,
);

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IVA',
		'RecargoEquivalencia',
		'IRPF',
		'CIFEmpresa',
		'NombreEmpresa',
		'NombreCEO',
		'ApellidosCEO',
		'DireccionEmpresa',
		'PoblacionEmpresa',
		'CiudadEmpresa',
		'CPEmpresa',
	),
)); ?>
