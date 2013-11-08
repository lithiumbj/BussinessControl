<?php
/* @var $this ARTICULOSController */
/* @var $model ARTICULOS */

$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ARTICULOS', 'url'=>array('index')),
	array('label'=>'Manage ARTICULOS', 'url'=>array('admin')),
);
?>

<h1>Create ARTICULOS</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>