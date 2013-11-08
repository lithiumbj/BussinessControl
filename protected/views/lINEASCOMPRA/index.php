<?php
/* @var $this LINEASCOMPRAController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lineascompras',
);

$this->menu=array(
	array('label'=>'Create LINEASCOMPRA', 'url'=>array('create')),
	array('label'=>'Manage LINEASCOMPRA', 'url'=>array('admin')),
);
?>

<h1>Lineascompras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
