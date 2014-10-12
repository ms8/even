<?php

/**
 * This is the model class for table "franchisees".
 *
 * The followings are the available columns in table 'franchisees':
 * @property string $id
 * @property string $loginname
 * @property string $password
 * @property string $phone
 * @property string $shopname
 * @property string $logopic
 * @property string $idcard
 * @property string $studentid
 * @property string $idcardpic
 * @property string $studentpic
 * @property string $university
 * @property string $universirycode
 * @property string $studentname
 * @property string $servicecode
 * @property string $serviceaddress
 * @property string $dormitory
 * @property string $status
 * @property string $createtime
 * @property string $updatetime
 */
class Franchisees extends CActiveRecord
{
    const NONE_PASS='0';
    const PASS='1';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'franchisees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('loginname, password, phone, shopname, idcard, universirycode, studentname, servicecode', 'required'),
			array('loginname, password, shopname, idcard, studentid, university, serviceaddress', 'length', 'max'=>100),
			array('phone, dormitory', 'length', 'max'=>20),
			array('logopic, idcardpic, studentpic', 'length', 'max'=>1000),
			array('universirycode, studentname, servicecode', 'length', 'max'=>50),
			array('status', 'length', 'max'=>10),
			array('updatetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, loginname, password, phone, shopname, logopic, idcard, studentid, idcardpic, studentpic, university, universirycode, studentname, servicecode, serviceaddress, dormitory, status, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'loginname' => '登录用户名',
			'password' => '登录密码',
			'phone' => '手机号码',
			'shopname' => '店铺名称',
			'logopic' => '店铺logo',
			'idcard' => '身份证号码',
			'studentid' => '学生证号码',
			'idcardpic' => '身份证扫描件',
			'studentpic' => '学生证扫描件',
			'university' => '学校名字',
			'universirycode' => 'Universirycode',
			'studentname' => '真实姓名',
			'servicecode' => 'Servicecode',
			'serviceaddress' => 'Serviceaddress',
			'dormitory' => '宿舍号',
			'status' => '状态',
			'createtime' => '创建时间',
			'updatetime' => '更新时间',
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
		$criteria->compare('loginname',$this->loginname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('shopname',$this->shopname,true);
		$criteria->compare('logopic',$this->logopic,true);
		$criteria->compare('idcard',$this->idcard,true);
		$criteria->compare('studentid',$this->studentid,true);
		$criteria->compare('idcardpic',$this->idcardpic,true);
		$criteria->compare('studentpic',$this->studentpic,true);
		$criteria->compare('university',$this->university,true);
		$criteria->compare('universirycode',$this->universirycode,true);
		$criteria->compare('studentname',$this->studentname,true);
		$criteria->compare('servicecode',$this->servicecode,true);
		$criteria->compare('serviceaddress',$this->serviceaddress,true);
		$criteria->compare('dormitory',$this->dormitory,true);
		$criteria->compare('status',$this->status,true);
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
	 * @return Franchisees the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
