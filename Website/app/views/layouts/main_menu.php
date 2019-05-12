<?php
  if(currentUser()) {
    $userType = currentUser()->user_type;
    $username = currentUser()->username;
    if($userType == 'Customer') {
      $user = new Customer($username);
    } elseif($userType == 'Promoter') {
      $user = new Promoter($username);
    } else {
      $user = new Administrator($username);    
    }
  }
  $menu = Router::getMenu('menu_acl');
  $currentPage = currentPage();
?>

<div class="mainmenu-area" id="mainmenu-area">
  <div class="mainmenu-area-bg"></div>
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
          <a href="home" class="navbar-brand"><img src="<?=PROOT?>img/logo.png" alt="logo"></a>
        </div>
          
        <div id="main-nav" class="stellarnav">
              <ul id ="nav" class="nav navbar-nav pull-right">
                <?php if(currentUser()): ?>
                  <li><a href="#">Hello <?=currentUser()->user_type?></a></li>
                <?php endif;?>
              </ul>
              <ul id="nav" class="nav navbar-nav">
                <?php foreach($menu as $key => $val): 
                  $active = '';?>
                  <?php if(is_array($val)):?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$key?> <span class="caret"></span></a>
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
                  <?php else: 
                    $active = ($val == $currentPage) ? 'active':'';?>
                      <li><a class="<?=$active?>" href="<?=$val?>"><?=$key?></a></li>
                  <?php endif;?>
                <?php endforeach;?>
                <!-- <li><a href="#">home</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">Service</a>
                  <ul>
                    <li><a href="promoterSignup.php">Register as a promoter</a></li>
                  </ul>
                </li>
                <li class="logged-user"><a href="login.php">LOGIN</a></li>	 -->
              </ul>
        </div>
      </div>
  </nav>
</div>