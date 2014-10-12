<?php

class FranchiseesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='application.modules.shop.views.layouts.column2';

    public $f_id;

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
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

    public function actionGetuniversity(){
        $unis = University::model()->findAll();
        $universitys = array();
        foreach ($unis as $p ){
            $tmp=new University;
            $tmp->id = $p['id'];
            $tmp->code = $p['code'];
            $tmp->name = $p['name'];
            $universitys[] = $tmp;
        }
        $json_str = CJSON::encode($universitys);
        echo $json_str;
    }

    public function actionGetservices(){
        $university_id = $_POST['uid'];
        $ss = Service::model()->findAllByAttributes(array('uid'=>$university_id));
        $services = array();
        foreach ($ss as $p ){
            $tmp=new Service();
            $tmp->id = $p['id'];
            $tmp->code = $p['code'];
            $tmp->name = $p['name'];
            $tmp->uid = $university_id;
            $services[] = $tmp;
        }
        $json_str = CJSON::encode($services);
        echo $json_str;
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model = $this->loadModel($id);
        if(!isset($_SESSION['franchisee_user'])){
            return;
        }
        if($model->logopic == null){
            $model->logopic = "";
        }
        if($model->studentid == null){
            $model->studentid = "";
        }
        if($model->studentpic == null){
            $model->studentpic = "";
        }
        if($model->dormitory == null){
            $model->dormitory = "";
        }
        if($model->updatetime == null){
            $model->updatetime = "";
        }
        if($model->status == Franchisees::NONE_PASS){
            $model->status = "未审核";
        }else if($model->status == Franchisees::PASS){
            $model->status = "审核通过";
        }
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Franchisees;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $msg="";
		if(isset($_POST['Franchisees']))
		{
            $picCreate = new PicCreate();
            $picPath = $picCreate->createPic('idcard_pic','upload/franchisees/'
                ,1024*1024,array('.jpg','.jpeg','.png','gif'));
            if($picPath == ""){
                $msg = "保存图片失败";
            }else{
                $model->status = '0';
                $model->createtime = date("Y-m-d H:i:s");
                $model->idcardpic = $picPath;
                $model->attributes=$_POST['Franchisees'];
                $um = new UserManagement();
                $um->cryptPwd($model);
                if($model->save()){
                    $_SESSION['franchisee_user'] = $model->id;
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
		}

		$this->render('create',array(
			'model'=>$model,
            'info'=>$msg
		));
	}

    public function actionChangePwd($id){
        if(isset($_POST['Franchisees']))
        {
            $model= Franchisees::model()->findByPk($id);
            $model->updatetime = date("Y-m-d H:i:s");
            $model->attributes=$_POST['Franchisees'];
        }

        $this->render('password',array('id'=>$id));
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

		if(isset($_POST['Franchisees']))
		{
			$model->attributes=$_POST['Franchisees'];
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
		$dataProvider=new CActiveDataProvider('Franchisees');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Franchisees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Franchisees']))
			$model->attributes=$_GET['Franchisees'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Franchisees the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Franchisees::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Franchisees $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='franchisees-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionLogin()
    {
        $record = new Franchisees();
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $record = Franchisees::model()->findByAttributes(array('loginname' => $username));
            $result = false;
            if($record == null){
                $record = new Franchisees();
            }else if($record->password != crypt($password, $record->password)){
                $record = new Franchisees();
            }else{
                $result = $record->id;
                $_SESSION['franchisee_user'] = $record->id;
            }
            $result = json_encode(array("result"=>$result));

            echo $result;
        }else{
            $this->render('index',array('model'=>$record));
        }
    }

    public function actionLogout(){
        unset($_SESSION['franchisee_user']);
        $this->render('index',array());
    }

    public function actionTofran(){
        /*********************************************************************************/
        $cataTypes = array();
        $types = Yii::app()->db->createCommand()
            ->select('code,value')
            ->from('product_type')
            ->where('isparent=1 and (parent_code is null or parent_code=\'\')')
            ->queryAll();
        foreach ($types as $type ){
            $tmp=new ProductType();
            $tmp->code = $type['code'];
            $tmp->value = $type['value'];
            $cataTypes[] = $tmp;
        }
        /*********************************************************************************/
        $id = $_GET['id'];
        $this->f_id = $id;
        $model = $this->loadModel($id);
        $this->render('index_shop',array(
            'cataTypes'=>$cataTypes,
            'model'=>$model,
        ));
    }

    public function actionSnap(){
        /*********************************************************************************/
        $cataTypes = array();
        $types = Yii::app()->db->createCommand()
            ->select('code,value')
            ->from('product_type')
            ->where('isparent=1 and (parent_code is null or parent_code=\'\')')
            ->queryAll();
        foreach ($types as $type ){
            $tmp=new ProductType();
            $tmp->code = $type['code'];
            $tmp->value = $type['value'];
            $cataTypes[] = $tmp;
        }
        /*********************************************************************************/
        $id = $_GET['id'];
        $model = $this->loadModel($id);
        $this->render('index_snap',array(
            'cataTypes'=>$cataTypes,
            'model'=>$model,
        ));
    }

    public function actionToshop(){
        $result="";

        if(!isset($_SESSION['franchisee_user'])){
            return;
        }else{
            $fid = $_SESSION['franchisee_user'];
            $products = $_POST['products'];
            $user = Franchisees::model()->findByPk($fid);
            //先删除该商品
            if($_POST['delproduct']!='0'){
                $delproduct = $_POST['delproduct'];
                for($i=0;$i<count($delproduct);$i++){
                    Shopproduct::model()->deleteAllByAttributes(array('fid'=>$user->id,
                        'pid'=>$delproduct[$i]));
                }
            }

            foreach($products as $product){
                $shopproduct = new Shopproduct();
                $shopproduct->fid = $user->id;
                $shopproduct->fshopname= $user->shopname;
                $shopproduct->pid = $product['No'];
                $shopproduct->pname = $product['Name'];
                $shopproduct->productpic = $product['Pic'];
                $shopproduct->productprice = $product['Price'];
                $shopproduct->typecode = $product['type'];
                $shopproduct->createtime = date("Y-m-d H:i:s");
                if(!$shopproduct->save()){
                    $result = json_encode(array("result"=>"false"));
                }else{
                    $result = json_encode(array("result"=>"true"));
                }
            }
            //删除该商户在shop_product_type表中的类型，然后再统一插入全部新类型
            ShopProductType::model()->deleteAllByAttributes(array('fid'=>$user->id));
            //查询所有商品类型
            $sql_do="select distinct typecode,typename from shopproduct where fid= ".$user->id;
            $types=Yii::app()->db->createCommand($sql_do)->query();
            //统一插入全部新类型
            foreach ($types as $type ){
                $tmp=new ShopProductType();
                $tmp->fid = $user->id;
                $tmp->code = $type['typecode'];
                $tmp->name = $type['typename'];
                $tmp->save();
            }
        }
        echo $result;
    }

    public function actionListIndex(){
        $page = $_POST['page'];
        $type = $_POST['type'];
        $products = array();
        $sql_do="select product.id,product.name,price,pic from product,product_type pa,product_type pb "
            ." where pa.code=product.main_type and pb.code=pa.parent_code and status='1' and pb.code=:type "
            ." LIMIT :offset,:limit";

        $result=Yii::app()->db->createCommand($sql_do);
        $result->bindValue(':type', $type);
        $result->bindValue(':offset', ($page-1)*8);
        $result->bindValue(':limit', 8);
        $ps=$result->query();
        /*********************取该销售商所有已上架的物品**********************/
        $shop_products = Shopproduct::model()->findAllByAttributes(array('fid'=>$_SESSION['franchisee_user']));
        $product_map = array();
        foreach ($shop_products as $shop_product ){
            //保存改销售商所有已经上架的商品
            $product_map[$shop_product->pid]=1;
        }
        /*******************************************************************/
        foreach ($ps as $p ){
            $tmp=new Product;
            $tmp->id = $p['id'];
            $tmp->name = $p['name'];
            $tmp->price = $p['price'];
            $tmp->pic = $p['pic'];
            $tmp->status = '1';
            //复用status字段，如果为1则视为在销售商中已经上架,0视为未上架
            if(!isset($product_map[$tmp->id])){
                $tmp->status = '0';
            }
            $products[] = $tmp;
        }
        $json_str = CJSON::encode($products);
        echo $json_str;
        /*********************************************************************************/
    }
}
