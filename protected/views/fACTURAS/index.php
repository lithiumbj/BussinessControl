<?php
/* @var $this FACTURASController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturas',
);

$this->menu=array(
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Facturas</h1>
<?php

    //Importar el controlador de Clientes
    Yii::import('application.controllers.CLIENTESController');
    //Almacenar el objeto del cliente entero
    //Cambiar los datos del dataProvider de id de cliente por su nombre real
    $dataDelProvider = $dataProvider->getData();
    for($i=0;$i<count($dataDelProvider);$i++){
        //Obtener los datos del cliente
        $clienteModel = CLIENTESController::findClienteById($dataDelProvider[$i]['idCliente']);
        //Reasignar los datos correspondientes en el modlo
        $dataDelProvider[$i]['idCliente'] = $clienteModel->Nombre.' '.$clienteModel->Apellidos;
    }
    //Reinsertar el modelo 
    $dataProvider->setData($dataDelProvider);
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
