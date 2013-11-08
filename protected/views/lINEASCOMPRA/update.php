<?php
/* @var $this LINEASCOMPRAController */
/* @var $model LINEASCOMPRA */

$this->breadcrumbs=array(
	'Lineascompras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LINEASCOMPRA', 'url'=>array('index')),
	array('label'=>'Create LINEASCOMPRA', 'url'=>array('create')),
	array('label'=>'View LINEASCOMPRA', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LINEASCOMPRA', 'url'=>array('admin')),
);
?>

<h1>Update LINEASCOMPRA <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>