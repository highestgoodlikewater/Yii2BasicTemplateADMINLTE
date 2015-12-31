<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Sysmenus;

//$menus = new Sysmenus;
$menus = (new \yii\db\Query())
    ->select(['*'])
    ->from('sysmenus')
    ->where(['menu_type' => 'MODULE'])
    ->orderBy(['menu_order' => SORT_ASC])
    ->all();
	
$MODULE_OBJECT = Yii::$app->controller->module;
$module_name = (isset($MODULE_OBJECT->module->id)?$MODULE_OBJECT->module->id:'');
$controllers_name = (isset($MODULE_OBJECT->module->module->controller->id)?$MODULE_OBJECT->module->module->controller->id:'');
$submodule_name = $MODULE_OBJECT->id;
$cname = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
?>

<?php
	define ('MENU_PULL_RIGHT','<i class="fa fa-angle-left pull-right"></i>');
?>

<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php foreach ($adminmenus as $key => $menu): ?>
		<?php 
			$firstchild = $menu['submenu']; 
			if (!empty($firstchild)) {
				$classActive = '';
				$classActive =( ( ($menu['menu_id'] == $submodule_name) || ($menu['menu_id'] == $module_name) ) ? 'class="treeview active"':'');
		?>
		<li <?php echo $classActive?>>
			<a href="<?php echo ($menu['menu_url'] == '#' ? 'javascript:void(0)' : $menu['menu_url']) ?>">
				<i class="<?php echo $menu['menu_icon'] ?>"></i><span><?php echo Yii::t('menu',$menu["menu_title"]); ?> </span><?php echo MENU_PULL_RIGHT?>
			</a>
			<?php 
				$classActive = '';
				$classActive = (( $menu['menu_id'] == $submodule_name) ? 'class="treeview-menu menu-open" style="display: block;"':'class="treeview-menu"');
			?>
			<ul <?php echo $classActive;?>>
			<?php foreach ($firstchild as $firstchildKey => $firstchildMenu): ?>
		<?php 
			$classActive = '';
			$found = FALSE;
			
			if (array_key_exists('menu_action',$firstchildMenu)){
				
				if (is_array( $firstchildMenu['menu_action'] ))
				{
					if (in_array($action, $firstchildMenu['menu_action']))
					{
						foreach ($firstchildMenu['menu_action'] as $m)
						{
							if (!$found)
							{
								if ($m == $action)
								{
									$classActive = 'class="active"';
									$found = TRUE;
								}
							}
						}
					}else{
						$classActive = '';
					}
				}else{
					if ($firstchildMenu['menu_action'] == $action)
					{
						$classActive = 'class="active"';
					}else{
						$classActive = ($firstchildMenu['menu_id'] == $submodule_name ? 'class="active pertama"' : '');
					}
				}
			}
		?>
		<li <?php echo $classActive; ?>>
		<?php 
			$companyLink = 'javascript:void(0)' ;
			if ($firstchildMenu['menu_url'] == '#')
			{
				$companyLink = 'javascript:void(0)' ;
			}
			elseif($firstchildMenu['menu_url']=='##')
			{
				if (Yii::$app->user->identity->is_admin==1){
					$companyLink = $menu['menu_id'].'/companies/index';
				}else{
					$companyLink = $menu['menu_id'].'/companies/update?id='.Yii::$app->user->identity->company_id;
				}
			}else{
				if ( array_key_exists('menu_action',$firstchildMenu) )
				{
					if (is_array( $firstchildMenu['menu_action'] ))
					{
						if (in_array($action, $firstchildMenu['menu_action']))
						{
							$companyLink = $menu['menu_id'].'/'.(array_key_exists('menu_action',$firstchildMenu)?$firstchildMenu['menu_url'].'/'.$firstchildMenu['menu_action'][0]:$firstchildMenu['menu_url']) ;
						}else{
							foreach ($firstchildMenu['menu_action'] as $key=>$m)
							{
								if ($m == $action)
								{
									$companyLink = $menu['menu_id'].'/'.(array_key_exists('menu_action',$firstchildMenu)?$firstchildMenu['menu_url'].'/'.$firstchildMenu['menu_action'][0]:$firstchildMenu['menu_url']) ;
									$classActive = 'class="active"';
								}else{
									$companyLink = $menu['menu_id'].'/'.(array_key_exists('menu_action',$firstchildMenu)?$firstchildMenu['menu_url'].'/'.$firstchildMenu['menu_action'][0]:$firstchildMenu['menu_url']) ;
								}
							}
						}
					}else{
						$companyLink = $menu['menu_id'].'/'.(array_key_exists('menu_action',$firstchildMenu)?$firstchildMenu['menu_url'].'/'.$firstchildMenu['menu_action']:$firstchildMenu['menu_url']) ;
					}
				}
			}
		?>
			<a class="<?php echo $firstchildMenu['menu_parent'];?>" href="<?php echo Url::home().$companyLink; ?>">
				<i class="<?php echo $firstchildMenu["menu_icon"] ?>"></i><?php echo Yii::t('menu',$firstchildMenu["parent_menu_name"]); ?>
				<?php if (sizeof ($firstchildMenu['submenu'])) echo MENU_PULL_RIGHT; ?>
			</a>
			<?php if (!empty($firstchildMenu["submenu"])): ?>
				<ul class="treeview-menu">
			<?php foreach ($firstchildMenu["submenu"] as $secondchildKey => $secondchildMenu): ?>
			<?php 
						$links = Yii::$app->urlManager->createUrl([$menu["menu_id"] . '/' . $firstchildMenu["menu_id"] . '/' . $secondchildMenu["url"]]); 
						$links = ($secondchildMenu['url'] == '#' ? 'javascript:void(0)' : $links); 
						$classActive=""; 
						$classActive=($secondchildMenu['menu_parent'] == $submodule_name ? 'class="active"':''); 
						$classActive=($secondchildMenu['menu_id'] == $controllers_name ? 'class="active"':''); 
			?>
					<li <?php echo $classActive;?> >
						<a href="<?php echo $links ?>">
							<i class="<?php echo $secondchildMenu["menu_icon"] ?>"></i>
							<?php echo Yii::t('menu',$secondchildMenu["name"]); ?> 
							<?php if (sizeof ($secondchildMenu['submenu'])) echo MENU_PULL_RIGHT; ?> 
						</a>
                                          <?php if (!empty($secondchildMenu["submenu"])): ?>
										  
                                        <ul class="treeview-menu" <?php $classActive;?>>
                                            <?php foreach ($secondchildMenu["submenu"] as $thirdchildKey => $thirdchildMenu): ?>
              <?php $links = Yii::$app->urlManager->createUrl([$menu["menu_id"] . '/' . $firstchildMenu["menu_id"] . '/' . $thirdchildMenu["url"]]); ?>
              <?php $links = ($thirdchildMenu['url'] == '#' ? 'javascript:void(0)' : $links) ?>
												<?php 
													$classActive =  "";
													$classActive =  ($thirdchildMenu['menu_id'] == $controllers_name ? 'class="active"' : '');
												?>
                                              <li  <?php echo $classActive;?>>
                                                  <a href="<?php echo $links; ?>"><i class="<?php echo $thirdchildMenu["menu_icon"] ?>"></i> <?php echo Yii::t('menu',$thirdchildMenu["name"]); ?> </a>
                                              </li>
                                        <?php endforeach; ?>
                                        </ul>
                                  <?php endif; ?>
                                  </li>
                            <?php endforeach; ?>
                            </ul>
                      <?php endif; ?>
                      </li>
            <?php endforeach; ?>
                </ul>
            </li>
  <?php }else { ?>
            <li class="<?php echo ($module_name==''?'active':'')?>">
                <a <?php echo $menu['menu_url'];?> href="<?php echo ($menu['menu_url']=='#1'?Url::home():$menu['menu_url']) ?>">
                    <i class="<?php echo $menu["menu_icon"] ?>"></i> <span><?php echo $menu["menu_title"] ?></span></i>
                </a>
            </li>
  <?php } ?>
<?php endforeach; ?>
    </ul>
</section>