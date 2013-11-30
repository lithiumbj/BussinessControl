<?php
/* @var $this ALBARANESController */
/* @var $model ALBARANES */

$this->breadcrumbs=array(
	'Albaranes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Albaranes', 'url'=>array('index')),
	array('label'=>'Crear Albaran', 'url'=>array('create')),
	array('label'=>'Editar Albaran', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Albaran', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Albaranes', 'url'=>array('admin')),
);
?>

<h1>Albaran Nº<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProveedor',
		'Observaciones',
		'idEmpleado',
	),
)); ?>
<h1>Articulos del albarán</h1>

<?php 
    $articulosProvider = $this->actionIndexProducts($model->id);
    
    //Menu de control de articulos del proveedor
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => 'Operaciones sobre este albarán',
    ));
    $this->widget('zii.widgets.CMenu', array(
        'items' => array(
            array('label'=>'Agregar articulos', 'url' => '?r=LINEASALBARAN/create&provID='.$model->id),
            ),
       ));
    $this->endWidget();
    
    //Widget de articulso vendidos
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $articulosProvider,
        'columns' => array(
            array(
                'name' => 'ID',
                'value' => '$data->id',
                'visible' => false,
            ),
            array(
                'name' => 'Articulo',
                'value' => '$data->idArticulo',
                'htmlOptions'=>array('width'=>'520px'),
            ),
            array(
                'name' => 'Cantidad',
                'value' => '$data->Cantidad',
            ),array(            // display a column with "view", "update" and "delete" buttons
           'class'=>'CButtonColumn',
                        'template'=>'{borrar}{ver}',
                        'header'=>'Acciones',
                        'buttons'=>array
                           (
                                //Del template {borrar} sustituimos los datos para hacerlo funcionar como accion borar
                               'borrar' => array
                               (
                                   'label'=>'Borrar ',
                                   //Establecemos la imagen
                                   'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                                   //Seteamos la url                indicando                   ID del campo a borrar       Y redirección de la factura de origen
                                   'url'=>'Yii::app()->createUrl("lINEASALBARAN/delete", array("id"=>$data->id, "idfac"=>$data->idAlbaran))',
                               ),
                               'ver' => array
                               (
                                   'label'=>'[-]',
                                   'url'=>'Yii::app()->createUrl("lINEASALBARAN/view", array("id"=>$data->id))',
                                   'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                               ),
                           ),
                        'htmlOptions'=>array('width'=>70),
        ),
        ),
    ));
    
?>

