<?php

/**
 * This is the model class for table "v_wyniki_audytorow2015".
 *
 * The followings are the available columns in table 'v_wyniki_audytorow2015':
 * @property integer $id
 * @property string $nazwisko
 * @property string $imie
 * @property string $username
 * @property string $nazwa_zespolu
 * @property integer $rok_audytu
 * @property string $audyty_oceniane
 * @property string $audyty_etapI
 * @property string $audyty_etapII
 * @property string $zaliczone_audyty
 * @property string $niezaliczone_audyty
 */
class VWynikiAudytorow2015 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
        public $test; 
	public function tableName()
	{
		return 'v_wyniki_audytorow2015';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nazwisko, imie, username', 'required'),
			array('id, rok_audytu', 'numerical', 'integerOnly'=>true),
			array('nazwisko, imie', 'length', 'max'=>40),
			array('username', 'length', 'max'=>20),
			array('nazwa_zespolu', 'length', 'max'=>50),
			array('audyty_oceniane, audyty_etapI, audyty_etapII, zaliczone_audyty, niezaliczone_audyty', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nazwisko, imie, username, nazwa_zespolu, rok_audytu, audyty_oceniane, audyty_etapI, audyty_etapII, zaliczone_audyty, niezaliczone_audyty', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nazwisko' => 'Nazwisko',
			'imie' => 'Imie',
			'username' => 'Login',
			'nazwa_zespolu' => 'Nazwa Zespolu',
			'rok_audytu' => 'Rok Audytu',
			'audyty_oceniane' => 'Audyty Oceniane',
			'audyty_etapI' => 'Audyty Etap I',
			'audyty_etapII' => 'Audyty Etap Ii',
			'zaliczone_audyty' => 'Zaliczone Audyty',
			'niezaliczone_audyty' => 'Niezaliczone Audyty',
                        'test' => 'test',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nazwisko',$this->nazwisko,true);
		$criteria->compare('imie',$this->imie,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nazwa_zespolu',$this->nazwa_zespolu,true);
		$criteria->compare('rok_audytu',$this->rok_audytu);
		$criteria->compare('audyty_oceniane',$this->audyty_oceniane,true);
		$criteria->compare('audyty_etapI',$this->audyty_etapI,true);
		$criteria->compare('audyty_etapII',$this->audyty_etapII,true);
		$criteria->compare('zaliczone_audyty',$this->zaliczone_audyty,true);
		$criteria->compare('niezaliczone_audyty',$this->niezaliczone_audyty,true);
                
                $criteria->addCondition('rok_audytu = '.Yii::app()->session['rok']);
        

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getMyOcenyOstrosc($ktoryRaport) {
                    
            $wynikKoncowy = 0;
            
            $sql = "SELECT a.id AS id, a.metodaID AS metodaID
                    FROM audyty AS a
                    INNER JOIN zespoly_audytorow AS z ON a.Zespoly_audytorowID = z.id
                    INNER JOIN uzytkownicy_zespoly_audytorow AS uza ON z.id = uza.Zespoly_audytorowID
                    INNER JOIN uzytkownicy AS u ON uza.UzytkownicyID = u.id

                    WHERE z.rok_audytu = '".Yii::app()->session['rok']."'
                    AND u.RoleID = 2
                    AND u.id = ".$this->id;
//            echo $sql;
//            $sql = "select id, metodaID from audyty";
            
            $dataReader = Yii::app()->db->createCommand($sql)->query();
                                                        
                    switch($ktoryRaport){
                        
                        case 'poz_skosna_L':                                                    
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getPoz_skosna_uzyskana_L();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                                               
                            break;
                            
                        case 'poz_skosna_P':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getPoz_skosna_uzyskana_P();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                            break;
                        case 'poz_kranio_L':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getPoz_kranio_uzyskana_L();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                            break;
                        case 'poz_kranio_P':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getPoz_kranio_uzyskana_P();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                            break;
                        case 'art_L':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getArt_uzyskana_L();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                            break;
                        case 'art_P':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getArt_uzyskana_P();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                            break;
                        case 'inne_L':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getInne_uzyskana_L();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                            break;
                        case 'inne_P':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getInne_uzyskana_P();                                                                                                                                                                                                                
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$this->audyty_oceniane,2);
                            break;
                        
                    }
                    return $wynikKoncowy;                                                                 
        }    
        public function getMyOcenyOstroscEtykieta($ktoryRaport) {
           $wynikKoncowy = 0;
           $licznik = 0;
            
            $sql = "SELECT a.id AS id, a.metodaID AS metodaID
                    FROM audyty AS a       
                    INNER JOIN zespoly_audytorow AS z ON a.Zespoly_audytorowID = z.id
                    WHERE z.rok_audytu = '".Yii::app()->session['rok']."'                

                    AND a.metodaID like '".Yii::app()->session['metodaDoRaporty']."'
                    AND a.status_etykiety = '1'";

            
            $dataReader = Yii::app()->db->createCommand($sql)->query();
                                                        
                    switch($ktoryRaport){
                        
                        case 'liczbaEtykiet':                                                    
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                      
                                $licznik++;                                                 
                            }
                         $wynikKoncowy = $licznik;
                                               
                            break;
                            
                        case 'ety_etykieta':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getEty_etykieta(); 
                                    $licznik++;
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$licznik,2);
                            break;
                        case 'ety_dane_na_etykiecie':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getEty_dane_na_etykiecie();  
                                    $licznik++;
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$licznik,2);
                            break;
                        case 'ety_parametry_ekspozycji':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getEty_parametry_ekspozycji(); 
                                    $licznik++;
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$licznik,2);
                            break;
                        case 'ety_uzyskane':
                            while($row = $dataReader->read()){                            
                                $id_audytu = $row['id'];                            
                                $metoda = $row['metodaID'];                                                     
                                $wyniki = Audyty::model()->WynikiRaportyKoncowe($id_audytu, $metoda);                                                
                                if(isset($wyniki)){                                                            
                                    $wynikKoncowy += $wyniki->getEty_uzyskana(); 
                                    $licznik++;
                                }                                                
                            }
                         $wynikKoncowy = round($wynikKoncowy/$licznik,2);
                            break;
                    }
                    
                    return $wynikKoncowy;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VWynikiAudytorow2015 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
