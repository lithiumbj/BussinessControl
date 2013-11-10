<?php
/* @var $this AJUSTESController */
/* @var $model AJUSTES */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IVA'); ?>
		<?php echo $form->textField($model,'IVA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RecargoEquivalencia'); ?>
		<?php echo $form->textField($model,'RecargoEquivalencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CIFEmpresa'); ?>
		<?php echo $form->textField($model,'CIFEmpresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreEmpresa'); ?>
		<?php echo $form->textField($model,'NombreEmpresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreCEO'); ?>
		<?php echo $form->textField($model,'NombreCEO',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ApellidosCEO'); ?>
		<?php echo $form->textField($model,'ApellidosCEO',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DireccionEmpresa'); ?>
		<?php echo $form->textField($model,'DireccionEmpresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PoblacionEmpresa'); ?>
		<?php echo $form->textField($model,'PoblacionEmpresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CiudadEmpresa'); ?>
		<?php echo $form->textField($model,'CiudadEmpresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CPEmpresa'); ?>
		<?php echo $form->textField($model,'CPEmpresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->