<?php

/**
 * This is the model class for table "cdr".
 *
 * The followings are the available columns in table 'cdr':
 * @property string $calldate
 * @property string $clid
 * @property string $src
 * @property string $dst
 * @property string $dcontext
 * @property string $channel
 * @property string $dstchannel
 * @property string $lastapp
 * @property string $lastdata
 * @property integer $duration
 * @property integer $billsec
 * @property string $disposition
 * @property integer $amaflags
 * @property string $accountcode
 * @property string $userfield
 * @property string $uniqueid
 * @property string $id
 */
class Cdr extends CActiveRecord
{
	/**
	 * @return string the name stored for number specified from contacts data
	 */
	public function getCallerName($data) {

		$number = "%".$this->getFromTo($data);

		$result = Yii::app()->db->createCommand()
		->select('cidphone, name')
		->from('contacts')
		->where('phoneno LIKE :substr', array(':substr' => $number))
		->queryRow();
		//var_dump($result);

		if (strlen($result['cidphone'])) {
			$caller = $result['cidphone'];
		} else {
			$caller = $result['name'];
		}

		$result = Yii::app()->db->createCommand()
		->select('cidmobile, name')
		->from('contacts')
		->where('mobileno LIKE :substr', array(':substr' => $number))
		->queryRow();

		if ($result == false) { return $caller; }

		if (strlen($result['cidmobile'])) {
			$caller = $result['cidmobile'];
		} else {
			$caller = $result['name'];
		}
		return $caller;
	}

	/**
	 * @return string the correct call type (Outgoing or Incoming)
	 */
	public function getDirection($dcontext) {
		if ($dcontext == 'default') {
			return Yii::t('translate','Outgoing');
		}
		return Yii::t('translate','Incoming');
	}

	/**
	 * @return string the phonenumber to process (calling or called)
	 */
	public function getFromTo($data) {
		if ($data->dcontext == 'default') {
			return $data->dst;
		}
		return $data->src;
	}

	/**
	 * @return string the call duration in 00:01:02 notation
	 */
	public function getDuration($dur) {
		return sprintf("%02d%s%02d%s%02d", floor($dur/3600), ":", ($dur/60)%60, ":", $dur%60);
	}

	/**
	 * @return string the time of call with date today removed
	 */
	public function getTime($time) {
		return str_replace(date("Y-m-d "), '', $time);
	}

	/**
	 * @return string the status with translated status
	 */
	public function getStatus($status, $duration) {
		if ($status == "ANSWERED") {
			if ($duration == '0') {
				return Yii::t('translate','In Call');
			} else {
				return Yii::t('translate','Answered');
			}
		} elseif ($status == "NO ANSWER") {
			return Yii::t('translate','No Answer');
		} else {
			Yii::t('translate','Unknown');
		}
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cdr the static model class
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
		return 'cdr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('duration, billsec, amaflags', 'numerical', 'integerOnly'=>true),
			array('clid, src, dst, dcontext, channel, dstchannel, lastapp, lastdata', 'length', 'max'=>80),
			array('disposition', 'length', 'max'=>45),
			array('accountcode', 'length', 'max'=>20),
			array('userfield', 'length', 'max'=>255),
			array('uniqueid', 'length', 'max'=>32),
			array('calldate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('calldate, src, dst, dcontext, channel, billsec, disposition, id', 'safe', 'on'=>'search'),
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
			'calldate' => 'Calldate',
			'clid' => 'Clid',
			'src' => 'Src',
			'dst' => 'Dst',
			'dcontext' => 'Dcontext',
			'channel' => 'Channel',
			'dstchannel' => 'Dstchannel',
			'lastapp' => 'Lastapp',
			'lastdata' => 'Lastdata',
			'duration' => 'Duration',
			'billsec' => 'Billsec',
			'disposition' => 'Disposition',
			'amaflags' => 'Amaflags',
			'accountcode' => 'Accountcode',
			'userfield' => 'Userfield',
			'uniqueid' => 'Uniqueid',
			'id' => 'ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($filter)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('calldate',$this->calldate,true);
		$criteria->compare('src',$this->src,true);
		$criteria->compare('dst',$this->dst,true);
		$criteria->compare('dcontext',$this->dcontext,true);
		$criteria->compare('channel',$this->channel,true);
		$criteria->compare('billsec',$this->billsec);
		$criteria->compare('disposition',$this->disposition,true);
		$criteria->compare('id',$this->id,true);

		if ($filter == "noanswer" ) {
			$criteria->addSearchCondition('disposition', "NO ANSWER");
		} elseif ($filter == "incoming") {
			$criteria->addSearchCondition('dcontext', "incoming");
		} elseif ($filter == "outgoing") {
			$criteria->addSearchCondition('dcontext', "default");
		}

		$criteria->order = "calldate desc";
		return new CActiveDataProvider($this, array(
			'pagination' => array(
            		'pageSize'=>Yii::app()->params['pagesizePhonecalls'],
            		'pageVar'=>'page'
        		),
			'criteria'=>$criteria,
		));
	}
}
