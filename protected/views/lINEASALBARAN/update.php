<?php
/* @var $this LINEASALBARANController */
/* @var $model LINEASALBARAN */

$this->breadcrumbs=array(
	'Lineasalbarans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LINEASALBARAN', 'url'=>array('index')),
	array('label'=>'Create LINEASALBARAN', 'url'=>array('create')),
	array('label'=>'View LINEASALBARAN', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LINEASALBARAN', 'url'=>array('admin')),
);
?>

<h1>Update LINEASALBARAN <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>