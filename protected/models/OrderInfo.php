<?php

/**
 * This is the model class for table "order_info".
 *
 * The followings are the available columns in table 'order_info':
 * @property string $id
 * @property string $fid
 * @property string $customername
 * @property string $username
 * @property string $telephone
 * @property string $address
 * @property double $totalprice
 * @property string $status
 * @property string $append
 * @property string $recievetime
 * @property string $createtime
 * @property string $updatetime
 */
class OrderInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fid, customername, telephone, address, totalprice, status, createtime', 'required'),
			array('totalprice', 'numerical'),
			array('fid', 'length', 'max'=>20),
			array('customername, username', 'length', 'max'=>100),
			array('telephone', 'length', 'max'=>50),
			array('address, append', 'length', 'max'=>1000),
			array('status', 'length', 'max'=>2),
			array('recievetime, updatetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fid, customername, username, telephone, address, totalprice, status, append, recievetime, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'fid' => 'Fid',
			'customername' => 'Customername',
			'username' => 'Username',
			'telephone' => 'Telephone',
			'address' => 'Address',
			'totalprice' => 'Totalprice',
			'status' => 'Status',
			'append' => 'Append',
			'recievetime' => 'Recievetime',
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
		$criteria->compare('fid',$this->fid,true);
		$criteria->compare('customername',$this->customername,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('totalprice',$this->totalprice);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('append',$this->append,true);
		$criteria->compare('recievetime',$this->recievetime,true);
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
	 * @return OrderInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
