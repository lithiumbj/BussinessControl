<?php
/* @var $this FACTURASController */
/* @var $model FACTURAS */

$this->breadcrumbs = array(
    'Facturases' => array('index'),
);

    //Importar el controlador de ajustes
    Yii::import('application.controllers.AJUSTESController');
    //Inicializar y obtener los ajustes de la aplicación
    $ajustes = AJUSTESController::getSettings();
//Obtener todas las líneas de compra
$lineasFactura = $this->getPrintLineasCompra($model->id);
$cliente = $this->getFacturaCliente($model->idCliente);
?>
<div class="facturaPrint">
    <table border="0" style="width:100%;">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoPrint.png" style="width: 200px;"/></td>
        </tr>
        <tr>
            <td><b>Nº Factura:</b></td>
            <td><?php echo $model->id; ?></td>
            <td><b>Fecha:</b></td>
            <td><?php echo $model->Fecha; ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr><!-- TR EN BLANCO -->
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <?php if ($cliente['Empresa'] != ''): ?>
                <td><b>Empresa</b></td>
                <td><?php echo $cliente['Empresa']; ?></td>
            <?php else: ?>
                <td><b>Nombre</b></td>
                <td><?php echo $cliente['Nombre'] . ' ' . $cliente['Apellidos']; ?></td>
            <?php endif; ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>C.I.F.</b></td>
            <?php if ($cliente['Cifempresa'] != ''): ?>
                <td><?php echo $cliente['Cifempresa']; ?></td>
            <?php else: ?>
                <td>N/A</td>
            <?php endif; ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>Dirección</b></td>
            <td><?php echo $cliente['Direccion']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>Población</b></td>
            <td><?php echo $cliente['Poblacion']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>Provincia</b></td>
            <td><?php echo $cliente['Provincia']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>C.P.</b></td>
            <td><?php echo $cliente['CodigoPostal']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>

    <table>
        <tr>
            <td colspan="3" class="tdFactura"style="border-left: none;"><b>CONCEPTO</b></td>
            <td class="tdFactura"><b>PRECIO UD</b></td>
            <td class="tdFactura"><b>CANTIDAD</b></td>
            <td class="tdFactura"><b>BASE IMPONIBLE</b></td>
            <td class="tdFactura"><b>TOTAL</b></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #bebebe;"></td>
            <td style="border-bottom: 1px solid #bebebe;"></td>
            <td style="border-bottom: 1px solid #bebebe;"></td>
            <td style="border-bottom: 1px solid #bebebe;"></td>
            <td style="border-bottom: 1px solid #bebebe;"></td>
            <td style="border-bottom: 1px solid #bebebe;"></td>
            <td style="border-bottom: 1px solid #bebebe;"></td>
        </tr>
        <!-- Comienza listado de lineas de compra -->
        <?php 
            $precioTotal=0;
            $IVATotal=0;
            $RETotal=0;
            foreach ($lineasFactura as $linea):
            ?>
            <tr>
                <td colspan="3" class="tdFactura"><?php echo $linea['Nombre']; ?></td>
                <td class="tdFactura"><?php echo $linea['Precio']; ?>€</td>
                <td class="tdFactura"><?php echo $linea['Cantidad'];?></td>
                <td class="tdFactura"><?php echo ($linea['Cantidad'] * $linea['Precio']) *($ajustes['IVA']/100); ?>€</td>
                <td class="tdFactura" style="border-right: 1px solid #bebebe;"><?php echo ($linea['Cantidad'] * $linea['Precio']); ?>€</td>
            </tr>
            <?php 
                //Almacenar los recargos impuestos y totales de dinero
                $precioTotal += ($linea['Precio']*$linea['Cantidad']);
                $IVATotal += (($linea['Precio']*$linea['Cantidad'])*($ajustes['IVA']/100));
                $RETotal += (($linea['Precio']*$linea['Cantidad'])*($ajustes['RecargoEquivalencia']/100));
                if($cliente['Cifempresa'] != ''){
                    $irpf = $precioTotal*($ajustes['IRPF']/100);
                }else{
                    $irpf = 0;
                }
            ?>
        <?php endforeach; ?>
        <!-- Fin de las líneas y printar los datos de pago -->
        
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><b>Forma de pago</b></td>
            <td>VISA</td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total EUR+RE excl</b></td>
            <td><?php echo $precioTotal; ?>€</td>
        </tr>
        <?php if($irpf !=0):?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Importe IVA+RE+IRPF</b></td>
            <td><?php echo round($RETotal+$IVATotal+$irpf,2); ?>€</td>
        </tr>
        <?php else:?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Importe IVA+RE</b></td>
            <td><?php echo round($RETotal+$IVATotal,2); ?>€</td>
        </tr>
        
        <?php endif;?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total EUR+RE incl</b></td>
            <td><?php echo round(($precioTotal)+($RETotal+$IVATotal+$irpf),2); ?>€</td>
        </tr>
    </table>
</div>