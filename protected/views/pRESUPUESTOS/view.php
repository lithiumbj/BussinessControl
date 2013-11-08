<?php
/* @var $this PRESUPUESTOSController */
/* @var $model PRESUPUESTOS */

$this->breadcrumbs=array(
	'Presupuestoses'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Listar Presupuestos', 'url'=>array('index')),
	array('label'=>'Crear Presupuesto', 'url'=>array('create')),
	array('label'=>'Editar Presupuesto', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar Presupuesto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Presupuestos', 'url'=>array('admin')),
);
?>

<h1>Presupuesto Nº<?php echo $model->ID; ?></h1>
<?php
//Preparacion de los datos del modelo
$model->idEmpleado = $this->getUserName($model->idEmpleado);
$model->idCliente = $this->getCliente($model->idCliente);

//Proforma
switch ($model->Proforma) {
    case 0:
        $model->Proforma = "Factura proforma";
        break;
    case 1:
        $model->Proforma = "No";
        break;
    default:
        $model->Proforma = "No";
        break;
}
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'idCliente',
		'Fecha',
		'Observaciones',
		'idEmpleado',
		'Proforma',
	),
)); ?>


<br/><br/><h1>Agregar lineas de compra a este presupuesto</h1>
<?php 
    $modeloLineas = $this->getLineasModel();
    $modeloLineas->idFactura = $model->ID;
    //Importar la clase que contiene el controlador de la linea de compra
    Yii::import('application.controllers.LINEASPRESUPUESTOSController');
    //Generar el listado de lineas de compra para esta factura
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => LINEASPRESUPUESTOSController::getLineas($model->ID),
                'columns'=>array(
                    'id',
                    array(
                        'name'=>'Articulo',
                        'value'=>'$data->idArticulo'
                    ),
                    'Cantidad',
                    array(
                        'name' => 'PVP',
                        //Dado que el PVP no está cargado en el controlador de datos, es necesario obtenerlo por cada iteración desde el controlador de lineasController
                        'value' => 'LINEASPRESUPUESTOSController::getItemPVP($data->id)."€"'
                    ),
                        array(            
                    'name'=>'factura Id',
                    'visible'=>false,
                    ),
        
        array(            // display a column with "view", "update" and "delete" buttons
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
                                   'url'=>'Yii::app()->createUrl("lINEASPRESUPUESTOS/delete", array("id"=>$data->id, "idfac"=>$data->idFactura))',
                               ),
                               'ver' => array
                               (
                                   'label'=>'[-]',
                                   'url'=>'Yii::app()->createUrl("lINEASPRESUPUESTOS/view", array("id"=>$data->id))',
                                   'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                               ),
                           ),
                        'htmlOptions'=>array('width'=>100),
        ),)
    ));
    //Generar cálculos de pvp total con iva, sin iva
    ?>
  <?php //Generar un formulario en base al contexto de la linea de compra
    LINEASPRESUPUESTOSController::getContext()->renderPartial('//lINEASPRESUPUESTOS/_form', array('model' =>$modeloLineas)); ?>
<br/>
<h1>Total</h1>
    <table class="tablaTotal">
            <tr>
                <td><b>Precio</td>
                <td><b>% IVA</b></td>
                <td><b>Valor IVA</b></td>
                <td><b>Total con IVA</b></td>
            </tr>
            <tr>
<?php 
    //Recoger las lineas de compra
    $lineas = LINEASPRESUPUESTOSController::getLineas($model->ID)->getData();
    $total=0;
    foreach($lineas as $linea){
        //Calcular el total de dinero obteniendo el pvp sobre la obtención del id de cada articulo
        $total = $total+(LINEASPRESUPUESTOSController::getItemPVPById(LINEASPRESUPUESTOSController::getItemIDbyFactura($linea['id']))*$linea['Cantidad']);
    }
    //Calcular el total de iva
    $totaliva = ($total*0.21);
?>
                <td><?php echo $total;?>€</td>
                <td>21%</td>
                <td><?php echo $totaliva; ?>€</td>
                <td><?php echo $totaliva+$total;?>€</td>
            </tr>
    </table>
  