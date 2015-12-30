<?php

namespace app\modules\examples\controllers;
use Yii;
use yii\helpers\Url;

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
