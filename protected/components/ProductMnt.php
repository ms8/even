<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 14-10-13
 * Time: 上午10:14
 * To change this template use File | Settings | File Templates.
 */

class ProductMnt {

    /**
     * 根据商家id获取商家所有上架的商品
     * @param $shop_id 商家id
     * @return array 该商家货架上所有商品
     */
    public static function getShopProducts($shop_id){
        $products = Shopproduct::model()->findAllByAttributes(array('fid'=>$shop_id),
            array('order'=>'createtime desc'));
        return $products;
    }

    /**
     * 根据订单编号获取订单详细信息
     * @param $order_id 订单编号
     * @return 订单详细信息
     */
    public static function getOrderInfo($order_id){
        $order = OrderInfo::model()->findByPk($order_id);
        return $order;
    }

    /**
     * 获得某个时间段内该商家的所有订单
     * @param $fid 商家id
     * @param null $beginTime 开始时间
     * @param null $endTime 结束时间
     * @return CActiveDataProvider 返回的类型是yii框架的，便于页面渲染
     */
    public static function getOrders($fid,$beginTime=null,$endTime=null){
        $criteria = new CDbCriteria;
        $sql = "SELECT * FROM order_info where fid=:fid";
        if($beginTime != null){
            $sql = $sql." and createtime>=date(':beginTime')";
        }
        if($endTime != null){
            $sql = $sql." and createtime>=date(':endTime')";
        }
        $model=Yii::app()->db->createCommand($sql);
        $model->bindValue(':fid', $fid);
        $model= $model->queryAll();
        $pages = new CPagination(count($model));
        $pages->pageSize = 10;
        $pages->applylimit($criteria);
        $model=Yii::app()->db->createCommand($sql." order by createtime LIMIT :offset,:limit");
        $model->bindValue(':fid', $fid);
        if($beginTime != null)
            $model->bindValue(':beginTime', $beginTime);
        if($endTime != null)
            $model->bindValue(':endTime', $endTime);
        $model->bindValue(':offset', $pages->currentPage*$pages->pageSize);
        $model->bindValue(':limit', $pages->pageSize);

        $orders=$model->queryAll();
        $array_provider = new CArrayDataProvider($orders, array(
            'keyField'=>'id',   //必须指定一个作为主键
        ));
        return $array_provider;
    }
}