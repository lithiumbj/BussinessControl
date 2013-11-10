<?php
/* @var $this FACTURASController */
/* @var $model FACTURAS */

$this->breadcrumbs=array(
	'Facturases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Create FACTURAS</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>