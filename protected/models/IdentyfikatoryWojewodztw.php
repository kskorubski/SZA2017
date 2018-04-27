<?php

/**
 * This is the model class for table "identyfikatory_wojewodztw".
 *
 * The followings are the available columns in table 'identyfikatory_wojewodztw':
 * @property integer $id
 * @property integer $rok_audytu
 * @property integer $identyfikator_wojewodztwa
 * @property integer $WojewodztwaID
 *
 * The followings are the available model relations:
 * @property Wojewodztwa $wojewodztwa
 */
class IdentyfikatoryWojewodztw extends CActiveRecord
{
        public $wojewodztwo_nazwa_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'identyfikatory_wojewodztw';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identyfikator_wojewodztwa', 'required'),
			array('identyfikator_wojewodztwa', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rok_audytu,  WojewodztwaID', 'safe', 'on'=>'search'),
			array('wojewodztwo_nazwa_search, id, rok_audytu', 'safe', 'on'=>'wojewodztwa_z_nadanym_identyfikatorem'),
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
			'wojewodztwa' => array(self::BELONGS_TO, 'Wojewodztwa', 'WojewodztwaID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID_IdentyfikatoryWojewodztw',
			'rok_audytu' => 'Rok audytu:',
			'identyfikator_wojewodztwa' => 'Nadany identyfikator:',
			'WojewodztwaID' => 'Województwo:',
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
		$criteria->compare('rok_audytu',$this->rok_audytu);
		$criteria->compare('identyfikator_wojewodztwa',$this->identyfikator_wojewodztwa);
		$criteria->compare('WojewodztwaID',$this->WojewodztwaID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function wojewodztwa_z_nadanym_identyfikatorem()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with = array('wojewodztwa');
                $criteria->compare('wojewodztwa.nazwa_wojewodztwa', $this->wojewodztwo_nazwa_search, false); 

                $criteria->compare('id',$this->id);
		$criteria->compare('rok_audytu',$this->rok_audytu);
		$criteria->compare('identyfikator_wojewodztwa',$this->identyfikator_wojewodztwa);
		$criteria->compare('WojewodztwaID',$this->WojewodztwaID);
                $criteria->addCondition('rok_audytu = '.Yii::app()->session['rok'].'');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>18),
		));
	}
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IdentyfikatoryWojewodztw the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
