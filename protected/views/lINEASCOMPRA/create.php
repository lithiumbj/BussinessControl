<?php
/* @var $this LINEASCOMPRAController */
/* @var $model LINEASCOMPRA */

$this->breadcrumbs=array(
	'Lineascompras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LINEASCOMPRA', 'url'=>array('index')),
	array('label'=>'Manage LINEASCOMPRA', 'url'=>array('admin')),
);
?>

<h1>Create LINEASCOMPRA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>