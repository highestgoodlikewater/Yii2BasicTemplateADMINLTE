<?php 
namespace app\components\SMSLibraries;
 
use Yii;
use yii\helpers\Html;
use yii\base\Component;
use yii\base\InvalidConfigException;
 
class Sms extends Component
{
	/*
	Yii::$app->awscomponent->welcome();
	*/
	public $content;
	public $currentModule;
	
    public function init(){
        parent::init();
        $this->content= 'Hello Yii 2.0';
    }

	public function _regex()
	{
		//return = '~[a-z\d]+/[a-z\d]+/[a-z\d]+/[a-z\d]+/[\d]+~i';
		return '~[a-z\d\s]+/[a-z\d\s]+/[a-z\d\s]+/[a-z\d\s]+/[\d]+~i';
	}
	public function welcome()
	{
		return "Hello..Welcome to Aws Component";
	}
	
	
	public function string_ucfirst($content)
	{
		if($content!=null){
            $this->content= $content;
        }
        return Html::encode(ucwords(strtolower($this->content)));
	}
	
	public function display($content=null){
        if($content!=null){
            $this->content= $content;
        }
        return Html::encode($this->content);
    }

}