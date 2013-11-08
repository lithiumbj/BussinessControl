<?php
/* @var $this PRESUPUESTOSController */
/* @var $model PRESUPUESTOS */

$this->breadcrumbs=array(
	'Presupuestoses'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List PRESUPUESTOS', 'url'=>array('index')),
	array('label'=>'Create PRESUPUESTOS', 'url'=>array('create')),
	array('label'=>'View PRESUPUESTOS', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage PRESUPUESTOS', 'url'=>array('admin')),
);
?>

<h1>Update PRESUPUESTOS <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>