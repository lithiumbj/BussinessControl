<?php
/* @var $this EMPLEADOSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empleadoses',
);

$this->menu=array(
	array('label'=>'Crear Empleados', 'url'=>array('create')),
	array('label'=>'Gestionar Empleados', 'url'=>array('admin')),
);
?>

<h1>Empleadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
