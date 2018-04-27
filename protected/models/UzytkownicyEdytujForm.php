<?php

class UzytkownicyEdytujForm extends CActiveRecord {
  
public $imie;
public $nazwisko;
public $email;
public $telefon;
public $RoleID;
public $WojewodztwaID;
public $status_kontaID;
        

        public function tableName()
	{
		return 'uzytkownicy';
	}
        
	public function rules()
	{
		return array(
                    array('imie, nazwisko ,status_kontaID, email, RoleID, WojewodztwaID', 'required'),
//                    array('telefon', 'integerOnly' => true),
                        array('telefon', 'length', 'max'=>20),
			array('email', 'length', 'max'=>50),
                    array('email' , 'unique', 'className' => 'Uzytkownicy'),
		);
	}
        
        public function attributeLabels()
	{
		return array(
			'imie' => 'Imię:',
			'nazwisko' => 'Nazwisko:',
			'email' => 'E-mail:',
			'telefon' => 'Nr telefonu:',
                        'status_kontaID' => 'Status konta:',
			'RoleID' => 'Rola:',
			'WojewodztwaID' => 'Województwo:',
		);
	}

        
                public static function model($className=__CLASS__) 
	{
		return parent::model($className);
	}
        
}

