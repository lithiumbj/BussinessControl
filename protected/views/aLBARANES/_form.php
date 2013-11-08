<?php
/* @var $this ALBARANESController */
/* @var $model ALBARANES */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'albaranes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
                <b>Proveedor<span class="required">*</span></b><br/>
		<?php /*echo $form->textField($model,'idProveedor'); */
                    $idProveedor= $this->getPoveedores();
                    echo $form->dropDownList($model, 'idProveedor', $idProveedor, $htmlOptions=array ( ));
                ?>
		<?php echo $form->error($model,'idProveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Observaciones'); ?>
		<?php echo $form->textArea($model,'Observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Observaciones'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'idEmpleado'); ?>
                <?php 
                    //Cargar el empleado actual en el campo y ocultarlo
                    $model->idEmpleado = $this->getUserId(Yii::app()->user->id);
                ?>
		<?php echo $form->textField($model,'idEmpleado'); ?>
		<?php echo $form->error($model,'idEmpleado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->