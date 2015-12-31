<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\LoginAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Alert;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
    <div class="login-box">
        <div class="login-logo">
            
			<a href="<?php echo Url::base();?>"><?php echo Yii::$app->params['application']['loginlogo']; ?></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">
			<div class="alert alert-danger alert-dismissable">
			<h4><i class="icon fa fa-ban"></i> <?= Html::encode($this->title) ?></h4>
			</div>
			</p>
            <?= $content ?>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
