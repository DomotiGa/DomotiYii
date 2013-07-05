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
	 * @return boolean whether authentication succeeds.
	 */
public function authenticate()
{
       	$username = $this->username;
        $user = Users::model()->find('username=?', array($username));
        if($user === NULL)
                $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($user->validatePassword($this->password, $this->username))
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else{
                $this->username = $user->username;
                $this->errorCode=self::ERROR_NONE;

        }
        return !$this->errorCode;
}

}
