<?php
/* @var $this AJUSTESController */
/* @var $model AJUSTES */
/*
$this->breadcrumbs=array(
	'Ajustes'=>array('index'),
	$model->CIFEmpresa=>array('view','id'=>$model->CIFEmpresa),
	'Update',
);*/
?> 

<h1>Ajustes de la aplicación</h1>
<h3>Proceda con cautela, los cambios aquí realizados pueden afectar a la facturación</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>