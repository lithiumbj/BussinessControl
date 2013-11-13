<?php
/* @var $this FACTURASController */
/* @var $model FACTURAS */

$this->breadcrumbs=array(
	'Facturases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Facturas', 'url'=>array('index')),
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Modificar Factura', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Factura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
	array('label'=>'Imprimir Presupuesto', 'url'=>array('print&id='.$model->id)), 
);
?>


<h1>Factura Nº<?php echo $model->id; ?></h1>
<?php 
    //Importar el controlador de ajustes
    Yii::import('application.controllers.AJUSTESController');
    //Inicializar y obtener los ajustes de la aplicación
    $ajustes = AJUSTESController::getSettings();

    //Obtener el nombre del cliente de la factura a través del id de la factura
    $model->idCliente = $this->getCliente($model->idCliente);
    //Obtener el nombre del empleado que la realizó en la factura
    $model->idEmpleado = $this->getUserName($model->idEmpleado);
    
    
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCliente',
		'Fecha',
		'Observaciones',
		'idEmpleado',
                'Pagado',
                'FormaDePago',
	),
)); ?>

<br/><br/><h1>Agregar lineas de compra a esta factura</h1>
<?php 
    $modeloLineas = $this->getLineasModel();
    $modeloLineas->idFactura = $model->id;
    //Importar la clase que contiene el controlador de la linea de compra
    Yii::import('application.controllers.LINEASCOMPRAController');
    //Generar el listado de lineas de compra para esta factura
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => LINEASCOMPRAController::getLineas($model->id),
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
                        'value' => 'LINEASCOMPRAController::getItemPVP($data->id)."€"'
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
                                   'url'=>'Yii::app()->createUrl("lINEASCOMPRA/delete", array("id"=>$data->id, "idfac"=>$data->idFactura))',
                               ),
                               'ver' => array
                               (
                                   'label'=>'[-]',
                                   'url'=>'Yii::app()->createUrl("lINEASCOMPRA/view", array("id"=>$data->id))',
                                   'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                               ),
                           ),
                        'htmlOptions'=>array('width'=>100),
        ),)
    ));
    //Generar cálculos de pvp total con iva, sin iva
    ?>
  <?php //Generar un formulario en base al contexto de la linea de compra
    LINEASCOMPRAController::getContext()->renderPartial('//lINEASCOMPRA/_form', array('model' =>$modeloLineas)); 
    //Recuperar el error de vuelta en caso de que no haya STOCK
    if(isset($_GET['err'])){
        echo '<div style="border:1px solid red;color: red;background-color:cornsilk;text-align:center;">Stock insuficiente del articulo seleccionado</div>';
    }
    ?>
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
    $lineas = LINEASCOMPRAController::getLineas($model->id)->getData();
    $total=0;
    foreach($lineas as $linea){
        //Calcular el total de dinero obteniendo el pvp sobre la obtención del id de cada articulo
        $total = $total+(LINEASCOMPRAController::getItemPVPById(LINEASCOMPRAController::getItemIDbyFactura($linea['id']))*$linea['Cantidad']);
    }
    //Calcular el total de iva
    $totaliva = ($total*($ajustes['IVA']/100));
?>
                <td><?php echo $total;?>€</td>
                <td>21%</td>
                <td><?php echo $totaliva; ?>€</td>
                <td><?php echo $totaliva+$total;?>€</td>
            </tr>
    </table>
  
