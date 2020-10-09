<?php
session_start();
require_once 'functions.php';
//var_dump($_SESSION);die;
if(!empty($_POST)){

    if(!empty($_POST['action']) && $_POST['action'] === 'logout'){
        $status = 'offline';
        statusUsers($status,$_SESSION['userData']['username']);
        //var_dump($_SESSION);die;
        $_SESSION = [];
        
        header('Location: login.php');
        exit;
    }

    $token = $_POST['_csrf'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $homeAmb = $_POST['ambiente'] ?? '';

    $result = verifyLogin($token, $email, $password);
    unset($_SESSION['csrf']);
    if($result['success']){
        $status = 'online';
        statusUsers($status,$result['user']['username']);
        
        session_regenerate_id();
        
        $_SESSION['userData']['status'] = $status;
        
        $_SESSION['loggedin'] = true;
        unset($result['user']['password']);
        $_SESSION['userData'] = $result['user'];
        $homePage = $result['user']['ambiente'];
        $result['user']['status'] = 'online';
        
        if ($homePage == '2'){

          header('Location: indexhmr.php'); 
        }elseif ($homePage == '1'){
            header('Location: index.php'); 
        }else{
            $_SESSION['message'] = $result['message'];
            header('Location: login.php');
        }
        
           
        
        
        
        exit;
    }else{

        $_SESSION['message'] = $result['message'];
        header('Location: login.php');
    }

}else{
    header('Location: login.php');
}