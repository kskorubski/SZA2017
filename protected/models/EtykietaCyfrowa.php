<?php

/**
 * This is the model class for table "etykieta_cyfrowa".
 *
 * The followings are the available columns in table 'etykieta_cyfrowa':
 * @property integer $id
 * @property integer $x4_1
 * @property integer $x4_2
 * @property integer $x4_3
 * @property integer $x4_4
 * @property integer $x4_5
 * @property integer $x4_6
 * @property integer $x4_7
 * @property integer $x4_8
 * @property integer $x4_9
 * @property integer $x4_10
 * @property integer $x4_11
 * @property integer $x4_12
 * @property integer $x4_13
 * @property integer $x4_14
 * @property integer $x4_15
 * @property string $x4_1_podpowiedz
 * @property string $x4_2_podpowiedz
 * @property string $x4_3_podpowiedz
 * @property string $x4_4_podpowiedz
 * @property string $x4_5_podpowiedz
 * @property string $x4_6_podpowiedz
 * @property string $x4_7_podpowiedz
 * @property string $x4_8_podpowiedz
 * @property string $x4_9_podpowiedz
 * @property string $x4_10_podpowiedz
 * @property string $x4_11_podpowiedz
 * @property string $x4_12_podpowiedz
 * @property string $x4_13_podpowiedz
 * @property string $x4_14_podpowiedz
 * @property string $x4_15_podpowiedz
 * @property integer $AudytyID
 *
 * The followings are the available model relations:
 * @property Audyty $audyty
 */
class EtykietaCyfrowa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'etykieta_cyfrowa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('x4_1, x4_2, x4_3, x4_4, x4_5, x4_6, x4_7, x4_8, x4_9, x4_10, x4_11, x4_12, x4_13, x4_14, x4_15, AudytyID', 'required'),
			array('x4_1, x4_2, x4_3, x4_4, x4_5, x4_6, x4_7, x4_8, x4_9, x4_10, x4_11, x4_12, x4_13, x4_14, x4_15, AudytyID', 'numerical', 'integerOnly'=>true),
			array('x4_1_podpowiedz, x4_2_podpowiedz, x4_3_podpowiedz, x4_4_podpowiedz, x4_5_podpowiedz, x4_6_podpowiedz, x4_7_podpowiedz, x4_8_podpowiedz, x4_9_podpowiedz, x4_10_podpowiedz, x4_11_podpowiedz, x4_12_podpowiedz, x4_13_podpowiedz, x4_14_podpowiedz, x4_15_podpowiedz', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, x4_1, x4_2, x4_3, x4_4, x4_5, x4_6, x4_7, x4_8, x4_9, x4_10, x4_11, x4_12, x4_13, x4_14, x4_15, x4_1_podpowiedz, x4_2_podpowiedz, x4_3_podpowiedz, x4_4_podpowiedz, x4_5_podpowiedz, x4_6_podpowiedz, x4_7_podpowiedz, x4_8_podpowiedz, x4_9_podpowiedz, x4_10_podpowiedz, x4_11_podpowiedz, x4_12_podpowiedz, x4_13_podpowiedz, x4_14_podpowiedz, x4_15_podpowiedz, AudytyID', 'safe', 'on'=>'search'),
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
			'audyty' => array(self::BELONGS_TO, 'Audyty', 'AudytyID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'x4_1' => 'X4 1',
			'x4_2' => 'X4 2',
			'x4_3' => 'X4 3',
			'x4_4' => 'X4 4',
			'x4_5' => 'X4 5',
			'x4_6' => 'X4 6',
			'x4_7' => 'X4 7',
			'x4_8' => 'X4 8',
			'x4_9' => 'X4 9',
			'x4_10' => 'X4 10',
			'x4_11' => 'X4 11',
			'x4_12' => 'X4 12',
			'x4_13' => 'X4 13',
			'x4_14' => 'X4 14',
			'x4_15' => 'X4 15',
			'x4_1_podpowiedz' => 'X4 1 Podpowiedz',
			'x4_2_podpowiedz' => 'X4 2 Podpowiedz',
			'x4_3_podpowiedz' => 'X4 3 Podpowiedz',
			'x4_4_podpowiedz' => 'X4 4 Podpowiedz',
			'x4_5_podpowiedz' => 'X4 5 Podpowiedz',
			'x4_6_podpowiedz' => 'X4 6 Podpowiedz',
			'x4_7_podpowiedz' => 'X4 7 Podpowiedz',
			'x4_8_podpowiedz' => 'X4 8 Podpowiedz',
			'x4_9_podpowiedz' => 'X4 9 Podpowiedz',
			'x4_10_podpowiedz' => 'X4 10 Podpowiedz',
			'x4_11_podpowiedz' => 'X4 11 Podpowiedz',
			'x4_12_podpowiedz' => 'X4 12 Podpowiedz',
			'x4_13_podpowiedz' => 'X4 13 Podpowiedz',
			'x4_14_podpowiedz' => 'X4 14 Podpowiedz',
			'x4_15_podpowiedz' => 'X4 15 Podpowiedz',
			'AudytyID' => 'Audyty',
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
		$criteria->compare('x4_1',$this->x4_1);
		$criteria->compare('x4_2',$this->x4_2);
		$criteria->compare('x4_3',$this->x4_3);
		$criteria->compare('x4_4',$this->x4_4);
		$criteria->compare('x4_5',$this->x4_5);
		$criteria->compare('x4_6',$this->x4_6);
		$criteria->compare('x4_7',$this->x4_7);
		$criteria->compare('x4_8',$this->x4_8);
		$criteria->compare('x4_9',$this->x4_9);
		$criteria->compare('x4_10',$this->x4_10);
		$criteria->compare('x4_11',$this->x4_11);
		$criteria->compare('x4_12',$this->x4_12);
		$criteria->compare('x4_13',$this->x4_13);
		$criteria->compare('x4_14',$this->x4_14);
		$criteria->compare('x4_15',$this->x4_15);
		$criteria->compare('x4_1_podpowiedz',$this->x4_1_podpowiedz,true);
		$criteria->compare('x4_2_podpowiedz',$this->x4_2_podpowiedz,true);
		$criteria->compare('x4_3_podpowiedz',$this->x4_3_podpowiedz,true);
		$criteria->compare('x4_4_podpowiedz',$this->x4_4_podpowiedz,true);
		$criteria->compare('x4_5_podpowiedz',$this->x4_5_podpowiedz,true);
		$criteria->compare('x4_6_podpowiedz',$this->x4_6_podpowiedz,true);
		$criteria->compare('x4_7_podpowiedz',$this->x4_7_podpowiedz,true);
		$criteria->compare('x4_8_podpowiedz',$this->x4_8_podpowiedz,true);
		$criteria->compare('x4_9_podpowiedz',$this->x4_9_podpowiedz,true);
		$criteria->compare('x4_10_podpowiedz',$this->x4_10_podpowiedz,true);
		$criteria->compare('x4_11_podpowiedz',$this->x4_11_podpowiedz,true);
		$criteria->compare('x4_12_podpowiedz',$this->x4_12_podpowiedz,true);
		$criteria->compare('x4_13_podpowiedz',$this->x4_13_podpowiedz,true);
		$criteria->compare('x4_14_podpowiedz',$this->x4_14_podpowiedz,true);
		$criteria->compare('x4_15_podpowiedz',$this->x4_15_podpowiedz,true);
		$criteria->compare('AudytyID',$this->AudytyID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EtykietaCyfrowa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
