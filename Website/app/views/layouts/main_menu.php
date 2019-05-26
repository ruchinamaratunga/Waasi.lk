<?php
  $menu_file = 'menu_acl';
  if(currentUser()) {
    $userType = currentUser()->user_type;
    // test($userType);
    $username = currentUser()->username;
    if($userType == 'Customer') {
      $user = new Customer($username);
    } elseif($userType == 'Promoter') {
      $menu_file = 'promoter_menu';
      $user = new Promoter($username);
    } else {
      $menu_file = 'admin_menu';
      $user = new Administrator($username);    
    }
  }
  // test($menu_file);
  $menu = Router::getMenu($menu_file);
  $currentPage = currentPage();
?>

<div class="mainmenu-area" id="mainmenu-area">
  <div class="mainmenu-area-bg"></div>
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
			<?php if(currentUser()): ?>
				<?php if($userType=='Customer'): ?>
					<a href="<?=PROOT?>home/index" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>
				<?php elseif($userType=='Promoter'):?>
					<a href="<?=PROOT?>promoter/index" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>
				<?php else: ?>
					<a href="<?=PROOT?>admin/admin" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>
				<?php endif;?>
			<?php else :?>
				<a href="<?=PROOT?>home/index" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>
			<?php endif; ?>
<!--          	<a href="home" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>-->
        </div>
          
        <div id="main-nav" class="stellarnav">
              <ul id ="nav" class="nav navbar-nav pull-right">
                <?php if(currentUser()): ?>
                  <li class="logged-user"><a href="#">Hello <?=currentUser()->username?></a>
					  <ul>
						  <li><a href="<?=PROOT?>settings/index" target="new">Settings</a></li>
						  <li><a href="<?=PROOT?>register/logout">Logout</a></li>
					  </ul>
				  </li>
                <?php endif;?>
              </ul>
              <ul id="nav" class="nav navbar-nav">                  
                
                <?php foreach($menu as $key => $val): 
                  $active = '';?>
                  <?php if(is_array($val)):?>
                    
                    <?php if($val == "Notifications"): ?>
                      <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification <span class="badge" style="color:white">5</span></a>
                        <ul class="dropdown-menu">
                          <a href="#">
                            <small><i>feb 18, 2019</i></small><br>
                            Odel 40% off for Sampath Credit card
                          </a>
                          <li role="separator" class="divider"></li>
                        </ul>
                      </li>
                    <?php else:?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$key?></a>
                        <ul class="dropdown-menu">
                          <?php foreach($val as $k => $v):
                            $active = ($v == $currentPage) ? 'active':''; ?>
                            <?php if($k == 'seperator'): ?>
                              <li role="separator" class="divider"></li>
                            <?php else: ?>
                              <li><a class="<?=$active?>" href="<?=$v?>"><?=$k?></a></li>                    
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </ul>
                      </li>
                    <?php endif;?>
                  <?php else: 
                    $active = ($val == $currentPage) ? 'active':'';?>
				  	<?php if($key == 'Login'): ?>
						<li class = "logged-user"><a class="<?=$active?>" href="<?=$val?>"><?=$key?></a></li>
				    <?php elseif($key=='Logout'): ?>
				  		<? ?>
				  	<?php else: ?>
                      <li><a class="<?=$active?>" href="<?=$val?>"><?=$key?></a></li>
				  	<?php endif ?>
                  <?php endif;?>
                <?php endforeach;?>
    
              </ul>
        </div>
      </div>
  </nav>
</div>