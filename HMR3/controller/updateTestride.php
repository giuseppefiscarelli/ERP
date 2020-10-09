<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/test_ride.php';
$params = $_GET;
if(!empty($_SESSION['message'])){
    $message = $_SESSION['message'];
    $alertType = $_SESSION['success'] ? 'success':'danger';
    $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
    require 'view/messageDelete.php';
    unset($_SESSION['message'],$_SESSION['success']);

  }
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
       
        $firma = $_POST['signCode'];
        $idfirma = $_POST['id_cliente'];
        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        $res = saveTestride($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //var_dump($res);
        $file = $path.$idfirma.'_sig_pren_tr_'.$res.'.png';
        file_put_contents($file, $firma);
        header('Location:../test_ridePage.php?id='.$res);
    break;
    
    case 'storeTestride':
        $data = $_POST;
        //var_dump($_POST);die;
        $firma = $_POST['signCode'];
        $id = intval(getParam('id',0));
        if((strlen($firma))<3000){
            $res = storeTestride($data,$id); 
            $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';

            //var_dump(strlen($firma));
            //die;
            $_SESSION['message'] = $message;
            $_SESSION['success'] = $res;
            header('Location:../test_ridePage.php?id='.$id);    
        }else{  
        $idfirma = $_POST['id_cliente'];

        $firma = substr($firma,strpos($firma,",")+1);
        $firma = base64_decode($firma);
        //var_dump($firma);die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/HMR/docs/testride/sign/';
        
        //var_dump($id);die;
        $res = storeTestride($data,$id); 
        $message = 'Record Aggiornato, Firma Inserita' ;

        //var_dump($res);
        //die;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        $file = $path.$idfirma.'_sig_ricons_tr_'.$id.'.png';
        file_put_contents($file, $firma);
        header('Location:../test_ridePage.php?id='.$id);
        }
    break;
    
    case 'getkm':
        getKM();
        
    break;    
   }