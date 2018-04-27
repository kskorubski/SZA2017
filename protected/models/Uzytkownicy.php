<?php

/**
 * This is the model class for table "uzytkownicy".
 *
 * The followings are the available columns in table 'uzytkownicy':
 * @property integer $id
 * @property string $imie
 * @property string $nazwisko
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $telefon
 * @property integer $RoleID
 * @property string $data_logowania
 * @property integer $status_kontaID
 * @property integer $WojewodztwaID
 *
 * The followings are the available model relations:
 * @property Role $role
 * @property Wojewodztwa $wojewodztwa
 * @property UzytkownicyZespolyAudytorow[] $uzytkownicyZespolyAudytorows
 */
class Uzytkownicy extends CActiveRecord
{
    public $password2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uzytkownicy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imie, nazwisko, username, password, email, RoleID, WojewodztwaID', 'required'),
			array('RoleID, status_kontaID, WojewodztwaID', 'numerical', 'integerOnly'=>true),
			array('imie, nazwisko', 'length', 'max'=>40),
                        
                        array('password2', 'compare', 'compareAttribute'=>'password'),
                        array('username','unique', 'className' => 'Uzytkownicy'),
                        array('email','unique', 'className' => 'Uzytkownicy'),
                    
                        array('username, telefon', 'length', 'max'=>20),
			array('password', 'length', 'max'=>32),
			array('email', 'length', 'max'=>50),
                    
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, imie, nazwisko, username, password, email, telefon, RoleID, data_logowania, status_kontaID, WojewodztwaID', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Role', 'RoleID'),
			'wojewodztwas' => array(self::BELONGS_TO, 'Wojewodztwa', 'WojewodztwaID'),
			'uzytkownicyzespolyaudytorows' => array(self::HAS_ONE, 'UzytkownicyZespolyAudytorow', 'UzytkownicyID'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id_U',
			'imie' => 'Imię:',
			'nazwisko' => 'Nazwisko:',
			'username' => 'Login:',
			'password' => 'Hasło:',
			'password2' => 'Powtórz hasło:',
			'email' => 'E-mail:',
			'telefon' => 'Nr telefonu:',
			'RoleID' => 'Rola:',
			'data_logowania' => 'Data ostatniego logowania:',
			'status_kontaID' => 'Status:',
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
		$criteria->compare('imie',$this->imie,true);
		$criteria->compare('nazwisko',$this->nazwisko,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefon',$this->telefon,true);
		$criteria->compare('RoleID',$this->RoleID);
		$criteria->compare('data_logowania',$this->data_logowania,true);
		$criteria->compare('status_kontaID',$this->status_kontaID);
		$criteria->compare('WojewodztwaID',$this->WojewodztwaID);
                $criteria->order = "t.id DESC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Uzytkownicy the static model class
	 */
        
        
        public function pokazBezZespolu() {
             $id_zespolu_audytorow = Yii::app()->session['id_zespolu_audytorow'];
            $criteria = new CDbCriteria; 
            $criteria->select = array('*');
            $criteria->distinct = false;
             $criteria->together = true;
            $criteria->with = array('wojewodztwas');
            $criteria->condition ='wojewodztwas.id_wojewodztwa = t.WojewodztwaID
            AND t.status_kontaID = 1
            AND t.RoleID = 2'; 
            $criteria->addNotInCondition('select UzytkownicyID
            from uzytkownicy_zespoly_audytorow uz, zespoly_audytorow z
            where uz.zespoly_audytorowID = z.id
            and z.id = "'.$id_zespolu_audytorow.'"
            and z.rok_audytu = '.Yii::app()->session['rok'].' ', array('t.id'), 'AND t.id NOT IN');
            
            
            
            //$criteria->order = "t.id DESC";
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        
        
        public function pokazDodanychAudytorow() {
            $id_zespolu_audytorow = Yii::app()->session['id_zespolu_audytorow'];
            $criteria = new CDbCriteria; 
            $criteria->with = array('uzytkownicyzespolyaudytorows','wojewodztwas');
            $criteria->condition ='wojewodztwas.id_wojewodztwa = t.WojewodztwaID
               AND t.id = uzytkownicyzespolyaudytorows.UzytkownicyID
               AND uzytkownicyzespolyaudytorows.Zespoly_audytorowID = "'.$id_zespolu_audytorow.'"
               AND t.status_kontaID = 1
               AND t.RoleID = 2';
            $criteria->select = array('*');
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
        public function pokazDodanychAudytorowOdwolanie() {
            $id_zespolu_audytorow_odwolanie = Yii::app()->session['id_zespolu_audytorow_odwolanie'];
            $criteria = new CDbCriteria; 
            $criteria->with = array('uzytkownicyzespolyaudytorows','wojewodztwas');
            $criteria->condition ='wojewodztwas.id_wojewodztwa = t.WojewodztwaID
               AND t.id = uzytkownicyzespolyaudytorows.UzytkownicyID
               AND uzytkownicyzespolyaudytorows.Zespoly_audytorowID = "'.$id_zespolu_audytorow_odwolanie.'"
               AND t.status_kontaID = 1
               AND t.RoleID = 2';
            $criteria->select = array('*');
            return new CActiveDataProvider($this, array(
            'criteria'=> $criteria,
            ));
        }
       
        
        
	public static function model($className=__CLASS__) 
	{
		return parent::model($className);
	}
}
