<?php
/* @var $this EMPLEADOSController */
/* @var $model EMPLEADOS */

$this->breadcrumbs=array(
	'Empleadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EMPLEADOS', 'url'=>array('index')),
	array('label'=>'Manage EMPLEADOS', 'url'=>array('admin')),
);
?>

<h1>Create EMPLEADOS</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>