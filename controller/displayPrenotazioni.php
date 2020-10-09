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
            $search4 = getParam('search4','');
            $search5 = getParam('search5','');
            $search6 = getParam('search6','');
          $params =[
            'orderBy' => $orderBy,
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            'search1' => $search1,
            'search2' => $search2,
            'search3' => $search3,
            'search4' => $search4,
            'search5' => $search5,
            'search6' => $search6,
            'page' => $page
          ];

          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');

          $totalUsers= countPrenotazioni($params);
          $numPages= ceil($totalUsers/$recordsPerPage);
          $prenotazioni = getPrenotazioni($params);
         // var_dump($prenotazioni);
          require_once 'view/prenotazioni_list.php';