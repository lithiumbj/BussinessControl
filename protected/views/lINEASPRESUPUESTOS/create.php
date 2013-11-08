<?php
/* @var $this LINEASPRESUPUESTOSController */
/* @var $model LINEASPRESUPUESTOS */

$this->breadcrumbs=array(
	'Lineaspresupuestoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LINEASPRESUPUESTOS', 'url'=>array('index')),
	array('label'=>'Manage LINEASPRESUPUESTOS', 'url'=>array('admin')),
);
?>

<h1>Create LINEASPRESUPUESTOS</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>