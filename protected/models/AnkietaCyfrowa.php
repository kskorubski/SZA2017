<?php

/**
 * This is the model class for table "ankieta_cyfrowa".
 *
 * The followings are the available columns in table 'ankieta_cyfrowa':
 * @property integer $id
 * @property double $x1_1a
 * @property double $x1_1b
 * @property double $x1_1c
 * @property double $x1_1d
 * @property double $x1_2a
 * @property double $x1_2b
 * @property double $x1_2c
 * @property double $x1_2d
 * @property double $x1_3a
 * @property double $x1_3b
 * @property double $x1_3c
 * @property double $x1_3d
 * @property double $x1_4a
 * @property double $x1_4b
 * @property double $x1_4c
 * @property double $x1_4d
 * @property double $x1_5a
 * @property double $x1_5b
 * @property double $x1_6a
 * @property double $x1_6b
 * @property double $x1_6c
 * @property double $x1_6d
 * @property double $x1_7a
 * @property double $x1_7b
 * @property double $x1_7c
 * @property double $x1_7d
 * @property double $x1_8a
 * @property double $x1_8b
 * @property double $x1_8c
 * @property double $x1_8d
 * @property double $x1_9a
 * @property double $x1_9b
 * @property double $x1_9c
 * @property double $x1_9d
 * @property double $x1_10a
 * @property double $x1_10b
 * @property double $x2_1a
 * @property double $x2_1b
 * @property double $x3_1a
 * @property double $x3_1b
 * @property double $x3_2a
 * @property double $x3_2b
 * @property double $x3_3a
 * @property double $x3_3b
 * @property string $x1_1a_podpowiedz
 * @property string $x1_1b_podpowiedz
 * @property string $x1_1c_podpowiedz
 * @property string $x1_1d_podpowiedz
 * @property string $x1_2a_podpowiedz
 * @property string $x1_2b_podpowiedz
 * @property string $x1_2c_podpowiedz
 * @property string $x1_2d_podpowiedz
 * @property string $x1_3a_podpowiedz
 * @property string $x1_3b_podpowiedz
 * @property string $x1_3c_podpowiedz
 * @property string $x1_3d_podpowiedz
 * @property string $x1_4a_podpowiedz
 * @property string $x1_4b_podpowiedz
 * @property string $x1_4c_podpowiedz
 * @property string $x1_4d_podpowiedz
 * @property string $x1_5a_podpowiedz
 * @property string $x1_5b_podpowiedz
 * @property string $x1_5c_podpowiedz
 * @property string $x1_5d_podpowiedz
 * @property string $x1_6a_podpowiedz
 * @property string $x1_6b_podpowiedz
 * @property string $x1_6c_podpowiedz
 * @property string $x1_6d_podpowiedz
 * @property string $x1_7a_podpowiedz
 * @property string $x1_7b_podpowiedz
 * @property string $x1_7c_podpowiedz
 * @property string $x1_7d_podpowiedz
 * @property string $x1_8a_podpowiedz
 * @property string $x1_8b_podpowiedz
 * @property string $x1_8c_podpowiedz
 * @property string $x1_8d_podpowiedz
 * @property string $x1_9a_podpowiedz
 * @property string $x1_9b_podpowiedz
 * @property string $x1_9c_podpowiedz
 * @property string $x1_9d_podpowiedz
 * @property string $x1_10a_podpowiedz
 * @property string $x1_10b_podpowiedz
 * @property string $x2_1a_podpowiedz
 * @property string $x2_1b_podpowiedz
 * @property string $x3_1a_podpowiedz
 * @property string $x3_1b_podpowiedz
 * @property string $x3_2a_podpowiedz
 * @property string $x3_2b_podpowiedz
 * @property string $x3_3a_podpowiedz
 * @property string $x3_3b_podpowiedz
 * @property integer $AudytyID
 *
 * The followings are the available model relations:
 * @property Audyty $audyty
 */
class AnkietaCyfrowa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ankieta_cyfrowa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('x1_1a, x1_1b, x1_1c, x1_1d, x1_2a, x1_2b, x1_2c, x1_2d, x1_3a, x1_3b, x1_3c, x1_3d, x1_4a, x1_4b, x1_4c, x1_4d, x1_5a, x1_5b, x1_6a, x1_6b, x1_6c, x1_6d, x1_7a, x1_7b, x1_7c, x1_7d, x1_8a, x1_8b, x1_8c, x1_8d, x1_9a, x1_9b, x1_9c, x1_9d, x1_10a, x1_10b, x2_1a, x2_1b, x3_1a, x3_1b, x3_2a, x3_2b, x3_3a, x3_3b, AudytyID', 'required'),
			array('AudytyID', 'numerical', 'integerOnly'=>true),
			array('x1_1a, x1_1b, x1_1c, x1_1d, x1_2a, x1_2b, x1_2c, x1_2d, x1_3a, x1_3b, x1_3c, x1_3d, x1_4a, x1_4b, x1_4c, x1_4d, x1_5a, x1_5b, x1_6a, x1_6b, x1_6c, x1_6d, x1_7a, x1_7b, x1_7c, x1_7d, x1_8a, x1_8b, x1_8c, x1_8d, x1_9a, x1_9b, x1_9c, x1_9d, x1_10a, x1_10b, x2_1a, x2_1b, x3_1a, x3_1b, x3_2a, x3_2b, x3_3a, x3_3b', 'numerical'),
			array('x1_1a_podpowiedz, x1_1b_podpowiedz, x1_1c_podpowiedz, x1_1d_podpowiedz, x1_2a_podpowiedz, x1_2b_podpowiedz, x1_2c_podpowiedz, x1_2d_podpowiedz, x1_3a_podpowiedz, x1_3b_podpowiedz, x1_3c_podpowiedz, x1_3d_podpowiedz, x1_4a_podpowiedz, x1_4b_podpowiedz, x1_4c_podpowiedz, x1_4d_podpowiedz, x1_5a_podpowiedz, x1_5b_podpowiedz, x1_5c_podpowiedz, x1_5d_podpowiedz, x1_6a_podpowiedz, x1_6b_podpowiedz, x1_6c_podpowiedz, x1_6d_podpowiedz, x1_7a_podpowiedz, x1_7b_podpowiedz, x1_7c_podpowiedz, x1_7d_podpowiedz, x1_8a_podpowiedz, x1_8b_podpowiedz, x1_8c_podpowiedz, x1_8d_podpowiedz, x1_9a_podpowiedz, x1_9b_podpowiedz, x1_9c_podpowiedz, x1_9d_podpowiedz, x1_10a_podpowiedz, x1_10b_podpowiedz, x2_1a_podpowiedz, x2_1b_podpowiedz, x3_1a_podpowiedz, x3_1b_podpowiedz, x3_2a_podpowiedz, x3_2b_podpowiedz, x3_3a_podpowiedz, x3_3b_podpowiedz', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, x1_1a, x1_1b, x1_1c, x1_1d, x1_2a, x1_2b, x1_2c, x1_2d, x1_3a, x1_3b, x1_3c, x1_3d, x1_4a, x1_4b, x1_4c, x1_4d, x1_5a, x1_5b, x1_6a, x1_6b, x1_6c, x1_6d, x1_7a, x1_7b, x1_7c, x1_7d, x1_8a, x1_8b, x1_8c, x1_8d, x1_9a, x1_9b, x1_9c, x1_9d, x1_10a, x1_10b, x2_1a, x2_1b, x3_1a, x3_1b, x3_2a, x3_2b, x3_3a, x3_3b, x1_1a_podpowiedz, x1_1b_podpowiedz, x1_1c_podpowiedz, x1_1d_podpowiedz, x1_2a_podpowiedz, x1_2b_podpowiedz, x1_2c_podpowiedz, x1_2d_podpowiedz, x1_3a_podpowiedz, x1_3b_podpowiedz, x1_3c_podpowiedz, x1_3d_podpowiedz, x1_4a_podpowiedz, x1_4b_podpowiedz, x1_4c_podpowiedz, x1_4d_podpowiedz, x1_5a_podpowiedz, x1_5b_podpowiedz, x1_5c_podpowiedz, x1_5d_podpowiedz, x1_6a_podpowiedz, x1_6b_podpowiedz, x1_6c_podpowiedz, x1_6d_podpowiedz, x1_7a_podpowiedz, x1_7b_podpowiedz, x1_7c_podpowiedz, x1_7d_podpowiedz, x1_8a_podpowiedz, x1_8b_podpowiedz, x1_8c_podpowiedz, x1_8d_podpowiedz, x1_9a_podpowiedz, x1_9b_podpowiedz, x1_9c_podpowiedz, x1_9d_podpowiedz, x1_10a_podpowiedz, x1_10b_podpowiedz, x2_1a_podpowiedz, x2_1b_podpowiedz, x3_1a_podpowiedz, x3_1b_podpowiedz, x3_2a_podpowiedz, x3_2b_podpowiedz, x3_3a_podpowiedz, x3_3b_podpowiedz, AudytyID', 'safe', 'on'=>'search'),
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
			'x1_1a' => 'X1 1a',
			'x1_1b' => 'X1 1b',
			'x1_1c' => 'X1 1c',
			'x1_1d' => 'X1 1d',
			'x1_2a' => 'X1 2a',
			'x1_2b' => 'X1 2b',
			'x1_2c' => 'X1 2c',
			'x1_2d' => 'X1 2d',
			'x1_3a' => 'X1 3a',
			'x1_3b' => 'X1 3b',
			'x1_3c' => 'X1 3c',
			'x1_3d' => 'X1 3d',
			'x1_4a' => 'X1 4a',
			'x1_4b' => 'X1 4b',
			'x1_4c' => 'X1 4c',
			'x1_4d' => 'X1 4d',
			'x1_5a' => 'X1 5a',
			'x1_5b' => 'X1 5b',
			'x1_6a' => 'X1 6a',
			'x1_6b' => 'X1 6b',
			'x1_6c' => 'X1 6c',
			'x1_6d' => 'X1 6d',
			'x1_7a' => 'X1 7a',
			'x1_7b' => 'X1 7b',
			'x1_7c' => 'X1 7c',
			'x1_7d' => 'X1 7d',
			'x1_8a' => 'X1 8a',
			'x1_8b' => 'X1 8b',
			'x1_8c' => 'X1 8c',
			'x1_8d' => 'X1 8d',
			'x1_9a' => 'X1 9a',
			'x1_9b' => 'X1 9b',
			'x1_9c' => 'X1 9c',
			'x1_9d' => 'X1 9d',
			'x1_10a' => 'X1 10a',
			'x1_10b' => 'X1 10b',
			'x2_1a' => 'X2 1a',
			'x2_1b' => 'X2 1b',
			'x3_1a' => 'X3 1a',
			'x3_1b' => 'X3 1b',
			'x3_2a' => 'X3 2a',
			'x3_2b' => 'X3 2b',
			'x3_3a' => 'X3 3a',
			'x3_3b' => 'X3 3b',
			'x1_1a_podpowiedz' => 'X1 1a Podpowiedz',
			'x1_1b_podpowiedz' => 'X1 1b Podpowiedz',
			'x1_1c_podpowiedz' => 'X1 1c Podpowiedz',
			'x1_1d_podpowiedz' => 'X1 1d Podpowiedz',
			'x1_2a_podpowiedz' => 'X1 2a Podpowiedz',
			'x1_2b_podpowiedz' => 'X1 2b Podpowiedz',
			'x1_2c_podpowiedz' => 'X1 2c Podpowiedz',
			'x1_2d_podpowiedz' => 'X1 2d Podpowiedz',
			'x1_3a_podpowiedz' => 'X1 3a Podpowiedz',
			'x1_3b_podpowiedz' => 'X1 3b Podpowiedz',
			'x1_3c_podpowiedz' => 'X1 3c Podpowiedz',
			'x1_3d_podpowiedz' => 'X1 3d Podpowiedz',
			'x1_4a_podpowiedz' => 'X1 4a Podpowiedz',
			'x1_4b_podpowiedz' => 'X1 4b Podpowiedz',
			'x1_4c_podpowiedz' => 'X1 4c Podpowiedz',
			'x1_4d_podpowiedz' => 'X1 4d Podpowiedz',
			'x1_5a_podpowiedz' => 'X1 5a Podpowiedz',
			'x1_5b_podpowiedz' => 'X1 5b Podpowiedz',
			'x1_5c_podpowiedz' => 'X1 5c Podpowiedz',
			'x1_5d_podpowiedz' => 'X1 5d Podpowiedz',
			'x1_6a_podpowiedz' => 'X1 6a Podpowiedz',
			'x1_6b_podpowiedz' => 'X1 6b Podpowiedz',
			'x1_6c_podpowiedz' => 'X1 6c Podpowiedz',
			'x1_6d_podpowiedz' => 'X1 6d Podpowiedz',
			'x1_7a_podpowiedz' => 'X1 7a Podpowiedz',
			'x1_7b_podpowiedz' => 'X1 7b Podpowiedz',
			'x1_7c_podpowiedz' => 'X1 7c Podpowiedz',
			'x1_7d_podpowiedz' => 'X1 7d Podpowiedz',
			'x1_8a_podpowiedz' => 'X1 8a Podpowiedz',
			'x1_8b_podpowiedz' => 'X1 8b Podpowiedz',
			'x1_8c_podpowiedz' => 'X1 8c Podpowiedz',
			'x1_8d_podpowiedz' => 'X1 8d Podpowiedz',
			'x1_9a_podpowiedz' => 'X1 9a Podpowiedz',
			'x1_9b_podpowiedz' => 'X1 9b Podpowiedz',
			'x1_9c_podpowiedz' => 'X1 9c Podpowiedz',
			'x1_9d_podpowiedz' => 'X1 9d Podpowiedz',
			'x1_10a_podpowiedz' => 'X1 10a Podpowiedz',
			'x1_10b_podpowiedz' => 'X1 10b Podpowiedz',
			'x2_1a_podpowiedz' => 'X2 1a Podpowiedz',
			'x2_1b_podpowiedz' => 'X2 1b Podpowiedz',
			'x3_1a_podpowiedz' => 'X3 1a Podpowiedz',
			'x3_1b_podpowiedz' => 'X3 1b Podpowiedz',
			'x3_2a_podpowiedz' => 'X3 2a Podpowiedz',
			'x3_2b_podpowiedz' => 'X3 2b Podpowiedz',
			'x3_3a_podpowiedz' => 'X3 3a Podpowiedz',
			'x3_3b_podpowiedz' => 'X3 3b Podpowiedz',
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
		$criteria->compare('x1_1a',$this->x1_1a);
		$criteria->compare('x1_1b',$this->x1_1b);
		$criteria->compare('x1_1c',$this->x1_1c);
		$criteria->compare('x1_1d',$this->x1_1d);
		$criteria->compare('x1_2a',$this->x1_2a);
		$criteria->compare('x1_2b',$this->x1_2b);
		$criteria->compare('x1_2c',$this->x1_2c);
		$criteria->compare('x1_2d',$this->x1_2d);
		$criteria->compare('x1_3a',$this->x1_3a);
		$criteria->compare('x1_3b',$this->x1_3b);
		$criteria->compare('x1_3c',$this->x1_3c);
		$criteria->compare('x1_3d',$this->x1_3d);
		$criteria->compare('x1_4a',$this->x1_4a);
		$criteria->compare('x1_4b',$this->x1_4b);
		$criteria->compare('x1_4c',$this->x1_4c);
		$criteria->compare('x1_4d',$this->x1_4d);
		$criteria->compare('x1_5a',$this->x1_5a);
		$criteria->compare('x1_5b',$this->x1_5b);
		$criteria->compare('x1_6a',$this->x1_6a);
		$criteria->compare('x1_6b',$this->x1_6b);
		$criteria->compare('x1_6c',$this->x1_6c);
		$criteria->compare('x1_6d',$this->x1_6d);
		$criteria->compare('x1_7a',$this->x1_7a);
		$criteria->compare('x1_7b',$this->x1_7b);
		$criteria->compare('x1_7c',$this->x1_7c);
		$criteria->compare('x1_7d',$this->x1_7d);
		$criteria->compare('x1_8a',$this->x1_8a);
		$criteria->compare('x1_8b',$this->x1_8b);
		$criteria->compare('x1_8c',$this->x1_8c);
		$criteria->compare('x1_8d',$this->x1_8d);
		$criteria->compare('x1_9a',$this->x1_9a);
		$criteria->compare('x1_9b',$this->x1_9b);
		$criteria->compare('x1_9c',$this->x1_9c);
		$criteria->compare('x1_9d',$this->x1_9d);
		$criteria->compare('x1_10a',$this->x1_10a);
		$criteria->compare('x1_10b',$this->x1_10b);
		$criteria->compare('x2_1a',$this->x2_1a);
		$criteria->compare('x2_1b',$this->x2_1b);
		$criteria->compare('x3_1a',$this->x3_1a);
		$criteria->compare('x3_1b',$this->x3_1b);
		$criteria->compare('x3_2a',$this->x3_2a);
		$criteria->compare('x3_2b',$this->x3_2b);
		$criteria->compare('x3_3a',$this->x3_3a);
		$criteria->compare('x3_3b',$this->x3_3b);
		$criteria->compare('x1_1a_podpowiedz',$this->x1_1a_podpowiedz,true);
		$criteria->compare('x1_1b_podpowiedz',$this->x1_1b_podpowiedz,true);
		$criteria->compare('x1_1c_podpowiedz',$this->x1_1c_podpowiedz,true);
		$criteria->compare('x1_1d_podpowiedz',$this->x1_1d_podpowiedz,true);
		$criteria->compare('x1_2a_podpowiedz',$this->x1_2a_podpowiedz,true);
		$criteria->compare('x1_2b_podpowiedz',$this->x1_2b_podpowiedz,true);
		$criteria->compare('x1_2c_podpowiedz',$this->x1_2c_podpowiedz,true);
		$criteria->compare('x1_2d_podpowiedz',$this->x1_2d_podpowiedz,true);
		$criteria->compare('x1_3a_podpowiedz',$this->x1_3a_podpowiedz,true);
		$criteria->compare('x1_3b_podpowiedz',$this->x1_3b_podpowiedz,true);
		$criteria->compare('x1_3c_podpowiedz',$this->x1_3c_podpowiedz,true);
		$criteria->compare('x1_3d_podpowiedz',$this->x1_3d_podpowiedz,true);
		$criteria->compare('x1_4a_podpowiedz',$this->x1_4a_podpowiedz,true);
		$criteria->compare('x1_4b_podpowiedz',$this->x1_4b_podpowiedz,true);
		$criteria->compare('x1_4c_podpowiedz',$this->x1_4c_podpowiedz,true);
		$criteria->compare('x1_4d_podpowiedz',$this->x1_4d_podpowiedz,true);
		$criteria->compare('x1_5a_podpowiedz',$this->x1_5a_podpowiedz,true);
		$criteria->compare('x1_5b_podpowiedz',$this->x1_5b_podpowiedz,true);
		$criteria->compare('x1_5c_podpowiedz',$this->x1_5c_podpowiedz,true);
		$criteria->compare('x1_5d_podpowiedz',$this->x1_5d_podpowiedz,true);
		$criteria->compare('x1_6a_podpowiedz',$this->x1_6a_podpowiedz,true);
		$criteria->compare('x1_6b_podpowiedz',$this->x1_6b_podpowiedz,true);
		$criteria->compare('x1_6c_podpowiedz',$this->x1_6c_podpowiedz,true);
		$criteria->compare('x1_6d_podpowiedz',$this->x1_6d_podpowiedz,true);
		$criteria->compare('x1_7a_podpowiedz',$this->x1_7a_podpowiedz,true);
		$criteria->compare('x1_7b_podpowiedz',$this->x1_7b_podpowiedz,true);
		$criteria->compare('x1_7c_podpowiedz',$this->x1_7c_podpowiedz,true);
		$criteria->compare('x1_7d_podpowiedz',$this->x1_7d_podpowiedz,true);
		$criteria->compare('x1_8a_podpowiedz',$this->x1_8a_podpowiedz,true);
		$criteria->compare('x1_8b_podpowiedz',$this->x1_8b_podpowiedz,true);
		$criteria->compare('x1_8c_podpowiedz',$this->x1_8c_podpowiedz,true);
		$criteria->compare('x1_8d_podpowiedz',$this->x1_8d_podpowiedz,true);
		$criteria->compare('x1_9a_podpowiedz',$this->x1_9a_podpowiedz,true);
		$criteria->compare('x1_9b_podpowiedz',$this->x1_9b_podpowiedz,true);
		$criteria->compare('x1_9c_podpowiedz',$this->x1_9c_podpowiedz,true);
		$criteria->compare('x1_9d_podpowiedz',$this->x1_9d_podpowiedz,true);
		$criteria->compare('x1_10a_podpowiedz',$this->x1_10a_podpowiedz,true);
		$criteria->compare('x1_10b_podpowiedz',$this->x1_10b_podpowiedz,true);
		$criteria->compare('x2_1a_podpowiedz',$this->x2_1a_podpowiedz,true);
		$criteria->compare('x2_1b_podpowiedz',$this->x2_1b_podpowiedz,true);
		$criteria->compare('x3_1a_podpowiedz',$this->x3_1a_podpowiedz,true);
		$criteria->compare('x3_1b_podpowiedz',$this->x3_1b_podpowiedz,true);
		$criteria->compare('x3_2a_podpowiedz',$this->x3_2a_podpowiedz,true);
		$criteria->compare('x3_2b_podpowiedz',$this->x3_2b_podpowiedz,true);
		$criteria->compare('x3_3a_podpowiedz',$this->x3_3a_podpowiedz,true);
		$criteria->compare('x3_3b_podpowiedz',$this->x3_3b_podpowiedz,true);
		$criteria->compare('AudytyID',$this->AudytyID);
                $criteria->order = "t.id DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AnkietaCyfrowa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
