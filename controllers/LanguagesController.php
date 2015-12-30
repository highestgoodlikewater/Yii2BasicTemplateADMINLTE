<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;

class LanguagesController extends \yii\web\Controller
{
	public function init()
	{
		parent::init();
	}
    public function actionIndex($lang='id')
    {
		Yii::$app->language = $lang;
		$cookie = new \yii\web\Cookie([
			'name'=>'lang',
			'value'=>$lang,
		]);
		\Yii::$app->getResponse()->getCookies()->add($cookie);
		
        return $this->redirect(Url::previous());
    }
}
