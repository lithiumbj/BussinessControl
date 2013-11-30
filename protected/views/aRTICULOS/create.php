<?php
/* @var $this ARTICULOSController */
/* @var $model ARTICULOS */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ARTICULOS', 'url'=>array('index')),
	array('label'=>'Manage ARTICULOS', 'url'=>array('admin')),
);*/
?>

<h1>Creando Articulo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>