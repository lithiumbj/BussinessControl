<?php
/* @var $this PRESUPUESTOSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Presupuestoses',
);

$this->menu=array(
	array('label'=>'Create PRESUPUESTOS', 'url'=>array('create')),
	array('label'=>'Manage PRESUPUESTOS', 'url'=>array('admin')),
);
?>

<h1>Presupuestoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
