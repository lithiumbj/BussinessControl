<?php
/* @var $this FACTURASController */
/* @var $model FACTURAS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facturas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php echo $form->dropDownList($model, 'idCliente', $this->getAllClientes()); ?> 
		<?php echo $form->error($model,'idCliente'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Fecha'); ?>
                <?php $model->Fecha = date("Y/m/d");?>
                <?php 
                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'Fecha',
                'model'=>$model,
                'language' => 'en',
                'attribute' => 'Fecha',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat'=> 'yy-mm-dd'
                ),
                'htmlOptions' => array(
                    'style' => 'height:20px;'
                ),
            ));
                ?>
		<?php /*echo $form->textField($model,'Fecha'); */?>
		<?php echo $form->error($model,'Fecha'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Observaciones'); ?>
		<?php echo $form->textArea($model,'Observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Observaciones'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'idEmpleado'); 
                $model->idEmpleado = $this->getUserId(Yii::app()->user->id);
                ?>
		<?php echo $form->textField($model,'idEmpleado'); ?>
		<?php echo $form->error($model,'idEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pagado'); ?>
                <?php 
                $opcionesPagado = array(0=>'No pagado',1=>'Pagado');
                //Desplegable con opciones de pagado
                echo $form->dropDownList($model, 'Pagado', $opcionesPagado, $htmlOptions=array ( )); ?>
		<?php /*echo $form->textField($model,'Pagado'); */?>
		<?php echo $form->error($model,'Pagado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->