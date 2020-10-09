<?php
      $menus = getMenu($ambMenu); 
      //require_once 'view/testmenu.php';
      $activeLink = basename($_SERVER['PHP_SELF']);
      ?>


            <div class="sidebar" data-color="danger" data-background-color="white">
           <div class="logo">
        <a  class="simple-text logo-mini">
        <img src="images/HONDA1.png" style="max-height: 25px">
        </a>
        <a  class="simple-text logo-normal">
        <img src="images/HONDA2.png" style="width: 160px;">
        </a>
      </div>
            <div class="sidebar-wrapper">
        
        <ul class="nav">
        <?php
                if ($menus){
                    
                    foreach ($menus as $menu){
                        if ($menu['menu']==='main'){  
                                    ?>
          <li class="nav-item <?=basename($_SERVER['PHP_SELF']) === $menu['funzione']?'active':''?>">
            <a class="nav-link" data-toggle="<?=$menu['funzione']==='menu'?'collapse':''?>" href="<?= $menu['funzione']==='menu'?'#'.$menu['nome']:$menu['funzione'] ?>">
            <i class="fa <?= $menu['icona'] ?>"></i>
              <p><?= $menu['nome'] ?>
              <?php 
              if($menu['funzione'] === 'menu') {?>
              <b class="caret"></b>
              <?php }?>
              </p>
            </a>
            <?php
        
        $subParMenu = $menu['nome'];

        
        $submenu1 = getSubMenu1($subParMenu);
        if ($submenu1){?>
        <div class="collapse " id="<?=$subParMenu?>" >
              <ul class="nav">
                <?php
                    foreach($submenu1 as $sub1){?>


                
                <li class="nav-item <?=basename($_SERVER['PHP_SELF']) === $sub1['funzione']?'active':''?>">
                  <a class="nav-link "  href="<?= $sub1['funzione'] ?>">
                    <span class="sidebar-mini"> <i class="fa <?= $sub1['icona'] ?>"></i> </span>
                    <span class="sidebar-normal">  <?= $sub1['nome'] ?> </span>
                  </a>
                </li>
                
                       


                <?php   
                  }?>
              </ul>
        </div>   
          <?php 
          }          
          ?>   
    </li>
      <?php
            }                 
          }
      }?>  

  </ul>
   
</div>
</div>