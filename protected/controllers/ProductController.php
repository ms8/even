<?php

class ProductController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

    public $f_id="";

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
				'actions'=>array('index','view','cart','typelist','typeview','orderDetail','toOrder'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
     * 获取产品分类
     */
    private function getShopProductType($fid){
        $model = $this->loadModel($fid);
        if($model == null)
            return null;
        //先取该商户货架中的商品种类列表
        $sql_do="select code,value from shop_product_type "
            ." where fid=".$model->id;
        $shop_product_type=Yii::app()->db->createCommand($sql_do)->query();
        $sql_condition="";
        foreach($shop_product_type as $type){
            $sql_condition = $sql_condition.$type['code'].",";
        }
        $sql_condition=substr($sql_condition,0,strlen($sql_condition)-1);
        if($sql_condition == false)
            return null;
        $sql_do="select parent_code,code,value from product_type "
            ." where isparent=1 and code in(".$sql_condition.")";
        $ps=Yii::app()->db->createCommand($sql_do)->query();

        //顶级分类
        $topType=array();
        $topTypeArr = array();
        foreach ($ps as $p ){
            $tmp=new ProductType();
            //顶级分类
            if($p['parent_code'] == null || $p['parent_code']==''){
                $mainType = $p['code'];
                $topType[$mainType] = array();
                $tmp->code = $p['code'];
                $tmp->value = $p['value'];
                $topTypeArr[]=$tmp;
            }else{
                //取顶级分类的类型
                $mainType = $p['parent_code'];
                //子分类
                if (array_key_exists($mainType,$topType)){
                    $arr = $topType[$mainType];
                    $tmp->code = $p['code'];
                    $tmp->value = $p['value'];
                    $arr[] = $tmp;
                    $topType[$mainType] = $arr;
                }
            }
        }
        $resultArr = array();
        $resultArr['topType']=$topType;
        $resultArr['topTypeArr']=$topTypeArr;
        return $resultArr;
    }

    /**
     * 获取产品分类
     */
    private function getProductType(){
        $sql_do="select parent_code,code,value from product_type "
            ." where isparent=1 ";
        $ps=Yii::app()->db->createCommand($sql_do)->query();

        //顶级分类
        $topType=array();
        $topTypeArr = array();
        foreach ($ps as $p ){
            $tmp=new ProductType();
            //顶级分类
            if($p['parent_code'] == null || $p['parent_code']==''){
                $mainType = $p['code'];
                $topType[$mainType] = array();
                $tmp->code = $p['code'];
                $tmp->value = $p['value'];
                $topTypeArr[]=$tmp;
            }else{
                //取顶级分类的类型
                $mainType = $p['parent_code'];
                //子分类
                if (array_key_exists($mainType,$topType)){
                    $arr = $topType[$mainType];
                    $tmp->code = $p['code'];
                    $tmp->value = $p['value'];
                    $arr[] = $tmp;
                    $topType[$mainType] = $arr;
                }
            }
        }
        $resultArr = array();
        $resultArr['topType']=$topType;
        $resultArr['topTypeArr']=$topTypeArr;
        return $resultArr;
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        /************************获取分类****************************/
       // $resultArr = $this->getProductType();
        $fid = $_GET['fid'];
        $resultArr = $this->getShopProductType($fid);
        if($resultArr == null){
            $topType=array();
            $topTypeArr=array();
        }else{
            $topType=$resultArr['topType'];
            $topTypeArr=$resultArr['topTypeArr'];
        }
        //***********************************************************
        $product_pic=ProductPic::model()->findAllByAttributes(array('productid'=>$id));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'product_pic'=>$product_pic,
            'topType'=>$topType,
            'topTypeArr'=>$topTypeArr,
		));
	}

    public function actionTypelist(){
        /*********************************************************************************/
        $sql_do="select parent_code,code,value from product_type "
            ." where isparent=1 ";

        $ps=Yii::app()->db->createCommand($sql_do)->query();
        //******************************************
        //顶级分类
        $topType=array();
        $topTypeArr = array();
        foreach ($ps as $p ){
            $tmp=new ProductType();
            //顶级分类
            if($p['parent_code'] == null || $p['parent_code']==''){
                $mainType = $p['code'];
                $topType[$mainType] = array();
                $tmp->code = $p['code'];
                $tmp->value = $p['value'];
                $topTypeArr[]=$tmp;
            }else{
                //取顶级分类的类型
                $mainType = $p['parent_code'];
                if (array_key_exists($mainType,$topType)){
                    $arr = $topType[$mainType];
                    $tmp->code = $p['code'];
                    $tmp->value = $p['value'];
                    $arr[] = $tmp;
                    $topType[$mainType] = $arr;
                }
            }
        }
        $json_str = CJSON::encode($topType);
        echo $json_str;
        /*********************************************************************************/
    }

    private function getProducts($type,$page,$limit){
        $sql_do="status='1' and main_type=:type LIMIT :offset,:limit";

        $result=Product::model()->findAll($sql_do,
            array(":type"=>$type,':offset'=>($page-1)*$limit,':limit'=>$limit));
//        $result->bindValue(':type', $type);
//        $result->bindValue(':offset', ($page-1)*$limit);
//        $result->bindValue(':limit', $limit);
//        $ps=$result->query();
        return $result;
    }

    /**
     * 获得订单详细信息
     * @param $id 订单id
     */
    public function actionOrderDetail($id){
        /************************获取分类****************************/
        //$resultArr = $this->getProductType();
        $fid = $_GET['fid'];
        $resultArr = $this->getShopProductType($fid);
        if($resultArr == null){
            $topType=array();
            $topTypeArr=array();
        }else{
            $topType=$resultArr['topType'];
            $topTypeArr=$resultArr['topTypeArr'];
        }
        //***********************************************************
        //取得订单详细信息
        $order = Order::model()->findByPk($id);
        $orderlist = OrderList::model()->findAll("orderid=:orderid",array(":orderid"=>$id));
        $this->render('orderlist',array(
            'order'=>$order,
            'orderlist'=>$orderlist,
            'topType'=>$topType,
            'topTypeArr'=>$topTypeArr,
        ));
    }

    public function actionToOrder(){
        $fid = $_GET['fid'];
        $franchisee = Franchisees::model()->findByPk($fid);
        /************************获取分类****************************/
        //$resultArr = $this->getProductType();
        $fid = $_GET['fid'];
        $resultArr = $this->getShopProductType($fid);
        if($resultArr == null){
            $topType=array();
            $topTypeArr=array();
        }else{
            $topType=$resultArr['topType'];
            $topTypeArr=$resultArr['topTypeArr'];
        }
        //***********************************************************
        if(Yii::app()->user->isGuest){ //未登录用户引导至地址填写和登录及注册页面
            $this->render('orderguest',array(
                'topType'=>$topType,
                'topTypeArr'=>$topTypeArr,
                'fid'=>$fid,
                'university'=>$franchisee->university,
                'serviceaddress'=>$franchisee->serviceaddress
            ));
        }else{
            $id = Yii::app()->user->id;
            $user = User::model()->findByPk($id);
            $this->render('order',array(
                'user'=>$user,
                'topType'=>$topType,
                'topTypeArr'=>$topTypeArr,
                'fid'=>$fid,
                'university'=>$franchisee->university,
                'serviceaddress'=>$franchisee->serviceaddress
            ));
        }
    }

    public function actionTypeview($type){
        //第一次进入页面时取前9条数据
        $products = $this->getProducts($type,1,9);

        /************************获取分类****************************/
        $resultArr = $this->getProductType();
        $topType=$resultArr['topType'];
        $topTypeArr=$resultArr['topTypeArr'];
        //***********************************************************
        $this->render('typeview',array(
            'products'=>$products,
            'topType'=>$topType,
            'topTypeArr'=>$topTypeArr,
            'mainType'=>$type
        ));
    }

    public function actionCart()
    {
        $this->f_id = $_GET['fid'];
        //$resultArr = $this->getProductType();
        $resultArr = $this->getShopProductType($this->f_id);
        if($resultArr == null){
            $topType=array();
            $topTypeArr=array();
        }else{
            $topType=$resultArr['topType'];
            $topTypeArr=$resultArr['topTypeArr'];
        }
        $this->render('cart',array('topType'=>$topType,'topTypeArr'=>$topTypeArr));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Product;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
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
		$dataProvider=new CActiveDataProvider('Product');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
