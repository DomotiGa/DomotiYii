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
 * @property string $cookie
 */
class Users extends CActiveRecord
{
/**
 * @return boolean validate user
 */
public function validatePassword($password, $username){
        return $this->hashPassword($password, $username) == $this->password;
}
/**
 * @return hashed value
 */
public function hashPassword($phrase, $salt = null){
        $md5 = md5($phrase, true);
        $salt = substr($md5,3,8);
	$md5 = substr($md5,(22*-1));
        return 'MD5' . $salt . $md5;
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
			array('admin', 'numerical', 'integerOnly'=>true),
			array('username, fullname, lastlogin, emailaddress', 'length', 'max'=>32),
			array('password', 'length', 'max'=>30),
			array('cookie', 'length', 'max'=>64),
			array('comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, fullname, admin, comments, lastlogin, emailaddress, cookie', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'fullname' => 'Fullname',
			'admin' => 'Admin',
			'comments' => 'Comments',
			'lastlogin' => 'Lastlogin',
			'emailaddress' => 'Emailaddress',
			'cookie' => 'Cookie',
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
		$criteria->compare('cookie',$this->cookie,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
