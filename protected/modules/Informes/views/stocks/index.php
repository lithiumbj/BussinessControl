<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<h2>Listado de articulos con Stock menor de 10 unidades</h2>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$this->getLowStockArticles(),
));
?>