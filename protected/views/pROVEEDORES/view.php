<?php
/* @var $this PROVEEDORESController */
/* @var $model PROVEEDORES */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Editar Proveedor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Proveedor -<?php echo $model->Nombre; ?>-</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Nombre',
		'CIFEmpresa',
		'Telefono',
		'Direccion',
		'CodigoPostal',
		'Poblacion',
		'Ciudad',
		'Pais',
		'Email',
		'PersonaDeContacto',
	),
)); ?><br/>
<h1>Articulos de este proveedor</h1>

<?php 
    $articulosProvider = $this->actionIndexProducts($model->id);
    
    //Menu de control de articulos del proveedor
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => 'Operaciones sobre articulos de este proveedor',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label'=>'Crear Articulos', 'url' => '?r=ARTICULOPROVEEDOR/create&provID='.$model->id),
            ),
       ));
    $this->endWidget();
    
    //Widget de articulso vendidos
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $articulosProvider,
        
    ));
    
?>

