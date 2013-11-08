<?php
/* @var $this ARTICULOPROVEEDORController */
/* @var $model ARTICULOPROVEEDOR */

$this->breadcrumbs=array(
	'Articuloproveedors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ARTICULOPROVEEDOR', 'url'=>array('index')),
	array('label'=>'Manage ARTICULOPROVEEDOR', 'url'=>array('admin')),
);
?>

<h1>Create ARTICULOPROVEEDOR</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>