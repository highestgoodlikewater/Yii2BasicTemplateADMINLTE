<?php 
use yii\helpers\Url; 
use yii\helpers\Html;
?>

<?php 
	$params['application']=Yii::$app->params['application'];
	$params['adminLTE']=Yii::$app->params['adminLTE'];
?>
<a href="<?php echo Url::base();?>" class="logo">
	<?php echo $params['application']['mobile5050'];?>
	<?php echo $params['application']['mobilename'];?>
</a>
<nav class="navbar navbar-static-top" role="navigation">
	<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <?php echo  $this->render( 'languages', ['param'=> 'somevar'] ); ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img class="user-image" src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(Yii::$app->user->identity->email));?>" />
                  <span class="hidden-xs"><?php echo Yii::t('app','Halo');?> 
				  <?php if (!Yii::$app->user->isGuest) :?>
				  <?php  echo ucwords(strtolower(Yii::$app->user->identity->username)); ?>
				  <?php endif;?>
				  
				  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="height: 100%;">
					<img src="<?php echo Url::base(); ?>/resources/templates/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>//-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
						<?php //echo Html::a(
                        //'Profile', 
                        //['/user/admin/update?id='.Yii::$app->user->identity->ID], 
                        //[
                         // 'class'=>'btn btn-default btn-flat',
                         // 'data-method'=>'post'
                        //],[]); ?>
                    </div>
                    <div class="pull-right">
                      <?= Html::a(
                        'Sign Out', 
                        ['/user/logout'], 
                        [
                          'class'=>'btn btn-default btn-flat',
                          'data-method'=>'post'
                        ],[]); ?>
                    </div>
                  </li>
                </ul>
              </li>
			<?php if (Yii::$app->params['adminLTE']['showControl']): ?>	
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
			<?php endif; ?>	
            </ul>
          </div>
        </nav>