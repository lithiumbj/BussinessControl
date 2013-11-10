<?php
/* @var $this AJUSTESController */
/* @var $model AJUSTES */

$this->breadcrumbs=array(
	'Ajustes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AJUSTES', 'url'=>array('index')),
	array('label'=>'Manage AJUSTES', 'url'=>array('admin')),
);
?>

<h1>Create AJUSTES</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>