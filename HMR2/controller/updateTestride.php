<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/test_ride.php';
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
        header('Location:../test_ride.php?'.$queryString);
        break;
    case 'saveTestride':
        $data = $_POST;
        $res = saveTestride($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../test_ride.php?'.$queryString);
    break;
    
    case 'store':
        $data = $_POST;
        $id = getParam('id',0);
        $res = storeUser($data,$id); 
        $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../test_ride.php?'.$queryString);
    break;
    
    case 'getkm':
        getKM();
        
    break;    
   }