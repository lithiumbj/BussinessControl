<?php
/* @var $this PRESUPUESTOSController */
/* @var $model PRESUPUESTOS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'presupuestos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <b>Cliente<span class="required">*</span></b><br/>
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
		<?php echo $form->error($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Observaciones'); ?>
		<?php echo $form->textArea($model,'Observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Observaciones'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'idEmpleado'); ?>
		<?php 
                $model->idEmpleado = $this->getUserId(Yii::app()->user->id);
                echo $form->textField($model,'idEmpleado'); ?>
		<?php echo $form->error($model,'idEmpleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Proforma'); ?>
		<?php $opcionesProforma = array(1=>'No',0=>'Si');
                       echo $form->dropDownList($model, 'Proforma', $opcionesProforma); ?>
		<?php echo $form->error($model,'Proforma'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->