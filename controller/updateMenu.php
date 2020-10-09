<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/menu.php';
$params = $_GET;
switch ($action){

    case 'delete': 
        
        unset($params['action']);
        unset($params['id']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
        $res = delete($id);
        $message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../gestione_menu.php?'.$queryString);
        break;
    case 'deleteAmb':
    
        unset($params['action']);
        unset($params['id']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
        $res = deleteAmb($id);
        $message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../gestione_menu.php?'.$queryString);
        break;    
    case 'saveMenu':
        $data = $_POST;
        $res = saveMenu($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../gestione_menu.php?'.$queryString);
    break;

    case 'saveAmb':
        $data = $_POST;
        $res = saveAmb($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../gestione_menu.php?'.$queryString);
    break;
    
    case 'storeMenu':
        $data = $_POST;
        $id = getParam('id',0);
        $res = storeMenu($data,$id); 
        $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../gestione_menu.php?'.$queryString);
    break;  
    
    case 'storeAmb':
        $data = $_POST;
        $id = getParam('id',0);
        $res = storeAmb($data,$id); 
        $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../gestione_menu.php?'.$queryString);
    break; 
   }