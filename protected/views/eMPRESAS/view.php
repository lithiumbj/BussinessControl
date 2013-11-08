<?php
/* @var $this EMPRESASController */
/* @var $model EMPRESAS */

$this->breadcrumbs=array(
	'Empresases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EMPRESAS', 'url'=>array('index')),
	array('label'=>'Create EMPRESAS', 'url'=>array('create')),
	array('label'=>'Update EMPRESAS', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EMPRESAS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EMPRESAS', 'url'=>array('admin')),
);
?>

<h1>View EMPRESAS #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'CIFEmpresa',
		'Nombre',
		'Direccion',
		'CodigoPostal',
		'Poblacion',
		'Ciudad',
		'Descripcion',
	),
)); ?>
