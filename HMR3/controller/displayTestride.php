<?php
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);

  }
                  
        $orderBy = getParam('orderBy', 'id'); 
        $search2 = getParam('search2','');
        $search3 = getParam('search3','');
       
        //converts seconds into a specific format  
        
        $search4 = getParam('search4', date("d/m/Y"));
        $search5 = getParam('search5','');
        $search6 = getParam('search6','');
        $to1 = date("d/m/Y");
        $to2 = date("d/m/Y");
        $test=date_create_from_format("d/m/Y","24/10/1984");
        $test2 = date_format($test,"Y-m-d");
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
            'page' => $page,
            'test' => $test2
          ];
            //var_dump($params);
            //var_dump($to2);
           // var_dump($to1);
          $orderByParams = $orderByNavigatorParams = $params;
          unset($orderByParams['orderBy']);
          unset($orderByParams['orderDir']);
          unset($orderByNavigatorParams['page']);
          $orderByQueryString = http_build_query($orderByParams,'&amp;');
          $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');

          $totalList= countTestride($params);
          $numPages= ceil($totalList/$recordsPerPage);
          $testride = getTestride($params);
          //$userList = getusersList();
          $motoList =getMoto();
          require_once 'view/testride_list.php';