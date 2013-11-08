<?php
/* @var $this EMPLEADOSController */
/* @var $model EMPLEADOS */

$this->breadcrumbs=array(
	'Empleadoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Empleados', 'url'=>array('index')),
	array('label'=>'Crear Empleado', 'url'=>array('create')),
	array('label'=>'Editar Empleado', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Empleado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View EMPLEADOS #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Nombre',
		'Apellidos',
		'FechaNacimiento',
		'DNI',
		'Direccion',
		'Poblacion',
		'Ciudad',
		'Pais',
		'Email',
	),
)); ?>
