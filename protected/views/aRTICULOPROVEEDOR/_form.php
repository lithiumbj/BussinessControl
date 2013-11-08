<?php
/* @var $this ARTICULOPROVEEDORController */
/* @var $model ARTICULOPROVEEDOR */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articuloproveedor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dx'); ?>
		<?php echo $form->textField($model,'Dx',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Dx'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dy'); ?>
		<?php echo $form->textField($model,'Dy',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Dy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dz'); ?>
		<?php echo $form->textField($model,'Dz',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Dz'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CosteUnitario'); ?>
		<?php echo $form->textField($model,'CosteUnitario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CosteUnitario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descuento'); ?>
		<?php echo $form->textField($model,'Descuento',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Descuento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CantidadMinima'); ?>
		<?php echo $form->textField($model,'CantidadMinima',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CantidadMinima'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'idProveedor'); ?>
		<?php echo $form->textField($model,'idProveedor', array('value'=> $_GET['provID'] )); ?>
		<?php echo $form->error($model,'idProveedor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->