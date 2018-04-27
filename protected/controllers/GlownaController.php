<?php

class GlownaController extends Controller 
{
        public $layout='//glowna/layouts/column1_glowna';
        
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

        public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

        public function actionNieaktywne()
	{
	
            $this->render('nieaktywne');
    
	}       
        
        public function actionZablokowane()
	{
	
            $this->render('zablokowane');
    
	} 
        
        public function actionDebug()
	{
	
            $this->render('debug');
    
	}
        
        //wyświetlenie głównego okna strony startowej - logowania
        public function actionIndex()
	{
                // tworze oibiekt modelu który obsługuje view od logowania
		$model=new LogowanieModel;

		// tutaj sprawdzane są zasady z public function rules() z modelu LogowanieModel
		if(isset($_POST['ajax']) && $_POST['ajax']==='logowanie-view') //view musi miec nadane id
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// sprawdza czy zmienne zostały utworzone - czy ktoś wprowadził wymagane dane w logowanie-view
		if(isset($_POST['LogowanieModel']))
		{
                    //attributes to to samo co getAttributes odbiera array (klucz -> wartość) z logowanie-view 
                    $model->attributes=$_POST['LogowanieModel'];
                    
                    if($model->validate() && $model->login()){
                    
                    // pobiera wszystko (array) o uzytkowniku z danym ID   
                    $user = Uzytkownicy::model()->findbyPk(Yii::app()->user->id);
                    
                     
                    //sprawdza jakie uprawnienia     
                    switch ($user['RoleID']) {
                        //administrator
                        case 1: 
                            if ($user['status_kontaID']==1){
                            Yii::app()->session['rok']='2017';
                            Yii::app()->session['user_id']=$user->id;
                            
                            $this->redirect(array("administrator/index"));
                            } else {
                                 $this->redirect(array("glowna/zablokowane"));
                            }
                            break;
                        //audytor
                        case 2:
                            if ($user['status_kontaID']==1){
                            Yii::app()->session['rok']='2017';
                            Yii::app()->session['user_id']=$user->id;
                            
                            $this->redirect(array("audytor/audyty"));
                            } else {
                                $this->redirect(array("glowna/zablokowane"));
                            }
                            break;                        
                    } // end wyboru uprawnien
                    
                    
                  }// end poprawnie zalogowany
		}
                
		// display the login form
		$this->render('index',array('model'=>$model));
	}

        //wylogowanie - standardowo dla wszystrkich        
        public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}        
}