<?php
/* @var $this FACTURASController */
/* @var $model FACTURAS */

$this->breadcrumbs = array(
    'Presupuesto' => array('index'),
);

    //Importar el controlador de ajustes
    Yii::import('application.controllers.AJUSTESController');
    //Inicializar y obtener los ajustes de la aplicación
    $ajustes = AJUSTESController::getSettings();
    //Obtener todas las líneas de presupuesto
?>
<div class="presuPage">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoPrint.png" class="presuLogo"/>
    <div class="presuTitle">Presupuesto</div>
    <div class="presuSubTitle">
        MURCIA<br/>
        <?php echo $model->Fecha; ?>
    </div>
</div>

<div class="presuPage">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoPrint.png" class="presuLogo"/>
    <div class="presuClienteTitle">CLIENTE</div>
    <span class="presuClienteName"><?php echo $this->getCliente($model->idCliente) ;?></span>
    <div class="presuPresuTitle">PRESUPUESTOS</div>
    <span class="presuPresuName">El siguiente presupuesto incluye:</span>
    
    <br/><br/><br/>
    <div class="facturaPrint">
        <table width="100%">
            <tr>
                <td style="border-bottom: 1px solid #bebebe;border-right: 1px solid #bebebe;">CONCEPTO</td>
                <td style="border-bottom: 1px solid #bebebe;border-right: 1px solid #bebebe;">CANTIDAD</td>
                <td style="border-bottom: 1px solid #bebebe;">PRECIO</td>
            </tr>
            <?php
                $lineasArray = $this->getPrintLineasArray($model->ID);
                $total=0;
                foreach($lineasArray as $linea):
            ?>
            <tr>
                <td style="border-bottom: 1px solid #bebebe;border-right: 1px solid #bebebe;"><?php echo $linea['Nombre']; ?></td>
                <td style="border-bottom: 1px solid #bebebe;border-right: 1px solid #bebebe;"><?php echo $linea['Cantidad']; ?></td>
                <td style="border-bottom: 1px solid #bebebe;"><?php echo $linea['Precio']; $total += ($linea['Precio']*$linea['Cantidad']); ?>€</td>
            </tr>
            <?php endforeach; ?>
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Precio total</td>
                <td><?php echo $total; ?>€</td>
            </tr>
        </table>
        <br/>
        *IVA No incluido
    </div>
    </div>

<div class="presuLastPage" style="display:none;">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoPrint.png" class="presuLogo"/><br/>
    <div class="presuPresuTitle" style="text-align: center;">CONTRATO</div><br/>
    <u>CONSIDERACIONES GENERALES</u><br/><br/>

    Contrato de prestación de servicios que celebran por una parte el <b>CLIENTE</b> y por la otra <b>SIGLA CREATIVA</b> y a quienes en lo sucesivo se les denominará como cliente y AGENCIA respectivamente, al tenor de las siguientes:

<br/><br/><b>CLÁUSULAS</b>

<br/><br/><b>PRIMERA</b>. Este contrato rige la relación entre LA AGENCIA y el cliente respecto a la realización del “APLICACIONES CARTELERÍA” nombre con el cual se le denominará en lo sucesivo al servicio prestado por parte de LA AGENCIA hacia el cliente.

<br/><br/><b>SEGUNDA</b>. Este contrato es un mutuo acuerdo entre las partes, por lo que las mismas lo firman al calce de la última hoja. Al hacerlo, reconocen que no existe dolo, mala fe o coacción en ningún momento de celebrarlo.

<br/><br/><u>OBLIGACIONES DE LA AGENCIA</u>

<br/><br/><b>TERCERA</b>. LA AGENCIA a través de la celebración de este contrato, llevará a cabo el “APLICACIONES CARTELERÍA”

<br/><br/><u>MODIFICACIÓN A LOS SERVICIOS</u>

<br/><br/><b>QUINTA</b>. Cualquier modificación, adición o supresión en las características de los servicios específicos ya pactados, se efectuará solamente por escrito y con la aprobación firmada de LA AGENCIA y del cliente, y se entiende que si dichas modificaciones llegasen a ocurrir, los tiempos, formas y costos incrementarían según la naturaleza de los mismos.

<br/><br/><u>OBLIGACIÓNES DEL CLIENTE</u>

<br/><br/><b>SEXTA</b>. El cliente no podrá hacer uso diferente de los elementos producto de los servicios pactados en este contrato; salvo autorización por escrito de LA AGENCIA, quien es titular de los derechos tal y como se especifica en las cláusulas séptima, octava y novena de este contrato.

<br/><br/><b>SÉPTIMA</b>. El cliente debe proporcionar la información necesaria, de manera exhaustiva y completa para la correcta elaboración del PROYECTO “APLICACIONES CARTELERÍA” incluyendo los fines, alcances, textos, material gráfico, especificaciones y todo lo que crea pertinente. Esto debe hacerse en tiempo y forma.

<br/><br/><b>OCTAVA</b>. El cliente reconocerá e incluirá la autoría de la Agencia en el proyecto, mediante los elementos que el mismo diseñador le proporcione, pudiendo llegar a un acuerdo –por necesidades de uso y/o estética-, de colocar los créditos en una parte no visible.

<br/><br/><u>CUMPLIMIENTO</u>

<br/><br/><b>NOVENA</b>. Las Partes harán y ejecutarán, o procurarán que se hagan y se ejecuten todos los actos, hechos, cosas y documentos adicionales que sean necesarios para dar efectos a los términos y condiciones estipulados en este Contrato.

    <br/><br/><b>DÉCIMA</b>. Todo lo no expuesto o tratado en este contrato será resuelto por las partes mediante documento firmado que se anexará a éste.
    
    <br/><br/>
    <table style="margin-left:30px;position: relative;display: block;">
        <tr>
            <td style="border-top: 1px solid black;width:300px"></td>
            <td style="border-top: 1px solid black;width:300px"></td>
        </tr>
        <tr>
            <td style="text-align:center;">EL CLIENTE</td>
            <td style="text-align:center;">LA AGENCIA</td>
        </tr>
    </table>
</div>
