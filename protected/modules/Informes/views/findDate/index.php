<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<h2>Listado de facturas impagadas y pendientes</h2>
<form action="?r=Informes" method="POST">
    <div class="vrow" style="width: 350px;">
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Fecha',
            'language' => 'en',
            'attribute' => 'Fecha',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd'
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?>
        <?php //echo $form->textField($model, 'FechaNacimiento'); ?>
    </div>
    <div class="vrow" style="width: 350px;">
        <input type="submit" value="Filtrar por Día"/>
        <input type="submit" value="Filtrar por Mes"/>
        <input type="submit" value="Filtrar por Año"/>
    </div>
</form>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => FindDateController::getImpagosByDate($this->getDate(), $this->getFilter()),
    'columns' => array(
        array(
            'name' => 'ID',
            'value' => '$data->id',
        ),
        array(
            'name' => 'Cliente',
            'value' => '$data->idCliente',
        ),
        array(
            'name' => 'Fecha',
            'value' => '$data->Fecha',
        ),
        array(
            'name' => 'Empleado',
            'value' => '$data->idEmpleado',
        ),
        array(
            'name' => 'Deuda',
            'value' => '$data->Pagado."€"',
        ),
        array(// display a column with "view", "update" and "delete" buttons
            'class' => 'CButtonColumn',
            'template' => '{ver}',
            'header' => 'Acciones',
            'buttons' => array
                (
                'ver' => array
                    (
                    'label' => '[-]',
                    'url' => 'Yii::app()->createUrl("fACTURAS/view", array("id"=>$data->id))',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/view.png',
                ),
            ),
            'htmlOptions' => array('width' => 70),
        ),
    ),
));
?>