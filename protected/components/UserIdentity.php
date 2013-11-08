<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 *
	*public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/
    
    /*
     * Autenticación de usuarios con base de datos
     */
    public function authenticate(){

	$usuario = EMPLEADOS::model()->findByAttributes(array('DNI'=>$this->username));		
	if ($usuario===null) { //Usuario no existe
		$this->errorCode=self::ERROR_USERNAME_INVALID;
	} else if (trim($usuario->Password) !== SHA1($this->password) ) { //Contraseña invalida
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
	} else { // Credenciales correctas						
		$this->setState('EMPLEADOS', $usuario->DNI);			
		$this->errorCode=self::ERROR_NONE;
	}
	return !$this->errorCode;
}
}