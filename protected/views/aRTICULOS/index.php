<?php
/* @var $this ARTICULOSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Articuloses',
);

$this->menu=array(
	array('label'=>'Create ARTICULOS', 'url'=>array('create')),
	array('label'=>'Manage ARTICULOS', 'url'=>array('admin')),
);
?>

<h1>Articuloses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
