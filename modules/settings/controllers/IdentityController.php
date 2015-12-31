<?php

namespace app\modules\settings\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\data\ActiveDataProvider;

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
			'_title'=> 'Data Master :: Karyawan '.Yii::$app->params['application']['name'],
			'_breadcrumbs'=> '',
			'_module'=> Yii::$app->awscomponent->string_ucfirst('Manajemen Karyawan'),
			'_subModule'=> '',
		);
	}
	
    public function actionIndex()
    {
        return $this->render('index');
    }

}
