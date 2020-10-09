
<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/anagr_cli.php';
$params = $_GET;
switch ($action){

    case 'delete':
        
        unset($params['action']);
        unset($params['id']);
        
        $queryString = http_build_query($params);

        $id= getParam('id', 0);
        $res = deleteCliente($id);
        $message = $res ? 'Record Eliminato' : 'Errore Eliminazione Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../anagr_cli.php?'.$queryString);
        break;
    case 'saveCliente':
        $data = $_POST;
        $res = saveCliente($data); 
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        //die;
        header('Location:../anagr_cli.php?'.$queryString);
    break;
    
    case 'storeCliente':
        $data = $_POST;
        $id = getParam('id',0);
        $res = storeCliente($data,$id); 
        $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../anagr_cli.php?'.$queryString);
    break; 
    
    case 'upCliente':
        $data = $_POST;
        $id = getParam('id',0);
        $res = storeCliente($data,$id); 
        $message = $res ? 'Record Aggiornato' : 'Errore Aggiornamento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../anagr_cliPage.php?id='.$id);
    break;    
   }