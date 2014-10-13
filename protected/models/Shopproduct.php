<?php

/**
 * This is the model class for table "shopproduct".
 *
 * The followings are the available columns in table 'shopproduct':
 * @property string $id
 * @property string $fid
 * @property string $fshopname
 * @property string $pid
 * @property string $pname
 * @property string $productpic
 * @property double $productprice
 * @property string $pdescripction
 * @property string $typecode
 * @property string $typename
 * @property string $createtime
 */
class Shopproduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shopproduct';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, createtime', 'required'),
			array('productprice', 'numerical'),
			array('fid, pid', 'length', 'max'=>20),
			array('fshopname, pname, typename', 'length', 'max'=>100),
			array('productpic', 'length', 'max'=>500),
			array('pdescripction', 'length', 'max'=>1000),
			array('typecode', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fid, fshopname, pid, pname, productpic, productprice, pdescripction, typecode, typename, createtime', 'safe', 'on'=>'search'),
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
            'fshopname' => 'Fshopname',
            'pid' => 'Pid',
            'pname' => 'Pname',
            'productpic' => 'Productpic',
            'productprice' => 'Productprice',
            'pdescripction' => 'Pdescripction',
            'typecode' => 'Typecode',
            'typename' => 'Typename',
            'createtime' => 'Createtime',
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
        $criteria->compare('fshopname',$this->fshopname,true);
        $criteria->compare('pid',$this->pid,true);
        $criteria->compare('pname',$this->pname,true);
        $criteria->compare('productpic',$this->productpic,true);
        $criteria->compare('productprice',$this->productprice);
        $criteria->compare('pdescripction',$this->pdescripction,true);
        $criteria->compare('typecode',$this->typecode,true);
        $criteria->compare('typename',$this->typename,true);
        $criteria->compare('createtime',$this->createtime,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Shopproduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
