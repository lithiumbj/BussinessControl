<?php

class ImpagosController extends Controller
{
    
    
        /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('impagos', 'find'),
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{   
            $this->render('../impagos/index');
	}
        
        /*
         * Vista de búsqueda por Fecha
         */
        public function actionFind()
        {
            $this->render('../default/index');
        }
        /*
         * Este método busca todos los clientes con impagos
         */
        public function getAllImpagos()
        {
            $facturas = new CActiveDataProvider('FACTURAS', array(
               'criteria' => array(
                   'condition' => 'Pagado=0',
                   'order' => 'idCliente DESC',
               ),
                'pagination' => array(
                    'pageSize' => 100,
                ),
            ));
            //Extraer datos de facturación del CActiveDataProvider
            $datosFacturacion = $facturas->getData();
            //Reconvertir datos a user-friendly 
            //Obtener el nombre del cliente
            $i=0;
            foreach($datosFacturacion as $factura){
                /*
                 * Procesar los clientes
                 */
                $clientes = new CActiveDataProvider('CLIENTES',array(
                    'criteria'=>array(
                        'condition' => 'id='.$factura['idCliente'],
                    ),
                ));
                //Asignar cliente al nombre de la factura
                $datosFacturacion[$i]['idCliente'] = $clientes->getData()[0]['Nombre'].' '.$clientes->getData()[0]['Apellidos'];

                /*
                 * Procesar los empleados
                 */
                $trabajadores = new CActiveDataProvider('EMPLEADOS',array(
                    'criteria'=>array(
                        'condition' => 'id='.$factura['idEmpleado'],
                    ),
                ));
                //Asignar El trabajador ()nombre) a la factura
                $datosFacturacion[$i]['idEmpleado'] = $trabajadores->getData()[0]['Nombre'].' '.$trabajadores->getData()[0]['Apellidos'];
                
                /*
                 * Procesar el montante adeudado
                 */
                $lineasCompra = new CActiveDataProvider('LINEASCOMPRA',array(
                    'criteria'=>array(
                        'condition' => 'idFactura='.$factura['id'],
                    ),
                ));
                $total=0;
                //Revisar y sumar todas las lineas de compra
                foreach($lineasCompra->getData() as $linea){
                    //Obtener el precio del articulo
                    $articulos = new CActiveDataProvider('ARTICULOS',array(
                        'criteria'=>array(
                            'condition' => 'id='.$linea['idArticulo'],
                        ),
                    ));
                    //Revisar que producto coincide y efectuarº los calculos
                    foreach($articulos->getData() as $articulo){
                        $temp = ($articulo['pvp']*$linea['Cantidad']);
                        $total += $temp;
                    }
                }
                //Almacenar los datos del coste total de las piezas (se procesa el iva)
                $datosFacturacion[$i]['Pagado'] = ($total+($total*0.21));
                $i++;
            }
            //Reinyectar los datos en el CActiveDataProvider
            $facturas->setData($datosFacturacion);
            //Reconvertir datos a user-friendly END//
            return $facturas;
        }
         public function getDate()
        {
            return $_POST['Fecha'];
        }
        public function getFilter()
        {
            return $_POST['Action'];
        }
        
        /*
         * Este método busca todos los clientes con impagos
         */
        public function getImpagosByDate($fecha, $filtro)
        {
            //Variable de facturas vacia
            $facturas;
            switch ($filtro) {
                /*
                 * Se ejecuta el filtrado por dia
                 */
                case 'Filtrar por Dia':
                $facturas = new CActiveDataProvider('FACTURAS', array(
                              'criteria' => array(
                                  'condition' => 'Pagado=0 AND Fecha="'.$fecha.'"',
                                  'order' => 'idCliente DESC',
                              ),
                               'pagination' => array(
                                   'pageSize' => 100,
                               ),
                           ));
                    break;
                /*
                 * Se ejecuta el filtrado por mes
                 */
                case 'Filtrar por Mes':
                    $facturas = new CActiveDataProvider('FACTURAS', array(
                              'criteria' => array(
                                  'condition' => 'Pagado=0 AND MONTH(`Fecha`) = MONTH("'.$fecha.'")',
                                  'order' => 'idCliente DESC',
                              ),
                               'pagination' => array(
                                   'pageSize' => 100,
                               ),
                           ));
                    break;
                /*
                 * Se ejecuta el filtrado por año 
                 */
                case 'Filtrar por Año':
                    $facturas = new CActiveDataProvider('FACTURAS', array(
                              'criteria' => array(
                                  'condition' => 'Pagado=0 AND YEAR(`Fecha`) = YEAR("'.$fecha.'")',
                                  'order' => 'idCliente DESC',
                              ),
                               'pagination' => array(
                                   'pageSize' => 100,
                               ),
                           ));
                    break;
                case 'Sin filtrar':
                $facturas = new CActiveDataProvider('FACTURAS', array(
                              'criteria' => array(
                                  'condition' => 'Pagado=0',
                                  'order' => 'idCliente DESC',
                              ),
                               'pagination' => array(
                                   'pageSize' => 100,
                               ),
                           ));
                    break;
            }
            //Extraer datos de facturación del CActiveDataProvider
            $datosFacturacion = $facturas->getData();
            //Reconvertir datos a user-friendly 
            //Obtener el nombre del cliente
            $i=0;
            foreach($datosFacturacion as $factura){
                /*
                 * Procesar los clientes
                 */
                $clientes = new CActiveDataProvider('CLIENTES',array(
                    'criteria'=>array(
                        'condition' => 'id='.$factura['idCliente'],
                    ),
                ));
                //Asignar cliente al nombre de la factura
                $datosFacturacion[$i]['idCliente'] = $clientes->getData()[0]['Nombre'].' '.$clientes->getData()[0]['Apellidos'];

                /*
                 * Procesar los empleados
                 */
                $trabajadores = new CActiveDataProvider('EMPLEADOS',array(
                    'criteria'=>array(
                        'condition' => 'id='.$factura['idEmpleado'],
                    ),
                ));
                //Asignar El trabajador ()nombre) a la factura
                $datosFacturacion[$i]['idEmpleado'] = $trabajadores->getData()[0]['Nombre'].' '.$trabajadores->getData()[0]['Apellidos'];
                
                /*
                 * Procesar el montante adeudado
                 */
                $lineasCompra = new CActiveDataProvider('LINEASCOMPRA',array(
                    'criteria'=>array(
                        'condition' => 'idFactura='.$factura['id'],
                    ),
                ));
                $total=0;
                //Revisar y sumar todas las lineas de compra
                foreach($lineasCompra->getData() as $linea){
                    //Obtener el precio del articulo
                    $articulos = new CActiveDataProvider('ARTICULOS',array(
                        'criteria'=>array(
                            'condition' => 'id='.$linea['idArticulo'],
                        ),
                    ));
                    //Revisar que producto coincide y efectuarº los calculos
                    foreach($articulos->getData() as $articulo){
                        $temp = ($articulo['pvp']*$linea['Cantidad']);
                        $total += $temp;
                    }
                }
                //Almacenar los datos del coste total de las piezas (se procesa el iva)
                $datosFacturacion[$i]['Pagado'] = ($total+($total*0.21));
                $i++;
            }
            //Reinyectar los datos en el CActiveDataProvider
            $facturas->setData($datosFacturacion);
            //Reconvertir datos a user-friendly END//
            return $facturas;
        }
}