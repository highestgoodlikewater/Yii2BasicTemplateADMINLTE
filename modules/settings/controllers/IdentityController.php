<?php

namespace app\modules\settings\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use app\components\AWS\Email as MyMailer;

class IdentityController extends \yii\web\Controller
{
	public $_buttons = array();
	public $_pagetitle =  array();
	
    public function init(){
		parent::init();
		$this->_buttons =  array(
			array ('title'=>'Kembali ke Daftar','link'=>'index','class'=>'info','id' => 'btnList','rule'=>'all'),
			array ('title'=>'Tambah','link'=>'create','class'=>'info','id' => 'btnCreate','rule'=>'all'),
			//array ('title'=>'Trash','link'=>'trash','class'=>'info','id' => 'btnTrash','rule'=>'all'),
			// array ('title'=>'Hapus','link'=>'#','class'=>'danger','id' => 'deleteAll','rule'=>'admin'),
		);
		$this->_pagetitle = array(
			'_title'=> 'Konfigurasi Identitas Aplikasi',
			'_module'=> Yii::$app->awscomponent->string_ucfirst('Konfigurasi Identitas Aplikasi'),
			'_subModule'=> 'Pengaturan Aplikasi',
		);
	}
	
    public function actionSendemail(){
		$mail = new MyMailer();
		$mail->layout = 'tests/_emailcontent';
		$mail->content = $_POST["msg"];
		$mail->from = Yii::$app->appinfo->t('admin_email');
		$mail->name = Yii::$app->appinfo->t('admin_name');
		$mail->subject = $_POST["subject"];
		$mail->destination = $_POST["to"];
		echo $mail->send();
	}
    public function actionIndex()
    {
		$request = Yii::$app->request;
		if ($request->post())
		{
			$request = $request->post("Identity");
			echo "<pre>";
			
			$files = array(
				array (
					'files' =>'config/params.php',
					'find'=> array (
						"'adminEmail'=>'".$request["old_email_sender"]."'",
					),
					'replace'=> array (
						"'adminEmail'=>'".$request["email_sender"]."'",
					),
				),array (
					'files' =>'config/web.php',
					'find'=>array(
						 "'name'=>'".$request["old_application_name"]."'",
					),
					'replace'=>array(
						 "'name'=>'".$request["application_name"]."'",
					),
				),array (
					'files' =>'config/components/yii.php',
					'find'=>array(),
					'replace'=>array(),
				),array (
					'files' =>'config/modules/plugins.php',
					'find'=>array(),
					'replace'=>array(),
				));
			foreach ($files as $k=>$file)
			{
				echo $file["files"].''.sizeof($file["find"])."<br/>";
				if (sizeof($file["find"])>0)
				{
					file_put_contents($file["files"],str_replace($file["find"],$file["replace"],file_get_contents($file["files"])));
				}
			}
			print_r($request);
			die();
			$file = 'config/params.php';
			$find = array (
				"'adminEmail'=>'".$request["old_email_sender"]."'",
				"'mobilename'=>'".$request["old_mobilename"]."'",
				"'mobile5050'=>'".$request["old_mobile5050"]."'",
				"'loginlogo'=>'".$request["old_loginlogo"]."'",
			);
			$replace = array (
				"'adminEmail'=>'".$request["email_sender"]."'",
				"'mobilename'=>'".$request["mobilename"]."'",
				"'mobile5050'=>'".$request["mobile5050"]."'",
				"'loginlogo'=>'".$request["loginlogo"]."'",
			);
			file_put_contents($file,str_replace($find,$replace,file_get_contents($file)));
			//"'name'=>'".$request["old_web_name"]."',";
			echo
			die();
		}
		
		$files = array('config/params.php','config/web.php','config/components/yii.php','config/modules/plugins.php');
		$searchfor = array(
			// email @ config/components/yii.php
			"host"=>"'host'=>",
			"username"=>"'username'=>",
			"password"=>"'password'=>",
			"port"=>"'port'=>",
			"encryption"=>"'encryption'=>",
			// email @ config/modules/plugins.php
			"welcomeSubject"=>"'welcomeSubject'=>",
			"confirmationSubject"=>"'confirmationSubject'=>",
			"reconfirmationSubject"=>"'reconfirmationSubject'=>",
			"recoverySubject"=>"'recoverySubject'=>",
			// template @ config/web.php
			"application_name"=>"'name'=>",
			// template @ config/params.php -> application
			"loginlogo"=>"'loginlogo'=>",
			"mobilename"=>"'mobilename'=>",
			"mobile5050"=>"'mobile5050'=>",
			// template @ config/params.php -> vendor
			"sender"=>"'adminEmail'=>",
			"author"=>"'author'=>",
			"authorurl"=>"'authorurl'=>",
			"publisher"=>"'publisher'=>",
			"email"=>"'email'=>",
			"url"=>"'url'=>",
			"copyright"=>"'copyright'=>",
		);
		$options = array();
		header('Content-Type: text/plain');
		foreach ($files as $file)
		{
			$contents = file_get_contents($file);
			foreach ($searchfor as $k=>$search)
			{
				$pattern = preg_quote($search, '/');
				$pattern = "/^.*$pattern.*\$/m";
				if(preg_match_all($pattern, $contents, $matches)){
					$value = explode ("=>",implode("\n", $matches[0]));
					$strLength = strlen($value[1]);
					$value = substr($value[1],1,($strLength-4));
					$options = array_merge($options,array($k=>$value));
				}	
			}
		}
		
		// echo "<pre>";
		// print_r($options);
		// exit;
		Url::remember();
        return $this->render('index',$options);
    }

}
