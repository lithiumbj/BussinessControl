<?php
/* @var $this ARTICULOSController */
/* @var $model ARTICULOS */

$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ARTICULOS', 'url'=>array('index')),
	array('label'=>'Create ARTICULOS', 'url'=>array('create')),
	array('label'=>'View ARTICULOS', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ARTICULOS', 'url'=>array('admin')),
);
?>

<h1>Update ARTICULOS <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>