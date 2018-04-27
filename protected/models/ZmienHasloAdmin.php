<?php

class ZmienHasloAdmin extends CFormModel {
  public $uzytkownik_nowehaslo;
  public $uzytkownik_nowehaslo2;
  
  
        public static function model($className=__CLASS__) 
	{
		return parent::model($className);
	}
        
        public function tableName()
	{
		return 'uzytkownicy';
	}
        
	public function rules()
	{
		return array(
			array('uzytkownik_nowehaslo, uzytkownik_nowehaslo2', 'required'),
                      array('uzytkownik_nowehaslo', 'compare', 'compareAttribute'=>'uzytkownik_nowehaslo2'),
		);
	}
        
        public function attributeLabels()
	{
		return array(
			'uzytkownik_nowehaslo' => 'Nowe hasło',
			'uzytkownik_nowehaslo2' => 'Powtórz nowe hasło',
		);
	}
}

