<?php

class LINEASPRESUPUESTOSController extends Controller
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
		$model=new LINEASPRESUPUESTOS;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LINEASPRESUPUESTOS']))
		{
			$model->attributes=$_POST['LINEASPRESUPUESTOS'];
			if($model->save()){
				$this->redirect(array('//pRESUPUESTOS/view','id'=>$model->idFactura));
                        }
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

		if(isset($_POST['LINEASPRESUPUESTOS']))
		{
			$model->attributes=$_POST['LINEASPRESUPUESTOS'];
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
	{       $facturaId = $this->loadModel($id)->idFactura;
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('//pRESUPUESTOS/view','id'=>$facturaId));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('LINEASPRESUPUESTOS');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LINEASPRESUPUESTOS('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LINEASPRESUPUESTOS']))
			$model->attributes=$_GET['LINEASPRESUPUESTOS'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LINEASPRESUPUESTOS the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LINEASPRESUPUESTOS::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LINEASPRESUPUESTOS $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lineaspresupuestos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
        
        public function getContext()
        {
            return $this;
        }
        
        /*
         * Este método retorna el DataProvider de las lineas de venta de una determinada id
         */
        public function getLineas($facturaId)
        {
            $dataProvider = new CActiveDataProvider('LINEASPRESUPUESTOS', array(
                'criteria' => array(
                        'condition'=>'idFactura='.$facturaId,
                        ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            //Extraer los datos para modificarlos
            $preProcesado = $dataProvider->getData();
            //Recorrer el array del data provider
            for($i=0;$i<count($preProcesado);$i++){
                //Localizar los atributos y sustituirlos por un corresponiente "User-friendly"
                 $subProveedor = new CActiveDataProvider('ARTICULOS', array(
                'criteria' => array(
                        'condition'=>'id='.$preProcesado[$i]['idArticulo'],
                        ),
            ));
                 //Extraer los datos del DataProvider
                 $preProcesado[$i]['idArticulo'] = $subProveedor->getData()[0]['Nombre'];
                 //Crear el campo de precio unitario dentro de la linea de compra para visualizarlo en el formulario
            } 
            //Re-insertar los datos en el data provider
            $dataProvider->setData($preProcesado);
            return $dataProvider;
        }
        
        /*
         * Retorna el precio unitario de un articulo dada su de linea de compra
         */
        public function getItemPVP($itemId)
        {
            $dataProvider = new CActiveDataProvider('LINEASPRESUPUESTOS', array(
                'criteria' => array(
                    'condition'=>'id='.$itemId,
                )
            ));
            $resultProvider = new CActiveDataProvider('ARTICULOS', array(
                'criteria' => array(
                    'condition'=>'id='.$dataProvider->getData()[0]['idArticulo'],
                )
            ));
            return $resultProvider->getData()[0]['pvp'];
        }
        /*
         * Retorna el precio unitario de un articulo dado su id de articulo en si
         */
        public function getItemPVPById($itemId)
        {
            $resultProvider = new CActiveDataProvider('ARTICULOS', array(
                'criteria' => array(
                    'condition'=>'id='.$itemId,
                )
            ));
            return $resultProvider->getData()[0]['pvp'];
        }
        /*
         * Retorna el id del articulo en base a la linea de compra
         * 
         */
        public function getItemIDbyFactura($facid)
        {
             $resultProvider = new CActiveDataProvider('LINEASPRESUPUESTOS', array(
                'criteria' => array(
                    'condition'=>'id='.$facid,
                ),
                 'pagination'=>array(
                    'pageSize'=>2000,
                ),
            ));
            return $resultProvider->getData()[0]['idArticulo'];
        }
}
