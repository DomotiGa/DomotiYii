<?php

/**
 * This is the model class for table "contacts".
 *
 * The followings are the available columns in table 'contacts':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $zipcode
 * @property string $city
 * @property string $country
 * @property string $phoneno
 * @property string $mobileno
 * @property string $email
 * @property string $cidphone
 * @property string $cidmobile
 * @property string $birthday
 * @property boolean $holidaycard
 * @property string $comments
 * @property string $firstname
 * @property string $surname
 * @property integer $callnr
 * @property integer $type
 * @property string $firstseen
 * @property string $lastseen
 */
class Contacts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contacts the static model class
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
		return 'contacts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('callnr, type', 'numerical', 'integerOnly'=>true),
			array('name, address, city, country, phoneno, mobileno, email, cidphone, cidmobile, firstname, surname', 'length', 'max'=>32),
			array('zipcode', 'length', 'max'=>11),
			array('birthday, holidaycard, comments, firstseen, lastseen', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, zipcode, city, country, phoneno, mobileno, email, cidphone, cidmobile, birthday, holidaycard, comments, firstname, surname, callnr, type, firstseen, lastseen', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'address' => 'Address',
			'zipcode' => 'Zipcode',
			'city' => 'City',
			'country' => 'Country',
			'phoneno' => 'Phoneno',
			'mobileno' => 'Mobileno',
			'email' => 'Email',
			'cidphone' => 'Cidphone',
			'cidmobile' => 'Cidmobile',
			'birthday' => 'Birthday',
			'holidaycard' => 'Holidaycard',
			'comments' => 'Comments',
			'firstname' => 'Firstname',
			'surname' => 'Surname',
			'callnr' => 'Callnr',
			'type' => 'Type',
			'firstseen' => 'Firstseen',
			'lastseen' => 'Lastseen',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('phoneno',$this->phoneno,true);
		$criteria->compare('mobileno',$this->mobileno,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cidphone',$this->cidphone,true);
		$criteria->compare('cidmobile',$this->cidmobile,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('holidaycard',$this->holidaycard);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('callnr',$this->callnr);
		$criteria->compare('type',$this->type);
		$criteria->compare('firstseen',$this->firstseen,true);
		$criteria->compare('lastseen',$this->lastseen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}