<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    public function getId()
    {
        return $this->_id;
    }

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $userManagement = new UserManagement();
        $user = new User();
        $user->username=$this->username;
        $user->password=$this->password;

//        if(!$userManagement->authenticate($user))
//            $this->errorCode=self::ERROR_PASSWORD_INVALID;
//        else
//            $this->errorCode=self::ERROR_NONE;
        $record = User::model()->findByAttributes(array('username' => $user->username));

        if($record == null){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else if($record->password === crypt($user->password, $record->password)){
            //用户输入的密码与数据库中的密码运算，如果输入的密码正确，运算结果依然是数据库中的密码
            $this->errorCode=self::ERROR_NONE;
            $this->_id = $record->id;
        }else{
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        return !$this->errorCode;
	}
}