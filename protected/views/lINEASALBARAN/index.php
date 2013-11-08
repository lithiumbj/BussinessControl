<?php
/* @var $this LINEASALBARANController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lineasalbarans',
);

$this->menu=array(
	array('label'=>'Create LINEASALBARAN', 'url'=>array('create')),
	array('label'=>'Manage LINEASALBARAN', 'url'=>array('admin')),
);
?>

<h1>Lineasalbarans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
