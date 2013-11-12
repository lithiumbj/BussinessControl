<?php

class StocksController extends Controller
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
				'actions'=>array('stocks'),
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{   
            $this->render('../stocks/index');
	}
        /*
         * Funcion que retorna los articulos con un stock menor de 10 unidades
         */
        public function getLowStockArticles()
        {
            $dataProvider = new CActiveDataProvider('ARTICULOS', array(
               'criteria'=> array(
                   'condition' => 'Stock<10',
               ) ,
            ));
            
            return $dataProvider;
        }
}