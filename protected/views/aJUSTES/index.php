<?php
/* @var $this AJUSTESController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ajustes',
);
?>

<h1>Accediendo a los ajustes, espere por favor...</h1>

<?php
    //Obtener el ajuste y redirigir al ajuste
    $this->getUniqueSettings();
?>
