<?php

namespace app\modules\examples\controllers;

use Yii;
use yii\helpers\Url;
use fedemotta\cronjob\models\CronJob;
use yii\console\Controller;

class PluginsController extends \yii\web\Controller
{
    public function init()
    {
		parent::init();
		Url::remember();
    }
	public function actionIndex()
    {
        return $this->render('index');
    }
	 // CRON
	 // http://www.yiiframework.com/extension/yii2-cronjob/
	public function actionCrontoday()
    {
		return $this->actionInit(date("Y-m-d"), date("Y-m-d"));
    }
	
	public function actionInit($from, $to){
		defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));
		defined('STDOUT') or define('STDOUT', fopen('php://stdout', 'w'));
		
        $dates  = CronJob::getDateRange($from, $to);
        $command = CronJob::run($this->id, $this->action->id, 0, CronJob::countDateRange($dates));
        if ($command === false){
            return Controller::EXIT_CODE_ERROR;
        }else{
            foreach ($dates as $date) {
				echo $date;
                //this is the function to execute for each day
                //SomeModel::some_method((string) $date);
            }
            $command->finish();
            return Controller::EXIT_CODE_NORMAL;
        }
    }
	
	public function actionYesterday(){
        return $this->actionInit(date("Y-m-d", strtotime("-1 days")), date("Y-m-d", strtotime("-1 days")));
    }
	
	 // CRON
	
	public function actionFaker()
    {
		$title = Yii::t('plugins','Combobox Tahun');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'https://github.com/fzaninotto/Faker/',
				'title'=>$title,
				'view'=>'faker',
			]
		]);
    }
	
	public function actionSoccers()
    {
		$title = Yii::t('plugins','Daftar Bola Inggris');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'http://www.yiiframework.com/extension/yii2-xmlsoccer/',
				'title'=>$title,
				'view'=>'soccers',
			]
		]);
    }
	
	public function actionDaysago()
    {
		$title = Yii::t('plugins','Waktu yang Lalu');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'https://github.com/sfedosimov/yii2-daysago',
				'title'=>$title,
				'view'=>'daysago',
			]
		]);
    }
	
	public function actionComboyear()
    {
		$title = Yii::t('plugins','Combobox Tahun');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'https://github.com/et-soft/yii2-widget-select-year/',
				'title'=>$title,
				'view'=>'comboyear',
			]
		]);
    }
	
	public function actionMobiledetect()
    {
		$title = Yii::t('plugins','Deteksi Mobile');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'http://www.yiiframework.com/extension/yii2-mobile-detect/',
				'title'=>$title,
				'view'=>'mobiledetect',
			]
		]);
    }
	
	public function actionCurrency()
    {
		$title = Yii::t('plugins','Konversi Mata Uang');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'http://www.yiiframework.com/extension/yii2-currency-converter/',
				'title'=>$title,
				'view'=>'currency_converter',
			]
		]);
    }
	
	public function actionHighchart()
    {
		$title = Yii::t('plugins','Grafik oleh Miloschuman');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'https://github.com/miloschuman/yii2-highcharts/',
				'title'=>$title,
				'view'=>'highchart',
			]
		]);
    }
	public function actionHighchart2()
    {
		$title = Yii::t('plugins','Grafik oleh Amigos');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'https://github.com/2amigos/yii2-highcharts-widget/',
				'title'=>$title,
				'view'=>'highchart2',
			]
		]);
        return $this->render('highchart2');
    }
	public function actionSyntaxhighlighter()
    {
		$title = Yii::t('plugins','Snipet Baris Perintah');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'http://www.yiiframework.com/extension/yii2-syntaxhighlighter/',
				'title'=>$title,
				'view'=>'syntaxhighlighter',
			]
		]);
        return $this->render('syntaxhighlighter');
    }
	
	public function actionLatlongfinder()
    {
		$title = Yii::t('app','Menemukan Lokasi Berdasarkan Latitude dan Longitude');
		$this->view->title = $title;
		return $this->render('_plugins',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'http://www.yiiframework.com/extension/yii2-latlon-finder/',
				'title'=>$title,
				'view'=>'latlongfinder',
			]
		]);
    }
	
	public function actionFileexplorer()
    {
		$title = Yii::t('app','Browser');
		$this->view->title = $title;
		return $this->render('_plugins_fullwidth',[
			'plugins'=>[
				'file'=>__FILE__,
				'source'=>'https://github.com/ho96/yii2-extplorer/',
				'title'=>$title,
				'view'=>'fileexplorer',
			]
		]);
    }

}
