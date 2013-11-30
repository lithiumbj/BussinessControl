<?php
/* @var $this ALBARANESController */
/* @var $model ALBARANES */

$this->breadcrumbs=array(
	'Albaranes'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List ALBARANES', 'url'=>array('index')),
	array('label'=>'Manage ALBARANES', 'url'=>array('admin')),
);*/
?>

<h1>Creando albaran</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>