<?php
/* @var $this ARTICULOSController */
/* @var $model ARTICULOS */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Articulos', 'url'=>array('index')),
	array('label'=>'Crear Articulos', 'url'=>array('create')),
	array('label'=>'Editar Articulo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Articulo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Articulos', 'url'=>array('admin')),
);
?>

<h1>Articulo Nº<?php echo $model->id; ?></h1>

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
