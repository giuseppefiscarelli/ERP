<?php
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);
  }
                

          $params =[
            'orderBy' => $orderBy,
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            'search1' => $search1,
            'page' => $page
          ];

          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');

          $totalUsers= countUsers($params);
          $numPages= ceil($totalUsers/$recordsPerPage);
          $users = getUsers($params);
          $caruser= getParam('usercar',0);
          //var_dump($caruser);
          if( $_SESSION['userData']['username']=="StefPett"||$caruser){
            require_once 'view/homeCar.php';
          }elseif( $_SESSION['userData']['roletype']=="user"){
            require_once 'view/homeDip.php';
          }else{
          require_once 'view/homeSetec.php';
          }