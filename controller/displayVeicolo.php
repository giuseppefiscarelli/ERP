<?php
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);
  }
                  
           

         
         // unset($orderByParams['orderBy']);
         // unset($orderByParams['orderDir']);
         // unset($orderByNavigatorParams['page']);
         // $orderByQueryString = http_build_query($orderByParams,'&amp;');
         // $navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');

          //$totalUsers= countUsers($params);
          //$numPages= ceil($totalUsers/$recordsPerPage);
          //$registro = getRegistro($params);
          $id = getParam('id',0);
          $actTab=getParam('tab');
          if(!$actTab){
            $actTab =7;
          }
          
          if($id){
            $veicolo=getVeicolopage($id);
            //var_dump($veicolo);
            $orderBy = getParam('orderBy', 'id'); 
            $search2 = $id;
            $search3 = getParam('search3','');
          $params =[
            'orderBy' => $orderBy,
            'orderDir'=> $orderDir,
            'recordsPerPage' =>$recordsPerPage,
            
            'search2' => $search2,
            'page' => $page
          ];
          //$orderByParams = $orderByNavigatorParams = $params;
          //$orderByQueryString = http_build_query($orderByParams,'&amp;');
          //$navOrderByQueryString = http_build_query($orderByNavigatorParams,'&amp;');
            $registro = getRegistro($params);
            $allegati = getAllegati($id);

           // var_dump($allegati);
          }
          require_once 'view/veicolo_page.php';