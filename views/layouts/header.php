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
    
    <!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
		<!--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>//-->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <?php //echo  $this->render( 'topbar_dropdown', ['param'=> 'somevar'] ); ?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo Url::base(); ?>/resources/templates/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Hello 
				  <?php if (!Yii::$app->user->isGuest) :?>
				  <?php  //echo /*Yii::$app->user->identity->first_name.*/' ('.Yii::$app->user->identity->username.')' ?>
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
                        ['/site/logout'], 
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