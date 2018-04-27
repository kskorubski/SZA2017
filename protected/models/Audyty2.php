<?php

/**
 * This is the model class for table "audyty". 
 *
 * The followings are the available columns in table 'audyty':
 * @property integer $id
 * @property integer $rok_audytu
 * @property integer $osrodek_id
 * @property string $metodaID
 * @property string $identyfikator_zestawu
 * @property integer $status_ankiety
 * @property integer $status_etykiety
 * @property integer $status_odwolania
 * @property integer $zaliczenie
 * @property integer $Zespoly_audytorowID
 *
 * The followings are the available model relations:
 * @property AnkietaAnalogowa[] $ankietaAnalogowas
 * @property AnkietaCyfrowa[] $ankietaCyfrowas
 * @property ZespolyAudytorow $zespolyAudytorow
 * @property Osrodki $osrodek
 * @property EtykietaAnalogowa[] $etykietaAnalogowas
 * @property EtykietaCyfrowa[] $etykietaCyfrowas
 */
//TEST BRANCHA
class Audyty2 extends CActiveRecord
{
    
    public $nazwa; //osrodek.nazwa
    public $adres; //osrodek.adres
    public $miasto; //osrodek.miasto
    public $nazwa_wojewodztwa; //wojewodztwa.nazwa_wojewodztwa
    public $nazwa_metody; //metoda.nazwa_metody
    public $nazwa_zespolu; //zespolyAudytorow.nazwa_zespolu
    public $czyzaliczono; 
    public $test;
    public $priorytet;

    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'audyty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rok_audytu, osrodek_id, metodaID', 'required'),
			array('rok_audytu, osrodek_id, status_ankiety, status_etykiety, status_odwolania, zaliczenie, Zespoly_audytorowID, priorytet', 'numerical', 'integerOnly'=>true),
			array('metodaID', 'length', 'max'=>10),
			array('identyfikator_zestawu', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rok_audytu, osrodek_id, metodaID, status_ankiety, status_etykiety, status_odwolania, zaliczenie, Zespoly_audytorowID, priorytet, czyzaliczono', 'safe', 'on'=>'search'),
			array('id, rok_audytu, osrodek_id, metodaID, status_ankiety, nazwa_wojewodztwa,  status_etykiety, status_odwolania, zaliczenie, Zespoly_audytorowID, priorytet, czyzaliczono', 'safe', 'on'=>'raporty_wyniki_lista'),
			// te kolumny które są wyszukiwane w -> 'on'=>'searchAudytyAdmin'
                        array('id,
                            rok_audytu, 
                            osrodek_id, 

                            status_etykiety, 
                            status_odwolania, 
                            zaliczenie, 
                            Zespoly_audytorowID, 
                            nazwa,
                            nazwa_wojewodztwa,
                            czyzaliczono,
                            nazwa_zespolu, 
                            priorytet', 
                            'safe', 
                            'on'=>'searchaudytyadmin'),
                                   array('id,
                            rok_audytu, 
                            osrodek_id, 

                            status_etykiety, 
                            status_odwolania, 
                            zaliczenie, 
                            Zespoly_audytorowID, 
                            nazwa,
                            nazwa_wojewodztwa,
                            czyzaliczono,
                            nazwa_zespolu, 
                            priorytet', 
                            'safe', 
                            'on'=>'searchaudytyadmin2'),      
                    
                      	array('
                            nazwa,
                            adres,
                            miasto,
                            nazwa_wojewodztwa,
                            nazwa_metody,
                            status_etykiety, 
                            priorytet', 
                            'safe', 
                            'on'=>'pokazZestawyDoDodania'),                  
                    
                    	array('
                            nazwa,
                            adres,
                            miasto,
                            nazwa_wojewodztwa,
                            nazwa_metody,
                            status_etykiety, 
                            priorytet
                            ', 
                            'safe', 
                            'on'=>'pokazZapisaneZestawy'),
		);
	}
//                             nazwa_wojewodztwa,
//         osrodek_adres_search,
//                             osrodek_miasto_search,
//                             identyfikator_zestawu,
//                             nazwa_wojewodztwa
        
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ankietaAnalogowas' => array(self::HAS_MANY, 'AnkietaAnalogowa', 'AudytyID'),
			'ankietaCyfrowas' => array(self::HAS_MANY, 'AnkietaCyfrowa', 'AudytyID'),
			'zespolyAudytorow' => array(self::BELONGS_TO, 'ZespolyAudytorow', 'Zespoly_audytorowID'),
			'osrodek' => array(self::BELONGS_TO, 'Osrodki', 'osrodek_id'),
			'etykietaAnalogowas' => array(self::HAS_MANY, 'EtykietaAnalogowa', 'AudytyID'),
			'etykietaCyfrowas' => array(self::HAS_MANY, 'EtykietaCyfrowa', 'AudytyID'),
//                    	'wojewodztwa' => array(self::BELONGS_TO, 'Wojewodztwa', 'WojewodztwaID'),
                      'wojewodztwa' => array(self::BELONGS_TO, 'Wojewodztwa', array('WojewodztwaID' => 'id_wojewodztwa'), 'through' => 'osrodek'),
                        'metoda' => array(self::BELONGS_TO, 'Metoda', 'metodaID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rok_audytu' => 'Rok audytu:',
			'osrodek_id' => 'ID placówki',
			'metodaID' => 'Metoda:',
			'identyfikator_zestawu' => 'Zestaw:',
			'status_ankiety' => 'Ankieta:',
			'status_etykiety' => 'Etykieta:',
			'status_odwolania' => 'Odwołanie:',
			'zaliczenie' => 'Zaliczenie:',
			'Zespoly_audytorowID' => 'ID zespołu audytorow:',
                    
			'nazwa' => 'Ośrodek:',
			'adres' => 'Adres:',
			'miasto' => 'Miasto:',
			'nazwa_wojewodztwa' => 'Województwo:',
			'nazwa_metody' => 'Metoda:',
			'nazwa_zespolu' => 'Zespół:',
			'czyzaliczono' => 'Zaliczony?:',
                        'priorytet' => 'Priorytet',

                    
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('rok_audytu',$this->rok_audytu);
		$criteria->compare('osrodek_id',$this->osrodek_id);
		$criteria->compare('metodaID',$this->metodaID);
		$criteria->compare('identyfikator_zestawu',$this->identyfikator_zestawu,true);
		$criteria->compare('status_ankiety',$this->status_ankiety);
		$criteria->compare('status_etykiety',$this->status_etykiety);
		$criteria->compare('status_odwolania',$this->status_odwolania);
		$criteria->compare('zaliczenie',$this->zaliczenie);
		$criteria->compare('Zespoly_audytorowID',$this->Zespoly_audytorowID);
                $criteria->compare('priorytet',$this->priorytet);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function search_audyty_odwolania_admin()
	{
		$criteria=new CDbCriteria;
                $criteria->select = array('osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
                $criteria->with = array('osrodek', 'wojewodztwa', 'zespolyAudytorow');
                $criteria->addCondition('Zespoly_audytorowID is not null');
//                $criteria->addCondition('status_odwolania <> 0');
                $criteria->addCondition('status_odwolania <> 0');
                $criteria->addCondition('t.rok_audytu = '.Yii::app()->session['rok'].'');
                $criteria->compare('id',$this->id);
		$criteria->compare('rok_audytu',$this->rok_audytu);
		$criteria->compare('osrodek_id',$this->osrodek_id);
		$criteria->compare('metodaID',$this->metodaID);
		$criteria->compare('identyfikator_zestawu',$this->identyfikator_zestawu,true);
		$criteria->compare('status_ankiety',$this->status_ankiety);
		$criteria->compare('status_etykiety',$this->status_etykiety);
		$criteria->compare('status_odwolania',$this->status_odwolania);
		$criteria->compare('zaliczenie',$this->zaliczenie);
		$criteria->compare('Zespoly_audytorowID',$this->Zespoly_audytorowID);
                $criteria->compare('priorytet',$this->priorytet);
                
                //pola do wyszukiwania z RELACJI
                $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('zespolyAudytorow.nazwa_zespolu', $this->nazwa_zespolu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);// jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                
//                $criteria->order = "i_woj DESC, i_osr DESC";
                $criteria->order = "osrodek.nazwa ASC, status_odwolania ASC, t.id DESC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                
		));
	}
         public function search_audyty_w_trakcie_realizacji_admin()
	{
		$criteria=new CDbCriteria;
                $criteria->select = array('status_odwolania', 'osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
                $criteria->with = array('osrodek', 'wojewodztwa', 'zespolyAudytorow');
                $criteria->addCondition('Zespoly_audytorowID is not null');
                $criteria->addCondition('status_odwolania = 0');
                $criteria->addCondition('t.rok_audytu = '.Yii::app()->session['rok'].'');
                $criteria->compare('id',$this->id);
		$criteria->compare('rok_audytu',$this->rok_audytu);
		$criteria->compare('osrodek_id',$this->osrodek_id);
		$criteria->compare('metodaID',$this->metodaID);
		$criteria->compare('identyfikator_zestawu',$this->identyfikator_zestawu,true);
		$criteria->compare('status_ankiety',$this->status_ankiety);
		$criteria->compare('status_etykiety',$this->status_etykiety);
		$criteria->compare('status_odwolania',$this->status_odwolania);
		$criteria->compare('zaliczenie',$this->zaliczenie);
		$criteria->compare('Zespoly_audytorowID',$this->Zespoly_audytorowID);
                $criteria->compare('priorytet',$this->priorytet);
                
                //pola do wyszukiwania z RELACJI
                $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('zespolyAudytorow.nazwa_zespolu', $this->nazwa_zespolu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);// jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                
                $criteria->order = "t.status_odwolania DESC, i_woj DESC, i_osr DESC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                
		));
	}
        
        
        public function audytCzyZaliczony($id_audytu, $metoda)
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
                Yii::app()->kalkulatorWyniku->setData($model2, $model, 'cyfrowa');
                $wynik = Yii::app()->kalkulatorWyniku->czy_zaliczono();
//                 $this->czyzaliczono = ($wynik==true)?($id_audytu):(null);
                 $this->test = ($wynik==true)?(2):(1);
                return ($wynik==true)?(2):(1);
    
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
                
                Yii::app()->kalkulatorWyniku->setData($model2, $model, 'analogowa');
                $wynik = Yii::app()->kalkulatorWyniku->czy_zaliczono();
//                $this->czyzaliczono = ($wynik==true)?($id_audytu):(null);
                $this->test = ($wynik==true)?(2):(1);
                return ($wynik==true)?(2):(1);
            }
 
        }
        public function audytCzyZaliczonyOdwolanie($id_audytu_etykieta, $id_audytu_ankieta, $metoda)
	{
            if($metoda == 3){
//                Yii::app()->session['wyniki-cyfrowe-id-audytu'] = $id_audytu;
                $sql_cyfra_etykieta = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$id_audytu_etykieta;
                $sql_cyfra_ankieta = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$id_audytu_ankieta;
                
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
                Yii::app()->kalkulatorWyniku->setData($model2, $model, 'cyfrowa');
                $wynik = Yii::app()->kalkulatorWyniku->czy_zaliczono();
//                 $this->czyzaliczono = ($wynik==true)?($id_audytu):(null);
                 $this->test = ($wynik==true)?(2):(1);
                return ($wynik==true)?(2):(1);
    
                }else if($metoda == 2){
                
//                Yii::app()->session['wyniki-analogowe-id-audytu'] = $id_audytu;
                $sql_analog_etykieta = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$id_audytu_etykieta;
                $sql_analog_ankieta = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$id_audytu_ankieta;
                
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
                
                Yii::app()->kalkulatorWyniku->setData($model2, $model, 'analogowa');
                $wynik = Yii::app()->kalkulatorWyniku->czy_zaliczono();
//                $this->czyzaliczono = ($wynik==true)?($id_audytu):(null);
                $this->test = ($wynik==true)?(2):(1);
                return ($wynik==true)?(2):(1);
            }
 
        }
        
        public function raporty_wyniki_lista()
	{
            $test = 0;
//            $this->czyzaliczono = 0;
		$criteria=new CDbCriteria;
                $criteria->select = array('osrodek.*',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
//                $criteria->select = array('osrodek.*', '('.$this->test++.') as czyzaliczono',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
                $criteria->with = array('osrodek', 'wojewodztwa', 'zespolyAudytorow');
                $criteria->addCondition('Zespoly_audytorowID is not null');
//                $criteria->addCondition('status_odwolania = 0');
                $criteria->addCondition('priorytet = 0'); //wyedytowano zmiane dolozono nowa kolumne priorytet
                $criteria->addCondition('status_etykiety = 1');
                $criteria->addCondition('status_ankiety = 1');
                $criteria->addCondition('t.rok_audytu = '.Yii::app()->session['rok'].'');
                $criteria->compare('id',$this->id);
		$criteria->compare('rok_audytu',$this->rok_audytu); 
		$criteria->compare('osrodek_id',$this->osrodek_id); 
		$criteria->compare('metodaID',$this->metodaID);
		$criteria->compare('identyfikator_zestawu',$this->identyfikator_zestawu,true);
		$criteria->compare('status_ankiety',$this->status_ankiety);
		$criteria->compare('status_etykiety',$this->status_etykiety);
		$criteria->compare('status_odwolania',$this->status_odwolania);
		$criteria->compare('zaliczenie',$this->zaliczenie);
		$criteria->compare('Zespoly_audytorowID',$this->Zespoly_audytorowID);
                $criteria->compare('priorytet',$this->priorytet);

                //pola do wyszukiwania z RELACJI
                $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('zespolyAudytorow.nazwa_zespolu', $this->nazwa_zespolu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);// jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                
                $criteria->order = "i_woj DESC, i_osr DESC";
                
//                 $SQL = "SELECT id, metodaID FROM audyty where status_ankiety = 1 AND status_etykiety = 1";
//                 $dataReader = Yii::app()->db->createCommand($SQL)->query();
//                 while($row = $dataReader->read()){
//                    $id = $row['id'];
//                    $metoda = $row['metodaID'];
////                    echo "1: ".$id." - ".$metoda;
//                    $audyt = Audyty::model()->findByPk($id);
//                    $czyzaliczono = $audyt->audytCzyZaliczony($id, $metoda);
////                    echo "id: ".$id." z: ".$metoda."<br />";
//                    $audyt->zaliczenie = $czyzaliczono; 
//                    $audyt->save();                                                        
//                 } 

                
                
//        $mymodel = $this->model()->findAll($criteria);
//
//        foreach ($mymodel as $data) {
//            foreach ($data as $row) {
//                echo print_r($row, true) . ' ';
//            }
//            echo ' </br>';
//        }

                 $obj =  new CActiveDataProvider($this, array(			
                     'criteria'=>$criteria,                                                
                     ));                		
                 return $obj;
	}
        
        
        
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Audyty the static model class
	 */
       
        
        public function adminAudyty() {
            $criteria = new CDbCriteria; 
            $criteria->select = array('*');
             return new CActiveDataProvider($this, array(
                 'criteria'=> $criteria,
             ));
        }
        
        //------------------------------------------------------
         public function pokazZapisaneZestawy() {
            $criteria = new CDbCriteria; 
            
            $criteria->with = array('osrodek', 'wojewodztwa', 'metoda');
            $criteria->select = array('osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');     
            $criteria->condition ='rok_audytu='.Yii::app()->session['rok'].' AND t.status_odwolania <> 2';

            // lokalne
            $criteria->compare('metodaID',$this->metodaID);
            $criteria->compare('identyfikator_zestawu', $this->identyfikator_zestawu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('status_etykiety',$this->status_etykiety);
            
            // relacyjne
            $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('osrodek.adres', $this->adres, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('osrodek.miasto', $this->miasto, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);                
            
            $criteria->together = true;

            $criteria->order = "i_woj DESC, i_osr DESC";
            
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        
        public function pokazZestawyDoDodania() {
            $criteria = new CDbCriteria; 
            $criteria->with = array('osrodek', 'wojewodztwa', 'metoda');
            
            $criteria->condition ='rok_audytu='.Yii::app()->session['rok'].' AND t.zespoly_audytorowID IS NULL AND t.status_odwolania <> 2'; //2 oznacza ze jest duuplikat na potrzeby odwolania
            
            $criteria->select = array('osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
         
            // lokalne
            $criteria->compare('metodaID',$this->metodaID);
            $criteria->compare('identyfikator_zestawu', $this->identyfikator_zestawu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('status_etykiety',$this->status_etykiety);
            
            // relacyjne
            $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('osrodek.adres', $this->adres, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('osrodek.miasto', $this->miasto, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);    
            
            
            
            
            
            $criteria->together = true;
            $criteria->order = "i_woj DESC, i_osr DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        

         public function pokazZestawyDodaneDoGrupy() {
            $criteria = new CDbCriteria; 
            $criteria->with = array('osrodek', 'wojewodztwa');
            $criteria->condition ='rok_audytu='.Yii::app()->session['rok'].' AND t.zespoly_audytorowID = '.Yii::app()->session['id_zespolu_zestawy'].' AND t.status_odwolania <> 2';
            $criteria->select = array('osrodek.*', 'wojewodztwa.*','t.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');
            $criteria->together = true;
            $criteria->order = "i_woj DESC, i_osr DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        
        public function pokazZestawyDodaneDoGrupyDlaAudytora() {
            $criteria = new CDbCriteria; 
            $criteria->condition ='t.rok_audytu='.Yii::app()->session['rok'].' AND t.zespoly_audytorowID = '.Yii::app()->session['id_zespolu_audytorow'].' AND t.status_odwolania <> 2';
            $criteria->select = array('*');
            $criteria->together = true;
            $criteria->order = "t.id DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }

        public function pokazZestawyDodaneDoGrupyDlaAudytoraOdwolania() {
            $criteria = new CDbCriteria; 
            $criteria->condition ='t.rok_audytu='.Yii::app()->session['rok'].' AND t.zespoly_audytorowID = '.Yii::app()->session['id_zespolu_audytorow_odwolanie'].' AND t.status_odwolania = 2';
            $criteria->select = array('*');
            $criteria->order = "t.id DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        

        
        // danje w tabeli po prawej w przypisz zestaw (odwołania)
        public function pokazZestawyDodaneDoGrupyOdwolania() {
            $criteria = new CDbCriteria; 
            $criteria->with = array('osrodek', 'wojewodztwa');
            $criteria->condition ='rok_audytu='.Yii::app()->session['rok'].' AND t.zespoly_audytorowID = '.Yii::app()->session['id_zespolu_zestawy_odwolanie'].' AND t.status_odwolania = 2';
//            $criteria->select = array('*');
            $criteria->select = array('osrodek.*', 'wojewodztwa.*','t.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');
//            $criteria->order = "t.id DESC";
            $criteria->order = "i_woj DESC, i_osr DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        
        // dane w tabeli na dole w przypisz zestaw (odwołania)
        public function pokazZestawyDoDodaniaOdwolanie() {
            $criteria = new CDbCriteria; 
            $criteria->with = array('osrodek', 'wojewodztwa');
            $criteria->condition ='rok_audytu='.Yii::app()->session['rok'].' AND t.zespoly_audytorowID IS NOT NULL AND t.status_odwolania = 0 AND t.status_ankiety = 1 AND t.status_etykiety = 1 AND t.Zespoly_audytorowID <> '.Yii::app()->session['id_zespolu_zestawy_odwolanie']; //2 oznacza ze jest duuplikat na potrzeby odwolania
//            $criteria->select = array('count(t.*) AS cc, t.*, osrodek.*, wojewodztwa.*');
//            $criteria->select = array('*');
            $criteria->select = array('osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
//            $criteria->order = "t.id DESC";
            $criteria->order = "i_woj DESC, i_osr DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        
        
         
        

        
        
        
        
        
	public static function model($className=__CLASS__)
	{
		return parent::model($className); 
	}
}
