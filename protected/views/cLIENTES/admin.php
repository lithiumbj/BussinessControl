<?php
/* @var $this CLIENTESController */
/* @var $model CLIENTES */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CLIENTES', 'url'=>array('index')),
	array('label'=>'Create CLIENTES', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clientes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Clientes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clientes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'Nombre',
		'Apellidos',
		'Direccion',
		'CodigoPostal',
		'Ciudad',
		/*
		'Poblacion',
		'Pais',
		'Telefono1',
		'Telefono2',
		'NombreContacto',
		'Email1',
		'Email2',
		'Empresa',
		'CIFEmpresa',
		'Condicion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
