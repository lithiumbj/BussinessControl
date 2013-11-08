<?php
/* @var $this EMPRESASController */
/* @var $model EMPRESAS */

$this->breadcrumbs=array(
	'Empresases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EMPRESAS', 'url'=>array('index')),
	array('label'=>'Manage EMPRESAS', 'url'=>array('admin')),
);
?>

<h1>Create EMPRESAS</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>