<?php
/* @var $this LINEASPRESUPUESTOSController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lineaspresupuestoses',
);

$this->menu=array(
	array('label'=>'Create LINEASPRESUPUESTOS', 'url'=>array('create')),
	array('label'=>'Manage LINEASPRESUPUESTOS', 'url'=>array('admin')),
);
?>

<h1>Lineaspresupuestoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
