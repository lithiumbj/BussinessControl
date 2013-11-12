<?php

class LINEASCOMPRAController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','21702321g'),
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
		$model=new LINEASCOMPRA;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LINEASCOMPRA']))
		{
			$model->attributes=$_POST['LINEASCOMPRA'];
                        //Guardar datos extra para la linea de compra en caso de que se borren los articulos de origen
                        //Que no se pieda ni el concepto ni el importe sin iva
                        Yii::import('application.controllers.ARTICULOSController');
                        $articulo = ARTICULOSController::getItemById($model->idArticulo);
                        //Incluir los datos en el modelo
                        $model->CosteOrigenProducto=$articulo['pvp'];
                        $model->NombreDelProducto=$articulo['Nombre'];
                        //END
			if($model->save()){
                                //Disminuir en STOCK la cantidad de elementos que se han pedido a la linea
                                if(ARTICULOSController::downStock($model->idArticulo, $model->Cantidad)){
                                    $this->redirect(array('//FACTURAS/view','id'=>$model->idFactura));
                                }else{
                                    $this->redirect(array('//FACTURAS/view','id'=>$model->idFactura, 'err'=>1));
                                }
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

		if(isset($_POST['LINEASCOMPRA']))
		{
			$model->attributes=$_POST['LINEASCOMPRA'];
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
	public function actionDelete($id,$idfac)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		/*if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
                
                //Redirección a la factura de origen
                $this->redirect(array('//FACTURAS/view','id'=>$idfac));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('LINEASCOMPRA');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LINEASCOMPRA('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LINEASCOMPRA']))
			$model->attributes=$_GET['LINEASCOMPRA'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LINEASCOMPRA the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LINEASCOMPRA::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LINEASCOMPRA $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lineascompra-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function getArticulos()
        {
            //Obtener con un provider TODOS los articulos
            $data = new CActiveDataProvider('ARTICULOS');
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
            $dataProvider = new CActiveDataProvider('LINEASCOMPRA', array(
                'criteria' => array(
                        'condition'=>'idFactura='.$facturaId,
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
            $dataProvider = new CActiveDataProvider('LINEASCOMPRA', array(
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
             $resultProvider = new CActiveDataProvider('LINEASCOMPRA', array(
                'criteria' => array(
                    'condition'=>'id='.$facid,
                )
            ));
            return $resultProvider->getData()[0]['idArticulo'];
        }
}
