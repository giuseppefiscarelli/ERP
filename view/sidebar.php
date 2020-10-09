<?php
      $menus = getMenu($ambMenu);
      //require_once 'view/testmenu.php';
      ?>
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <!--<a href="homehmr.php">-->
       <img src="images/<?=getUserLogo()?>" style="padding: 5px;height: inherit;max-width: -webkit-fill-available;">
       
    
   </div>
<!--
   <div class="user-details"> 
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><img class="mr-3 side-user-img" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
       <div class="media-body">
       <h6 class="side-user-name">Mark Johnson</h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
            <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li>
      <li><a href="javaScript:void();"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>

-->
  <ul class="sidebar-menu">

  <?php
  if ($menus){
    
      foreach ($menus as $menu){
        if ($menu['menu']==='main'){  
                    ?>
                
  <!-- new app-->
    <li id="<?= $menu['id'] ?>" >
          <a href="
          <?= $menu['funzione'] ?>" class="waves-effect">
            <i class="fa <?= $menu['icona'] ?>"></i>
            <span>
            <?= $menu['nome'] ?>
            </span>
            <?php 
              if($menu['funzione'] === 'menu') {?>
             <i class="fa fa-angle-left pull-right"></i>
              <?php }?>
          </a>
        <?php
        
        $subParMenu = $menu['nome'];

        
        $submenu1 = getSubMenu1($subParMenu);
        if ($submenu1){
            foreach($submenu1 as $sub1){?>
        
          <ul class="sidebar-submenu">

            <!-- new app-->
            <li id="<?= $sub1['id'] ?>" >
                  <a href="<?= $sub1['funzione'] ?>" class="waves-effect">
                    <i class="fa <?= $sub1['icona'] ?>"></i>
                    <span>
                    <?= $sub1['nome'] ?>
                    </span>
                    <?php 
                      if(empty ($menu['funzione']) === 'menu') {?>
                      
                    <?php }?>
                    
                    
                  </a>
            </li>
          
          </ul>
          <?php   
            }

        }          
        ?>   
    </li>
      <?php
            }                 
          }
      }?>  

  </ul>
   
</div>