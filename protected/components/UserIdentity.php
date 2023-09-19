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
	 */
    private $_id;
	public function authenticate()
	{
		
            $iduser=$this->username;
            $user=  Pengguna::model()->find('USERNAME=?',array($iduser));
            //var_dump($user);
            //exit;
            if($user ==null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->PASS!=$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
                {
                    $this->_id=$user->IDPENGGUNA;
                    $this->setState('IDGROUPS',$user->IDGROUPS);
                    $this->setState('NAMAGROUPS',$user->iDGROUPS->NAMAGROUPS);
			$this->errorCode=self::ERROR_NONE;
                }
		return !$this->errorCode;
	}
        public function getId (){
        return $this->_id;
        }
}