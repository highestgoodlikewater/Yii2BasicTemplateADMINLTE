<?php 
namespace app\components\AWS;

use yii\i18n\MissingTranslationEvent;

class CheckLanguages extends \yii\base\Behavior
{
	public function init()
	{
		parent::init(); 
	}
	
	public function events()
	{
		return [
			\yii\web\Application::EVENT_BEFORE_REQUEST => 'checkLanguages'
		];
	}
	
	public function checkLanguages()
	{
		if (\Yii::$app->getRequest()->getCookies()->has('lang'))
		{
			\Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('lang');
		}
	}
	public static function handleMissingTranslation(MissingTranslationEvent $event)
    {
        $event->translatedMessage = "@MISSING: {$event->category}.{$event->message} FOR LANGUAGE {$event->language} @";
    }
}
?>