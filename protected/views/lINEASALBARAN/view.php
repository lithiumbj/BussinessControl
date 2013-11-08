<?php
/* @var $this LINEASALBARANController */
/* @var $model LINEASALBARAN */

$this->breadcrumbs=array(
	'Lineasalbarans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LINEASALBARAN', 'url'=>array('index')),
	array('label'=>'Create LINEASALBARAN', 'url'=>array('create')),
	array('label'=>'Update LINEASALBARAN', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LINEASALBARAN', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LINEASALBARAN', 'url'=>array('admin')),
);
?>

<h1>View LINEASALBARAN #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Cantidad',
		'idArticulo',
		'idAlbaran',
	),
)); ?>
