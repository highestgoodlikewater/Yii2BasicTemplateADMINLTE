<?php 
namespace app\controllers\user;

use dektrium\user\controllers\AdminController as BaseAdminController;
use Yii;

class AdminController extends BaseAdminController
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
			'_title'=> 'Data Master :: Pengguna '.Yii::$app->params['application']['name'],
			'_breadcrumbs'=> '',
			'_module'=> Yii::$app->awscomponent->string_ucfirst('Manajemen Pengguna'),
			'_subModule'=> '',
		);
	}
}

?>