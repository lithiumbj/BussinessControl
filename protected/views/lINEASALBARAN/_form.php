<?php
/* @var $this LINEASALBARANController */
/* @var $model LINEASALBARAN */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lineasalbaran-form',
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
		<?php
                    //Obtener los datos
                    $opcionesCondicion = $this->getAllArticles();
                    //Crear combobox
                    echo $form->dropDownList($model, 'idArticulo', $opcionesCondicion, $htmlOptions=array ( ));
                /*echo $form->textField($model,'idArticulo'); */?>
		<?php echo $form->error($model,'idArticulo'); ?>
	</div>

	<div class="vrow">
		<?php echo $form->labelEx($model,'Cantidad'); ?>
		<?php echo $form->textField($model,'Cantidad'); ?>
		<?php echo $form->error($model,'Cantidad'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'idAlbaran'); ?>
		<?php echo $form->textField($model,'idAlbaran', array('value'=> $_GET['provID'] )); ?>
		<?php echo $form->error($model,'idAlbaran'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->