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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
}
