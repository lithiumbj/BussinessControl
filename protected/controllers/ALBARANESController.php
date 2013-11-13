<?php

class ALBARANESController extends Controller
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
				'actions'=>array('index','view','create','update', 'delete','admin'),
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
            
                //Modificar algunas entradas del modelo
                $model = $this->loadModel($id);
                $model->idEmpleado = $this->getEmpleadoNameByID($model->idEmpleado);
                $model->idProveedor = $this->getProveedorNombreById($model->idProveedor);
                //Modificar algunas entradas del modelo END
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
		$model=new ALBARANES;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ALBARANES']))
		{
			$model->attributes=$_POST['ALBARANES'];
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

		if(isset($_POST['ALBARANES']))
		{
			$model->attributes=$_POST['ALBARANES'];
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
		$dataProvider=new CActiveDataProvider('ALBARANES');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ALBARANES('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ALBARANES']))
			$model->attributes=$_GET['ALBARANES'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ALBARANES the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ALBARANES::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ALBARANES $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='albaranes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        /*
         * Obtener los proveedores en un array de pares de id=>Nombre
         */
        public function getPoveedores()
        {
            $dataProvider = new CActiveDataProvider('PROVEEDORES', array(
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),));
            //Array vacio que contendrá los proveedores en pares de ID => Nombre
            $proveedores;
            //Recorremos para obtener los datos de los proveedores
            foreach($dataProvider->getData() as $proveedor){
                $proveedores[$proveedor['id']] = $proveedor['Nombre'];
            }
            return $proveedores;
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
         * List articulos from albaran
         */
        public function actionIndexProducts($provId)
        {
            $articulosProvider = new CActiveDataProvider('LINEASALBARAN', array(
                    'criteria' => array(
                        'condition'=>'idAlbaran='.$provId,
                        ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            //Extraer los datos del dataProvider y reconvertirlo
            $datos = $articulosProvider->getData();
            //Recorrer y sustituir los datos de id articulo por otros mas look&feel
            for($i=0;$i<count($datos);$i++){
                $datos[$i]['idArticulo'] = $this->getArticuloNameByID($datos[$i]['idArticulo']);
            }
            //Reinsertar los datos en el DataProvider
            $articulosProvider->setData($datos);
            return $articulosProvider;
        }
        /*
         * Funcion para obtener el nombre de un articulo por su id
         */
        public function getArticuloNameByID($id)
        {
            $dataProvider = new CActiveDataProvider('ARTICULOS', array(
                'criteria'=>array(
                    'condition'=> 'id='.$id,
                ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            return $dataProvider->getData()[0]['Nombre'];
        }
        
        /*
         * Funcion para obtener el nombre del empleado en función de su id
         */
        public function getEmpleadoNameByID($id)
        {
            $dataProvider = new CActiveDataProvider('EMPLEADOS', array(
                'criteria'=>array(
                    'condition'=> 'id='.$id,
                ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            return $dataProvider->getData()[0]['Nombre'].' '.$dataProvider->getData()[0]['Apellidos'];
        }
        
        /*
         * Funcion para obtener el nombre del empleado en función de su id
         */
        public function getProveedorNombreById($id)
        {
            $dataProvider = new CActiveDataProvider('PROVEEDORES', array(
                'criteria'=>array(
                    'condition'=> 'id='.$id,
                ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            return $dataProvider->getData()[0]['Nombre'];
        }
}
