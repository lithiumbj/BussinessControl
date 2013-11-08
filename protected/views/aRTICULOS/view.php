<?php
/* @var $this ARTICULOSController */
/* @var $model ARTICULOS */

$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ARTICULOS', 'url'=>array('index')),
	array('label'=>'Create ARTICULOS', 'url'=>array('create')),
	array('label'=>'Update ARTICULOS', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ARTICULOS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ARTICULOS', 'url'=>array('admin')),
);
?>

<h1>View ARTICULOS #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Nombre',
		'Stock',
		'Dx',
		'Dy',
		'Dz',
		'Peso',
		'idArtProveedor',
		'Descripcion',
		'pvp',
	),
)); ?>
