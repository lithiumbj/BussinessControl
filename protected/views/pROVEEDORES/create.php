<?php
/* @var $this PROVEEDORESController */
/* @var $model PROVEEDORES */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Proveedor', 'url'=>array('index')),
	array('label'=>'Gestionar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Create PROVEEDORES</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>