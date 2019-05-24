<?php
  $menu_file = 'menu_acl';
  if(currentUser()) {
    $userType = currentUser()->user_type;
    $username = currentUser()->username;
    if($userType == 'Customer') {
      $user = new Customer($username);
      $notifications = $user->getNotifications();
      // test($notifications);
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

<!-- <script>
  $(document).ready(function() {
    var promo_id = $("#resp").val();
    $("#unread").click(function() {
        $.ajax({
            type : "POST",
            url : '<?=PROOT?>settings/notification',
            data : {promo_id:promo_id},
            success : function(resp) {
              
            }
        });
    });
  });
</script> -->

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
                    <?php //test($val)?>
                    <?php if($val["Notifications"] == "Notifications"): ?>
                      <li class="dropdown pull-right">
                        <?php if(count($notifications)): ?>
                          <a href="#" class="dropdown-toggle" id="unread" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification
                            <span class="badge" style="color:white"><?=count($notifications)?></span>
                          </a>
                          
                          <ul class="dropdown-menu">
                            <?php foreach($notifications as $n): ?>
                              <a href="<?=PROOT?>home/promoterpage/<?=$n[0]->pr_username?>">
                                <div id="resp" style="display:none;"><?=$n[0]->promo_id?></div>
                                <small><i><?=$n[0]->start_date?></i></small><br>
                                <?=substr($n[0]->description,0,50).'...'?>
                              </a>
                            <?php endforeach;?>
                            
                            <li role="separator" class="divider"></li>
                          </ul>
                        <?php else:?>
                          <a href="#" class="dropdown-toggle" id="unread" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification</a>
                        <?php endif;?>
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
                      <li><a class="<?=$active?>" href="<?=$val?>"><?=$key?></a></li>
                  <?php endif;?>
                <?php endforeach;?>
    
              </ul>
        </div>
      </div>
  </nav>
</div>