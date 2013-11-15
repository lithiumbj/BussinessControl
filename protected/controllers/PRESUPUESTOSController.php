<?php

class PRESUPUESTOSController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','create','update', 'delete','admin','print', 'convert'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PRESUPUESTOS;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PRESUPUESTOS']))
		{
			$model->attributes=$_POST['PRESUPUESTOS'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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

		if(isset($_POST['PRESUPUESTOS']))
		{
			$model->attributes=$_POST['PRESUPUESTOS'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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
		$dataProvider=new CActiveDataProvider('PRESUPUESTOS');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PRESUPUESTOS('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PRESUPUESTOS']))
			$model->attributes=$_GET['PRESUPUESTOS'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PRESUPUESTOS the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PRESUPUESTOS::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PRESUPUESTOS $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='presupuestos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /*
         * Vista de impresión del presupuesto
         */
        public function actionPrint()
        {
            $id = $_GET['id'];
            //Obtener la factura mediante su FK
            $model =  PRESUPUESTOS::model()->findByPk($id);
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
         * Conversión de presupuesto en factura
         */
        public function actionConvert()
        {
            $id = $_GET['id'];
            //Obtener la factura mediante su FK
            $model =  PRESUPUESTOS::model()->findByPk($id);
            //Renderizar la vista de Print en funcion del modelo obtenido y pasado a la vista de render
            
            /*
             * Convertir a factura
             */
             Yii::import('application.controllers.FACTURASController');
             Yii::import('application.controllers.LINEASCOMPRAController');
             Yii::import('application.controllers.ARTICULOSController');
            //Crear la factura nueva
            $facturaId = FACTURASController::importPresupuesto($model->idCliente, date("Y/m/d"), $model->Observaciones, $model->idEmpleado);
            echo 'Creando factura con id '.$facturaId;
            //Insertar uno a uno todos las lineas de compra
            $lineasCompra = new CActiveDataProvider('LINEASPRESUPUESTOS', array(
                'criteria'=> array(
                    'condition' => 'idFactura='.$_GET['id'],
                    ),
                ));
                //var_dump($lineasCompra->getData()); 
            foreach($lineasCompra->getData() as $linea){
                //Obtener los detalles del articulo
                $articulo = ARTICULOSController::getItemById($linea['idArticulo']);
                echo 'Almacenando Articulo'.$linea['idArticulo'];
                LINEASCOMPRAController::importLineaPresupuesto($linea['idArticulo'], $linea['Cantidad'], $facturaId, $articulo['Nombre'], $articulo['pvp']);
                
            }
            $model->ID = $facturaId;
            $this->render('convert',array('model'=>$model,));
            //Borrar el presupuesto
            $this->loadModel($id)->delete();
            //Redirigir a la factura
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
          $model = new LINEASPRESUPUESTOS();
          return $model;
        }
        
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
         * Esta funcion retorna un array personalizado sin una estructura definida para el impresor de pdfs de presupuestos
         */
        public function getPrintLineasArray($idFactura)
        {
            $array = array();
            /*
             * DataProvider de lineas de compra
             */
            $provider1 = new CActiveDataProvider('LINEASPRESUPUESTOS', array(
                'criteria' => array(
                    'condition' => 'idFactura='.$idFactura,
                )
            ));
            $provider1Data = $provider1->getData();
            //Recorrer cada línea de compra y almacenar los datos
            for($i=0;$i<count($provider1Data);$i++){
                $array[$i]['id'] = $provider1Data[$i]['id'];
                $provider2 = new CActiveDataProvider('ARTICULOS', array(
                    'criteria' => array(
                        'condition' => 'id='.$provider1Data[$i]['idArticulo'],
                    ),
                ));
                $provider2Data = $provider2->getData();
                $array[$i]['Nombre'] = $provider2Data[0]['Nombre'];
                $array[$i]['Precio'] = $provider2Data[0]['pvp'];
                $array[$i]['Cantidad'] = $provider1Data[$i]['Cantidad'];
            }
            return $array;
        }
}
