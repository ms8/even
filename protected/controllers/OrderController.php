<?php

class OrderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create'),//下订单不需要用户登录
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
                'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $result="";
        $order = new Order();
        $username=null;
        $info = $_POST['info'];
        $fid = $_POST['fid'];
        if(!Yii::app()->user->isGuest){
            //更新用户的手机号码和地址
            $user = User::model()->findByPk(Yii::app()->user->id);
            $username = $user->username;
            $user->telephone = $info['phone'];
            $user->address = $info['address'];
            $user->save();
        }
        $products = $_POST['products'];
        $transaction = Yii::app()->db->beginTransaction();

        $order->fid = $fid;
        $order->customername = $info['name'];
        $order->username = $username;
        $order->telephone = $info['phone'];
        $order->address = $info['address'];
        $order->status = '2';
        $order->createtime = date("Y-m-d H:i:s");
        //订单总额
        $order->totalprice = $_POST['totalPrice'];
        try{
            if($order->save()){
                foreach($products as $product){
                    $orderdetail = new OrderList();
                    $orderdetail->fid = $fid;
                    $orderdetail->name = $product['Name'];
                    $orderdetail->orderid = $order->id;
                    $orderdetail->productid = $product['No'];
                    $orderdetail->quantity = $product['Quantity'];
                    $orderdetail->price = $product['Price'];
                    $orderdetail->totalprice = $product['total'];
                    $orderdetail->pic = $product['Pic'];
                    if(!$orderdetail->save()){
                        throw new ExceptionClass("fail");
                    }
                }
                $result = json_encode(array("result"=>"ok",'orderId'=>$order->id));
            }else{
                $result = json_encode(array("result"=>"fail"));
            }
            $transaction->commit(); //提交事务会真正的执行数据库操作
        }catch (Exception $e){
            $result = json_encode(array("result"=>"fail"));
            $transaction->rollback(); //如果操作失败, 数据回滚
        }
        echo $result;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Order');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
