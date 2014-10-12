<?php

class ShopproductController extends Controller
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
				'actions'=>array('index','view','shop','listIndex'),
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
		$model=new Shopproduct;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shopproduct']))
		{
			$model->attributes=$_POST['Shopproduct'];
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

		if(isset($_POST['Shopproduct']))
		{
			$model->attributes=$_POST['Shopproduct'];
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
		$dataProvider=new CActiveDataProvider('Shopproduct');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Shopproduct('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Shopproduct']))
			$model->attributes=$_GET['Shopproduct'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Shopproduct the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Shopproduct::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Shopproduct $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='shopproduct-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionShop($id)
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $shop_products = Shopproduct::model()->findAllByAttributes(array('fid'=>$id));
        if($shop_products == null){
            return;
        }
        $product_type = array();
        $cataTypes = array();
        foreach ($shop_products as $shop_product ){
            $type = ProductType::model()->findByAttributes(array('code'=>$shop_product->typecode));
            if(!isset($product_type[$shop_product->typecode])){
                $product_type[$shop_product->typecode] = 1;
                $tmp=new ProductType();
                $tmp->code = $type->code;
                $tmp->value = $type->value;
                $cataTypes[] = $tmp;
            }
        }

        $this->f_id = $id;

        $this->render('shop',array(
            'cataTypes'=>$cataTypes,
            'id'=>$id
        ));
    }

    public function actionListIndex(){
        $fid = $_POST['fid'];
        $page = $_POST['page'];
        $type = $_POST['type'];
        $products = array();
        /*********************取该销售商所有已上架的物品**********************/
        $sql_do="select * from shopproduct "
            ." where fid=:fid and typecode=:typecode "
            ." LIMIT :offset,:limit";
        $result=Yii::app()->db->createCommand($sql_do);
        $result->bindValue(':fid', $fid);
        $result->bindValue(':typecode', $type);
        $result->bindValue(':offset', ($page-1)*8);
        $result->bindValue(':limit', 8);
        $ps=$result->query();
        /*******************************************************************/
        foreach ($ps as $p ){
            $tmp=new Shopproduct();
            $tmp->fid = $fid;
            $tmp->pid = $p['pid'];
            $tmp->pname = $p['pname'];
            $tmp->productprice = $p['productprice'];
            $tmp->productpic = $p['productpic'];
            $products[] = $tmp;
        }
        $json_str = CJSON::encode($products);
        echo $json_str;
        /*********************************************************************************/
    }
}
