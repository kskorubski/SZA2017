<?php

/**
 * This is the model class for table "osrodki".
 *
 * The followings are the available columns in table 'osrodki':
 * @property integer $id
 * @property string $nazwa
 * @property string $adres
 * @property string $kod
 * @property string $miasto
 * @property integer $WojewodztwaID
 *
 * The followings are the available model relations:
 * @property Audyty[] $audyties
 * @property Wojewodztwa $wojewodztwa
 */
class Osrodki extends CActiveRecord
{
    public $Nr;
    public $Rodzaj;
    public $Akcja;
    
    public $nazwa_wojewodztwa;
    public $identyfikator_wojewodztwa;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'osrodki';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
                            'nazwa, WojewodztwaID, adres, miasto, kod', 
                            'required',
                            'message' => 'To pole nie może być puste!', 
                            ),
			array(
                            'WojewodztwaID', 
                            'numerical', 'integerOnly'=>true
                            ),
			array(
                            'nazwa', 
                            'length', 'max'=>255
                            ),
			array(
                            'adres, miasto', 
                            'length', 'max'=>50
                            ),
                        array( 
                            'kod', 
                            'match', 'pattern' => '/^[0-9]{2}\-[0-9]{3}$/ ', 
                            'message' => 'Podany kod jest nieprawidłowy! Poprawny format: XX-XXX', 
                            ), 
			array(
                            'kod', 
                            'length', 'max'=>6
                            ),                    
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
                            'nazwa_wojewodztwa,
                             identyfikator_wojewodztwa,
                             id,
                             nazwa,
                             adres,
                             kod,
                             miasto', 
                            'safe', 'on'=>'pokazzestawydoutworzenia'),
			array(
                            'nazwa_wojewodztwa,
                             identyfikator_wojewodztwa, 
                             id,  
                             nazwa, 
                             adres, 
                             kod, 
                             miasto, 
                             WojewodztwaID', 
                            'safe', 'on'=>'search'),
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
			'audyties' => array(self::HAS_MANY, 'Audyty', 'osrodek_id'),
			'wojewodztwa' => array(self::BELONGS_TO, 'Wojewodztwa', 'WojewodztwaID'),
                        'identyfikatory' => array(self::BELONGS_TO, 'IdentyfikatoryWojewodztw', array('id_wojewodztwa' => 'WojewodztwaID'), 'through' => 'wojewodztwa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nazwa' => 'Ośrodek:',
			'adres' => 'Adres:',
			'kod' => 'Kod:',
			'miasto' => 'Miasto:',
			'WojewodztwaID' => 'Województwo:',
			'identyfikator_wojewodztwa' => 'Identyfikator:',
			'nazwa_wojewodztwa' => 'Województwo:',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
                $criteria->with = array('wojewodztwa');
		$criteria->compare('id',$this->id);
		$criteria->compare('nazwa',$this->nazwa,true);
		$criteria->compare('adres',$this->adres,true);
		$criteria->compare('kod',$this->kod,true);
		$criteria->compare('miasto',$this->miasto,true);
		$criteria->compare('WojewodztwaID',$this->WojewodztwaID);

                // relacyjne    
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);
                
                $criteria->together = true;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        //------------------ZROdlo
         public function pokazzestawydoutworzenia() {
            $criteria = new CDbCriteria; 
            $criteria->with = array('wojewodztwa', 'identyfikatory');
            $criteria->condition ='identyfikatory.rok_audytu='.Yii::app()->session['rok'].' and t.id NOT IN (SELECT osrodek_id FROM audyty WHERE rok_audytu = '.Yii::app()->session['rok'].')';
            
            $criteria->compare('id',$this->id);
            $criteria->compare('nazwa',$this->nazwa,true);
            $criteria->compare('adres',$this->adres,true);
            $criteria->compare('miasto',$this->miasto,true);
            $criteria->compare('WojewodztwaID',$this->WojewodztwaID);
            
            $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->nazwa_wojewodztwa, false);
            $criteria->compare('identyfikatory.identyfikator_wojewodztwa', $this->identyfikator_wojewodztwa, true);
            
            $criteria->together = true;
            
            $criteria->order = "t.id DESC";
            $criteria->order = "identyfikatory.identyfikator_wojewodztwa DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Osrodki the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
