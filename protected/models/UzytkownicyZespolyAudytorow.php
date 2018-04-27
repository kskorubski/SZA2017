<?php

/**
 * This is the model class for table "uzytkownicy_zespoly_audytorow".
 *
 * The followings are the available columns in table 'uzytkownicy_zespoly_audytorow':
 * @property integer $id
 * @property integer $UzytkownicyID
 * @property integer $Zespoly_audytorowID
 *
 * The followings are the available model relations:
 * @property ZespolyAudytorow $zespolyAudytorow
 * @property Uzytkownicy $uzytkownicy
 */
class UzytkownicyZespolyAudytorow extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uzytkownicy_zespoly_audytorow';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, UzytkownicyID, Zespoly_audytorowID', 'required'),
			array('id, UzytkownicyID, Zespoly_audytorowID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, UzytkownicyID, Zespoly_audytorowID', 'safe', 'on'=>'search'),
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
			'zespolyAudytorow' => array(self::BELONGS_TO, 'ZespolyAudytorow', 'Zespoly_audytorowID'),
			'uzytkownicy' => array(self::HAS_MANY, 'Uzytkownicy', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID_UZA',
			'UzytkownicyID' => 'UzytkownicyID_UZA',
			'Zespoly_audytorowID' => 'Zespoly Audytorow',
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
		$criteria->compare('UzytkownicyID',$this->UzytkownicyID);
		$criteria->compare('Zespoly_audytorowID',$this->Zespoly_audytorowID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UzytkownicyZespolyAudytorow the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
