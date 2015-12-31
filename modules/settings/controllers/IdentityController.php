<?php

namespace app\modules\settings\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

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
	
    public function actionIndex()
    {
		$files = array('config/params.php','config/web.php');
		$searchfor = array(
			"loginlogo"=>"'loginlogo'=>",
			"mobilename"=>"'mobilename'=>",
			"mobile5050"=>"'mobile5050'=>",
			"application_name"=>"'name'=>",
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
		
		Url::remember();
        return $this->render('index',$options);
    }

}
