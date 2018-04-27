<?php

/** 
 * This is the model class for table "zespoly_audytorow".
 * 2014-08-18_KS
 * The followings are the available columns in table 'zespoly_audytorow':
 * @property integer $id
 * @property string $nazwa_zespolu
 * @property integer $rok_audytu
 *
 * The followings are the available model relations:
 * @property Audyty[] $audyties
 * @property UzytkownicyZespolyAudytorow[] $uzytkownicyZespolyAudytorows
 */
class ZespolyAudytorow extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zespoly_audytorow';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        //array('id', 'length', 'max'=>1),
			array('nazwa_zespolu', 'required'),
                        array('nazwa_zespolu', 'unique'),
                        array('rok_audytu', 'default', 'setOnEmpty' => true, 'value' => Yii::app()->session['rok']),
			array('rok_audytu', 'numerical', 'integerOnly'=>true),
			array('nazwa_zespolu', 'length', 'max'=>50),
			array('id, nazwa_zespolu, rok_audytu', 'safe', 'on'=>'search'),
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
			'audyties' => array(self::HAS_MANY, 'Audyty', 'Zespoly_audytorowID'),
			'uzytkownicyZespolyAudytorows' => array(self::HAS_MANY, 'UzytkownicyZespolyAudytorow', 'Zespoly_audytorowID'),
                        'uzytkownicy' => array(self::BELONGS_TO, 'Uzytkownicy', array('UzytkownicyID' => 'id'), 'through' => 'uzytkownicyZespolyAudytorows'),
                        'wojewodztwa' => array(self::BELONGS_TO, 'Wojewodztwa', array('WojewodztwaID' => 'id_wojewodztwa'), 'through' => 'uzytkownicy'),
		);
	}
        

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nazwa_zespolu' => 'Nazwa zespołu:',
			'rok_audytu' => 'Rok audytu:',
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
		$criteria->compare('nazwa_zespolu',$this->nazwa_zespolu,true);
		$criteria->compare('rok_audytu',$this->rok_audytu);
                $criteria->addCondition('t.rok_audytu = '.Yii::app()->session['rok'].'');
                $criteria->order = "t.id DESC"; // ostatnio dodany na samej górze
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function pokazZespolyAudytora()
	{
            $rok = Yii::app()->session['rok'];
            $id_zalogowanego = Yii::app()->session['user_id'];
            $criteria = new CDbCriteria; 
            $criteria->select = array('*');
            $criteria->distinct = false;
            $criteria->together = true;
            $criteria->with = array('uzytkownicyZespolyAudytorows');
            $criteria->condition ='uzytkownicyZespolyAudytorows.UzytkownicyID = '.$id_zalogowanego.' 
            AND t.rok_audytu = '.$rok;                                                         
            //$criteria->order = "t.id DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
	}
        public function pokazZespolyAudytoraDlaOdwolan()
	{
            $rok = Yii::app()->session['rok'];
            $id_zalogowanego = Yii::app()->user->getId();
            $criteria = new CDbCriteria; 
            $criteria->select = array('*');
            $criteria->distinct = false;
             $criteria->together = true;
            $criteria->with = array('uzytkownicyZespolyAudytorows', 'audyties');
            $criteria->condition ='uzytkownicyZespolyAudytorows.UzytkownicyID = '.$id_zalogowanego.' AND t.rok_audytu = '.$rok.' AND audyties.status_odwolania = 2';                                                         
            //$criteria->order = "t.id DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
	}
        
        

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ZespolyAudytorow the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
