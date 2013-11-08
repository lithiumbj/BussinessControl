<?php

class ARTICULOSController extends Controller
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
                //Capturar el modelo y modificarlo
                $modelo = $this->loadModel($id);
                $modelo->idArtProveedor = $this->getProveedorName($modelo->idArtProveedor);
		$this->render('view',array(
			'model'=>$modelo,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ARTICULOS;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ARTICULOS']))
		{
			$model->attributes=$_POST['ARTICULOS'];
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

		if(isset($_POST['ARTICULOS']))
		{
			$model->attributes=$_POST['ARTICULOS'];
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
		$dataProvider=new CActiveDataProvider('ARTICULOS');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ARTICULOS('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ARTICULOS']))
			$model->attributes=$_GET['ARTICULOS'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ARTICULOS the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ARTICULOS::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ARTICULOS $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='articulos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        

    /*
     * Obtener todos los articulos de los proveedores para vincularlo
     */

    public function getAllProveedores() {
        $proveedores = new CActiveDataProvider('ARTICULOPROVEEDOR', array(
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
        ));
        $listaProveedores;
        //Obtener todos los items del proveedor
        foreach ($proveedores->getData() as $data) {
            //Obtener el proveedor de cada articulo Filtrando su id a traves del ID del proveedor de cada articulo del proveedor
            $proveedorDeArticulo = new CActiveDataProvider('PROVEEDORES', array(
                'criteria' => array(
                    'condition' => 'id=' . $data['idProveedor'],
                ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            //Se recorre el array para procesar la salida de datos del CActiveDataProvider y hacer un GetData() para obtener una matriz de datos
            foreach ($proveedorDeArticulo->getData() as $proveedorItem) {
                //Concatenar datos extra como el Nombre del proveedor
                $listaProveedores[$data['id']] = $data['Nombre'].' - Proveedor: '.$proveedorItem['Nombre'];
            }
        }
        return $listaProveedores;
    }
    
    /*
     * Obtener el nombre de un determinado proveedor
     */
    public function getProveedorName($id)
    {
           //Extraer el proveedor del articulo proveedor
        $articuloProveedorProvider = new CActiveDataProvider('ARTICULOPROVEEDOR', array(
           'criteria' => array(
              'condition' => 'id='.$id,
           ) ,
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
        ));
           //Extraer el proveedor del articulo proveedor
        $proveedoresProvider = new CActiveDataProvider('PROVEEDORES', array(
           'criteria' => array(
              'condition' => 'id='.$articuloProveedorProvider->getData()[0]['idProveedor'],
           ) ,
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
        ));
           //retornar el valor
           return $proveedoresProvider->getData()[0]['Nombre'];
    }

}
