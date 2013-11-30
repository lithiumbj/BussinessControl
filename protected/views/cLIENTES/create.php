<?php
/* @var $this CLIENTESController */
/* @var $model CLIENTES */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List CLIENTES', 'url'=>array('index')),
	array('label'=>'Manage CLIENTES', 'url'=>array('admin')),
);*/
?>

<h1>Creando cliente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>