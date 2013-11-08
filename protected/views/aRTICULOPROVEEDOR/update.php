<?php
/* @var $this ARTICULOPROVEEDORController */
/* @var $model ARTICULOPROVEEDOR */

$this->breadcrumbs=array(
	'Articuloproveedors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ARTICULOPROVEEDOR', 'url'=>array('index')),
	array('label'=>'Create ARTICULOPROVEEDOR', 'url'=>array('create')),
	array('label'=>'View ARTICULOPROVEEDOR', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ARTICULOPROVEEDOR', 'url'=>array('admin')),
);
?>

<h1>Update ARTICULOPROVEEDOR <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>