<?php

class FACTURASController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			/*'postOnly + delete', // we only allow deletion via POST request*/
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update', 'delete','admin','print'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                //Pre-obtener el modelo de datos para la vista
                $model = $this->loadModel($id);
                //Cambiar el pagado de integer a string según proceda
                switch ($model->Pagado) {
                    case 0:
                        $model->Pagado = "No pagado";
                        break;
                    case 1:
                        $model->Pagado = "Pagado";
                        break;

                    default:
                        break;
                }
                //Cambiar el método de pago según pertoque
                switch ($model->FormaDePago) {
                    case 0:
                        $model->FormaDePago = "Efectivo";
                        break;
                    case 1:
                        $model->FormaDePago = "Tarjeta de credito";
                        break;
                    case 1:
                        $model->FormaDePago = "Transferencia";
                        break;

                    default:
                        break;
                }
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FACTURAS;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FACTURAS']))
		{
			$model->attributes=$_POST['FACTURAS'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FACTURAS']))
		{
			$model->attributes=$_POST['FACTURAS'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FACTURAS');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FACTURAS('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FACTURAS']))
			$model->attributes=$_GET['FACTURAS'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FACTURAS the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FACTURAS::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FACTURAS $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /*
         * Prepara para imprimir una factura
         */
        public function actionPrint()
        {
            $id = $_GET['id'];
            //Obtener la factura mediante su FK
            $model = FACTURAS::model()->findByPk($id);
            //Renderizar la vista de Print en funcion del modelo obtenido y pasado a la vista de render
            //$this->render('print',array('model'=>$model,));
            
            # mPDF
            $mPDF1 = Yii::app()->ePdf->mpdf();

            # You can easily override default constructor's params
            $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
            # Load a stylesheet
            $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
            $mPDF1->WriteHTML($stylesheet, 1);

            # renderPartial (only 'view' of current controller)
            $mPDF1->WriteHTML($this->renderPartial('print', array('model'=>$model), true));

            # Renders image
            $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));

            # Outputs ready PDF
            $mPDF1->Output();
        }
        
        /*
         * Este método retorna todos los clientes registrados para las facturas
         * @return Array de pares de clientes e ids
         */
        public function getAllClientes()
        {
            //Obtener los clientes con un DataProvider
            $clientes = new CActiveDataProvider('CLIENTES', array(
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            //Creamos un array de pares de clientes vacio
            $listaClientes;
            //Iteramos un $clienete por cada uno de los disponibles en clientes
            foreach($clientes->getData() as $cliente){
                //Grabamos el cliente en el array
                $listaClientes[$cliente['id']] = $cliente['Nombre'].' '.$cliente['Apellidos'];
            }
            //Lo retornamos
            return $listaClientes;
        }
        
        /*
         * Este método retorna el Cliente al cual se le ha hecho la factura
         */
        public function getCliente($id)
        {
            //Generar el Data provider
            $clientes = new CActiveDataProvider('CLIENTES', array(
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            //Crear un array vacio de pares para el cliente
            $listaClientes;
            //Creamos un foreach para obtener el Nombre y el apellido del cliente en función de su id
            foreach ($clientes->getData() as $cliente){
                //Comprobar el id del cliente y retornarlo
                if($cliente['id'] == $id){
                    return $cliente['Nombre'].' '.$cliente['Apellidos'];
                    break;
                }
            }
        }
        
        /*
         * Funcion que retorna el nombre y apellidos del empleado
         * @param String dni 
         * @return Nombre y apellido
         */
        public function getUserId($dni)
        {
            //Obtener solo el único empleado que coincida con el DNI
            $empleados = new CActiveDataProvider('EMPLEADOS', array(
                'criteria' => array(
                    'condition' => 'DNI="' . $dni.'"',
                ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            //Recorrer el array con los empleados
            foreach($empleados->getData() as $empleado){
                return $empleado['id'];
            }
        }
        
        /*
         * Funcion que retorna el nombre y apellidos del empleado
         * @param String dni 
         * @return Nombre y apellido
         */
        public function getUserName($id)
        {
            //Obtener solo el único empleado que coincida con el DNI
            $empleados = new CActiveDataProvider('EMPLEADOS', array(
                'criteria' => array(
                    'condition' => 'id="' . $id.'"',
                ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            //Recorrer el array con los empleados
            foreach($empleados->getData() as $empleado){
                return $empleado['Nombre'].' '.$empleado['Apellidos'];
            }
        }
        
        public function getLineasModel()
        {
          $model = new LINEASCOMPRA();
          return $model;
        }
        /*
         * Retorna una lista de todos los articulos
         */
        public function getArticulos()
        {
            //Obtener con un provider TODOS los articulos
            $data = new CActiveDataProvider('ARTICULOS', array(
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            $articulos;
            //Recorrer los Articulos y construir un array de pares
            foreach($data->getData() as $articulo){
                $articulos[$articulo->id] = $articulo['Nombre'];
            }
            return $articulos;
        }
        /*
         * Retorna un objeto detalle de un articulo en concreto según su id
         */
        function getArticuloDetails($idArticulo)
        {
            $dataProvider = new CActiveDataProvider('ARTICULOS', array(
               'criteria' => array(
                   'condition' => 'id='.$idArticulo,
               ),
            ));
            
            return $dataProvider->getData()[0];
        }
        /*
         * Retorna un dataProvider (data) con todos los articulos seleccionados en las lineas de compra
         */
        public function getPrintLineasCompra($facturaID)
        {
            $returnLineas = array();
            $dataProvider = new CActiveDataProvider('LINEASCOMPRA', array(
               'criteria' => array(
                   'condition' => 'idFactura='.$facturaID,
               ),
            ));
            //Volcar los datos de cada una de las lineas de compra a un array 
            $lineas = $dataProvider->getData();
            //Procesar las lineas de compra una por una
            for($i=0;$i<count($lineas);$i++){
                //guardar el idDel articulo por comodidad
                $idLinea = $lineas[$i]['idArticulo'];
                //Crear un array con los datos de las lineas de compra
                $returnLineas[$i]['idProducto'] = $lineas[$i]['idArticulo'];
                $returnLineas[$i]['Cantidad'] = $lineas[$i]['Cantidad'];
                $returnLineas[$i]['Precio'] = $this->getArticuloDetails($idLinea)['pvp'];
                $returnLineas[$i]['Nombre'] = $this->getArticuloDetails($idLinea)['Nombre'];
            }
            
            //Retorno de datos
            return $returnLineas;
        }
        /*
         * Retornar array con los datos del cliente sobre el cual está hecha la factura
         */
        function getFacturaCliente($clienteId)
        {
            $cliente = array();
            //Obtenerlo mediante un dataProvider
            $dataProvider = new CActiveDataProvider('CLIENTES', array(
               'criteria' => array(
                   'condition' => 'id='.$clienteId,
               ),
            ));
            //Almacenamiento de datos del cliente
            $cliente['Nombre'] = $dataProvider->getData()[0]['Nombre'];
            $cliente['Apellidos'] = $dataProvider->getData()[0]['Apellidos'];
            $cliente['Cifempresa'] = $dataProvider->getData()[0]['CIFEmpresa'];
            $cliente['Empresa'] = $dataProvider->getData()[0]['Empresa'];
            $cliente['Poblacion'] = $dataProvider->getData()[0]['Poblacion'];
            $cliente['Provincia'] = $dataProvider->getData()[0]['Ciudad'];
            $cliente['Direccion'] = $dataProvider->getData()[0]['Direccion'];
            $cliente['CodigoPostal'] = $dataProvider->getData()[0]['CodigoPostal'];
            
            //Retorno de datos
            return $cliente;
        }
        
        /*
         * Obtener las facturas de un cliente
         */
        public function getFacturasFromCliente($id)
        {
            $dataProvider = new CActiveDataProvider('FACTURAS', array(
                'criteria' => array(
                    'condition' => 'idCliente='.$id,
                ),
            ));
            $datos = $dataProvider->getData();
            //Recorrer el array de datos para sustituir algunos valores como pagado
            for($i=0;$i<count($datos);$i++){
                switch ($datos[$i]['Pagado']) {
                    case 0:
                        $datos[$i]['Pagado'] = "No pagado";
                        break;
                    case 1:
                        $datos[$i]['Pagado'] = "Pagado";
                        break;

                    default:
                        break;
                }
            }
            $dataProvider->setData($datos);
            return $dataProvider;
        }
}
