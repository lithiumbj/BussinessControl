<?php
/* @var $this LINEASPRESUPUESTOSController */
/* @var $model LINEASPRESUPUESTOS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lineaspresupuestos-form',
        'action' => '/index.php?r=lINEASPRESUPUESTOS/create',
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
        <div class="vrow" id="hidden2" style="display:none;">
		<?php echo $form->labelEx($model,'NombreDelProducto'); ?>
		<?php echo $form->textField($model,'NombreDelProducto'); ?>
		<?php echo $form->error($model,'NombreDelProducto'); ?>
	</div>

	<div class="vrow" id="hidden1" style="display:none;">
		<?php echo $form->labelEx($model,'CosteOrigenProducto'); ?>
		<?php echo $form->textField($model,'CosteOrigenProducto'); ?>
		<?php echo $form->error($model,'CosteOrigenProducto'); ?>
	</div>
        <div class="vrow" style="display: none;">
		<?php 
                $model->isBlank =0;
                echo $form->labelEx($model,'isBlank'); ?>
		<?php echo $form->textField($model,'isBlank'); ?>
		<?php echo $form->error($model,'isBlank'); ?>
	</div>
        
	<div class="vrow">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Añadir' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    window.onload = function()
    {
        //Agregar listener al desplegable de precios para mostrar u ocultar los campos
        var selector = document.getElementById("LINEASPRESUPUESTOS_idArticulo");
        //Mostrar por defecto los campos de creación de nuevo articulo
        document.getElementById("hidden1").style.display ="inline-block";
        document.getElementById("hidden2").style.display ="inline-block";
        //Iniciar la comprobación del selector de articulos
        selector.onchange = function(){
            if(document.getElementById("LINEASPRESUPUESTOS_idArticulo").value == 1){
                //Si se elije la opcion de articulo nuevo
                document.getElementById("hidden1").style.display ="inline-block";
                document.getElementById("hidden2").style.display ="inline-block";
            }else{
                //Si se elija la opcion de articulo ya existente
                document.getElementById("hidden1").style.display ="none";
                document.getElementById("hidden2").style.display ="none";
            }
        };
    }
</script>