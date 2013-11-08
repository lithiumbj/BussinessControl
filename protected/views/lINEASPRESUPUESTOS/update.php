<?php
/* @var $this LINEASPRESUPUESTOSController */
/* @var $model LINEASPRESUPUESTOS */

$this->breadcrumbs=array(
	'Lineaspresupuestoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LINEASPRESUPUESTOS', 'url'=>array('index')),
	array('label'=>'Create LINEASPRESUPUESTOS', 'url'=>array('create')),
	array('label'=>'View LINEASPRESUPUESTOS', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LINEASPRESUPUESTOS', 'url'=>array('admin')),
);
?>

<h1>Update LINEASPRESUPUESTOS <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>