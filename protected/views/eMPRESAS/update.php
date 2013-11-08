<?php
/* @var $this EMPRESASController */
/* @var $model EMPRESAS */

$this->breadcrumbs=array(
	'Empresases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EMPRESAS', 'url'=>array('index')),
	array('label'=>'Create EMPRESAS', 'url'=>array('create')),
	array('label'=>'View EMPRESAS', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EMPRESAS', 'url'=>array('admin')),
);
?>

<h1>Update EMPRESAS <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>