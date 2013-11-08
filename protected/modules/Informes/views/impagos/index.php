<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<h2>Listado de facturas impagadas y pendientes</h2>
<form action="?r=Informes/impagos" method="POST">
    <b>Fecha:</b> <div class="vrow" style="width: 180px;display: inline-block;">
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Fecha',
            'language' => 'en',
            'attribute' => 'Fecha',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?><br/>
    </div>
        <div style="width: 580px;display: inline-block;">
            <b>Id Cliente: </b><input type="text" name="nombre"/>
        </div>
    <div class="vrow" style="width: 450px;display: inline-block;">
        <input type="submit" name="Action" value="Filtrar por Dia"/>
        <input type="submit" name="Action" value="Filtrar por Mes"/>
        <input type="submit" name="Action" value="Filtrar por Año"/>
        <input type="submit" name="Action" value="Sin filtrar"/>
    </div>
</form>
<?php
//Decidir de donde se obtienen los datos en función del tipo de filtro
$dataProvider;
//Si lleva filtrado
if(isset($_POST['Action'])){
   $dataProvider = $this->getImpagosByDate($this->getDate(), $this->getFilter()); 
}
//Sino lleva filtrado
else{
     $dataProvider = $this->getAllImpagos();
}
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
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