<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/autoparco.php';
$params = $_GET;
switch ($action){
    case 'deleteKm':
        
        unset($params['action']);
        unset($params['id']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0); 
        $res = deleteKm($id);
        $message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../autoparco.php?'.$queryString);
    break;
    case 'checkPren': 
        $data = $_POST;
        //die;
        $res = checkPrenotazioni($data);
        
        //$message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
       // $_SESSION['message'] = $message;
       // $_SESSION['success'] = $res;
       // header('Location:../index.php?');
    break;
    case 'upPren': 
        $data = $_POST;
        //die;
        $res = upPrenotazioni($data);
        
        //$message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
       // $_SESSION['message'] = $message;
       // $_SESSION['success'] = $res;
       // header('Location:../index.php?');
    break;

    case 'savePren':
        $data = $_POST;
        //var_dump($data);die;
        $res = savePren($data);
        
        $message = $res ? 'Prenotazione Inserita' : 'Errore Inserimento Prenotazione!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../index.php?');

    break;  
    case 'updatePren':
        $data = $_POST;
        //var_dump($data);die;
        $res = updatePren($data);
        
        $message = $res ? 'Prenotazione Aggiornata' : 'Errore Aggiornamento Prenotazione!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../index.php?');

    break; 
    case 'getEvent':
        
       // var_dump($data);die;
        $res = getEvent();
        
        //$message = $res ? 'Prenotazione Inserita' : 'Errore Inserimento Prenotazione!';
       // $_SESSION['message'] = $message;
       // $_SESSION['success'] = $res;
       // header('Location:../index.php?');

    break; 
    case 'getVeinfo':
        $id=$_POST['id'];
        $res = getVeinfo($id);
    break; 
    case 'getPreninfo':
        $id=$_POST['id'];
        $res = getPreninfo($id);
    break;
    case 'getReginfo':
        $id=$_POST['id'];
        $res = getReginfo($id);
    break;  
    case 'abveicolo':
        $id=$_POST['id'];
        $stato=$_POST['stato'];
        $res = abVeicolo($id,$stato);
    break;
    
    case 'updateDot':
        $data = $_POST;
        $tab = $data['tab'];
        $id_vei = $data['id_veicolo'];
        var_dump($data);
        //die;
        $res = updateDot($data);
        header('Location:../scheda_veicolo.php?id='.$id_vei.'&tab='.$tab);
    break; 
    case 'updateMulti':
        $data = $_POST;
        $tab = $data['tab'];
        $id_vei = $data['id_veicolo'];
        var_dump($data);
        //die;
        $res = updateMulti($data);
        header('Location:../scheda_veicolo.php?id='.$id_vei.'&tab='.$tab);
    break;
    case 'upVeicolo':
        $data = $_POST;
        $id = getParam('id_veicolo');
        $action = getParam('action');
        
        var_dump($data);
        //die;
       // var_dump($_FILES['foto']);die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/images/gallery/';
        $res = upVeicolo($data);
        if($res&&$_FILES['foto']){
            move_uploaded_file($_FILES['foto']['tmp_name'], $path.$id.'.png');
            $message = $res >0 ? 'Veicolo Aggiornato' : 'Errore Aggiornamento Veicolo!';
            
        }elseif($res ==0 &&$_FILES['foto']){
            move_uploaded_file($_FILES['foto']['tmp_name'], $path.$id.'.png');
            $message = 'Veicolo Aggiornato';
            $res = 1;

        }else{
            $message = 'Errore Aggiornamento Veicolo!';

        }
       
      

        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?id='.$id);

        
    break; 
    case 'delVeicolo':
        $id= getParam('id', 0); 
        $res = delVeicolo($id);
        $message = $res ? 'Veicolo Eliminato' : 'Errore Eliminazione Veicolo!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../veicoli.php');

    break;       
    case 'insertVeicolo':
        $data = $_POST;
        $id = $data['id_veicolo'];
        $action = getParam('action');
        
        //var_dump($data);die;
        //var_dump($_FILES['foto']);
        //die;
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/images/gallery/';
        $res = insertVeicolo($data);
        if($res){
            if($_FILES['foto']['tmp_name']){
            move_uploaded_file($_FILES['foto']['tmp_name'], $path.$id.'.png');
            }else{
                $foto = $_SERVER['DOCUMENT_ROOT'].'/ERP/images/gallery/car.png';
                $newfoto =$_SERVER['DOCUMENT_ROOT'].'/ERP/images/gallery/'.$id.'.png';
                copy($foto, $newfoto);
                var_dump($foto);
                var_dump($newfoto);
                //die;
            }
        }
        
        
        $message = $res ? 'Veicolo Aggiornato' : 'Errore Aggiornamento Veicolo!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?id='.$id);

        
    break;   
        
    case 'addAllegato':
       
        $data = $_POST;
        var_dump($data);
        //var_dump($_FILES);
        //die;
        $revisione=$data['scadrev'];
        $alert = $data['alert_ab'];
        if($revisione!=0){
            $data['tiposcad']="REV";
            $res2 = addScadenza($data);
        }
        if($alert == 'S'){
            $data['tiposcad']="SER";
            $data['scadrev']=$data['data_scad'];
            $res3 = addScadenza($data);
        } 
        //die;
        $id= $data['id'];
        $tipo =$data['tipo'];
        
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/docs/veicoli/allegati/';

        $path_parts1 = pathinfo($_FILES["file_alle1"]["name"]);
        $extension1 = $path_parts1['extension'];
        $nome_file1 = $id.'_'.$tipo.'_fr.'.$extension1;
        move_uploaded_file($_FILES['file_alle1']['tmp_name'], $path.$nome_file1);
        $data['nome_file1'] = $nome_file1;
        
            
        if($_FILES["file_alle2"]['tmp_name']){
            $path_parts2 = pathinfo($_FILES["file_alle2"]["name"]);
            $extension2 = $path_parts2['extension'];
            $nome_file2 = $id.'_'.$tipo.'_re.'.$extension2; 
            move_uploaded_file($_FILES['file_alle2']['tmp_name'], $path.$nome_file2);
            $data['nome_file2'] = $nome_file2;
        }
       // die;
        $res = addAllegato($data);
        
        $message = $res ? 'Veicolo Aggiornato' : 'Errore Aggiornamento Veicolo!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?id='.$id.'&tab=4');


    break;  
    case 'upAllegato':
       
        $data = $_POST;
        //var_dump($data);
        //var_dump($_FILES);die;
        $id= $data['id'];
        $tipo =$data['up_tipo'];
        $revisione=$data['up_scadrev'];

        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/docs/veicoli/allegati/';

        $path_parts1 = pathinfo($_FILES["up_file_alle1"]["name"]);
        $extension1 = $path_parts1['extension'];
        $nome_file1 = $id.'_'.$tipo.'_fr.'.$extension1;
        move_uploaded_file($_FILES['up_file_alle1']['tmp_name'], $path.$nome_file1);
        $data['up_nome_file1'] = $nome_file1;
        
            
        if($_FILES["up_file_alle2"]['tmp_name']){
            $path_parts2 = pathinfo($_FILES["up_file_alle2"]["name"]);
            $extension2 = $path_parts2['extension'];
            $nome_file2 = $id.'_'.$tipo.'_re.'.$extension2; 
            move_uploaded_file($_FILES['up_file_alle2']['tmp_name'], $path.$nome_file2);
            $data['up_nome_file2'] = $nome_file2;
        }
       // die;
        $res = upAllegato($data);
        if($revisione){
            $data['tiposcad']="REV";
            $res2 = upScadenza($data);
        }
        //var_dump($res);die;
        $message = $res ? 'Veicolo Aggiornato' : 'Errore Aggiornamento Veicolo!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?id='.$id.'&tab=4');


    break;   
    case 'delAllegato':
        $id= getParam('idAll', 0); 
        $id_veicolo = getParam('id_veicolo',0);
        $tab = getParam('tab',0);
        unset($params['action']);
        unset($params['idAll']);
        $queryString = http_build_query($params);
        var_dump($queryString);
        $alle = getAllegato($id);
        var_dump($alle);
        $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/docs/veicoli/allegati/';
       // die;
        $res = delAllegato($id);
        if($res){
            unlink($path.$alle['nome_file1']);
        }
        $message = $res ? 'Allegato Eliminato' : 'Errore Eliminazione Allegato!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?'.$queryString);

    break;  
    case 'upScadenza':
        $data = $_POST;
        $tab = 5;
        $id = $data['id'];
        $data['up_scadrev']=$data['data_scad'];
        var_dump($data);
        //die;
        $res = upScadenza($data);
        $message = $res ? 'Scadenza/Alert Aggiornati' : 'Scadenza/Alert Non Aggiornati!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?id='.$id.'&tab='.$tab);
    break;
    case 'delScadenza':
        $data = $params;
        $tab = 5;
        $id = $data['idScad'];
        $idVei = $data['id'];
      
        //var_dump($data);
        //die;
        $res = delScadenza($id);
        $message = $res ? 'Scadenza/Alert Eliminato' : 'Scadenza/Alert Non Eliminato!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?id='.$idVei.'&tab='.$tab);
    break; 
    case 'addScadenza':
        $data = $_POST;
       // var_dump($data);
        $id=$data['id'];
        $data['tiposcad']=$data['t_scad'];
        $data['scadrev']=$data['data_scad'];
        //die;
        $res = addScadenza($data);
        $message = $res ? 'Veicolo Aggiornato' : 'Errore Aggiornamento Veicolo!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../scheda_veicolo.php?id='.$id.'&tab=5');

    break;       
   }