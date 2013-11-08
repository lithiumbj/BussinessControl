<?php
/* @var $this CLIENTESController */
/* @var $data CLIENTES */
?>

<div class="view">

        <!--<b><?php //echo CHtml::encode($data->getAttributeLabel('id'));    ?>:</b>
    <?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
        <br />-->

    <b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Nombre), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Apellidos')); ?>:</b>
    <?php echo CHtml::encode($data->Apellidos); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Telefono1')); ?>:</b>
    <?php echo CHtml::encode($data->Telefono1); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Ciudad')); ?>:</b>
    <?php echo CHtml::encode($data->Ciudad); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
    <?php echo CHtml::encode($data->Direccion); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('NombreContacto')); ?>:</b>
    <?php echo CHtml::encode($data->NombreContacto); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Empresa')); ?>:</b>
    <?php echo CHtml::encode($data->Empresa); ?>
    <br />
    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('Pais')); ?>:</b>
      <?php echo CHtml::encode($data->Pais); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('CodigoPostal')); ?>:</b>
      <?php echo CHtml::encode($data->CodigoPostal); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Poblacion')); ?>:</b>
      <?php echo CHtml::encode($data->Poblacion); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Telefono2')); ?>:</b>
      <?php echo CHtml::encode($data->Telefono2); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('NombreContacto')); ?>:</b>
      <?php echo CHtml::encode($data->NombreContacto); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Email1')); ?>:</b>
      <?php echo CHtml::encode($data->Email1); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Email2')); ?>:</b>
      <?php echo CHtml::encode($data->Email2); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('CIFEmpresa')); ?>:</b>
      <?php echo CHtml::encode($data->CIFEmpresa); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('Condicion')); ?>:</b>
      <?php echo CHtml::encode($data->Condicion); ?>
      <br />

     */ ?>

</div>