<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Employees;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		$db = \Yii::$app->db;
		$start = date("Y-m-01");
		$end = date("Y-m-t");
		$income = $db->createCommand(" SELECT 
 	MAX(transactions.trans_total) as maximum,
 	MIN(transactions.trans_total) as minimum,
 	SUM(transactions.trans_total) as summary,
 	AVG(transactions.trans_total) as average
FROM transactions WHERE transactions.trans_date BETWEEN '".$start."' AND '".$end."'");
		$income = $income->queryOne();
		
		// GET
		$datelist=array();
		$month = date("m");
		$year = date("Y");

		for($d=1; $d<=31; $d++)
		{
			$time=mktime(12, 0, 0, $month, $d, $year);          
			//if (date('m', $time)==$month)       
			//$datelist[]=date('d', $time);
		}
		
		$d = $db->createCommand("SELECT DISTINCT DAY(trans_date) as trans_date FROM transactions WHERE transactions.trans_date BETWEEN '".$start."' AND '".$end."'")->queryAll();
		foreach ($d as $z)
		{
				$datelist[]=$z["trans_date"];
		}
		
		$data_series = array();
		$_data = array();
		$_data_series = array ();
		
		$petugas = $db->createCommand(" SELECT DISTINCT
		employees.employee_name
		FROM
		(transactions)
		INNER JOIN employees ON employees.employee_id = transactions.trans_employee
		WHERE transactions.trans_date BETWEEN '".$start."' AND '".$end."'")->queryAll();
		
		foreach ($petugas as $ns)
		{
			array_push($data_series,array(
				"name"=>$ns["employee_name"],
			));
		}
		
		foreach ($data_series as $ds)
		{
			$months = $db->createCommand("SELECT DISTINCT * FROM charts WHERE employee_name = '".$ds["name"]."'")->queryAll();
			$_data_series = array ();						
			foreach ($months as $m)
			{
				$_data_series[] = (int)$m["trans_total"];
			}
			array_push($_data,array(
				'name'=>$ds["name"],
				'data'=>$_data_series,
			));
			unset($_data_series);
		}
        
		if (!Yii::$app->user->isGuest)
		{
			return $this->render('index',[
				'max'=>$income["maximum"],
				'min'=>$income["minimum"],
				'sum'=>$income["summary"],
				'avg'=>$income["average"],
				'chart_x_axis' => $datelist,
				'chart_x_series' => $_data,
			]);
		}
		else
		{
			$this->layout='loginlayout';
			return $this->redirect(['user/login']);
		}
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
