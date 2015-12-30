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
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'resources/templates/css/bootstrap.min.css',
        'resources/templates/css/font-awesome.css',
        //'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'resources/templates/dist/css/ionicons.min.css',
        'resources/templates/css/font-googleapis.css',
        'resources/templates/dist/css/AdminLTE.min.css',
        'resources/templates/dist/css/skins/_all-skins.min.css',
		'resources/templates/plugins/iCheck/flat/blue.css',
		'resources/templates/plugins/morris/morris.css',
		'resources/templates/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
		'resources/templates/plugins/datepicker/datepicker3.css',
		'resources/templates/plugins/daterangepicker/daterangepicker-bs3.css',
		'resources/templates/plugins/timepicker/bootstrap-timepicker.min.css',
		'resources/templates/plugins/select2/select2.min.css',
		'resources/templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'resources/templates/css/site.css',
		'resources/templates/css/mycustoms.css',
    ];
    public $js = [
		'resources/templates/js/bootstrap.min.js',
		'resources/templates/js/jquery-ui.js',
		'resources/templates/js/button.brigde.js',
		// 'js/raphael-min.js',
		// 'plugins/morris/morris.min.js',
		'resources/templates/plugins/select2/select2.full.min.js',
		'resources/templates/plugins/sparkline/jquery.sparkline.min.js',
		'resources/templates/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
		'resources/templates/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
		'resources/templates/plugins/knob/jquery.knob.js',
		'resources/templates/js/moment.min.js',
		'resources/templates/plugins/daterangepicker/daterangepicker.js',
		'resources/templates/plugins/datepicker/bootstrap-datepicker.js',
		'resources/templates/plugins/timepicker/bootstrap-timepicker.min.js',
		'resources/templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
		'resources/templates/plugins/slimScroll/jquery.slimscroll.min.js',
		'resources/templates/plugins/fastclick/fastclick.min.js',
		'resources/templates/dist/js/app.min.js',
		'resources/templates/dist/js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
