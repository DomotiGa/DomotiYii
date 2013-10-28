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
	/**
	 * @return boolean validate user
	 */
	public function validatePassword($password)
	{
		if (strlen($this->password) < 11)
		{
			if($password == $this->password)
			{
				return true;
			} else {
				return false;
			}
		}
		return $this->hashPassword($password, substr($this->password, 3, 8)) == $this->password;
	}

	/**
	 * @return hashed value
	 */

	public function hashPassword($phrase, $salt)
	{
		$md5 = crypt($phrase, "\$1\$" . $salt . "\$");
		$md5 = substr($md5, (22*-1));
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
			array('username, fullname, lastlogin, emailaddress', 'length', 'max'=>32),
			array('password', 'length', 'max'=>64),
			array('comments', 'safe'),
			array('username', 'required'),
			array('admin', 'boolean', 'trueValue'=>-1),
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
			'password' => Yii::t('app','Password'),
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
