<?php
/* @var $this ARTICULOSController */
/* @var $model ARTICULOS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulos-form',
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
		<?php echo $form->labelEx($model,'Stock'); ?>
		<?php echo $form->textField($model,'Stock',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Stock'); ?>
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
		<?php echo $form->labelEx($model,'Peso'); ?>
		<?php echo $form->textField($model,'Peso',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Peso'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Seleccione el articulo del proveedor de origen'); ?>
                <?php
                //Generar Listado de los articulos de todos los proveedores
                $opcionesCondicion = $this->getAllProveedores();
                ?>
                <?php echo $form->dropDownList($model, 'idArtProveedor', $opcionesCondicion, $htmlOptions=array ( ));?>
		<?php /*echo $form->textField($model,'idArtProveedor'); */?>
		<?php echo $form->error($model,'idArtProveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pvp'); ?>
		<?php echo $form->textField($model,'pvp'); ?>
		<?php echo $form->error($model,'pvp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->