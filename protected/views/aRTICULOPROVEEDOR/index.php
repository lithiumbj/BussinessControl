<?php
/* @var $this ARTICULOPROVEEDORController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Articuloproveedors',
);

$this->menu=array(
	array('label'=>'Create ARTICULOPROVEEDOR', 'url'=>array('create')),
	array('label'=>'Manage ARTICULOPROVEEDOR', 'url'=>array('admin')),
);
?>

<h1>Articuloproveedors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
