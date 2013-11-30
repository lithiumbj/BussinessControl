<?php
/* @var $this PRESUPUESTOSController */
/* @var $model PRESUPUESTOS */

$this->breadcrumbs=array(
	'Presupuestos'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List PRESUPUESTOS', 'url'=>array('index')),
	array('label'=>'Manage PRESUPUESTOS', 'url'=>array('admin')),
);*/
?>

<h1>Creando Presupuesto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>