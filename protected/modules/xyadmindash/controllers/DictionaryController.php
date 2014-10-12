<?php

class DictionaryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        //获取登录用户的id
        $user = XyAdmins::model()->findByAttributes(array('username'=>$_SESSION['admin_user']));
        $userid = $user->id;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'userid'=>$userid,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        //获取登录用户的id
        $user = XyAdmins::model()->findByAttributes(array('username'=>$_SESSION['admin_user']));
        $userid = $user->id;
        //获取字典类型
        $dts = DictionaryType::model()->findAll();
        $types = array();
        foreach($dts as $type){
            $types[$type->type]=$type->typename;
        }

		$model=new Dictionary;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dictionary']))
		{
			$model->attributes=$_POST['Dictionary'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id,'userid'=>$userid));
		}

		$this->render('create',array(
			'model'=>$model,
            'userid'=>$userid,
            'types'=>$types,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        //获取登录用户的id
        $user = XyAdmins::model()->findByAttributes(array('username'=>$_SESSION['admin_user']));
        $userid = $user->id;
        //获取字典类型
        $dts = DictionaryType::model()->findAll();
        $types = array();
        foreach($dts as $type){
            $types[$type->type]=$type->typename;
        }

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dictionary']))
		{
			$model->attributes=$_POST['Dictionary'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id,'userid'=>$userid));
		}

		$this->render('update',array(
			'model'=>$model,
            'userid'=>$userid,
            'types'=>$types
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
        //获取登录用户的id
        $user = XyAdmins::model()->findByAttributes(array('username'=>$_SESSION['admin_user']));
        $userid = $user->id;
		$dataProvider=new CActiveDataProvider('Dictionary');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'userid'=>$userid,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dictionary('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dictionary']))
			$model->attributes=$_GET['Dictionary'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Dictionary the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Dictionary::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Dictionary $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dictionary-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}