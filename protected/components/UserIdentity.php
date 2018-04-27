<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
  private $_id;
  private $_role;
    
  
    public function authenticate()
    {
        $record=Uzytkownicy::model()->findByAttributes(array('username'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else 
        {
            $this->_id=$record->id;
            Yii::app()->session['user_id'] = $this->_id;
            $this->_role=$record->RoleID;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function getRole()
    {
        return $this->_role;
    }
}