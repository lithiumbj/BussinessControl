<?php
/* @var $this LINEASCOMPRAController */
/* @var $model LINEASCOMPRA */

$this->breadcrumbs=array(
	'Lineascompras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LINEASCOMPRA', 'url'=>array('index')),
	array('label'=>'Create LINEASCOMPRA', 'url'=>array('create')),
	array('label'=>'Update LINEASCOMPRA', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LINEASCOMPRA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LINEASCOMPRA', 'url'=>array('admin')),
);
?>

<h1>View LINEASCOMPRA #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idArticulo',
		'Cantidad',
		'idFactura',
	),
)); ?>
