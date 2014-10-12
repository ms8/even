<?php

class UserController extends Controller
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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changepwd','view','createProduct','createSlider'),
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
        if($id != Yii::app()->user->id){
            $id = Yii::app()->user->id;
        }
        /*********************************************************************************/
        $producttypes = array();
        $types = Yii::app()->db->createCommand()
            ->select('code,value')
            ->from('product_type')
            ->where("isparent=1 and parent_code is not null and parent_code !='' ")
            ->queryAll();
        foreach ($types as $type ){
            $tmp=new ProductType;
            $tmp->code = $type['code'];
            $tmp->value = $type['value'];
            $producttypes[] = $tmp;
        }
        /*********************************************************************************/
        $this->render('view',array(
            'model'=>$this->loadModel($id),
            'producttypes'=>$producttypes
        ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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
        $model->nickname = $_POST['nickname'];
        $model->realname = $_POST['realname'];
        $model->telephone = $_POST['phone'];
        $model->address = $_POST['address'];
        $model->introduction = $_POST['introduction'];
        $model->sex = $_POST['sex'];
        $model->updatetime = date("Y-m-d H:i:s");

        $result = $model->save();
        $result = json_encode(array("result"=>$result));
        echo $result;
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionChangepwd(){
        $id=Yii::app()->user->id;
        $model=$this->loadModel($id);
        $model->password = $_POST['password'];
        $um = new UserManagement();
        $um->register($model);
        $result = json_encode(array("result"=>"ok"));
        echo $result;
    }

    public function actionCreateProduct(){
        $model=new Product;
        if(isset($_POST['Product']))
        {
            $model->attributes=$_POST['Product'];

            $Files = $_FILES['productpic'];
            //第一张图片保存的地址
            $pic_path = "upload/".$model->main_type."/".$Files["name"][0];
            $model->pic = $pic_path;
            $model->createtime = date("Y-m-d H:i:s");
            if($model->save()){
                //保存其他两张图片的相关信息到数据库
                for ( $i=1;$i<count($Files["name"]);$i++ ){
                    $next = next($Files["name"]);
                    $productPic = new ProductPic();
                    $productPic->productid = $model->id;
                    $productPic->pic = "upload/".$model->main_type."/". $next;
                    $productPic->createtime = date("Y-m-d H:i:s");
                    $productPic->save();
                }
                //将每个图片保存到服务器的文件夹
                foreach ($Files["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $Files["tmp_name"][$key];
                        $picname = $Files["name"][$key];
                        $picsize = $Files["size"][$key];
                        $pic_path = "upload/".$model->main_type."/". $picname;
                        if ($picname != "") {
                            if ($picsize > 10240000) {
                                echo '图片大小不能超过10M';
                                exit;
                            }
                            $type = strstr($picname, '.');
                            $type = strtolower($type);
                            if ($type != ".gif" && $type != ".jpg"  && $type != ".pjpeg" && $type != ".jpeg" && $type != ".png" ) {
                                echo '图片格式不对！';
                                exit;
                            }
                            if (!file_exists("upload/".$model->main_type)){
                                mkdir ("upload/".$model->main_type);
                            }
                            move_uploaded_file($tmp_name,$pic_path);
                        }
                    }
                }
                $this->redirect(array('view','id'=>Yii::app()->user->id));
            }
        }
    }

    public function actionCreateSlider(){
        $model=new SliderShow();
        if(isset($_POST['SliderShow']))
        {
            $model->attributes=$_POST['SliderShow'];
            $pic_path = "upload/slidershow/". $_FILES["sd_pic"]["name"];
            $model->pic = $pic_path;
            $model->createtime = date("Y-m-d H:i:s");
            /**
             * 对于启用的幻灯片，先修改同样序号的图片，将其置为未启用和清空其序号字段
             */
            if($model->status == "1"){
                SliderShow::model()->updateAll(array('sort'=>null,'status'=>'0'),
                    'sort=:sort',array(':sort'=>$model->sort));
            }
            if($model->save()){
                $picname = $_FILES['sd_pic']['name'];
                $picsize = $_FILES['sd_pic']['size'];
                if ($picname != "") {
                    if ($picsize > 10240000) {
                        echo '图片大小不能超过10M';
                        exit;
                    }
                    $type = strstr($picname, '.');
                    $type = strtolower($type);
                    if ($type != ".gif" && $type != ".jpg"  && $type != ".pjpeg" && $type != ".jpeg" && $type != ".png" ) {
                        echo '图片格式不对！';
                        exit;
                    }
                    move_uploaded_file($_FILES["sd_pic"]["tmp_name"],$pic_path);
                }
                $this->redirect(array('view','id'=>Yii::app()->user->id));
            }
        }
    }
}
