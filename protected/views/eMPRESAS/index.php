<?php
/* @var $this EMPRESASController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresases',
);

$this->menu=array(
	array('label'=>'Create EMPRESAS', 'url'=>array('create')),
	array('label'=>'Manage EMPRESAS', 'url'=>array('admin')),
);
?>

<h1>Empresases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
