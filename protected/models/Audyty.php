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
class Audyty extends CActiveRecord
{
    
    public $nazwa; //osrodek.nazwa
    public $adres; //osrodek.adres
    public $miasto; //osrodek.miasto
    public $nazwa_wojewodztwa; //wojewodztwa.nazwa_wojewodztwa
    public $nazwa_metody; //metoda.nazwa_metody
    public $nazwa_zespolu; //zespolyAudytorow.nazwa_zespolu
    public $identyfikator_zestawu; 
    public $czyzaliczono; 
    public $test;
    public $punktacja;
    public $procent;
    public $parametr;
    public $utkanie;
    public $zaliczone;
    public $niezaliczone;
    public $brak_audytu;
    public $liczba_osrodkow;
    public $id_woj;
    public $liczba_pkt_srednia;
    public $zal_liczba_pkt_srednia;
    public $niezal_liczba_pkt_srednia;
    public $srednia_procent;
    public $zal_srednia_procent;
    public $niezal_srednia_procent;
    public $brak_utkania;
    public $priorytet;
    
    //dla dot audytorow
//    public $imie;
//    public $nazwisko;
    public $audyty_oceniane;
    public $audyty_etapI;
    public $audyty_etapII;
    public $zaliczone_audyty;
    public $niezaliczone_audyty;


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
			array('id, rok_audytu, osrodek_id, metodaID, status_ankiety, nazwa_wojewodztwa,  status_etykiety, status_odwolania, zaliczenie, Zespoly_audytorowID, priorytet, czyzaliczono, miasto, adres, nazwa, nazwa_zespolu', 'safe', 'on'=>'raporty_wyniki_lista'),
                        array('id, rok_audytu, osrodek_id, metodaID, status_ankiety, nazwa_wojewodztwa,  status_etykiety, status_odwolania, zaliczenie, Zespoly_audytorowID, priorytet, czyzaliczono, miasto, adres, nazwa, nazwa_zespolu', 'safe', 'on'=>'raporty_wyniki_lista_odwolanie'),
                        array('id, rok_audytu, osrodek_id, metodaID, status_ankiety, nazwa_wojewodztwa,  status_etykiety, status_odwolania, zaliczenie, Zespoly_audytorowID, priorytet, czyzaliczono, miasto, adres, nazwa, nazwa_zespolu', 'safe', 'on'=>'raporty_wyniki_lista_aktywne'),
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
                            priorytet', 
                            'safe', 
                            'on'=>'pokazZapisaneZestawy'),
                    array('
                            nazwa,
                            nazwa_wojewodztwa,
                            nazwa_metody,
                            identyfikator_zestawu, 
                            priorytet', 
                            'safe', 
                            'on'=>'pokazZestawyDoDodaniaOdwolanie'), 
                    array('
                            nazwa,
                            adres,
                            miasto,
                            nazwa_wojewodztwa, 
                            priorytet', 
                            'safe', 
                            'on'=>'raport_ocenione_wszystkie'), 
                    array('
                            nazwa,
                            adres,
                            miasto,
                            nazwa_wojewodztwa,
                            identyfikator_zestawu,
                            utkanie, 
                            priorytet', 
                            'safe', 
                            'on'=>'raport_wg_punktacji'), 
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
//                        'uzytkownicy' => array(self::BELONGS_TO, 'Uzytkownicy', array('UzytkownicyID' => 'id'), 'through' => 'uzytkownicyZespoly'),
//                        'uzytkownicys' => array(self::MANY_MANY, 'Uzytkownicy', 'uzytkownicy_zespoly_audytorow(Zespoly_audytorowID, UzytkownicyID)', 'through' => 'zespolyAudytorow'),
//                        'uzytkownicyZespoly' => array(self::HAS_MANY, 'UzytkownicyZespolyAudytorow', 'Zespoly_audytorowID'),
//                        'uzytkownicyZespoly' => array(self::HAS_MANY, 'UzytkownicyZespolyAudytorow', array('id' => 'Zespoly_audytorowID'), 'through' => 'zespolyAudytorow'),
//                        'uzytkownicyZespoly' => array(self::HAS_MANY, 'UzytkownicyZespolyAudytorow', array('id' => 'Zespoly_audytorowID'), 'through' => 'zespolyAudytorow'),
//                        'uzytkownicyZespolyAudytorows' => array(self::HAS_MANY, 'UzytkownicyZespolyAudytorow', array('id' => 'Zespoly_audytorowID'), 'through' => 'zespolyAudytorow'),
//                        'uzytkownicy' => array(self::BELONGS_TO, 'Uzytkownicy', array('UzytkownicyID' => 'id'), 'through' => 'uzytkownicyZespolyAudytorows'),
                      
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
                        'priorytet' => 'Priorytet',
			'nazwa' => 'Ośrodek:',
			'adres' => 'Adres:',
			'miasto' => 'Miasto:',
			'nazwa_wojewodztwa' => 'Województwo:',
			'nazwa_metody' => 'Metoda:',
			'nazwa_zespolu' => 'Zespół:',
			'czyzaliczono' => 'Zaliczony?:',
                        'punktacja'=>'Liczba punktów',
                        'procent'=>'Punkty %',
                        'parametr'=>'Liczba zal. parametrów',
                        'utkanie'=>'Kryterium utkania',
                        'liczba_pkt_srednia'=>'Średnia liczba pkt.',
                        'zal_liczba_pkt_srednia' => 'Średnia zal. liczba pkt.',
                        'niezal_liczba_pkt_srednia' =>'Średnia niezal. liczba pkt.',
                        'srednia_procent'=>'Średnia liczba pkt. w %',
                        'zal_srednia_procent' => 'Średnia zal. pkt. w %',
                        'niezal_srednia_procent' =>'Średnia niezaliczona w %',
                        'brak_utkania' => 'Brak utkania',
                        //dla dot audytorzy
//                        'imie' => 'Imie',
//                        'nazwisko' => 'Nazwisko',
                        'audyty_oceniane' => 'Audyty ocenione',
                        'audyty_etapI' => 'Audyty ocenione etap I',
                        'audyty_etapII' => 'Audyty ocenione etap II',
                        'zaliczone_audyty' => 'Audyty zaliczone',
                        'niezaliczone_audyty' => 'Audyty niezaliczone',
    

                    
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
                $criteria->select = array('status_odwolania, osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
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
                
                $criteria->order = "status_odwolania DESC, i_woj DESC, i_osr DESC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                
		));
	}
         public function search_audyty_w_trakcie_realizacji_admin()
	{
		$criteria=new CDbCriteria;
                $criteria->select = array('osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
                $criteria->with = array('osrodek', 'wojewodztwa', 'zespolyAudytorow');
                $criteria->addCondition('Zespoly_audytorowID is not null');
//                $criteria->addCondition('Zespoly_audytorowID <> 94 AND status_etykiety = 1');
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
                
                $criteria->order = "i_woj DESC, i_osr DESC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                
		));
	}
        public function etykietaCzyZaliczona($id_audytu, $metoda){
            if($metoda == 3){
                Yii::app()->session['wyniki-cyfrowe-id-audytu'] = $id_audytu;
                $sql_cyfra_etykieta = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_etykieta)->query();
                while($row = $dataReader->read()){
                    $id_etykiety_c = $row['id'];
                } 
                
                $model = EtykietaCyfrowa::model()->findByPk($id_etykiety_c);

                Yii::app()->kalkulatorEtykiety->setData($model, 'cyfrowa');
                $wynik = Yii::app()->kalkulatorEtykiety->getEty_zaliczono_status();
                
                return $wynik;
    
                }else if($metoda == 2){
                
                Yii::app()->session['wyniki-analogowe-id-audytu'] = $id_audytu;
                $sql_analog_etykieta = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_analog_etykieta)->query(); 
                while($row = $dataReader->read()){
                    $id_etykiety_a = $row['id'];
                } 
 
                $model = EtykietaAnalogowa::model()->findByPk($id_etykiety_a);
                
                Yii::app()->kalkulatorEtykiety->setData($model, 'analogowa');
                $wynik = Yii::app()->kalkulatorEtykiety->getEty_zaliczono_status();
                
                return $wynik;
            }
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
            
        //DOOOOO RAPORTOW KONCOWYCHHH------------------metoda ktorej jak podamy id_audytu i metode zwraca OBIIEKT klasy liczacej WynikiAudytow itd.
            
        public function WynikiRaportyKoncowe($id_audytu, $metoda)
	{
                        
            $statusOdwolania = $this->model()->findByPk($id_audytu);   //findByPk($id_audytu)
            
            if($statusOdwolania['status_odwolania'] == 2){ //sprawdzamy czy audyt jest odwolany jezeli tak to musimy pobrac id starego audytu przed odwolaniem i uzyc go dla etykiety, poniewaz etykieta tylko wystepuje dla NIEodwaloanych audytow - Ankieta jest dla odwolanych...
                $sql = "SELECT id FROM audyty WHERE identyfikator_zestawu = '".$statusOdwolania['identyfikator_zestawu']."' AND status_odwolania <> 2 AND rok_audytu = ".Yii::app()->session['rok'];
                $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $id_audytu_przed_odwolaniem = $row['id'];
                }
                $id_audytu_etykieta = $id_audytu_przed_odwolaniem;
            }else {
                $id_audytu_etykieta = $id_audytu;
            }
            
            if($metoda == 3){
                Yii::app()->session['wyniki-cyfrowe-id-audytu'] = $id_audytu;
                

                $sql_cyfra_etykieta = "SELECT id FROM etykieta_cyfrowa WHERE AudytyID = ".$id_audytu_etykieta;
                $sql_cyfra_ankieta = "SELECT id FROM ankieta_cyfrowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_etykieta)->query();
                while($row = $dataReader->read()){
                    $id_etykiety_c = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_cyfra_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_c = $row['id'];
                }
                if(isset($id_etykiety_c) & isset($id_ankiety_c)){
                    $model = EtykietaCyfrowa::model()->findByPk($id_etykiety_c);
                    $model2 = AnkietaCyfrowa::model()->findByPk($id_ankiety_c);
                    Yii::app()->kalkulatorWyniku->setData($model2, $model, 'cyfrowa');
                    $klasa = Yii::app()->kalkulatorWyniku;


                    return $klasa;
                }else {
                    return null;
                }
                 
               }else if($metoda == 2){
                
                Yii::app()->session['wyniki-analogowe-id-audytu'] = $id_audytu;
                $sql_analog_etykieta = "SELECT id FROM etykieta_analogowa WHERE AudytyID = ".$id_audytu_etykieta;
                $sql_analog_ankieta = "SELECT id FROM ankieta_analogowa WHERE AudytyID = ".$id_audytu;
                
                $dataReader = Yii::app()->db->createCommand($sql_analog_etykieta)->query(); 
                while($row = $dataReader->read()){
                    $id_etykiety_a = $row['id'];
                } 
                $dataReader = Yii::app()->db->createCommand($sql_analog_ankieta)->query();
                while($row = $dataReader->read()){
                    $id_ankiety_a = $row['id'];
                }
                if(isset($id_etykiety_a) & isset($id_ankiety_a)){
                    $model = EtykietaAnalogowa::model()->findByPk($id_etykiety_a);
                    $model2 = AnkietaAnalogowa::model()->findByPk($id_ankiety_a);

                    Yii::app()->kalkulatorWyniku->setData($model2, $model, 'analogowa');
    //                $wynik = Yii::app()->kalkulatorWyniku->getUzyskana_razem_wagi();
                    $klasa = Yii::app()->kalkulatorWyniku;                
                    return $klasa;
                    
                }else {
                    return null;
                }

            }
        }
  //DOOOOO RAPORTOW KONCOWYCHHH--------------KONIEC-------------------------------
        
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
        
        public function raporty_wyniki_lista_aktywne()
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
//                $criteria->addCondition('status_etykiety = 1');
//                $criteria->addCondition('status_ankiety = 1');
//                v2017 wyswietlamy niezaliczono etykiete
                $criteria->addCondition('(status_ankiety = 1) OR (status_ankiety = 0 AND status_etykiety = 2)');
                $criteria->addCondition('t.rok_audytu = '.Yii::app()->session['rok'].'');
                $criteria->compare('id',$this->id);
		$criteria->compare('rok_audytu',$this->rok_audytu); 
		$criteria->compare('osrodek_id',$this->osrodek_id); 
		$criteria->compare('metodaID',$this->metodaID);
		$criteria->compare('identyfikator_zestawu',$this->identyfikator_zestawu,true);
		$criteria->compare('status_ankiety',$this->status_ankiety);
		$criteria->compare('status_etykiety',$this->status_etykiety);
		$criteria->compare('status_odwolania',$this->status_odwolania);
                $criteria->compare('priorytet',$this->priorytet);
		$criteria->compare('zaliczenie',$this->zaliczenie);
		$criteria->compare('Zespoly_audytorowID',$this->Zespoly_audytorowID);
                $criteria->compare('miasto',$this->miasto, true);
                $criteria->compare('adres',$this->adres, true);
                

                //pola do wyszukiwania z RELACJI
                $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('zespolyAudytorow.nazwa_zespolu', $this->nazwa_zespolu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);// jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                
                $criteria->order = "i_woj DESC, i_osr DESC";               
                 $obj =  new CActiveDataProvider($this, array(			
                     'criteria'=>$criteria,                                                
                     ));                		
                 return $obj;
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
                $criteria->addCondition('status_odwolania <> 2');
//                $criteria->addCondition('priorytet = 0'); //wyedytowano zmiane dolozono nowa kolumne priorytet
//                $criteria->addCondition('status_ankiety = 1');
//                $criteria->addCondition('status_etykiety = 1');
                //v2017 wyswietlamy niezaliczono etykiete
                $criteria->addCondition('(status_ankiety = 1) OR (status_ankiety = 0 AND status_etykiety = 2)');
                $criteria->addCondition('t.rok_audytu = '.Yii::app()->session['rok'].'');
                $criteria->compare('id',$this->id);
		$criteria->compare('rok_audytu',$this->rok_audytu); 
		$criteria->compare('osrodek_id',$this->osrodek_id); 
		$criteria->compare('metodaID',$this->metodaID);
		$criteria->compare('identyfikator_zestawu',$this->identyfikator_zestawu,true);
		$criteria->compare('status_ankiety',$this->status_ankiety);
		$criteria->compare('status_etykiety',$this->status_etykiety);
		$criteria->compare('status_odwolania',$this->status_odwolania);
                $criteria->compare('priorytet',$this->priorytet);
		$criteria->compare('zaliczenie',$this->zaliczenie);
		$criteria->compare('Zespoly_audytorowID',$this->Zespoly_audytorowID);
                $criteria->compare('miasto',$this->miasto, true);
                $criteria->compare('adres',$this->adres, true);
                

                //pola do wyszukiwania z RELACJI
                $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('zespolyAudytorow.nazwa_zespolu', $this->nazwa_zespolu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);// jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                
                $criteria->order = "i_woj DESC, i_osr DESC";               
                 $obj =  new CActiveDataProvider($this, array(			
                     'criteria'=>$criteria,                                                
                     ));                		
                 return $obj;
	}
        public function raporty_wyniki_lista_odwolanie()
	{
            $test = 0;
//            $this->czyzaliczono = 0;
		$criteria=new CDbCriteria;
                $criteria->select = array('osrodek.*',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
//                $criteria->select = array('osrodek.*', '('.$this->test++.') as czyzaliczono',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
                $criteria->with = array('osrodek', 'wojewodztwa', 'zespolyAudytorow');
                $criteria->addCondition('Zespoly_audytorowID is not null');
                $criteria->addCondition('status_odwolania = 2');
//                $criteria->addCondition('priorytet = 0'); //wyedytowano zmiane dolozono nowa kolumne priorytet
                $criteria->addCondition('status_etykiety = 0');
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
                $criteria->compare('miasto',$this->miasto, true);
                $criteria->compare('adres',$this->adres, true);
                $criteria->compare('priorytet',$this->priorytet);

                //pola do wyszukiwania z RELACJI
                $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('zespolyAudytorow.nazwa_zespolu', $this->nazwa_zespolu, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);// jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
                
                $criteria->order = "i_woj DESC, i_osr DESC";               
                 $obj =  new CActiveDataProvider($this, array(			
                     'criteria'=>$criteria,                                                
                     ));                		
                 return $obj;
	}
       public function raport_ocenione_wszystkie() 
	{
		$criteria=new CDbCriteria;
                $criteria->select = array('osrodek.*',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'identyfikator_zestawu');    
//                $criteria->select = array('osrodek.*',  'wojewodztwa.*', 't.*, metoda.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
//                $criteria->select = array('osrodek.*', '('.$this->test++.') as czyzaliczono',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
                $criteria->with = array('osrodek', 'wojewodztwa');
                $criteria->addCondition('Zespoly_audytorowID is not null');
//                $criteria->addCondition('status_odwolania <> 1'); //modyfikacja 2015
                $criteria->addCondition('priorytet = 0');
                
//                $criteria->addCondition('status_etykiety = 1');
//                $criteria->addCondition('status_ankiety = 1');                
//                //v2017 wyswietlamy niezaliczono etykiete
                $criteria->addCondition('(status_ankiety = 1) OR (status_ankiety = 0 AND status_etykiety = 2)');
//                $criteria->addCondition('zaliczenie = 2');  
                $criteria->addCondition('rok_audytu = '.Yii::app()->session['rok']);
//                $criteria->addCondition('wojewodztwa.nazwa_wojewodztwa = \'dolnośląskie\'');
//                $criteria->order = "i_woj DESC, i_osr DESC";               
                $criteria->order = "wojewodztwa.nazwa_wojewodztwa ASC, osrodek.nazwa ASC";    
                $criteria->compare('osrodek.nazwa',$this->nazwa, true); 
                $criteria->compare('zaliczenie',$this->zaliczenie, true); 
                $criteria->compare('osrodek.adres',$this->adres, true); 
                $criteria->compare('osrodek.miasto',$this->miasto, true); 
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa',$this->nazwa_wojewodztwa); 
                $criteria->compare('priorytet',$this->priorytet);
                 $obj =  new CActiveDataProvider($this, array(			
                     'criteria'=>$criteria,                                                
                     ));                		
                 return $obj;  
	}
        public function raport_wg_punktacji()//metoda modelu uzyta w 2 widokach ze wzgledu na zbieznosc danych _własciwy widok: _view_raport_wg_punktacji drugi widok: _view_raport_wg_parametrow
	{
		$criteria=new CDbCriteria;
                $criteria->select = array('osrodek.*',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'identyfikator_zestawu');    
//                $criteria->select = array('osrodek.*',  'wojewodztwa.*', 't.*, metoda.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
//                $criteria->select = array('osrodek.*', '('.$this->test++.') as czyzaliczono',  'wojewodztwa.*', 't.*, metoda.*', 'zespolyAudytorow.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
                $criteria->with = array('osrodek', 'wojewodztwa');
                $criteria->addCondition('Zespoly_audytorowID is not null');
//                $criteria->addCondition('status_odwolania <> 1');
                $criteria->addCondition('priorytet = 0'); //modyfikacja 2015
//                $criteria->addCondition('status_etykiety = 1');
                $criteria->addCondition('status_ankiety = 1');      
//                        $criteria->addCondition('wojewodztwa.nazwa_wojewodztwa = "dolnośląskie"');     
//                $criteria->addCondition('zaliczenie = 2');  
                $criteria->addCondition('rok_audytu = '.Yii::app()->session['rok']);
//                $criteria->addCondition('wojewodztwa.nazwa_wojewodztwa = \'dolnośląskie\'');
//                $criteria->order = "i_woj DESC, i_osr DESC";               
                $criteria->order = "wojewodztwa.nazwa_wojewodztwa ASC, osrodek.nazwa ASC";      
                $criteria->compare('osrodek.nazwa',$this->nazwa, true); 
                $criteria->compare('zaliczenie',$this->zaliczenie, true); 
                $criteria->compare('osrodek.adres',$this->adres, true); 
                $criteria->compare('osrodek.miasto',$this->miasto, true); 
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa',$this->nazwa_wojewodztwa); 
                $criteria->compare('identyfikator_zestawu',$this->identyfikator_zestawu,true); 
                $criteria->compare('metodaID',$this->metodaID);
                $criteria->compare('priorytet',$this->priorytet);
//                $criteria->compare($this->getMyCzySpelnioneUtkanie(), $this->utkanie, true);
//                $criteria->compare('punktacja',$this->punktacja);
                 $obj =  new CActiveDataProvider($this, array(			
                     'criteria'=>$criteria,                                                
                     ));                		
                 return $obj;  
	}


         public function raport_wyniki_w_wojewodztwach() 
	{
		$criteria=new CDbCriteria;
                $criteria->select = array('wojewodztwa.id_wojewodztwa AS id_woj',  'wojewodztwa.nazwa_wojewodztwa AS nazwa_wojewodztwa', 'count(*) AS liczba_osrodkow', 'count((case when(zaliczenie = 2) then \'2\' else NULL END)) AS zaliczone', 'count((case when(zaliczenie = 1) then \'1\' else NULL END)) AS niezaliczone', 'count((case when(zaliczenie = 0) then \'0\' else NULL END)) AS brak_audytu');    
                $criteria->with = array('osrodek', 'wojewodztwa');
                $criteria->addCondition('Zespoly_audytorowID is not null');
//                $criteria->addCondition('status_odwolania <> 1'); 
                $criteria->addCondition('priorytet = 0'); //modyfikacja 2015
                    $criteria->addCondition('metodaID like \''.Yii::app()->session['metodaDoRaporty'].'\'');
//                    
//                $criteria->addCondition('status_ankiety = 1');                
                $criteria->addCondition('rok_audytu = '.Yii::app()->session['rok']);  
                $criteria->group='wojewodztwa.nazwa_wojewodztwa';
//                $criteria->order = "wojewodztwa.nazwa_wojewodztwa ASC";    
                
                 $obj =  new CActiveDataProvider($this, array(			
                     'criteria'=>$criteria,                                                
                     ));                		
                 return $obj;  
	}
        
        public function getTotal($records, $column)
        {
                $total = 0;
                foreach ($records as $record) {
                        $total += $record->$column;
                }
                return $total;
                
        }
        public function getTotal2($records, $column, $ktoryRaport)
        {
                $total = 0;
                $licznik = 0;
                foreach ($records as $record) {
                        
                        $total+=$this->getMyWynikiDlaWojewodztw($record->$column, $ktoryRaport);
                        $licznik++;
                }
                return $total/$licznik;
                
        }
        public function getTotal3($records, $column)
        {
                $total = 0;
                $licznik = 0;
                foreach ($records as $record) {
                        
                        $total+=$this->getMyIleBrakUtkania($record->$column);
                        $licznik++;
                }
                if($licznik == 0) {
                    $licznik = 1;
                }
                    
                return $total/$licznik;
                
        }
        public function getTotal4($records, $column, $ktoryRaport)
        {
                $total = 0;
                $licznik = 0;
                foreach ($records as $record) {
                        
                        $total+=$this->getMyWynikiDlaWojewodztwProcentowo($record->$column, $ktoryRaport);
                        $licznik++;
                }
                return $total/$licznik;
                
        }
        
        public function getMyIdWojewodztwa(){
            return $this->id_woj;
        }
        
        public function getMyWynikiDlaWojewodztw($id_wojewodztwa, $ktoryRaport){
            
            $wynikKoncowy = 0;
            $licznik = 0;
            $sql = "";
//            $id_audytu = -1;
//            $metoda = -1;
            
            switch($ktoryRaport) {
                case 1: //wszystkie osrodki
                $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
                    //AND a.status_odwolania <> 1 //modyfikacja 2015
                        
                    break;
                case 2://zaliczone osrodki
                    $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.zaliczenie = 2
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
                    break;
                case 3://niezaliczone osrodki
                    $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.zaliczenie = 1
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
                    break;
            }

            $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];
                    $licznik++;
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy+=$wyniki->getUzyskana_razem_wagi();
                    }
                    
                } 
                if ($licznik == 0){
                    $licznik = 1; //w razie czego jak wyjdzie 0 to zeby nie dzielil przez 0 przypisujemy 1
                }
            
            return $wynikKoncowy/$licznik;
        }
        public function getMyWynikiDlaWojewodztwProcentowo($id_wojewodztwa, $ktoryRaport){
            
            $wynikKoncowy = 0;
            $wynikKoncowyMax = 0;
            $licznik = 0;
            $sql = "";
//            $id_audytu = -1;
//            $metoda = -1;
            
            switch($ktoryRaport) {
                case 1: //wszystkie osrodki
                $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
                    //AND a.status_odwolania <> 1 //modyfikacja 2015
                    break;
                case 2://zaliczone osrodki
                    $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.zaliczenie = 2
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
                    break;
                case 3://niezaliczone osrodki
                    $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.zaliczenie = 1
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
                    break;
            }

            $dataReader = Yii::app()->db->createCommand($sql)->query();
                while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];
                    $licznik++;
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy+=$wyniki->getUzyskana_razem_wagi();
                         $wynikKoncowyMax+=$wyniki->getMax_razem_wagi();
                    }
                    
                } 
                if ($licznik == 0){
                    $licznik = 1; //w razie czego jak wyjdzie 0 to zeby nie dzielil przez 0 przypisujemy 1
                }
                $dzielnik = $wynikKoncowyMax/$licznik;
                if($dzielnik == 0){
                    $dzielnik = 1;
                }
                $wynik_w_procentach = (($wynikKoncowy/$licznik)/($dzielnik))*100;
            
            return $wynik_w_procentach;
        }
        
        public function getMyIleBrakUtkania($id_wojewodztwa) {
            
            $licznik = 0;     
            $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.zaliczenie = 1
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
            //AND a.status_odwolania <> 1 //modyfikacja 2015
            
            $dataReader = Yii::app()->db->createCommand($sql)->query();
            while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getCzySpelnioneUtkanie();
                         if($wynikKoncowy == "Niespełnione"){
                             $licznik++;
                         }
                    }
            }
            return $licznik;
        }
        public function getMyParamtery($id_wojewodztwa, $ktoryRaport){ 
            
            $licznik = 0;
            //wszystkie osrodki
            $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
            //AND a.status_odwolania <> 1 //modyfikacja 2015
            
             $dataReader = Yii::app()->db->createCommand($sql)->query();
            
            switch($ktoryRaport){
                case 'poz_L':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getPoz_zaliczono_L();
                         if($wynikKoncowy == "<div id='green'>TAK</div>"){
                             $licznik++;
                         }
                    }
            }
                    break;
                case 'poz_P':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getPoz_zaliczono_P();
                         if($wynikKoncowy == "<div id='green'>TAK</div>"){
                             $licznik++;
                         }
                    }
            }
                    break;
                case 'art_L':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getArt_zaliczono_L();
                         if($wynikKoncowy == "<div id='green'>TAK</div>"){
                             $licznik++;
                         }
                    }
            }
                    break;
                case 'art_P':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getArt_zaliczono_P();
                         if($wynikKoncowy == "<div id='green'>TAK</div>"){
                             $licznik++;
                         }
                    }
            }
                    break;
                case 'inne_L':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getInne_zaliczono_L();
                         if($wynikKoncowy == "<div id='green'>TAK</div>"){
                             $licznik++;
                         }
                    }
            }
                    break;
                case 'inne_P':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getInne_zaliczono_P();
                         if($wynikKoncowy == "<div id='green'>TAK</div>"){
                             $licznik++;
                         }
                    }
            }
                    break;
                case 'ety':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getEty_zaliczono();
                         if($wynikKoncowy == "<div id='green'>TAK</div>"){
                             $licznik++;
                         }
                    }
            }
                    break;
              
            }
            
            return $licznik;
        }
        public function getMyIloscZalParametrow($id_wojewodztwa, $ktoryRaport){ 
            
            $licznik = 0;
            //wszystkie osrodki
            $sql = "SELECT a.id, a.metodaID
                        FROM wojewodztwa AS w 
                        INNER JOIN osrodki AS o ON w.id_wojewodztwa = o.WojewodztwaID
                        INNER JOIN audyty AS a ON a.osrodek_id = o.id
                        WHERE a.rok_audytu = '".Yii::app()->session['rok']."'
                        AND a.priorytet = 0
                        AND a.status_ankiety = 1
                        AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                        AND id_wojewodztwa = ".$id_wojewodztwa."";
            //AND a.status_odwolania <> 1 //modyfikacja 2015
            
             $dataReader = Yii::app()->db->createCommand($sql)->query();
            
            switch($ktoryRaport){
                case '7':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 7){
                             $licznik++;
                         }
                    }
            }
                    break;
                case '6':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 6){
                             $licznik++;
                         }
                    }
            }
                    break;
                case '5':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 5){
                             $licznik++;
                         }
                    }
            }
                    break;
                case '4':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 4){
                             $licznik++;
                         }
                    }
            }
                    break;
                case '3':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 3){
                             $licznik++;
                         }
                    }
            }
                    break;
                case '2':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 2){
                             $licznik++;
                         }
                    }
            }
                    break;
                case '1':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 1){
                             $licznik++;
                         }
                    }
            }
                    break;
                case '0':
                    while($row = $dataReader->read()){
                    $id_audytu = $row['id'];
                    $metoda = $row['metodaID'];                
                    
                    $wyniki = $this->WynikiRaportyKoncowe($id_audytu, $metoda);
                    if(isset($wyniki)){
                         $wynikKoncowy = $wyniki->getLiczbaZaliczonychParametrow();
                         if($wynikKoncowy == 0){
                             $licznik++;
                         }
                    }
            }
                    break;
              
            }
            
            return $licznik;
        }
        
     
        public function getMyUzyskanaRazemWynik() {
            
            $wyniki = $this->WynikiRaportyKoncowe($this->id, $this->metodaID);
            if(isset($wyniki)){
                return $wyniki->getUzyskana_razem_wagi();
            }
            return "<div id='red'>Błąd w strukturze danych!!!</div>";
            

        }
        public function getMyUzyskanaRazemPercent() {

            $wyniki = $this->WynikiRaportyKoncowe($this->id, $this->metodaID);
            if(isset($wyniki)){
                return $wyniki->getUzyskana_razem_percent();
            }
            return "<div id='red'>Błąd w strukturze danych!!!</div>";  

        }
        public function getMyLiczbaZaliczonychParametrow() {

            $wyniki = $this->WynikiRaportyKoncowe($this->id, $this->metodaID);
            if(isset($wyniki)){
                return $wyniki->getLiczbaZaliczonychParametrow();
            }
            return "<div id='red'>Błąd w strukturze danych!!!</div>";  

        }
        public function getMyCzySpelnioneUtkanie() {

            $wyniki = $this->WynikiRaportyKoncowe($this->id, $this->metodaID);
            if(isset($wyniki)){
                return $wyniki->getCzySpelnioneUtkanie();
            }
            return "<div id='red'>Błąd w strukturze danych!!!</div>";                    
        }
        public function getMyWynikiParametrow() {

            $wyniki = $this->WynikiRaportyKoncowe($this->id, $this->metodaID);
            if(isset($wyniki)){
                $wynikiLista = array('poz_grucz_pkt'=>$wyniki->getPoz_suma_uzyskana_L(), 'poz_grucz_procent'=>$wyniki->getPoz_suma_uzyskana_percent_L(), 'poz_grucz_zal'=>$wyniki->getPoz_zaliczono_L(),
                                    'poz_tluszcz_pkt'=>$wyniki->getPoz_suma_uzyskana_P(), 'poz_tluszcz_procent'=>$wyniki->getPoz_suma_uzyskana_percent_P(), 'poz_tluszcz_zal'=>$wyniki->getPoz_zaliczono_P(),
                                    'art_grucz_pkt'=>$wyniki->getArt_uzyskana_L(), 'art_grucz_procent'=>$wyniki->getArt_uzyskana_percent_L(), 'art_grucz_zal'=>$wyniki->getArt_zaliczono_L(),
                                    'art_tluszcz_pkt'=>$wyniki->getArt_uzyskana_P(), 'art_tluszcz_procent'=>$wyniki->getArt_uzyskana_percent_P(), 'art_tluszcz_zal'=>$wyniki->getArt_zaliczono_P(),
                                    'inne_grucz_pkt'=>$wyniki->getInne_uzyskana_L(), 'inne_grucz_procent'=>$wyniki->getInne_uzyskana_percent_L(), 'inne_grucz_zal'=>$wyniki->getInne_zaliczono_L(),
                                    'inne_tluszcz_pkt'=>$wyniki->getInne_uzyskana_P(), 'inne_tluszcz_procent'=>$wyniki->getInne_uzyskana_percent_P(), 'inne_tluszcz_zal'=>$wyniki->getInne_zaliczono_P(),
                                    'ety_pkt'=>$wyniki->getEty_uzyskana(), 'ety_procent'=>$wyniki->getEty_uzyskana_percent(), 'ety_zal'=>$wyniki->getEty_zaliczono(),
                    );
                return $wynikiLista;
//                return $wyniki->getPoz_suma_uzyskana_L();
                
            }
            return "<div id='red'>Błąd w strukturze danych!!!</div>";                    
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
            
            $criteria->condition ='rok_audytu='.Yii::app()->session['rok'].' AND (t.zespoly_audytorowID IS NULL OR t.zespoly_audytorowID = 94) AND t.status_odwolania <> 2 AND status_etykiety = 1' ; //2 oznacza ze jest duuplikat na potrzeby odwolania            
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
//            $criteria->condition ='rok_audytu='.Yii::app()->session['rok'].' AND t.zespoly_audytorowID IS NOT NULL AND t.status_odwolania = 0 AND t.status_ankiety = 1 AND t.status_etykiety = 1 AND t.Zespoly_audytorowID <> '.Yii::app()->session['id_zespolu_zestawy_odwolanie']; //2 oznacza ze jest duuplikat na potrzeby odwolania
            $criteria->condition ='t.zespoly_audytorowID IS NOT NULL AND t.Zespoly_audytorowID <> '.Yii::app()->session['id_zespolu_zestawy_odwolanie']; //2 oznacza ze jest duuplikat na potrzeby odwolania
            $criteria->select = array('osrodek.*', 'wojewodztwa.*', 't.*, metoda.*', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 1),UNSIGNED INTEGER) as i_woj', 'CONVERT(SPLIT_STR(identyfikator_zestawu, \'/\', 2),UNSIGNED INTEGER) as i_osr');    
            $criteria->order = "i_woj DESC, i_osr DESC";
            
            $criteria->addCondition('zaliczenie = 1');
            $criteria->addCondition('rok_audytu = '.Yii::app()->session['rok']);            
            $criteria->addCondition('t.status_odwolania = 0');
            $criteria->addCondition('t.status_ankiety = 1');
            $criteria->addCondition('t.status_etykiety = 1');          
           
           
            $criteria->compare('osrodek.nazwa', $this->nazwa, true); // jeśli dam true to znaki są porównywane na zasadzie 'którykolwiek'
            $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);
            $criteria->compare('identyfikator_zestawu', $this->identyfikator_zestawu, true);
            $criteria->compare('metodaID',$this->metodaID);
                        
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }

	public static function model($className=__CLASS__)
	{
		return parent::model($className); 
	}
}
