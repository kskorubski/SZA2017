<?php

class AdministratorController extends Controller 
{
    
        public $layout='//administrator/layouts/column1_admin';

// -----------------------------------------------------------------        
// ----------- POZOSTAŁE - ERROR 
// -----------------------------------------------------------------         
        
        public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('blad_admin', $error);
		}
	}        
        
        public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}               
        
// -----------------------------------------------------------------        
// ----------- ROK
// -----------------------------------------------------------------        
        
	public function actionRok()
	{
//		$this->render('rok');
            Yii::app()->user->logout();
            $this->redirect('../sza/');

        
	}
        
        
                
	public function actionIndex2()
	{
                	$this->render('index2');
	}
        
        
// -----------------------------------------------------------------        
// ----------- Strona startowa ->> Drukowanie 
// -----------------------------------------------------------------        
        
	public function actionDrukuj()
	{
        $model=new Uzytkownicy('search');
        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->WriteHTML($this->renderpartial('uzytkownicy_lista', array('model'=>$model), true));
        $mPDF1->Output();
	}
        
// -----------------------------------------------------------------        
// ----------- Drukowanie ankiet
// -----------------------------------------------------------------  
        public function actionDrukujAnkieteIndex($id_audytu, $metoda)
	{
            if($metoda == 3){
                Yii::app()->session['ankieta-id-audytu'] = $id_audytu;
                $sql_cyfra = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                $dataReader = Yii::app()->db->createCommand($sql_cyfra)->query();
                while($row = $dataReader->read()){
                    $id_ankiety = $row['id'];
                }   
                
                $model = AnkietaCyfrowa::model()->findByPk($id_ankiety);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->SetAutoPageBreak(on, 40);
                $mPDF1->WriteHTML($this->renderpartial('_form_cyfrowa_a_drukuj_admin', array('model'=>$model), true));
                $mPDF1->Output();
                
            
            }else if($metoda == 2){
                
                Yii::app()->session['ankieta-id-audytu'] = $id_audytu;
                $sql_analog = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$id_audytu;
                $dataReader = Yii::app()->db->createCommand($sql_analog)->query();
                while($row = $dataReader->read()){
                    $id_ankiety = $row['id'];
                }             
                $model = AnkietaAnalogowa::model()->findByPk($id_ankiety);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->SetAutoPageBreak(on, 40);
                $mPDF1->WriteHTML($this->renderpartial('_form_analogowa_a_drukuj_admin', array('model'=>$model), true));
                $mPDF1->Output();
                
            }
 
        }
        // -----------------------------------------------------------------        
// ----------- Drukowanie ankiet
// -----------------------------------------------------------------  
        public function actionDrukujZalacznikWyniki($id_audytu, $metoda)
	{
            if($metoda == 3){
                Yii::app()->session['ankieta-id-audytu'] = $id_audytu;
                $sql_cyfra = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                $dataReader = Yii::app()->db->createCommand($sql_cyfra)->query();
                while($row = $dataReader->read()){
                    $id_ankiety = $row['id'];
                }   
                
                $model = AnkietaCyfrowa::model()->findByPk($id_ankiety);                
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');           
                $idZestawu = Audyty::model()->findByPk($id_audytu)->identyfikator_zestawu;
                $mPDF1->SetHeader("Identyfikator zestawu: ".$idZestawu);          
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('_form_cyfrowa_zalacznik', array('model'=>$model), true));                      
                $mPDF1->Output();
                
            
            }else if($metoda == 2){
                
                Yii::app()->session['ankieta-id-audytu'] = $id_audytu;
                $sql_analog = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$id_audytu;
                $dataReader = Yii::app()->db->createCommand($sql_analog)->query();
                while($row = $dataReader->read()){
                    $id_ankiety = $row['id'];
                }             
                $model = AnkietaAnalogowa::model()->findByPk($id_ankiety);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $idZestawu = Audyty::model()->findByPk($id_audytu)->identyfikator_zestawu;
                $mPDF1->SetHeader("Identyfikator zestawu: ".$idZestawu);
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('_form_analogowa_zalacznik', array('model'=>$model), true));
                $mPDF1->Output();
                
            }
 
        }
        
// -----------------------------------------------------------------        
// ----------- raporty - drukuj /administrator/wydruki
// ----------------------------------------------------------------- 

        public function actionRaport_ocenione_wszystkie_drukuj($nazwa, $adres, $miasto, $nazwa_wojewodztwa, $zaliczenie)
	{
              $model=new Audyty('raport_ocenione_wszystkie');
//                
//            $model = $this->$model;
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $model->nazwa = $nazwa; //potrzebne zeby odfiltrowac i wyslac parametry filtru do nastepnej formy drukujacej
                $model->adres = $adres;
                $model->miasto = $miasto;
                $model->nazwa_wojewodztwa = $nazwa_wojewodztwa;
                $model->zaliczenie = $zaliczenie;
                
 
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->SetHeader("Tabela nr 1. Audyty ocenione");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_ocenione_wszystkie_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        }  
        public function actionRaport_wg_punktacji_drukuj($nazwa, $miasto, $identyfikator_zestawu, $nazwa_wojewodztwa, $metodaID, $zaliczenie)
	{
              $model=new Audyty('raport_wg_punktacji');
//                
//            $model = $this->$model;
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $model->nazwa = $nazwa; //potrzebne zeby odfiltrowac i wyslac parametry filtru do nastepnej formy drukujacej                
                $model->miasto = $miasto;
                $model->identyfikator_zestawu = $identyfikator_zestawu;
                $model->nazwa_wojewodztwa = $nazwa_wojewodztwa;
                $model->metodaID = $metodaID;
                $model->zaliczenie = $zaliczenie;

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->SetHeader("Tabela nr 1. Raport wg. punktacji");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_wg_punktacji_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        } 
        public function actionRaport_wg_parametrow_drukuj($nazwa, $miasto, $identyfikator_zestawu, $nazwa_wojewodztwa, $metodaID, $zaliczenie)
	{
              $model=new Audyty('raport_wg_punktacji');//uzyty model dla widoku _view_raport_wg_punktacji bo zbiezne dane
//                
//            $model = $this->$model;
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $model->nazwa = $nazwa; //potrzebne zeby odfiltrowac i wyslac parametry filtru do nastepnej formy drukujacej                
                $model->miasto = $miasto;
                $model->identyfikator_zestawu = $identyfikator_zestawu;
                $model->nazwa_wojewodztwa = $nazwa_wojewodztwa;
                $model->metodaID = $metodaID;
                $model->zaliczenie = $zaliczenie;

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
                $mPDF1->SetHeader("Tabela nr 1. Raport wg. parametrów");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_wg_parametrow_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        } 
        public function actionRaport_wojewodztwa_drukuj()
	{
              $model=new Audyty('raport_wyniki_w_wojewodztwach');//uzyty model dla widoku _view_raport_wg_punktacji bo zbiezne dane
//                
//            $model = $this->$model;
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
                $mPDF1->SetHeader("Tabela nr 1. Raport wg. województw");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_wojewodztwa_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        }
        public function actionRaport_wojewodztwa_wg_parametrow_drukuj()
	{
              $model=new Audyty('raport_wyniki_w_wojewodztwach');//uzyty model dla widoku _view_raport_wg_punktacji bo zbiezne dane
//                
//            $model = $this->$model;
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
                $mPDF1->SetHeader("Tabela nr 1. Raport wg. województw - zaliczone parametry");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_wojewodztwa_wg_parametrow_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        }
        public function actionRaport_wojewodztwa_wg_l_zal_parametrow_drukuj()
	{
              $model=new Audyty('raport_wyniki_w_wojewodztwach');//uzyty model dla widoku _view_raport_wg_punktacji bo zbiezne dane
//                
//            $model = $this->$model;
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
                $mPDF1->SetHeader("Tabela nr 1. Raport liczby zaliczonych parametrów wg. województw");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_wojewodztwa_wg_l_zal_parametrow_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        }
        public function actionRaport_dane_dot_audytorow_drukuj()
	{
              $metodaDoRaportu = Yii::app()->session['metodaDoRaporty'];
                switch($metodaDoRaportu){
                    case '%':
                        $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        break;
                    case '2':
                        $model=new VWynikiAudytorowAnalogowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowAnalogowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowAnalogowe2015'];
                        break;
                    case '3':
                        $model=new VWynikiAudytorowCyfrowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowCyfrowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowCyfrowe2015'];
                        break;
                }
                

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
                $mPDF1->SetHeader("Tabela nr 1. Raport dane dot. audytorow");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_dane_dot_audytorow_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        }
        public function actionRaport_audytorow_ostrosc_drukuj()
	{
              $metodaDoRaportu = Yii::app()->session['metodaDoRaporty'];
                switch($metodaDoRaportu){
                    case '%':
                        $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        break;
                    case '2':
                        $model=new VWynikiAudytorowAnalogowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowAnalogowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowAnalogowe2015'];
                        break;
                    case '3':
                        $model=new VWynikiAudytorowCyfrowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowCyfrowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowCyfrowe2015'];
                        break;
                }
                

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4-L');
                $mPDF1->SetHeader("Tabela nr 1. Raport ostrości oceny audytorow");
                $mPDF1->SetAutoPageBreak(on, 30);
                $mPDF1->WriteHTML($this->renderpartial('wydruki/raport_audytorow_ostrosc_drukuj', array('model'=>$model), true));
                $mPDF1->Output(); 
  
        }
//---------------end end end koniec widokow dla pdf drukowanie --------------------------------------------------------------        
//---------------CSV CSV CSV CSV--------------------------------------------------------------
        public function actionRaport_ocenione_wszystkie_csv($nazwa, $adres, $miasto, $nazwa_wojewodztwa, $zaliczenie)
	{
              $model=new Audyty('raport_ocenione_wszystkie');

                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $model->nazwa = $nazwa; //potrzebne zeby odfiltrowac i wyslac parametry filtru do nastepnej formy drukujacej
                $model->adres = $adres;
                $model->miasto = $miasto;
                $model->nazwa_wojewodztwa = $nazwa_wojewodztwa;
                $model->zaliczenie = $zaliczenie;

                $dataProvider = $model->raport_ocenione_wszystkie(); 

                Yii::app()->request->sendFile('Audyty_ocenione_wszystkie.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,
                            
                            'naglowek'=>array('osrodek'=>'Nazwa ośrodka', 'adres'=>'Adres', 'miasto'=>'Miasto', 'wojewodztwo'=>'Województwo', 'zaliczenie'=>'Zaliczono'),
                            'raport'=>'RaportOcenioneWszystkie',
                            
                            
                        ), true));
  
        }
//        public function actionRaport_wg_punktacji_csv($nazwa, $miasto, $identyfikator_zestawu, $nazwa_wojewodztwa, $metodaID, $zaliczenie)
        public function actionRaport_wg_punktacji_csv($nazwa, $miasto, $identyfikator_zestawu, $nazwa_wojewodztwa, $metodaID, $zaliczenie)
	{
              $model=new Audyty('raport_wg_punktacji');

                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $model->nazwa = $nazwa; //potrzebne zeby odfiltrowac i wyslac parametry filtru do nastepnej formy drukujacej                
                $model->miasto = $miasto;
                $model->identyfikator_zestawu = $identyfikator_zestawu;
                $model->nazwa_wojewodztwa = $nazwa_wojewodztwa;
                $model->metodaID = $metodaID;
                $model->zaliczenie = $zaliczenie;
                

                $dataProvider = $model->raport_wg_punktacji(); 

                Yii::app()->request->sendFile('Zestawienie_wg_punktacji.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,                            
                            'naglowek'=>array('osrodek'=>'Nazwa ośrodka', 'adres'=>'Miasto', 'miasto'=>'Zestaw', 'wojewodztwo'=>'Województwo', 'metoda'=>'Metoda', 'punktacja'=>'Liczba punktów', 'procent'=>'Punkty %', 'parametr'=>'Liczba zal. parametrów', 'utkanie'=>'Kryterium utkania', 'zaliczenie'=>'Zaliczono'),
                            'raport'=>'RaportWgPunktacji',

                        ), true));
        }
        public function actionRaport_wg_parametrow_csv($nazwa, $miasto, $identyfikator_zestawu, $nazwa_wojewodztwa, $metodaID, $zaliczenie)
	{
              $model=new Audyty('raport_wg_punktacji');

                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $model->nazwa = $nazwa; //potrzebne zeby odfiltrowac i wyslac parametry filtru do nastepnej formy drukujacej                
                $model->miasto = $miasto;
                $model->identyfikator_zestawu = $identyfikator_zestawu;
                $model->nazwa_wojewodztwa = $nazwa_wojewodztwa;
                $model->metodaID = $metodaID;
                $model->zaliczenie = $zaliczenie;
                

                $dataProvider = $model->raport_wg_punktacji(); 

                Yii::app()->request->sendFile('Zestawienie_wg_parametrow.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,
                            
                            'naglowek'=>array('osrodek'=>'Nazwa ośrodka', 'miasto'=>'Miasto', 'wojewodztwo'=>'Województwo', 'zestaw'=>'Zestaw', 'punkty_pozL'=>'pkt', 'procent_pozL'=>'%', 'zaliczony_pozL'=>'zal', 'punkty_pozP'=>'pkt', 'procent_pozP'=>'%', 'zaliczony_pozP'=>'zal', 'punkty_artL'=>'pkt', 'procent_artL'=>'%', 'zaliczony_artL'=>'zal', 'punkty_artP'=>'pkt', 'procent_artP'=>'%', 'zaliczony_artP'=>'zal', 'punkty_inneL'=>'pkt', 'procent_inneL'=>'%', 'zaliczony_inneL'=>'zal', 'punkty_inneP'=>'pkt', 'procent_inneP'=>'%', 'zaliczony_inneP'=>'zal', 'punkty_ety'=>'pkt', 'procent_ety'=>'%', 'zaliczony_ety'=>'zal', 'punktacja'=>'Liczba punktów', 'procent'=>'Punkty %', 'parametr'=>'Liczba zal. parametrów', 'utkanie'=>'Kryterium utkania', 'metoda'=>'Metoda', 'zaliczenie'=>'Zaliczono'),
                            'raport'=>'RaportWgParametrow',
                            
                            
                        ), true));
  
        }
        public function actionRaport_wojewodztwa_csv()
	{
              $model=new Audyty('raport_wyniki_w_wojewodztwach');

                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
//                $model->nazwa = $nazwa; //potrzebne zeby odfiltrowac i wyslac parametry filtru do nastepnej formy drukujacej                
//                $model->miasto = $miasto;
//                $model->identyfikator_zestawu = $identyfikator_zestawu;
//                $model->nazwa_wojewodztwa = $nazwa_wojewodztwa;
//                $model->metodaID = $metodaID;
//                $model->zaliczenie = $zaliczenie;
                

                $dataProvider = $model->raport_wyniki_w_wojewodztwach(); 

                Yii::app()->request->sendFile('Zestawienie_wg_parametrow.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,
                            
                            'naglowek'=>array('wojewodztwo'=>'Województwo', 'liczba_osrodkow'=>'Liczba ośrodków', 'sr_l_pkt'=>'Średnia liczba punktów', 'sr_l_pkt_procent'=>'Średnia liczba punktów w %', 'zaliczone'=>'Zaliczone', 'zal_sr_l_pkt'=>'Średnia liczba punktów', 'zal_sr_l_pkt_procent'=>'Średnia liczba punktów w %', 'niezaliczone'=>'Niezaliczone', 'niezal_sr_l_pkt'=>'Średnia liczba punktów', 'niezal_sr_l_pkt_procent'=>'Średnia liczba punktów w %', 'brak_utkania'=>'Brak utkania', 'brak_audytu'=>'Brak audytu'),
                            'raport'=>'RaportWgWojewodztw',
                            
                            
                        ), true));
  
        }
        public function actionRaport_wojewodztwa_wg_parametrow_csv()
	{
              $model=new Audyty('raport_wyniki_w_wojewodztwach');

                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $dataProvider = $model->raport_wyniki_w_wojewodztwach(); 

                Yii::app()->request->sendFile('Zestawienie_wg_wojewodztw_parametry.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,
                            
                            'naglowek'=>array('wojewodztwo'=>'Województwo', 'liczba_osrodkow'=>'Liczba ośrodków', 'zal_1'=>'Liczba zal.', 'pr_1'=>'%', 'zal_2'=>'Liczba zal.', 'pr_2'=>'%', 'zal_3'=>'Liczba zal.', 'pr_3'=>'%', 'zal_4'=>'Liczba zal.', 'pr_4'=>'%', 'zal_5'=>'Liczba zal.', 'pr_5'=>'%', 'zal_6'=>'Liczba zal.', 'pr_6'=>'%', 'zal_7'=>'Liczba zal.', 'pr_7'=>'%'),
                            'raport'=>'RaportWgWojewodztwParametry',
                            
                            
                        ), true));
  
        }
        public function actionRaport_wojewodztwa_wg_l_zal_parametrow_csv()
	{
              $model=new Audyty('raport_wyniki_w_wojewodztwach');

                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $dataProvider = $model->raport_wyniki_w_wojewodztwach(); 

                Yii::app()->request->sendFile('Zestawienie_wg_wojewodztw_zaliczone_parametry.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,
                            
                            'naglowek'=>array('wojewodztwo'=>'Województwo', 'liczba_osrodkow'=>'Liczba ośrodków', '7'=>'7 param.', 'pr7'=>'%', '6'=>'6 param.', 'pr6'=>'%', '5'=>'5 param.', 'pr5'=>'%', '4'=>'4 param.', 'pr4'=>'%', '3'=>'3 param.', 'pr3'=>'%', '2'=>'2 param.', 'pr2'=>'%', '1'=>'1 param.', 'pr1'=>'%', '0'=>'0 param.', 'pr0'=>'%'),
                            'raport'=>'RaportWgWojewodztwLZalParametry',
                            
                            
                        ), true));
  
        }
         public function actionRaport_dane_dot_audytorow_csv()
	{
              $metodaDoRaportu = Yii::app()->session['metodaDoRaporty'];
                switch($metodaDoRaportu){
                    case '%':
                        $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        break;
                    case '2':
                        $model=new VWynikiAudytorowAnalogowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowAnalogowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowAnalogowe2015'];
                        break;
                    case '3':
                        $model=new VWynikiAudytorowCyfrowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowCyfrowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowCyfrowe2015'];
                        break;
                }
                
                $dataProvider = $model->search(); 

                Yii::app()->request->sendFile('Zestawienie_dane_dot_audytorow.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,
                            
                            'naglowek'=>array('nazwisko'=>'Nazwisko', 'imie'=>'Imie', 'login'=>'Login', 'nazwa_zespolu'=>'Nazwa zespolu', 'audyty_ocenione'=>'Audyty ocenione', 'audyty_ocenione_I'=>'Audyty ocenione etap I', 'audyty_ocenione_II'=>'Audyty ocenione etap II', 'audyty_zaliczone'=>'Audyty zaliczone', 'audyty_niezaliczone'=>'Audyty niezaliczone'),
                            'raport'=>'RaportDaneDotAudytorow',
                            
                            
                        ), true));
  
        }
        public function actionRaport_audytorow_ostrosc_csv()
	{
              $metodaDoRaportu = Yii::app()->session['metodaDoRaporty'];
                switch($metodaDoRaportu){
                    case '%':
                        $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        break;
                    case '2':
                        $model=new VWynikiAudytorowAnalogowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowAnalogowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowAnalogowe2015'];
                        break;
                    case '3':
                        $model=new VWynikiAudytorowCyfrowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowCyfrowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowCyfrowe2015'];
                        break;
                }
                
                $dataProvider = $model->search(); 

                Yii::app()->request->sendFile('Zestawienie_audytorow_ostrosc.csv', 
                        $this->renderPartial('_view_makeCSV', array(
                            'model'=>$model,
                            'dataProvider'=>$dataProvider,
                            
                            'naglowek'=>array('nazwisko'=>'Nazwisko', 'imie'=>'Imie', 'login'=>'Login', 'nazwa_zespolu'=>'Nazwa zespolu', 'audyty_ocenione'=>'Audyty ocenione', 'poz_skosna_L'=>'Projekcja skośna max[9]', 'poz_kranio_L'=>'Projekcja kranio. max[9]', 'poz_skosna_P'=>'Projekcja skosna. max[9]', 'poz_kranio_P'=>'Projekcja kranio. max[9]', 'art_skosna_L'=>'Projekcja skosna. max[27]', 'art_kranio_P'=>'Projekcja kranio. max[27]', 'inne_skosna_L'=>'Projekcja skosna. max[15]', 'inne_kranio_P'=>'Projekcja kranio. max[15]'),
                            'raport'=>'RaportAudytorowOstrosc',
                            
                            
                        ), true));
  
        }
        //---------------CSV CSV CSV CSV----End End End----------------------------------------------
        //WIDOKI RAPORTOW DO EKSPORTUOWANIA----------------------------------------------------------
        public function action_view_Raport_ocenione_wszystkie()
	{
                $model=new Audyty('raport_ocenione_wszystkie');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $this->render('wydruki/_view_raport_ocenione_wszystkie',array(
			'model'=>$model,
           
		)); 
  
        }  
        public function action_view_Raport_wg_punktacji()
	{
                $model=new Audyty('raport_wg_punktacji');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];                                        
                
                $this->render('wydruki/_view_raport_wg_punktacji',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        public function action_view_Raport_wg_parametrow()
	{
                $model=new Audyty('raport_wg_punktacji'); //uzyta metoda modelu z wodoku _view_raport_wg_punktacji - poniewaz dane sa zbiezne
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                if(!(isset($model->nazwa_wojewodztwa))){
                    $model->nazwa_wojewodztwa = 'dolnośląskie';
                }
                        
                
                $this->render('wydruki/_view_raport_wg_parametrow',array( 
			'model'=>$model,
//                        'wojewodztwo'=>'dolnośląskie',
           
		)); 
                                 
        } 
        public function action_view_Raport_wojewodztwa()
	{
                $model=new Audyty('raport_wyniki_w_wojewodztwach');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];   
                
//                        if(!isset(Yii::app()->session['metodaDoRaporty'])){
                            Yii::app()->session['metodaDoRaporty'] = "%";
//                        }
//                        $model->metodaID = Yii::app()->session['metodaDoRaporty'];
                         
                
                $this->render('wydruki/_view_raport_wojewodztwa',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        public function action_view_Raport_wojewodztwa_metoda($metodaDoRaportu)
	{
                $model=new Audyty('raport_wyniki_w_wojewodztwach');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];   
                
//                        if(!isset(Yii::app()->session['metodaDoRaporty'])){
                            Yii::app()->session['metodaDoRaporty'] = $metodaDoRaportu;
//                        }
//                        $model->metodaID = Yii::app()->session['metodaDoRaporty'];
                         
                
                $this->render('wydruki/_view_raport_wojewodztwa',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
         
        public function action_view_Raport_wojewodztwa_wg_parametrow()
	{
                $model=new Audyty('raport_wyniki_w_wojewodztwach');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];   
                
                Yii::app()->session['metodaDoRaporty'] = "%";
                
                $this->render('wydruki/_view_raport_wojewodztwa_wg_parametrow',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        public function action_view_Raport_wojewodztwa_wg_parametrow_metoda($metodaDoRaportu)
	{
                $model=new Audyty('raport_wyniki_w_wojewodztwach');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];     
                
                Yii::app()->session['metodaDoRaporty'] = $metodaDoRaportu;
                
                $this->render('wydruki/_view_raport_wojewodztwa_wg_parametrow',array( 
			'model'=>$model,
           
		)); 
                                 
        }
        public function action_view_Raport_wojewodztwa_wg_l_zal_parametrow()
	{
                $model=new Audyty('raport_wyniki_w_wojewodztwach');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty']; 
                
                Yii::app()->session['metodaDoRaporty'] = "%";
                
                $this->render('wydruki/_view_raport_wojewodztwa_wg_l_zal_parametrow',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        public function action_view_Raport_wojewodztwa_wg_l_zal_parametrow_metoda($metodaDoRaportu)
	{
                $model=new Audyty('raport_wyniki_w_wojewodztwach');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];    
                
                Yii::app()->session['metodaDoRaporty'] = $metodaDoRaportu;
                
                $this->render('wydruki/_view_raport_wojewodztwa_wg_l_zal_parametrow',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        public function action_view_Raport_dane_dot_audytorow_metoda($metodaDoRaportu)
	{
            Yii::app()->session['metodaDoRaporty'] = $metodaDoRaportu;
                switch($metodaDoRaportu){
                    case '%':
                        $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        break;
                    case '2':
                        $model=new VWynikiAudytorowAnalogowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowAnalogowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowAnalogowe2015'];
                        break;
                    case '3':
                        $model=new VWynikiAudytorowCyfrowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowCyfrowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowCyfrowe2015'];
                        break;
                }

                $this->render('wydruki/_view_raport_dot_audytorow',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        
        public function action_view_Raport_dane_dot_audytorow()
	{
                $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        
                        Yii::app()->session['metodaDoRaporty'] = "%";
                                
                
                $this->render('wydruki/_view_raport_dot_audytorow',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        public function action_view_Raport_audytorow_ostrosc_metoda($metodaDoRaportu)
	{
            Yii::app()->session['metodaDoRaporty'] = $metodaDoRaportu;
                switch($metodaDoRaportu){
                    case '%':
                        $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        break;
                    case '2':
                        $model=new VWynikiAudytorowAnalogowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowAnalogowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowAnalogowe2015'];
                        break;
                    case '3':
                        $model=new VWynikiAudytorowCyfrowe2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorowCyfrowe2015']))
			$model->attributes=$_GET['VWynikiAudytorowCyfrowe2015'];
                        break;
                }

                $this->render('wydruki/_view_raport_audytorow_ostrosc',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
        
        public function action_view_Raport_audytorow_ostrosc()
	{
                $model=new VWynikiAudytorow2015('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VWynikiAudytorow2015']))
			$model->attributes=$_GET['VWynikiAudytorow2015']; 
                        
                        Yii::app()->session['metodaDoRaporty'] = "%";
                                
                
                $this->render('wydruki/_view_raport_audytorow_ostrosc',array( 
			'model'=>$model,
           
		)); 
                                 
        } 
           
  //-------------------------end WIDOKI DO EKSPORTOWANIA--------------------------------------------------------
  //--------------------------------------------------------------------------------      
        
        public function actionOneRowspan()
	{
                $dp = new CActiveDataProvider('nazwa_wojewodztwa', array(
                        'sort' => array(
                            'attributes' => array(
                                'nazwa_wojewodztwa',
                        ),
                    'defaultorder' => 'nazwa_wojewodztwa',
                    ),
                        
   
		)); 
                $this->render('_view_raport_xxx', array('dp' => $dp));
        } 
        
        
        
// -----------------------------------------------------------------        
// ----------- Drukowanie Wynikow
// ----------------------------------------------------------------- // do przeedytowanie !!!! 
        public function actionDrukujWynikiAudytAktywne($id_audytu, $metoda, $status_odwolania)
	{
            if($metoda == 3){
                
                Yii::app()->session['wyniki-cyfrowe-id-audytu'] = $id_audytu;
                                                
                if($status_odwolania <> 2){
                    $sql_cyfra_etykieta = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                    
                }else {                                    
                    $sql_cyfra_etykieta = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = "
                                            ."(SELECT id FROM audyty WHERE identyfikator_zestawu = "
                                               ."(SELECT identyfikator_zestawu FROM audyty WHERE id =".$id_audytu." AND status_odwolania = 2) AND status_odwolania = 1)";
                }
                $sql_cyfra_ankieta = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_etykieta)->query();
                while($row = $dataReader->read()){
                    $id_etykiety_c = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_c = $row['id'];
                }
                
                $model = EtykietaCyfrowa::model()->findByPk($id_etykiety_c);
                $model2 = AnkietaCyfrowa::model()->findByPk($id_ankiety_c);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_view_wyniki_cyfrowe_drukuj', array('model'=>$model, 'model2'=>$model2), true));
                $mPDF1->Output();
                
            
            }else if($metoda == 2){
                
                Yii::app()->session['wyniki-analogowe-id-audytu'] = $id_audytu;
                
                if($status_odwolania <> 2){
                     $sql_analog_etykieta = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$id_audytu;
                }else {
                    $sql_analog_etykieta = "SELECT id FROM etykieta_analogowa WHERE AudytyID = "
                                            ."(SELECT id FROM audyty WHERE identyfikator_zestawu = "
                                               ."(SELECT identyfikator_zestawu FROM audyty WHERE id =".$id_audytu." AND status_odwolania = 2) AND status_odwolania = 1)";
                }
                                    
                $sql_analog_ankieta = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$id_audytu;
                
                
                $dataReader = Yii::app()->db->createCommand($sql_analog_etykieta)->query(); 
                while($row = $dataReader->read()){
                    $id_etykiety_a = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_analog_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_a = $row['id'];
                } 
                $model = EtykietaAnalogowa::model()->findByPk($id_etykiety_a);
                $model2 = AnkietaAnalogowa::model()->findByPk($id_ankiety_a);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_view_wyniki_analogowe_drukuj', array('model'=>$model, 'model2'=>$model2), true));
                $mPDF1->Output();   
                
            }
 
        }  
        
        public function actionDrukujWynikiAudyt($id_audytu, $metoda)
	{
            if($metoda == 3){
                Yii::app()->session['wyniki-cyfrowe-id-audytu'] = $id_audytu;
                $sql_cyfra_etykieta = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                $sql_cyfra_ankieta = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_etykieta)->query();
                while($row = $dataReader->read()){
                    $id_etykiety_c = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_c = $row['id'];
                }
                
                $model = EtykietaCyfrowa::model()->findByPk($id_etykiety_c);
                $model2 = AnkietaCyfrowa::model()->findByPk($id_ankiety_c);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_view_wyniki_cyfrowe_drukuj', array('model'=>$model, 'model2'=>$model2), true));
                $mPDF1->Output();
                
            
            }else if($metoda == 2){
                
                Yii::app()->session['wyniki-analogowe-id-audytu'] = $id_audytu;
                $sql_analog_etykieta = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$id_audytu;
                $sql_analog_ankieta = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_analog_etykieta)->query(); 
                while($row = $dataReader->read()){
                    $id_etykiety_a = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_analog_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_a = $row['id'];
                } 
                $model = EtykietaAnalogowa::model()->findByPk($id_etykiety_a);
                $model2 = AnkietaAnalogowa::model()->findByPk($id_ankiety_a);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_view_wyniki_analogowe_drukuj', array('model'=>$model, 'model2'=>$model2), true));
                $mPDF1->Output();   
                
            }
 
        }        
         public function actionDrukujWynikiAudytOdwolanie($id_audytu, $metoda)
	{
            if($metoda == 3){
                Yii::app()->session['wyniki-cyfrowe-id-audytu'] = $id_audytu;
                $sql_cyfra_etykieta = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = "
                                        ."(SELECT id FROM audyty WHERE identyfikator_zestawu = "
                                           ."(SELECT identyfikator_zestawu FROM audyty WHERE id =".$id_audytu." AND status_odwolania = 2) AND status_odwolania = 1)";
                $sql_cyfra_ankieta = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_etykieta)->query();
                while($row = $dataReader->read()){
                    $id_etykiety_c = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_c = $row['id'];
                }
                
                $model = EtykietaCyfrowa::model()->findByPk($id_etykiety_c);
                $model2 = AnkietaCyfrowa::model()->findByPk($id_ankiety_c);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_view_wyniki_cyfrowe_drukuj', array('model'=>$model, 'model2'=>$model2), true));
                $mPDF1->Output();
                
            
            }else if($metoda == 2){
                
                Yii::app()->session['wyniki-analogowe-id-audytu'] = $id_audytu;
                $sql_analog_etykieta = "SELECT id FROM etykieta_analogowa WHERE AudytyID = "
                                        ."(SELECT id FROM audyty WHERE identyfikator_zestawu = "
                                           ."(SELECT identyfikator_zestawu FROM audyty WHERE id =".$id_audytu." AND status_odwolania = 2) AND status_odwolania = 1)";
                $sql_analog_ankieta = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_analog_etykieta)->query(); 
                while($row = $dataReader->read()){
                    $id_etykiety_a = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_analog_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_a = $row['id'];
                } 
                $model = EtykietaAnalogowa::model()->findByPk($id_etykiety_a);
                $model2 = AnkietaAnalogowa::model()->findByPk($id_ankiety_a);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_view_wyniki_analogowe_drukuj', array('model'=>$model, 'model2'=>$model2), true));
                $mPDF1->Output();   
                
            }
 
        }      
        
        
        
// -----------------------------------------------------------------        
// ----------- Drukowanie etykiet
// -----------------------------------------------------------------  
        
        public function actionDrukujEtykieteIndex($id_audytu, $metoda)
	{
            if($metoda == 3){
                Yii::app()->session['etykieta-cyfrowa-id-audytu'] = $id_audytu;
                $sql_cyfra = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                $dataReader = Yii::app()->db->createCommand($sql_cyfra)->query();
                while($row = $dataReader->read()){
                    $id_etykiety_c = $row['id'];
                }   
                
                $model = EtykietaCyfrowa::model()->findByPk($id_etykiety_c);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_form_cyfrowa_etykieta_drukuj', array('model'=>$model), true));
                $mPDF1->Output();
                
            
            }else if($metoda == 2){
                
                Yii::app()->session['etykieta-analogowa-id-audytu'] = $id_audytu;
                $sql_analog = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$id_audytu;
                $dataReader = Yii::app()->db->createCommand($sql_analog)->query();
                while($row = $dataReader->read()){
                    $id_etykiety_a = $row['id'];
                }             
                $model = EtykietaAnalogowa::model()->findByPk($id_etykiety_a);
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
                $mPDF1->WriteHTML($this->renderpartial('_form_analogowa_etykieta_drukuj', array('model'=>$model), true));
                $mPDF1->Output();
                
            }
 
        }
        
        public function actionDrukujCyfrowaEtykieta($id)
	{
        $model = EtykietaCyfrowa::model()->findByPk($id);
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->WriteHTML($this->renderpartial('_form_cyfrowa_etykieta_drukuj', array('model'=>$model), true));
        $mPDF1->Output();
	}    
        
        
        public function actionDrukujAnalogowaEtykieta($id)
	{
        $model = EtykietaAnalogowa::model()->findByPk($id);
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->WriteHTML($this->renderpartial('_form_analogowa_etykieta_drukuj', array('model'=>$model), true));
        $mPDF1->Output();
	}  
        
// -----------------------------------------------------------------        
// ----------- Strona startowa 
// -----------------------------------------------------------------        
        
	public function actionIndex()
	{
            	if ( isset( $_GET[ 'pageSizeIndex' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeIndex', (int) $_GET[ 'pageSizeIndex' ] );
			unset( $_GET[ 'pageSizeIndex' ] );
		}
 
            
		$model=new Audyty('searchaudytyadmin');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
                
                $model_odwolanie=new Audyty2('searchaudytyadmin2');
                $model_odwolanie->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty2']))
			$model_odwolanie->attributes=$_GET['Audyty2'];
                
		$this->render('index',array(
			'model'=>$model,
                        'model_odwolanie'=>$model_odwolanie,
		));
	}

        
// -----------------------------------------------------------------        
// ------ Użytkownicy -> Konta użytkowników -> Utwórz nowe konto
// -----------------------------------------------------------------         

        public function actionUzytkownicy_dodaj()
        {
            
           
		$model=new Uzytkownicy();
		if(isset($_POST['Uzytkownicy']))
		{
		$model->attributes=$_POST['Uzytkownicy'];
            if($model->validate())
                   { 
                       $model->password = md5($model->password);
                       $model->password2 = md5($model->password2);                        
		if($model->save())
		$this->redirect(array('uzytkownicy_lista'));
		}
                }
		$this->render('uzytkownicy_dodaj',array(
			'model'=>$model,
		));
	}        

// -----------------------------------------------------------------        
// -------- Użytkownicy -> Konta użytkowników -> Zarządzaj kontami
// -----------------------------------------------------------------        
        
        public function actionUzytkownicy_lista()
	{
            
                 if ( isset( $_GET[ 'pageSizeUzytkownicyLista' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeUzytkownicyLista', (int) $_GET[ 'pageSizeUzytkownicyLista' ] );
			unset( $_GET[ 'pageSizeUzytkownicyLista' ] );
		}
                
		$model=new Uzytkownicy('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Uzytkownicy']))
			$model->attributes=$_GET['Uzytkownicy'];
		$this->render('uzytkownicy_lista',array(
			'model'=>$model,
		));
	}        
        
        // funkcja 'Edytuj'
        public function actionUzytkownicy_edycja($id)
	{
            $model = $this->loadModelUzytkownicyEdytujForm($id);
            if(isset($_POST['UzytkownicyEdytujForm']))
		{
			$model->attributes=$_POST['UzytkownicyEdytujForm'];
			if($model->save()){
                            $this->redirect(array('uzytkownicy_podglad','id'=>$model->id));
                        }
		}
            
		$this->render('uzytkownicy_edycja',array(
			'model'=>$model,
		));
	}
        
        // funkcja 'Zmień hasło'
        public function actionZmienHasloAdmin($id)
	{
               $model = new ZmienHasloAdmin();
               if (isset($_POST['ZmienHasloAdmin'])) 
               {
                   $model->attributes = $_POST['ZmienHasloAdmin'];
                   if($model->validate()){ 
                   $AktualizujUzytkownika = Uzytkownicy::model()->findByPk($id);
                   $AktualizujUzytkownika->password = md5($model->uzytkownik_nowehaslo);
                   if($AktualizujUzytkownika->update()){ 
                                     Yii::app()->user->setFlash('haslo-zmienione', "Hasło zostało poprawnie zmienione!");
                                     $this->redirect(array("administrator/uzytkownicy_lista"));
                            } 
                   }
                } 
		$this->render('uzytkownicy_zmien_haslo_admin', 
                        array('model' => $model, 'id' => $id));
        }
        
        public function actionUzytkownicy_podglad($id)
	{
		$this->render('uzytkownicy_podglad',array(
			'model'=>$this->loadModelUzytkownicy($id),
		));
	}
        
        protected function performAjaxValidationUzytkownicyEdytujForm($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='uzytkownicy-edycja-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
       public function loadModelUzytkownicy($id)
	{
		$model=Uzytkownicy::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function loadModelUzytkownicyEdytujForm($id)
	{
		$model=  UzytkownicyEdytujForm::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
// --------------------------------------------------------------------        
// -------- Użytkownicy -> Zespoły audytorów  -> Utwórz/Edytuj zespół
// --------------------------------------------------------------------  
        
        public function actionUzytkownicy_zespolyaud_dodaj_edytuj() {
            $model = new ZespolyAudytorow;
            if (isset($_POST['ZespolyAudytorow'])) {
                $model->attributes = $_POST['ZespolyAudytorow'];
                if ($model->save())
                    $this->redirect(array('administrator/uzytkownicy_zespolyaud_dodaj_edytuj'));
            }
            $this->render('uzytkownicy_zespolyaud_dodaj_edytuj', array(
            'model' => $model,
            ));
        }
        
        // funkcja 'zmien nazwe' 
        public function actionUzytkownicy_zespolyaud_edycja($id)
	{
		$model=$this->loadModelZespolyAudytorow($id);
		if(isset($_POST['ZespolyAudytorow']))
		{
			$model->attributes=$_POST['ZespolyAudytorow'];
			if($model->save())
				 $this->redirect(array('administrator/uzytkownicy_zespolyaud_dodaj_edytuj'));
		}

		$this->render('uzytkownicy_zespolyaud_edycja',array(
			'model'=>$model,
		));
	} 
        
        // funkcja 'zmien nazwe c.d.' 
        public function loadModelZespolyAudytorow($id)
	{
		$model=ZespolyAudytorow::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        
        // funkcja 'usuń' 
        public function actionUsunZespolAudytorow(){
            $id = $_POST['id'];
            $model=ZespolyAudytorow::model()->findByPk($id)->delete();
            echo $id;
            Yii::app()->end();
        }         
        
// --------------------------------------------------------------------        
// -------- Użytkownicy -> Zespoły audytorów  -> Zarządzaj zespołami
// --------------------------------------------------------------------  
        
        public function actionUzytkownicy_Zespolyaud_przypisz()
	{
            $model=new ZespolyAudytorow('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ZespolyAudytorow']))
			$model->attributes=$_GET['ZespolyAudytorow'];
		$this->render('uzytkownicy_zespolyaud_przypisz',array(
			'model'=>$model,
		)); 
	}
        
        // funkcja realizowana przy klikaniu na grupe
        public function actionPokazSkladGrupyAudytorow()
        {
        Yii::app()->session['id_zespolu_audytorow'] = $_POST['id_zespolu_audytorow'];
        Yii::app()->session['nazwa_zespolu_audytorow'] = $_POST['nazwa_zespolu_audytorow'];
        Yii::app()->end();
        } 

        // przycisk 'dodaj'
        public function actionPrzypiszAudytoraDoGrupy()
        {
        $id_zespolu_audytorow = Yii::app()->session['id_zespolu_audytorow'];
        $id_audytora = $_POST['id_audytora'];      
        $sql = "INSERT INTO uzytkownicy_zespoly_audytorow (id, UzytkownicyID, Zespoly_audytorowID) VALUES ('', '$id_audytora','$id_zespolu_audytorow'); ";
        Yii::app()->db->createCommand($sql)->execute();
        echo "1";
        Yii::app()->end();
        } 
        
        // przycisk 'usuń'
        public function actionUsunAudytoraZGrupy()
        {
        $id_audytora_w_grupie = $_POST['id_audytora_w_grupie'];      
        $sql = "DELETE FROM uzytkownicy_zespoly_audytorow where id = '$id_audytora_w_grupie' ";
        Yii::app()->db->createCommand($sql)->execute();
        echo "1";
        Yii::app()->end();
        }
        
// --------------------------------------------------------------------        
// -------- Baza danych -> Ośrodki -> Utwórz nowy ośrodek
// --------------------------------------------------------------------       
        
        public function actionOsrodek_utworz()
	{
            	$model=new Osrodki;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Osrodki']))
		{
			$model->attributes=$_POST['Osrodki'];
			if($model->save())
				$this->redirect(array('osrodek_podglad','id'=>$model->id));
		}

		$this->render('osrodek_utworz',array(
			'model'=>$model,
		));
            
//		$this->render('osrodek_dodaj');
	}
        
// --------------------------------------------------------------------        
// -------- Baza danych -> Ośrodki -> Utwórz nowy ośrodek
// --------------------------------------------------------------------       
        
        public function actionOsrodek_usun($id)
	{
		$this->loadModelOsrodek($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('osrodek_lista'));
//		$this->render('osrodek_dodaj');
	}
      
        
// --------------------------------------------------------------------        
// -------- Baza danych -> Ośrodki -> Edytuj osrodek
// --------------------------------------------------------------------       
        
        public function actionOsrodek_edytuj($id)
	{
                $model=$this->loadModelOsrodek($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Osrodki']))
		{
			$model->attributes=$_POST['Osrodki'];
			if($model->save())
				$this->redirect(array('osrodek_podglad','id'=>$model->id));
		}

		$this->render('osrodek_edytuj',array(
			'model'=>$model,
		));
//		$this->render('osrodek_edytuj');
	}
        
        public function actionOsrodek_podglad($id)
	{
		$this->render('osrodek_podglad',array(
			'model'=>$this->loadModelOsrodek($id),
		));
	}    
      
        public function loadModelOsrodek($id)
	{
		$model=Osrodki::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidationOsrodek($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='osrodki-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
// --------------------------------------------------------------------        
// -------- Baza danych -> Ośrodki -> Zarządzaj ośrodkami
// --------------------------------------------------------------------           
        
        public function actionOsrodek_lista()
	{
            	$model=new Osrodki('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Osrodki']))
			$model->attributes=$_GET['Osrodki'];
		$this->render('osrodek_lista',array(
			'model'=>$model,
		));
	}          
// --------------------------------------------------------------------        
// -------- Baza danych -> Województwa -> Zarządzaj numerami
// --------------------------------------------------------------------     
        
        public function actionWoj_zarzadzaj_numerami()
	{
            	$model=new IdentyfikatoryWojewodztw('wojewodztwa_z_nadanym_identyfikatorem');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['IdentyfikatoryWojewodztw']))
			$model->attributes=$_GET['IdentyfikatoryWojewodztw'];

		$this->render('woj_zarzadzaj_numerami',array(
			'model'=>$model,
		));
            
	}  
        
        public function actionIdentyfikator_wojewodztwa_usun($id)
	{
		$this->loadModelIdentyfikatoryWojewodztw($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('woj_zarzadzaj_numerami'));
	}
        
        public function actionIdentyfikator_wojewodztwa_edytuj($id)
	{
                 $model=$this->loadModelIdentyfikatoryWojewodztw($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['IdentyfikatoryWojewodztw']))
		{
			$model->attributes=$_POST['IdentyfikatoryWojewodztw'];
			if($model->save())
				$this->redirect(array('woj_zarzadzaj_numerami'));
		}

		$this->render('woj_edytuj_numer',array(
			'model'=>$model,
		));
	}
        
   
        
        public function actionIdentyfikator_wojewodztwa_zapisz()
	{
            $model=new IdentyfikatoryWojewodztw;
            $model->WojewodztwaID = $_POST['id_wojewodztwa'];
            $model->rok_audytu = Yii::app()->session['rok'];
            $model->identyfikator_wojewodztwa = $_POST['identyfikator'];   
            if($model->save()){
                echo 1;
            } else {
                echo 0;
            }
        }        
       
       public function loadModelIdentyfikatoryWojewodztw($id)
	{
		$model=IdentyfikatoryWojewodztw::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
// --------------------------------------------------------------------        
// -------- Audyty -> Utwórz zestaw
// -------------------------------------------------------------------- 

        public function actionAud_utworz_zestaw()
	{
        if ( isset( $_GET[ 'pageSizeAudUtworzGora' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeAudUtworzGora', (int) $_GET[ 'pageSizeAudUtworzGora' ] );
			unset( $_GET[ 'pageSizeAudUtworzGora' ] );
		}
        if ( isset( $_GET[ 'pageSizeAudUtworzDol' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeAudUtworzDol', (int) $_GET[ 'pageSizeAudUtworzDol' ] );
			unset( $_GET[ 'pageSizeAudUtworzDol' ] );
		}                
            
		$model=new Osrodki('pokazzestawydoutworzenia');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Osrodki']))
			$model->attributes=$_GET['Osrodki'];
                
		$model2=new Audyty('pokazZapisaneZestawy');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Audyty']))
			$model2->attributes=$_GET['Audyty'];                
                
                
                
		$this->render('aud_utworz_zestaw',array(
			'model'=>$model,
			'model2'=>$model2,
                    ));
	}  
        
        // przycisk 'Zapisz'
        public function actionUtworzZestaw()
        {
            $rok = Yii::app()->session['rok'];
            $osrodek_id = $_POST['id'];      
            $numer = $_POST['numer'];      
            $wybrana_metoda = $_POST['metoda'];   
            $identyfikator_wojewodztwa = $_POST['idw'];   
            $numer_zestawu = $identyfikator_wojewodztwa.'/'.$numer;
            $sql_check = "SELECT identyfikator_zestawu FROM audyty WHERE rok_audytu = '".$rok."' AND identyfikator_zestawu = '".$numer_zestawu."'";
            $licznik = 0;
            $dataReader = Yii::app()->db->createCommand($sql_check)->query();
             while($row = $dataReader->read()){
                 $licznik++;
             }
            if ($licznik == 0) {
                $sql = "insert into audyty (id, rok_audytu, osrodek_id, identyfikator_zestawu, metodaID) 
                VALUES('', '$rok', '$osrodek_id', '$numer_zestawu','$wybrana_metoda')";
                Yii::app()->db->createCommand($sql)->execute();
                echo "1";
                Yii::app()->end();
            }
            else {
                echo "2";
                Yii::app()->end();
            }
        }   
        
        // przycisk 'Usun'
        public function actionUsunZestaw()
        {
//        $id_audytu = $_POST['idz']; 
        $id_audytu = $_POST['id_audytu'];  
        $licznik = 0;
        $sql_analogowa = "SELECT * from ankieta_analogowa WHERE AudytyID = '".$id_audytu."'";
        $sql_cyfrowa = "SELECT * from ankieta_cyfrowa WHERE AudytyID = '".$id_audytu."'";
        $sql_analogowa_etykieta = "SELECT * from etykieta_analogowa WHERE AudytyID = '".$id_audytu."'";
        $sql_cyfrowa_etykieta = "SELECT * from etykieta_cyfrowa WHERE AudytyID = '".$id_audytu."'";
        
        $dataReader = Yii::app()->db->createCommand($sql_analogowa)->query();
             while($row = $dataReader->read()){
                 $licznik++;
             }
        $dataReader = Yii::app()->db->createCommand($sql_cyfrowa)->query();
             while($row = $dataReader->read()){
                 $licznik++;
             }
        $dataReader = Yii::app()->db->createCommand($sql_analogowa_etykieta)->query();
             while($row = $dataReader->read()){
                 $licznik++;
             }
        $dataReader = Yii::app()->db->createCommand($sql_cyfrowa_etykieta)->query();
             while($row = $dataReader->read()){
                 $licznik++;
             }
             
       if($licznik == 0) { 
        $sql = "delete from audyty where id = '$id_audytu'";
//        $err = Yii::app()->db->createCommand($sql)->execute();
        Yii::app()->db->createCommand($sql)->execute();
//        echo $sql;
        echo "1";
        Yii::app()->end();
       }else {
           echo "100";
       }
        } 
        
// --------------------------------------------------------------------        
// -------- Audyty -> Wypełnij etykiete
// -------------------------------------------------------------------- 
       
        public function actionAud_etykiety()
	{
                    if ( isset( $_GET[ 'pageSizeWypelnijEtykiete' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeWypelnijEtykiete', (int) $_GET[ 'pageSizeWypelnijEtykiete' ] );
			unset( $_GET[ 'pageSizeWypelnijEtykiete' ] );
		}

                $model=new Audyty('pokazZapisaneZestawy');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];                
                
		$this->render('aud_wypelnij_etykiete',array(
			'model'=>$model,
                    ));
	}

        public function actionAud_wypelnij_etykiete_cyfrowa()
	{
            $model=new EtykietaCyfrowa;
		if(isset($_POST['EtykietaCyfrowa']))
		{
			$model->attributes=$_POST['EtykietaCyfrowa'];
			if($model->save()){
                            $idAudytu = Yii::app()->session['etykieta-cyfrowa-id-audytu'];
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $audyt->status_etykiety = 1;
                            //------do czyzaliczono

                            $sql = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$idAudytu;
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idPkAnkieta = $row['id'];
                            }
                               
                            if(isset($idPkAnkieta)){
                                $czyzaliczono = $audyt->audytCzyZaliczony($idAudytu, 3);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
//                            //--------------------odwolanie--------------------
                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 2 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuOdwolanie = $row['id'];
                            }
                            if(isset($idAudytuOdwolanie)){
                                $sql = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$idAudytuOdwolanie;
                                $dataReader = Yii::app()->db->createCommand($sql)->query();
                                while($row = $dataReader->read()){
                                    $idPkAnkietaOdwolanie = $row['id'];
                            }
                               
                            if(isset($idPkAnkietaOdwolanie)){
                                $audyt = Audyty::model()->findByPk($idAudytuOdwolanie);
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytu, $idAudytuOdwolanie, 3);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
                                
                            }                                                                                                                
                            //--------------------------
                            $this->redirect(array('administrator/aud_etykiety'));  // tutaj co ma sie wydarzyc 
                        }
		}

		$this->render('_form_cyfrowa_etykieta',array(
			'model'=>$model,
		));
	}
        
        public function actionAud_wypelnij_etykiete_analogowa()
	{ 
            $model=new EtykietaAnalogowa;
                
		if(isset($_POST['EtykietaAnalogowa']))
		{
			$model->attributes=$_POST['EtykietaAnalogowa'];
			if($model->save()){
                            
                            $idAudytu = Yii::app()->session['etykieta-analogowa-id-audytu'];
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $audyt->status_etykiety = 1;
                            //------do czyzaliczono

                            $sql = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$idAudytu;
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idPkAnkieta = $row['id'];
                            }
                               
                            if(isset($idPkAnkieta)){
                                $czyzaliczono = $audyt->audytCzyZaliczony($idAudytu, 2);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
//                            //--------------------odwolanie--------------------
                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 2 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuOdwolanie = $row['id'];
                            }
                            if(isset($idAudytuOdwolanie)){
                                $sql = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$idAudytuOdwolanie;
                                $dataReader = Yii::app()->db->createCommand($sql)->query();
                                while($row = $dataReader->read()){
                                    $idPkAnkietaOdwolanie = $row['id'];
                            }
                               
                            if(isset($idPkAnkietaOdwolanie)){
                                $audyt = Audyty::model()->findByPk($idAudytuOdwolanie);
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytu, $idAudytuOdwolanie, 2);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
                                
                            }                                                                                                                
                            //--------------------------                         
                            $this->redirect(array('administrator/aud_etykiety'));  // tutaj co ma sie wydarzyc 
                        }
		}

		$this->render('_form_analogowa_etykieta',array(
			'model'=>$model,
		));
	}

        public function actionAud_edytuj_etykiete_cyfrowa()
	{
                $idAudytu = Yii::app()->session['etykieta-cyfrowa-id-audytu'];
                
                $sql = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }

                $model = EtykietaCyfrowa::model()->findByPk($idPk);
                //------do czyzaliczono
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $sql = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$idAudytu;
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idPkAnkieta = $row['id'];
                            }
                               
                            if(isset($idPkAnkieta)){
                                $czyzaliczono = $audyt->audytCzyZaliczony($idAudytu, 3);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
//                            //--------------------odwolanie--------------------
                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 2 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuOdwolanie = $row['id'];
                            }
                            if(isset($idAudytuOdwolanie)){
                                $sql = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$idAudytuOdwolanie;
                                $dataReader = Yii::app()->db->createCommand($sql)->query();
                                while($row = $dataReader->read()){
                                    $idPkAnkietaOdwolanie = $row['id'];
                            }
                               
                            if(isset($idPkAnkietaOdwolanie)){
                                $audyt = Audyty::model()->findByPk($idAudytuOdwolanie);
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytu, $idAudytuOdwolanie, 3);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
                                
                            }                                                                                                                
                            //--------------------------
                
		if(isset($_POST['EtykietaCyfrowa']))
		{
			$model->attributes=$_POST['EtykietaCyfrowa'];
			if($model->update()){
                           $this->redirect(array('administrator/aud_edytuj_etykiete_cyfrowa'));
                        }
		}

		$this->render('_form_cyfrowa_etykieta',array(
			'model'=>$model,
		));
	}
        
        public function actionAud_edytuj_etykiete_analogowa()
	{ 
                $idAudytu = Yii::app()->session['etykieta-analogowa-id-audytu'];
                $sql = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$idAudytu;
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }

                $model = EtykietaAnalogowa::model()->findByPk($idPk); 
                //------do czyzaliczono
                            $audyt = Audyty::model()->findByPk($idAudytu);
                            $sql = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$idAudytu;
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idPkAnkieta = $row['id'];
                            }
                               
                            if(isset($idPkAnkieta)){
                                $czyzaliczono = $audyt->audytCzyZaliczony($idAudytu, 2);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
//                            //--------------------odwolanie--------------------
                            $sql = "SELECT id FROM audyty WHERE status_odwolania = 2 
                                     AND rok_audytu = ".Yii::app()->session['rok']."
                                     AND identyfikator_zestawu = 
                                        (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";
                            $dataReader = Yii::app()->db->createCommand($sql)->query();
                            while($row = $dataReader->read()){
                                $idAudytuOdwolanie = $row['id'];
                            }
                            if(isset($idAudytuOdwolanie)){
                                $sql = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$idAudytuOdwolanie;
                                $dataReader = Yii::app()->db->createCommand($sql)->query();
                                while($row = $dataReader->read()){
                                    $idPkAnkietaOdwolanie = $row['id'];
                            }
                               
                            if(isset($idPkAnkietaOdwolanie)){
                                $audyt = Audyty::model()->findByPk($idAudytuOdwolanie);
                                $czyzaliczono = $audyt->audytCzyZaliczonyOdwolanie($idAudytu, $idAudytuOdwolanie, 2);
                                $audyt->zaliczenie = $czyzaliczono;                                          
                            }
                            $audyt->update();
                                
                            }                                                                                                                
                            //--------------------------
                                                                                
		if(isset($_POST['EtykietaAnalogowa']))
		{                        
			$model->attributes=$_POST['EtykietaAnalogowa'];
                                                                       
			if($model->update()){
                           $this->redirect(array('administrator/aud_edytuj_etykiete_analogowa'));
                        }
		}
		$this->render('_form_analogowa_etykieta',array(
			'model'=>$model,
		));
	
	}
                
        public function actionAud_wypelnij_etykiete_wybrana()
	{
        $metoda = $_POST['metoda'];
        $id_zestawu = $_POST['id_zestawu'];
        $status_etykiety = $_POST['status_etykiety'];
        
        if ($metoda == 3 && $status_etykiety == 0){
          Yii::app()->session['etykieta-cyfrowa-id-audytu'] = $id_zestawu;  
          echo Yii::app()->createAbsoluteUrl('administrator/aud_wypelnij_etykiete_cyfrowa');
        }

        if ($metoda == 3 && $status_etykiety == 1){
          Yii::app()->session['etykieta-cyfrowa-id-audytu'] = $id_zestawu;   
          echo Yii::app()->createAbsoluteUrl('administrator/aud_edytuj_etykiete_cyfrowa');
        }
        
        if ($metoda == 2 && $status_etykiety == 0 ){
          Yii::app()->session['etykieta-analogowa-id-audytu'] = $id_zestawu;   
          echo Yii::app()->createAbsoluteUrl('administrator/aud_wypelnij_etykiete_analogowa');
        }
        
        if ($metoda == 2 && $status_etykiety == 1 ){
          Yii::app()->session['etykieta-analogowa-id-audytu'] = $id_zestawu;   
          echo Yii::app()->createAbsoluteUrl('administrator/aud_edytuj_etykiete_analogowa');
        }
        
        Yii::app()->end();
	}

        
        public function actionAud_usun_etykiete_wybrana()
	{
        $metoda = $_POST['metoda'];
        $idAudytu = $_POST['id_zestawu'];
//        $status_etykiety = $_POST['status_etykiety'];
        
        $audyt = Audyty::model()->findByPk($idAudytu);
        $audyt->status_etykiety = 0;        
        $audyt->zaliczenie = 0;
        
        $audyt->save();
               
        $audytOdwolanieSQL = "SELECT id FROM audyty WHERE status_odwolania = 2 
                                AND rok_audytu = ".Yii::app()->session['rok']."
                                AND identyfikator_zestawu =  
                                  (SELECT identyfikator_zestawu FROM audyty WHERE id = ".$idAudytu.")";

       $dataReader = Yii::app()->db->createCommand($audytOdwolanieSQL)->query();
       
                     while($row = $dataReader->read()){
                        $idAudytuOdwolanie = $row['id'];
                     }
            
                     if(isset($idAudytuOdwolanie)){
               
                         $audyt = Audyty::model()->findByPk($idAudytuOdwolanie);               
                         $audyt->zaliczenie = 0;                                                   
                     }
        $audyt->save();
        
        
        if ($metoda == 2){
        $sql = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$idAudytu;
           $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }
               $etykieta = EtykietaAnalogowa::model()->findByPk($idPk);
               $etykieta->delete();                               
                                                
        }

        if ($metoda == 3){
        $sql = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$idAudytu;
           $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $idPk = $row['id'];
                }
               $etykieta = EtykietaCyfrowa::model()->findByPk($idPk);
               $etykieta->delete();
        }
        
        Yii::app()->end();
	}        
        
// --------------------------------------------------------------------        
// -------- Audyty -> Przypisz zespół
// -------------------------------------------------------------------- 
             
        public function actionAud_przypisz_zestaw()
	{
            $model=new ZespolyAudytorow('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ZespolyAudytorow']))
			$model->attributes=$_GET['ZespolyAudytorow'];
        
                
         if ( isset( $_GET[ 'pageSizePrzypiszZestaw' ] ) )
		{
			Yii::app()->user->setState( 'pageSizePrzypiszZestaw', (int) $_GET[ 'pageSizePrzypiszZestaw' ] );
			unset( $_GET[ 'pageSizePrzypiszZestaw' ] );
		}

                $model2=new Audyty('pokazZestawyDoDodania');
		$model2->unsetAttributes();  // clear any default values
		if(isset($_GET['Audyty']))
			$model2->attributes=$_GET['Audyty'];                

                $this->render('aud_przypisz_zestaw',array(
			'model'=>$model,
			'model2'=>$model2,
		)); 
	}
        
        // funkcja realizowana przy klikaniu na grupe 
        public function actionPokazZestawy()
        {
        Yii::app()->session['id_zespolu_zestawy'] = $_POST['id_zespolu_zestawy'];
        Yii::app()->session['nazwa_zespolu_zestawy'] = $_POST['nazwa_zespolu_zestawy'];
        Yii::app()->end();
        } 
        
        // przycisk 'Dodaj;
        public function actionPrzypiszZestaw()
        {
        $id_zespolu_zestawy = Yii::app()->session['id_zespolu_zestawy'];
        $id_audytu = $_POST['id_audytu'];      
        $sql = "update audyty set zespoly_audytorowID = '".$id_zespolu_zestawy."' where id = '".$id_audytu."'";
        Yii::app()->db->createCommand($sql)->execute();
        echo "1";
        Yii::app()->end();
        } 
        
        // przycisk 'Usun;
        public function actionUsunPrzypisanyZestaw()
        {
//        $id_zespolu_zestawy = Yii::app()->session['id_zespolu_zestawy'];
        $id_audytu = $_POST['id_audytu'];    
        $licznik = 0;
        $sql_analogowa = "SELECT * from ankieta_analogowa WHERE AudytyID = '".$id_audytu."'";
        $sql_cyfrowa = "SELECT * from ankieta_cyfrowa WHERE AudytyID = '".$id_audytu."'";
//        $sql_analogowa_etykieta = "SELECT * from etykieta_analogowa WHERE AudytyID = '".$id_audytu."'";
//        $sql_cyfrowa_etykieta = "SELECT * from etykieta_cyfrowa WHERE AudytyID = '".$id_audytu."'";
        
        $dataReader = Yii::app()->db->createCommand($sql_analogowa)->query();
             while($row = $dataReader->read()){
                 $licznik++;
             }
        $dataReader = Yii::app()->db->createCommand($sql_cyfrowa)->query();
             while($row = $dataReader->read()){
                 $licznik++;
             }
//        $dataReader = Yii::app()->db->createCommand($sql_analogowa_etykieta)->query();
//             while($row = $dataReader->read()){
//                 $licznik++;
//             }
//        $dataReader = Yii::app()->db->createCommand($sql_cyfrowa_etykieta)->query();
//             while($row = $dataReader->read()){
//                 $licznik++;
//             }
             
       if($licznik == 0) { 
        
        $sql = "update audyty set Zespoly_audytorowID = null where id = '".$id_audytu."'";
        Yii::app()->db->createCommand($sql)->execute();
        echo "1";
        Yii::app()->end();
       }else {
           echo "100";
        Yii::app()->end();
       }
       } 
        
// --------------------------------------------------------------------        
// -------- Odwołania -> Przypisz zestaw
// -------------------------------------------------------------------- 
        
       
        public function actionOdwolania_utworz_odwolanie()
	{
		$this->render('odwolania_utworz_odwolanie'); 
	} 
       
        public function actionOdwolania_przypisz_zestaw()
	{
                $model=new ZespolyAudytorow('search');
                $model_audyty=new Audyty('pokazZestawyDoDodaniaOdwolanie');
                
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ZespolyAudytorow']))
			$model->attributes=$_GET['ZespolyAudytorow'];
                
                $model_audyty->unsetAttributes();  // clear any default values
		if(isset($_GET['Audyty']))
			$model_audyty->attributes=$_GET['Audyty'];
                
		$this->render('odwolania_przypisz_zestaw',array(
			'model'=>$model,
                        'model_audyty'=>$model_audyty,
		)); 
	} 
        
        public function actionPokazZestawyOdwolanie()
        {
        Yii::app()->session['id_zespolu_zestawy_odwolanie'] = $_POST['id_zespolu_zestawy_odwolanie'];
        Yii::app()->session['nazwa_zespolu_zestawy_odwolanie'] = $_POST['nazwa_zespolu_zestawy_odwolanie'];
        Yii::app()->end();
        } 
        
        // przycisk 'Dodaj;
        public function actionPrzypiszZestawOdwolanie()
        {
        $id_zespolu_zestawy = Yii::app()->session['id_zespolu_zestawy_odwolanie'];
        $id_audytu = $_POST['id_audytu'];      
//        $sql = "update audyty set zespoly_audytorowID = '".$id_zespolu_zestawy."' where id = '".$id_audytu."'";
        $sql = "INSERT INTO audyty (rok_audytu, osrodek_id, identyfikator_zestawu, metodaID, status_odwolania, Zespoly_audytorowID)
                (SELECT rok_audytu, osrodek_id, identyfikator_zestawu, metodaID, (CAST('2' AS UNSIGNED)) status_odwolania, '".$id_zespolu_zestawy."' Zespoly_audytorowID FROM audyty WHERE id = ".$id_audytu.") ";
        Yii::app()->db->createCommand($sql)->execute();
        $sql2 = "UPDATE audyty SET status_odwolania = 1, priorytet = 1 WHERE id = ".$id_audytu;
        Yii::app()->db->createCommand($sql2)->execute();
        echo "1";
        Yii::app()->end();
        } 
        
        // przycisk 'Usun;
        public function actionUsunPrzypisanyZestawOdwolanie()
        {            
        $id_zespolu_zestawy = Yii::app()->session['id_zespolu_zestawy'];
        $id_audytu = $_POST['id_audytu'];   
        $identyfikator_zestawu = $_POST['identyfikator_zestawu'];
        $sql = "DELETE FROM audyty WHERE id = '".$id_audytu."' AND status_odwolania = 2";        
        Yii::app()->db->createCommand($sql)->execute();
        $sql2 = "UPDATE audyty SET status_odwolania = 0, priorytet = 0 WHERE identyfikator_zestawu = '".$identyfikator_zestawu ."' AND status_odwolania = 1";
        Yii::app()->db->createCommand($sql2)->execute(); 
        echo "1";
        Yii::app()->end();            
        } 
        

        public function actionUstawPriorytet()
        {            
            $id_audytu = $_POST['id_audytu'];
            $identyfikator_zestawu = $_POST['identyfikator_zestawu'];
            $sql = "UPDATE audyty SET priorytet = 0 WHERE id = ".$id_audytu." AND rok_audytu = ".Yii::app()->session['rok'];;
            Yii::app()->db->createCommand($sql)->execute();
            $sql2 = "UPDATE audyty SET priorytet = 1 WHERE id <> ".$id_audytu." AND identyfikator_zestawu = '".$identyfikator_zestawu."' AND rok_audytu = ".Yii::app()->session['rok'];
            Yii::app()->db->createCommand($sql2)->execute();
            
//            $this->actionIndex();
            echo "1";
            Yii::app()->end();
        } 
//        public function actionUstawPriorytet($id_audytu, $identyfikator_zestawu)
//        {            
//            $sql = "UPDATE audyty SET priorytet = 0 WHERE id = ".$id_audytu." AND rok_audytu = ".Yii::app()->session['rok'];;
//            Yii::app()->db->createCommand($sql)->execute();
//            $sql2 = "UPDATE audyty SET priorytet = 1 WHERE id <> ".$id_audytu." AND identyfikator_zestawu = '".$identyfikator_zestawu."' AND rok_audytu = ".Yii::app()->session['rok'];
//            Yii::app()->db->createCommand($sql2)->execute();
//            
//            $this->actionIndex();
//        } 
        
// --------------------------------------------------------------------        
// -------- Odwołania -> Wypełnij etykiete
// -------------------------------------------------------------------- 

        public function actionOdwolania_wypelnij_etykiete()
	{
		$this->render('odwolania_wypelnij_etykiete');
	}
// --------------------------------------------------------------------        
// -------- Raporty -> 
// --------------------------------------------------------------------    
        public function actionRaport_wyniki_audyt_aktywne()
        {

        if ( isset( $_GET[ 'pageSizeIndex' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeIndex', (int) $_GET[ 'pageSizeIndex' ] );
			unset( $_GET[ 'pageSizeIndex' ] );
		}
 
            
		$model=new Audyty('raporty_wyniki_lista_aktywne');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
   
		$this->render('raport_wyniki_audyt_aktywne',array(
			'model'=>$model,
		));  
        } 
        
        public function actionRaport_wyniki_audyt()
        {

        if ( isset( $_GET[ 'pageSizeIndex' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeIndex', (int) $_GET[ 'pageSizeIndex' ] );
			unset( $_GET[ 'pageSizeIndex' ] );
		}
 
            
		$model=new Audyty('raporty_wyniki_lista');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
   
		$this->render('raport_wyniki_audyt',array(
			'model'=>$model,
		));  
        } 
        public function actionRaport_wyniki_audyt_odwolanie()
        {
        if ( isset( $_GET[ 'pageSizeIndex' ] ) )
		{
			Yii::app()->user->setState( 'pageSizeIndex', (int) $_GET[ 'pageSizeIndex' ] );
			unset( $_GET[ 'pageSizeIndex' ] );
		}
 
            
		$model=new Audyty('raporty_wyniki_lista_odwolanie');
//		$model=new Audyty('raporty_wyniki_lista');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Audyty']))
			$model->attributes=$_GET['Audyty'];
   
		$this->render('raport_wyniki_audyt_odwolanie',array(
			'model'=>$model,
		));  
        } 
        
} 
            
		