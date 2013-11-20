<?php

class AJUSTESController extends Controller
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
		$model=new AJUSTES;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AJUSTES']))
		{
			$model->attributes=$_POST['AJUSTES'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CIFEmpresa));
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

		if(isset($_POST['AJUSTES']))
		{
			$model->attributes=$_POST['AJUSTES'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CIFEmpresa));
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
		$dataProvider=new CActiveDataProvider('AJUSTES');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AJUSTES('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AJUSTES']))
			$model->attributes=$_GET['AJUSTES'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AJUSTES the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AJUSTES::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AJUSTES $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ajustes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /*
         * Obtener el unico registro existente de la tabla de ajustes
         */
        public function getUniqueSettings() 
        {
            $provider = new CActiveDataProvider('AJUSTES');
            //Redirigir a la vista detalle de los ajustes
            $proveedor = $provider->getData();
            $this->redirect(array('update','id'=>$proveedor[0]['CIFEmpresa']));
        }
        /*
         * Retorna los ajustes de la aplicación en un array
         */
        public function getSettings()
        {
            $provider = new CActiveDataProvider('AJUSTES');
            //Almacenar cada uno de los campos en el array
            $proveedor = $provider->getData();
            $settings['IVA'] = $proveedor[0]['IVA'];
            $settings['RecargoEquivalencia'] = $proveedor[0]['RecargoEquivalencia'];
            $settings['IRPF'] = $proveedor[0]['IRPF'];
            $settings['CIFEmpresa'] = $proveedor[0]['CIFEmpresa'];
            $settings['NombreEmpresa'] = $proveedor[0]['NombreEmpresa'];
            $settings['NombreCEO'] = $proveedor[0]['NombreCEO'];
            $settings['ApellidosCEO'] = $proveedor[0]['ApellidosCEO'];
            $settings['DireccionEmpresa'] = $proveedor[0]['DireccionEmpresa'];
            $settings['PoblacionEmpresa'] = $proveedor[0]['PoblacionEmpresa'];
            $settings['CiudadEmpresa'] = $proveedor[0]['CiudadEmpresa'];
            $settings['CPEmpresa'] = $proveedor[0]['CPEmpresa'];
            
            return $settings;
        }
}
