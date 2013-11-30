<?php
/* @var $this PRESUPUESTOSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Presupuestos',
);

$this->menu=array(
	array('label'=>'Crear Presupuesto', 'url'=>array('create')),
	array('label'=>'Gestionar Presupuestos', 'url'=>array('admin')),
);
?>

<h1>Presupuestos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
