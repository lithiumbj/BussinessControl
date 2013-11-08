<?php
/* @var $this EMPLEADOSController */
/* @var $model EMPLEADOS */

$this->breadcrumbs=array(
	'Empleadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EMPLEADOS', 'url'=>array('index')),
	array('label'=>'Create EMPLEADOS', 'url'=>array('create')),
	array('label'=>'View EMPLEADOS', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EMPLEADOS', 'url'=>array('admin')),
);
?>

<h1>Update EMPLEADOS <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>