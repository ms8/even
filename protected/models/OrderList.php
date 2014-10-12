<?php

/**
 * This is the model class for table "order_list".
 *
 * The followings are the available columns in table 'order_list':
 * @property string $id
 * @property string $fid
 * @property string $orderid
 * @property string $productid
 * @property integer $quantity
 * @property double $price
 * @property string $name
 * @property double $totalprice
 * @property string $pic
 */
class OrderList extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fid, orderid, productid, quantity, name, totalprice', 'required'),
			array('quantity', 'numerical', 'integerOnly'=>true),
			array('price, totalprice', 'numerical'),
			array('fid, orderid, productid', 'length', 'max'=>20),
			array('name', 'length', 'max'=>150),
			array('pic', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fid, orderid, productid, quantity, price, name, totalprice, pic', 'safe', 'on'=>'search'),
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
			'orderid' => 'Orderid',
			'productid' => 'Productid',
			'quantity' => 'Quantity',
			'price' => 'Price',
			'name' => 'Name',
			'totalprice' => 'Totalprice',
			'pic' => 'Pic',
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
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('productid',$this->productid,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('price',$this->price);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('totalprice',$this->totalprice);
		$criteria->compare('pic',$this->pic,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
