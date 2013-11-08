<?php

class DefaultController extends Controller
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
				'actions'=>array('index','impagos'),
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{   
            $this->render('index');
	}
}