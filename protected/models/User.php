<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $nickname
 * @property string $realname
 * @property string $password
 * @property string $address
 * @property string $telephone
 * @property string $email
 * @property string $servicecode
 * @property string $serviceaddress
 * @property string $universitycode
 * @property string $university
 * @property string $orgname
 * @property string $schoolname
 * @property string $dorm
 * @property string $introduction
 * @property string $pic
 * @property string $sex
 * @property string $createtime
 * @property string $updatetime
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, createtime', 'required'),
			array('username, nickname, realname, password, email, serviceaddress, university, orgname, schoolname', 'length', 'max'=>100),
			array('address, introduction, pic', 'length', 'max'=>1000),
			array('telephone, servicecode, universitycode, dorm', 'length', 'max'=>50),
			array('sex', 'length', 'max'=>10),
			array('updatetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, nickname, realname, password, address, telephone, email, servicecode, serviceaddress, universitycode, university, orgname, schoolname, dorm, introduction, pic, sex, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'nickname' => 'Nickname',
			'realname' => 'Realname',
			'password' => 'Password',
			'address' => 'Address',
			'telephone' => 'Telephone',
			'email' => 'Email',
			'servicecode' => 'Servicecode',
			'serviceaddress' => 'Serviceaddress',
			'universitycode' => 'Universitycode',
			'university' => 'University',
			'orgname' => 'Orgname',
			'schoolname' => 'Schoolname',
			'dorm' => 'Dorm',
			'introduction' => 'Introduction',
			'pic' => 'Pic',
			'sex' => 'Sex',
			'createtime' => 'Createtime',
			'updatetime' => 'Updatetime',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('servicecode',$this->servicecode,true);
		$criteria->compare('serviceaddress',$this->serviceaddress,true);
		$criteria->compare('universitycode',$this->universitycode,true);
		$criteria->compare('university',$this->university,true);
		$criteria->compare('orgname',$this->orgname,true);
		$criteria->compare('schoolname',$this->schoolname,true);
		$criteria->compare('dorm',$this->dorm,true);
		$criteria->compare('introduction',$this->introduction,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
