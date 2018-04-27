<?php

/**
 * This is the model class for table "wojewodztwa".
 *
 * The followings are the available columns in table 'wojewodztwa':
 * @property integer $id_wojewodztwa
 * @property string $nazwa_wojewodztwa
 *
 * The followings are the available model relations:
 * @property IdentyfikatoryWojewodztw[] $identyfikatoryWojewodztws
 * @property Osrodki[] $osrodkis
 * @property Uzytkownicy[] $uzytkownicies
 */
class Wojewodztwa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wojewodztwa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nazwa_wojewodztwa', 'required'),
			array('nazwa_wojewodztwa', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_wojewodztwa, nazwa_wojewodztwa', 'safe', 'on'=>'search'),
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
			'identyfikatoryWojewodztws' => array(self::HAS_MANY, 'IdentyfikatoryWojewodztw', 'WojewodztwaID'),
			'osrodkis' => array(self::HAS_MANY, 'Osrodki', 'WojewodztwaID'),
			'uzytkownicies' => array(self::HAS_MANY, 'Uzytkownicy', 'WojewodztwaID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_wojewodztwa' => 'Id Wojewodztwa',
			'nazwa_wojewodztwa' => 'Województwo:',
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

		$criteria->compare('id_wojewodztwa',$this->id_wojewodztwa);
//		$criteria->compare('nazwa_wojewodztwa',$this->nazwa_wojewodztwa,true);
		$criteria->compare('nazwa_wojewodztwa',$this->nazwa_wojewodztwa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function wojewodztwa_bez_identyfikatorow()
                
                	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id_wojewodztwa',$this->id_wojewodztwa);
		$criteria->compare('nazwa_wojewodztwa',$this->nazwa_wojewodztwa,true);
                $criteria->select = array('*');
                
                $criteria->addNotInCondition(' id_wojewodztwa NOT IN (SELECT id_wojewodztwa 
                    FROM wojewodztwa, identyfikatory_wojewodztw iw
                    WHERE iw.WojewodztwaID = id_wojewodztwa 
                    AND iw.rok_audytu = '.Yii::app()->session['rok'].') AND t.id_wojewodztwa <> 19', array('t.id_wojewodztwa'), 'AND t.id_wojewodztwa NOT IN');
                $criteria->order = "t.id_wojewodztwa DESC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>16),
		));
	}
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Wojewodztwa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
