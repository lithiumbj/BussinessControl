<?php
/* @var $this EMPLEADOSController */
/* @var $model EMPLEADOS */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'empleados-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'Nombre'); ?>
        <?php echo $form->textField($model, 'Nombre', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'Nombre'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Apellidos'); ?>
        <?php echo $form->textField($model, 'Apellidos', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'Apellidos'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'FechaNacimiento'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'FechaNacimiento',
            'model'=>$model,
            'language' => 'en',
            'attribute' => 'FechaNacimiento',
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
        <?php //echo $form->textField($model, 'FechaNacimiento'); ?>
        <?php echo $form->error($model, 'FechaNacimiento'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'DNI'); ?>
        <?php echo $form->textField($model, 'DNI', array('size' => 9, 'maxlength' => 9)); ?>
        <?php echo $form->error($model, 'DNI'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Direccion'); ?>
        <?php echo $form->textField($model, 'Direccion', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'Direccion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Poblacion'); ?>
        <?php echo $form->textField($model, 'Poblacion', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'Poblacion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Ciudad'); ?>
        <?php echo $form->textField($model, 'Ciudad', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'Ciudad'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Pais'); ?>
        <?php echo $form->textField($model, 'Pais', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'Pais'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Email'); ?>
        <?php echo $form->textField($model, 'Email', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'Email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Password'); ?>
        <?php echo $form->passwordField($model, 'Password', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'Password'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->