<?php
/* @var $this EMPLEADOSController */
/* @var $model EMPLEADOS */

$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	'Crear',
);
/*
$this->menu=array(
	array('label'=>'List EMPLEADOS', 'url'=>array('index')),
	array('label'=>'Manage EMPLEADOS', 'url'=>array('admin')),
);*/
?>

<h1>Creando empleado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>