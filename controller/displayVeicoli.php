<?php
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
  //  $alertType = $_SESSION['success'] ? 'success':'danger';
    //$iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);
  }
                  
            $orderBy = getParam('orderBy', 'id'); 
            $search2 = getParam('search2','');
            $search3 = getParam('search3','');
          $params =[
            'orderBy' => $orderBy,
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            'search1' => $search1,
            'search2' => $search2,
            'page' => $page
            
          ];

          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');

          //$totalUsers= countUsers($params);
          //$numPages= ceil($totalUsers/$recordsPerPage);
          $registro = getRegistro($params);
          $view = getParam('view','grid');
         // var_dump($view);
          if($view=='grid'){
            require_once 'view/veicoli_list.php';
          }else{
            require_once 'view/veicoli_list_list.php';
          }