<?php

class AudytorController extends Controller
{
        public $layout='//audytor/layouts/column1_audytor';
        
	public function actionAudyty()
	{
		$this->render('audyty');
	}
        
        
        public function actionDrukujCyfrowa($id)
	{
        $model = AnkietaCyfrowa::model()->findByPk($id);
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->SetAutoPageBreak(on, 40);
        $mPDF1->WriteHTML($this->renderpartial('_form_cyfrowa_drukuj_audytor', array('model'=>$model), true));
        $mPDF1->Output();
	}    
        public function actionDrukujAnalogowa($id)
	{
        $model = AnkietaAnalogowa::model()->findByPk($id);
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->SetAutoPageBreak(on, 40);
        $mPDF1->WriteHTML($this->renderpartial('_form_analogowa_drukuj_audytor', array('model'=>$model), true));
        $mPDF1->Output();
	}  
        
	public function actionOdwolania()
	{
		$this->render('odwolania');
	}        

        public function actionRok()
	{
		$this->render('rok');
	}  

        public function actionWypelnijAnkiete()
	{
            $this->render('wypelnij_ankiete');
	}          
        

        public function actionEdytujAnkieteOdwolanie()
	{
		$this->render('edytuj_ankiete_odwolanie');
	}  
        public function actionWypelnijAnkieteOdwolanie()
	{
            $this->render('wypelnij_ankiete_odwolanie');
	}          
        

        public function actionEdytujAnkiete()
	{
		$this->render('edytuj_ankiete');
	}  
        
	public function actionCreate_analogowa()
	{
		$model=new AnkietaAnalogowa;
                
		if(isset($_POST['AnkietaAnalogowa']))
		{
			$model->attributes=$_POST['AnkietaAnalogowa'];
			if($model->save()){
                            
                            $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $audyt->status_ankiety = 1;
                            //------do czyzaliczono

                            $sql = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$idAudytu;
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idPkEtykieta = $row['id'];
                            }
                               
                            if(isset($idPkEtykieta)){
                                $czyzaliczono = $audyt->audytCzyZaliczony($idAudytu, 2);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            //--------------------
 
                            $audyt->update();
                            $this->redirect(array('audytor/edit_analogowa'));  // tutaj co ma sie wydarzyc 
                        }
		}

		$this->render('_form_analogowa',array(
			'model'=>$model,
		));
	} 

	public function actionEdit_analogowa()
	{
                $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                
                $sql = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }

                $model = AnkietaAnalogowa::model()->findByPk($idPk);
                //do czyzaliczony
                $sql = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPkEtykieta = $row['id'];
                }
                               
                if(isset($idPkEtykieta)){
                     $modelAudyty = Audyty::model()->findByPk($idAudytu);
                     $czyzaliczono = $modelAudyty->audytCzyZaliczony($idAudytu, 2);
                     $modelAudyty->zaliczenie = $czyzaliczono;
                     $modelAudyty->save();
                                          
                }
                //--------------------

		if(isset($_POST['AnkietaAnalogowa']))
		{
			$model->attributes=$_POST['AnkietaAnalogowa'];
			if($model->update()){
                           $this->redirect(array('audytor/edit_analogowa'));
                        }
		}

		$this->render('_form_analogowa',array(
			'model'=>$model,
		));
	}
        public function actionCreate_analogowa_odwolanie()
	{
		$model=new AnkietaAnalogowa;
                
		if(isset($_POST['AnkietaAnalogowa']))
		{
			$model->attributes=$_POST['AnkietaAnalogowa'];
			if($model->save()){
                            
                            $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $audyt->status_ankiety = 1;
                             //------do czyzaliczono

                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 1 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuEtykieta = $row['id'];
                            }
                                                           
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytuEtykieta, $idAudytu, 2);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            
                            //--------------------
                            $audyt->update();
                            $this->redirect(array('audytor/odwolania'));  // tutaj co ma sie wydarzyc 
                        }
		}

		$this->render('_form_analogowa',array(
			'model'=>$model,
		));
	} 

	public function actionEdit_analogowa_odwolanie()
	{
                $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                
                $sql = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }

                $model = AnkietaAnalogowa::model()->findByPk($idPk);
                 //------do czyzaliczono
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 1 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuEtykieta = $row['id'];
                            }
                                                           
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytuEtykieta, $idAudytu, 2);
                                $audyt->zaliczenie = $czyzaliczono;    
                                $audyt->save();
                            
                //--------------------

		if(isset($_POST['AnkietaAnalogowa']))
		{
			$model->attributes=$_POST['AnkietaAnalogowa'];
			if($model->update()){
                           $this->redirect(array('audytor/edit_analogowa_odwolanie'));
                        }
		}

		$this->render('_form_analogowa',array(
			'model'=>$model,
		));
	}
        
        //  array (column name=>column value)
        	public function loadModel($id)
	{
		$model=AnkietaAnalogowa::model()->findByAttributes(array ('AudytyID' =>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
       public function actionCreate_cyfrowa()
	{
		$model=new AnkietaCyfrowa;
                
		if(isset($_POST['AnkietaCyfrowa']))
		{
			$model->attributes=$_POST['AnkietaCyfrowa'];
			if($model->save()){
                            
                            $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $audyt->status_ankiety = 1;
                            //------do czyzaliczono

                            $sql = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$idAudytu;
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idPkEtykieta = $row['id'];
                            }
                               
                            if(isset($idPkEtykieta)){
                                $czyzaliczono = $audyt->audytCzyZaliczony($idAudytu, 3);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            //--------------------
                            $audyt->update();
                            $this->redirect(array('audytor/edit_cyfrowa'));  // tutaj co ma sie wydarzyc 
                        }
		}

		$this->render('_form_cyfrowa',array(
			'model'=>$model,
		));
	} 
//ankieta cyfrowa
	public function actionEdit_cyfrowa()
	{
                $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                
                $sql = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }
                $model = AnkietaCyfrowa::model()->findByPk($idPk);
                //do czyzaliczony
                $sql = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPkEtykieta = $row['id'];
                }
                               
                if(isset($idPkEtykieta)){
//                     $modelAudyty = new Audyty();
                     
                     $modelAudyty = Audyty::model()->findByPk($idAudytu);
                     $czyzaliczono = $modelAudyty->audytCzyZaliczony($idAudytu, 3);
                     $modelAudyty->zaliczenie = $czyzaliczono;
                     $modelAudyty->save();
                                          
                }
                //--------------------
		if(isset($_POST['AnkietaCyfrowa']))
		{
			$model->attributes=$_POST['AnkietaCyfrowa'];
			if($model->update()){
                           $this->redirect(array('audytor/edit_cyfrowa'));
                        }
		}

		$this->render('_form_cyfrowa',array(
			'model'=>$model,
		));
	}
         public function actionCreate_cyfrowa_odwolanie()
	{
		$model=new AnkietaCyfrowa;
                
		if (isset($_POST['AnkietaCyfrowa']) == TRUE)
		{
			$model->attributes=$_POST['AnkietaCyfrowa'];
                        
			if ($model->save())
                        {                            
                          $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $audyt->status_ankiety = 1;
                             //------do czyzaliczono

                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 1 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuEtykieta = $row['id'];
                            }
                                                           
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytuEtykieta, $idAudytu, 3);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            
                            //--------------------
                            $audyt->update();
                            $this -> redirect(array('audytor/odwolania'));  // tutaj co ma sie wydarzyc 
                        }
		}

		$this->render('_form_cyfrowa',array(
			'model'=>$model,
		));
	} 
//ankieta cyfrowa
	public function actionEdit_cyfrowa_odwolanie()
	{
                $idAudytu = Yii::app()->session['ankieta-id-audytu'];
                
                $sql = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }

                $model = AnkietaCyfrowa::model()->findByPk($idPk);
                //------do czyzaliczono
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 1 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuEtykieta = $row['id'];
                            }
                                                           
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytuEtykieta, $idAudytu, 3);
                                $audyt->zaliczenie = $czyzaliczono;    
                                $audyt->save();
                            
                //--------------------

		if(isset($_POST['AnkietaCyfrowa']))
		{
			$model->attributes=$_POST['AnkietaCyfrowa'];
			if($model->update()){
                           $this->redirect(array('audytor/edit_cyfrowa_odwolanie'));
                        }
		}

		$this->render('_form_cyfrowa',array(
			'model'=>$model,
		));
	}
        
//	public function actionCreate_cyfrowa()
//	{
//		$model=new AnkietaCyfrowa;
//                $this->performAjaxValidationCyfrowa($model);
//		if(isset($_POST['AnkietaCyfrowa']))
//		{
//			$model->attributes=$_POST['AnkietaCyfrowa'];
//			if($model->save())
//				$this->redirect(array('audytor/create_cyfrowa','id'=>$model->id));  // tutaj co ma sie wydarzyc 
//		}
//
//		$this->render('_form_cyfrowa',array(
//			'model'=>$model,
//		));
//	}       
        
//        protected function performAjaxValidationCyfrowa($model)
//	{
//		if(isset($_POST['ajax']) && $_POST['ajax']==='ankieta-cyfrowa-form')
//                {
////		{
////		  if($model->x1_1a = 0 || $model->x1_1b = 0 || $model->x1_1c = 0 || $model->x1_1d){
////                      
////                  }
//                    echo CActiveForm::validateTabular($model, "x1_1a");
//			Yii::app()->end();
//                }
//		}
        
        
        public function actionPokazAudytorow()
        {
            Yii::app()->session['id_zespolu_audytorow'] = $_POST['id_zespolu_audytorow'];
            Yii::app()->session['nazwa_zespolu_audytorow'] = $_POST['nazwa_zespolu_audytorow'];
            Yii::app()->end();
        } 
        public function actionPokazAudytorowOdwolanie()
        {
            Yii::app()->session['id_zespolu_audytorow_odwolanie'] = $_POST['id_zespolu_audytorow_odwolanie'];
            Yii::app()->session['nazwa_zespolu_audytorow_odwolanie'] = $_POST['nazwa_zespolu_audytorow_odwolanie'];
            Yii::app()->end();
        } 
        
        
        }