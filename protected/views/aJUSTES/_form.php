<?php
/* @var $this AJUSTESController */
/* @var $model AJUSTES */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ajustes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> Son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IVA'); ?>
		<?php echo $form->textField($model,'IVA'); ?>%
		<?php echo $form->error($model,'IVA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RecargoEquivalencia'); ?>
		<?php echo $form->textField($model,'RecargoEquivalencia'); ?>%
		<?php echo $form->error($model,'RecargoEquivalencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CIFEmpresa'); ?>
		<?php echo $form->textField($model,'CIFEmpresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CIFEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreEmpresa'); ?>
		<?php echo $form->textField($model,'NombreEmpresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NombreEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreCEO'); ?>
		<?php echo $form->textField($model,'NombreCEO',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NombreCEO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ApellidosCEO'); ?>
		<?php echo $form->textField($model,'ApellidosCEO',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ApellidosCEO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DireccionEmpresa'); ?>
		<?php echo $form->textField($model,'DireccionEmpresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'DireccionEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PoblacionEmpresa'); ?>
		<?php echo $form->textField($model,'PoblacionEmpresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'PoblacionEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CiudadEmpresa'); ?>
		<?php echo $form->textField($model,'CiudadEmpresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CiudadEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CPEmpresa'); ?>
		<?php echo $form->textField($model,'CPEmpresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CPEmpresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->