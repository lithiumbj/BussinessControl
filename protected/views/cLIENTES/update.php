<?php
/* @var $this CLIENTESController */
/* @var $model CLIENTES */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CLIENTES', 'url'=>array('index')),
	array('label'=>'Create CLIENTES', 'url'=>array('create')),
	array('label'=>'View CLIENTES', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CLIENTES', 'url'=>array('admin')),
);
?>

<h1>Update CLIENTES <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>