<?php
/* @var $this ALBARANESController */
/* @var $model ALBARANES */

$this->breadcrumbs=array(
	'Albaranes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ALBARANES', 'url'=>array('index')),
	array('label'=>'Create ALBARANES', 'url'=>array('create')),
	array('label'=>'View ALBARANES', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ALBARANES', 'url'=>array('admin')),
);
?>

<h1>Update ALBARANES <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>