<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'resources/templates/css/bootstrap.min.css',
        'resources/templates/css/font-googleapis.css',
        'resources/templates/css/font-awesome-maxcdn.css',
        'resources/templates/dist/css/ionicons.min.css',
        'resources/templates/dist/css/AdminLTE.min.css',
        'resources/templates/plugins/iCheck/square/blue.css',
        'css/site.css',
    ];
    public $js = [
        'resources/templates/js/bootstrap.min.js',
        'resources/templates/plugins/iCheck/icheck.min.js',
        'resources/templates/js/login.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
