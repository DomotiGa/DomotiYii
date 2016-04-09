<?php

/**
 * This is the model class for table "sslcertificates".
 *
 * The followings are the available columns in table 'sslcertificates':
 * @property string $id
 * @property string $name
 * @property string $certificate
 * @property string $private
 * @property string $client
 * @property string $description
 */
class Sslcertificates extends CActiveRecord
{

	/**
	 * @return dropdownlist with the list of devices (used in temperaturenu, bwired, pachube devices)
	 */
	public static function getSSLCertificates() {
		return CHtml::listData(Sslcertificates::model()->findAll(array('order' => 'name ASC')), 'id', 'name');
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sslcertificates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>64),
			array('certificate, private, client', 'length', 'max'=>128),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, certificate, private, client, description', 'safe', 'on'=>'search'),
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
			'certificate' => 'Certificate',
			'private' => 'Private',
			'client' => 'Client',
			'description' => 'Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('certificate',$this->certificate,true);
		$criteria->compare('private',$this->private,true);
		$criteria->compare('client',$this->client,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sslcertificates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
