<?php
/* @var $this LINEASPRESUPUESTOSController */
/* @var $model LINEASPRESUPUESTOS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lineaspresupuestos-form',
        'action' => '/BussinessControl/index.php?r=lINEASPRESUPUESTOS/create',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="vrow">
		<?php echo $form->labelEx($model,'idArticulo'); ?>
		<?php echo $form->dropDownList($model, 'idArticulo', $this->getArticulos());  ?>
		<?php echo $form->error($model,'idArticulo'); ?>
	</div>

	<div class="vrow">
		<?php echo $form->labelEx($model,'Cantidad'); ?>
		<?php echo $form->textField($model,'Cantidad'); ?>
		<?php echo $form->error($model,'Cantidad'); ?>
	</div>

	<div class="vrow" style="display:none;">
		<?php echo $form->labelEx($model,'idFactura'); ?>
		<?php echo $form->textField($model,'idFactura'); ?>
		<?php echo $form->error($model,'idFactura'); ?>
	</div>

	<div class="vrow">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Añadir' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->