<?php
/* @var $this FACTURASController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturases',
);

$this->menu=array(
	array('label'=>'Crear Factura', 'url'=>array('create')),
	array('label'=>'Gestionar Facturas', 'url'=>array('admin')),
);
?>

<h1>Facturases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
