<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Generador de informes</h1>

<p>
Bienvenido al generador de informes y gráficas de Bussiness Control 2014<br/>
Desde este lugar ud podrá generar informes sobre los pagos pendientes de los ejercicios de cada mes o cada año, así como graficas de las ganancias por mes y año
<br/><br/>
Para comenzar elija el tipo de informe a generar
<br/><br/>

<div class="centerLinks">
    <a href="?r=Informes/impagos" style="text-decoration: none;">Informe de impagos</a>
    <a href="#" style="text-decoration: none;margin-left: 25px;">Informe de ganancias</a>
    <a href="?r=Informes/stocks" style="text-decoration: none;margin-left: 25px;">Informe de Stocks</a>
</div>

</p>