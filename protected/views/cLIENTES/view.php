<?php
/* @var $this CLIENTESController */
/* @var $model CLIENTES */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Editar Cliente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Cliente: <?php echo $model->Nombre.'  '.$model->Apellidos; ?></h1>

<?php 
    //Almacenar condicion
    switch ($model->Condicion) {
    case 0:
        $model->Condicion = "Normal";
            break;
    case 1:
        $model->Condicion = "Moroso";
            break;
    case 2:
        $model->Condicion = "Archivado";
            break;
}
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',*/
		'Nombre',
		'Apellidos',
		'Direccion',
		'CodigoPostal',
		'Ciudad',
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
	),
));
    
?>
