<?php
/* @var $this CLIENTESController */
/* @var $model CLIENTES */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clientes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> Son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Apellidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Direccion'); ?>
		<?php echo $form->textField($model,'Direccion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CodigoPostal'); ?>
		<?php echo $form->textField($model,'CodigoPostal',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CodigoPostal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ciudad'); ?>
		<?php echo $form->textField($model,'Ciudad',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Poblacion'); ?>
		<?php echo $form->textField($model,'Poblacion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Poblacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pais'); ?>
		<?php echo $form->textField($model,'Pais',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Pais'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Telefono1'); ?>
		<?php echo $form->textField($model,'Telefono1',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Telefono1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Telefono2'); ?>
		<?php echo $form->textField($model,'Telefono2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Telefono2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreContacto'); ?>
		<?php echo $form->textField($model,'NombreContacto',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NombreContacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email1'); ?>
		<?php echo $form->textField($model,'Email1',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Email1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email2'); ?>
		<?php echo $form->textField($model,'Email2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Email2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Empresa'); ?>
		<?php echo $form->textField($model,'Empresa'); ?>
		<?php echo $form->error($model,'Empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CIFEmpresa'); ?>
		<?php echo $form->textField($model,'CIFEmpresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CIFEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Condicion'); ?>
                <?php 
                    //Declaración de las opciones
                    $opcionesCondicion = array(0=>'Normal',1=>'Moroso',2=>'Archivado');
                ?>
                <?php echo $form->dropDownList($model, 'Condicion', $opcionesCondicion, $htmlOptions=array ( ));?>
		<?php /*echo $form->textField($model,'Condicion',array('size'=>45,'maxlength'=>45)); */?>
		<?php echo $form->error($model,'Condicion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->