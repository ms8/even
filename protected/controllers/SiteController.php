<?php

class SiteController extends Controller
{

    public $layout='//layouts/index';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
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

        $this->render('index',array(
            'cataTypes'=>$cataTypes,
        ));
	}



	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        if(isset($_POST['username']) && isset($_POST['password'])){
            $modelLogin=new LoginForm;
            $modelLogin->username = $_POST['username'];
            $modelLogin->password = $_POST['password'];
            $result = $modelLogin->login();
            $result = json_encode(array("result"=>$result));
            echo $result;
        }else{
            $this->render('index',array());
        }
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionRegister()
    {
        $model=new User();
        $model->username = $_POST['username'];
        $model->password = $_POST['password'];
        $model->email = $_POST['email'];

        $model->pic = 'upload/grava.png';
        $model->createtime = date("Y-m-d H:i:s");
        $um = new UserManagement();
        $um->register($model);

        $modelLogin=new LoginForm;
        $modelLogin->username = $_POST['username'];
        $modelLogin->password = $_POST['password'];
        $modelLogin->login();
        //$this->redirect('index.php');
        //注册成功后跳到首页
    }

    public function actionListIndex(){
        /*********************************************************************************/
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
        //******************************************
        foreach ($ps as $p ){
            $tmp=new Product;
            $tmp->id = $p['id'];
            $tmp->name = $p['name'];
            $tmp->price = $p['price'];
            $tmp->pic = $p['pic'];
            $products[] = $tmp;
        }
        $json_str = CJSON::encode($products);
        echo $json_str;
        /*********************************************************************************/
    }

    public function actionListslider(){
        /*********************************************************************************/
        $sliders = array();
        $sql_do="select pic,title,content from slider_show where status='1' order by sort";

        $result=Yii::app()->db->createCommand($sql_do);
        $ss=$result->query();
        //******************************************
        foreach ($ss as $s ){
            $tmp=new SliderShow();
            $tmp->pic = $s['pic'];
            $tmp->title = $s['title'];
            $tmp->content = $s['content'];
            $sliders[] = $tmp;
        }
        $json_str = CJSON::encode($sliders);
        echo $json_str;
    }
}