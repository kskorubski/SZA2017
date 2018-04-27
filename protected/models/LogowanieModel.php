<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LogowanieModel extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Zapamiętaj mnie',
                        'username'=>'Login:',
                        'password'=>'Hasło:'
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Nieprawidłowa nazwa użytkownika lub hasło!');
		} 
	}

	/**
A typical authentication process using CWebUser is as follows:
1.The user provides information needed for authentication.
2.An identity instance is created with the user-provided information.
3.Call IUserIdentity::authenticate to check if the identity is valid.
4.If valid, call CWebUser::login to login the user, and Redirect the user browser to returnUrl.
5.If not valid, retrieve the error code or message from the identity instance and display it.
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
                        //logowanie przez cookies jak długo ma 'pamietaj mnie'
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
                        //ustawienie tego 'pamietania' 
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
