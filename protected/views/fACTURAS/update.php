<?php
/* @var $this FACTURASController */
/* @var $model FACTURAS */

$this->breadcrumbs=array(
	'Facturases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FACTURAS', 'url'=>array('index')),
	array('label'=>'Create FACTURAS', 'url'=>array('create')),
	array('label'=>'View FACTURAS', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FACTURAS', 'url'=>array('admin')),
);
?>

<h1>Update FACTURAS <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>