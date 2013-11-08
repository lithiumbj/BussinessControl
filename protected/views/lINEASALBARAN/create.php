<?php
/* @var $this LINEASALBARANController */
/* @var $model LINEASALBARAN */

$this->breadcrumbs=array(
	'Lineasalbarans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LINEASALBARAN', 'url'=>array('index')),
	array('label'=>'Manage LINEASALBARAN', 'url'=>array('admin')),
);
?>

<h1>Create LINEASALBARAN</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>