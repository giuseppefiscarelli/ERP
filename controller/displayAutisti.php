<?php
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
   // $alertType = $_SESSION['success'] ? 'success':'danger';
   // $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
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

          $totalUsers= countRider($params);
          //var_dump($totalUsers);
          $numPages= ceil($totalUsers/$recordsPerPage);
          $autisti = getRiders($params);
          $filiali = getFiliali();
          //var_dump($autisti);
          require_once 'view/autisti_list.php';