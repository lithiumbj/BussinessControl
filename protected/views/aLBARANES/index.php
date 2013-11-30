<?php
/* @var $this ALBARANESController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Albaranes',
);

$this->menu=array(
	array('label'=>'Crear Albaran', 'url'=>array('create')),
	array('label'=>'Gestionar Albaranes', 'url'=>array('admin')),
);
?>

<h1>Albaranes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
