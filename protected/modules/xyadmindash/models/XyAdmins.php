<?php

/**
 * This is the model class for table "xy_admins".
 *
 * The followings are the available columns in table 'xy_admins':
 * @property string $id
 * @property string $username
 * @property string $realname
 * @property string $password
 * @property string $telephone
 * @property string $orgname
 * @property string $schoolname
 * @property string $role_code
 * @property string $role_name
 * @property string $createtime
 * @property string $updatetime
 */
class XyAdmins extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'xy_admins';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, role_code, createtime', 'required'),
			array('username, realname, password, orgname, schoolname', 'length', 'max'=>100),
			array('telephone, role_code', 'length', 'max'=>50),
			array('role_name', 'length', 'max'=>200),
			array('updatetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, realname, password, telephone, orgname, schoolname, role_code, role_name, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'username' => '登录名',
			'realname' => '真实姓名',
			'password' => '登录密码',
			'telephone' => '手机号码',
			'orgname' => '学校名称',
			'schoolname' => '学院名称',
			'role_code' => 'Role Code',
			'role_name' => '角色名称',
			'createtime' => '注册时间',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('orgname',$this->orgname,true);
		$criteria->compare('schoolname',$this->schoolname,true);
		$criteria->compare('role_code',$this->role_code,true);
		$criteria->compare('role_name',$this->role_name,true);
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
	 * @return XyAdmins the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
