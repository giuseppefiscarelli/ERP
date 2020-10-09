<?php
session_start();
require_once '../functions.php';
$action = getParam('action','');
require '../model/autoparco.php';
$params = $_GET;
switch ($action){

    case 'insert':
        $data = $_POST;
        //var_dump($data);die;
        $res = saveKM($data);
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../index.php?');
    break;    
    case 'update':
        $data = $_POST;
        //var_dump($data);die;
        $res = upKM($data);
        $message = $res ? 'Record Inserito' : 'Errore Inserimento Record!';
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../index.php?');
    break; 


}