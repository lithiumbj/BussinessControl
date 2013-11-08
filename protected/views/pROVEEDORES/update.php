<?php
/* @var $this PROVEEDORESController */
/* @var $model PROVEEDORES */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Visualizar Proveedores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Update PROVEEDORES <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>