<?php
/* @var $this FACTURASController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturases',
);

$this->menu=array(
	array('label'=>'Create FACTURAS', 'url'=>array('create')),
	array('label'=>'Manage FACTURAS', 'url'=>array('admin')),
);
?>

<h1>Facturases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
