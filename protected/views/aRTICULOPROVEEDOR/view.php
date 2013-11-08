<?php
/* @var $this ARTICULOPROVEEDORController */
/* @var $model ARTICULOPROVEEDOR */

$this->breadcrumbs=array(
	'Articuloproveedors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ARTICULOPROVEEDOR', 'url'=>array('index')),
	array('label'=>'Create ARTICULOPROVEEDOR', 'url'=>array('create')),
	array('label'=>'Update ARTICULOPROVEEDOR', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ARTICULOPROVEEDOR', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ARTICULOPROVEEDOR', 'url'=>array('admin')),
);
?>

<h1>View ARTICULOPROVEEDOR #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Nombre',
		'Descripcion',
		'Dx',
		'Dy',
		'Dz',
		'CosteUnitario',
		'Descuento',
		'CantidadMinima',
		'idProveedor',
	),
)); ?>
