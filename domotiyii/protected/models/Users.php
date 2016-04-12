<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property integer $admin
 * @property string $comments
 * @property string $lastlogin
 * @property string $emailaddress
 */
class Users extends CActiveRecord
{
	//will hold the encrypted password for update actions.
	public $initialpassword;

	// holds the password confirmation word
	public $repeatpassword;
 
	public function afterFind()
	{
		//reset the password to null because we don't want the hash to be shown.
		$this->initialpassword = null;
		$this->repeatpassword = null;
 
		parent::afterFind();
	}

	public function afterSave()
	{
		//reset the password to null because we don't want the hash to be shown.
		$this->initialpassword = null;
		$this->repeatpassword = null;
 
		parent::afterSave();
	}

	public function beforeSave()
	{
	// in this case, we will use the old hashed password.
		if(empty($this->initialpassword) && empty($this->repeatpassword) && !empty($this->password))
		{
			// do nothing
		} else {
			// Hash the new password
			$this->password=$this->hashPassword($this->initialpassword);
		}

		return parent::beforeSave();
	}

	/**
	 * @return boolean validate user
	 */
	public function validatePassword($password)
	{
		if ( strpos($this->password, "MD5") === 0 ) {
			// hash length = 8, total length = 33
			if ( strlen($this->password) <> 33 ) return false;
			$salt = substr($this->password, 3, 8);
			$encrypt = crypt($password, "\$1\$" . $salt . "\$");
			$encrypt = "MD5" . $salt . substr($encrypt, (22*-1));
		} elseif ( strpos($this->password, "SHA256") === 0 ) {
			// hash length = 13, total length= 62
			if ( strlen($this->password) <> 62 ) return false;
			$salt = substr($this->password, 6, 13);
			$encrypt = crypt($password, "\$5\$" . $salt . "\$");
			$encrypt = "SHA256" . $salt . substr($encrypt, (43*-1));
		} elseif ( strpos($this->password, "SHA512") === 0 ) {
			// hash length = 13, total length = 105
			if ( strlen($this->password) <> 105 ) return false;
			$salt = substr($this->password, 6, 13);
			$encrypt = crypt($password, "\$6\$" . $salt . "\$");
			$encrypt = "SHA512" . $salt . substr($encrypt, (86*-1));
		} else {
			return false;
		}

		return $encrypt == $this->password;
	}

	/**
	 * @return hashed value
	 */

	public function hashPassword($phrase, $type = "SHA256")
	{

		if ( $type === "MD5" ) {
			$salt = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz./", 8)), 0, 8);
			$encrypt = crypt($phrase, "\$1\$" . $salt . "\$");
			return "MD5" . $salt . substr($encrypt, (22*-1));
		} elseif ( $type === "SHA256" ) { 
			$salt = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz./", 13)), 0, 13);
			$encrypt = crypt($phrase, "\$5\$" . $salt . "\$");
			return "SHA256" . $salt . substr($encrypt, (43*-1));
		} elseif ( $type === "SHA512" ) { 
			$salt = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz./", 13)), 0, 13);
			$encrypt = crypt($phrase, "\$6\$" . $salt . "\$");
			return "SHA512" . $salt . substr($encrypt, (86*-1));
		} else {
			return "";
		}

	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, fullname, lastlogin, emailaddress', 'length', 'max'=>32),
			array('initialpassword, repeatpassword', 'required', 'on'=>'insert'),
			array('initialpassword, repeatpassword', 'length', 'min'=>6, 'max'=>64),
			array('initialpassword', 'compare', 'compareAttribute'=>'repeatpassword'),
			array('comments', 'safe'),
			array('username', 'required'),
			array('admin', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, fullname, admin, comments, lastlogin, emailaddress', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => Yii::t('app','Username'),
			'initialpassword' => Yii::t('app','Password'),
			'repeatpassword' => 'Repeat Password',
			'fullname' => Yii::t('app','Fullname'),
			'admin' => Yii::t('app','Admin'),
			'comments' => Yii::t('app','Comments'),
			'lastlogin' => Yii::t('app','Lastlogin'),
			'emailaddress' => Yii::t('app','Emailaddress'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('admin',$this->admin);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('lastlogin',$this->lastlogin,true);
		$criteria->compare('emailaddress',$this->emailaddress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                'pageSize'=>Yii::app()->params['pagesizeUsers'],
                                'pageVar'=>'page'
                        ),
		));
	}
}
