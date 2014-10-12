<?php

class XyAdminsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
    public $layout='application.modules.xyadmindash.views.layouts.column2';

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
//				'actions'=>array('index','view','login','logout','update'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        if(isset($_SESSION['admin_user'])){
            $this->render('view',array(
                'model'=>$this->loadModel($id),
            ));
        }
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new XyAdmins;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['XyAdmins']))
		{
            $model->createtime = date("Y-m-d H:i:s");
			$model->attributes=$_POST['XyAdmins'];
            $um = new UserManagement();
            $um->cryptPwd($model);
			if($model->save()){
                $_SESSION['admin_user'] = $model->username;
                $this->redirect(array('view','id'=>$model->id));
            }

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

        if(isset($_SESSION['admin_user']) && $_SESSION['admin_user'] == $model->username){
            if(isset($_POST['XyAdmins']))
            {
                $model->attributes=$_POST['XyAdmins'];
                $model->updatetime = date("Y-m-d H:i:s");
                if($model->save())
                    $this->redirect(array('view','id'=>$model->id));
            }

            $this->render('update',array(
                'model'=>$model,
            ));
        }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


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
		$dataProvider=new CActiveDataProvider('XyAdmins');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new XyAdmins('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['XyAdmins']))
			$model->attributes=$_GET['XyAdmins'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return XyAdmins the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=XyAdmins::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param XyAdmins $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='xy-admins-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionProducttype(){
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
        $id = $_GET['id'];
        $this->render('producttype',array(
            'producttypes'=>$producttypes,
            'id'=>$id
        ));
    }

    public function actionLogout(){
        unset($_SESSION['admin_user']);
        $this->render('index',array(
        ));
    }

    public function actionLogin()
    {
        $record = new XyAdmins();
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $record = XyAdmins::model()->findByAttributes(array('username' => $username));
            $result = false;
            if($record == null){
                $record = new XyAdmins();
            }else if($record->password != crypt($password, $record->password)){
                $record = new XyAdmins();
            }else{
                $result = $record->id;
                $_SESSION['admin_user'] = $record->username;
            }
            $result = json_encode(array("result"=>$result));

            echo $result;
        }else{
            $this->render('index',array('model'=>$record));
        }
    }

    public function actionChangePwd(){
        if(isset($_POST['password']) && isset($_POST['id']))
        {
            $id = $_POST['id'];
            $model= XyAdmins::model()->findByPk($id);
            $model->updatetime = date("Y-m-d H:i:s");
            $model->password=$_POST['password'];
            $um = new UserManagement();
            $um->cryptPwd($model);
            if($model->save()){
                $result = true;
            }else{
                $result = false;
            }
            $result = json_encode(array("result"=>$result));
            //$result = CJSON::encode($result);
            echo $result;
        }else if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->render('password',array('id'=>$id));
        }
    }
}
