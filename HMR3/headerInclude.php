<?php

//require_once 'functions.php';
//require_once 'model/user.php';
require_once 'view/top.php';
            
$pageUrl= $_SERVER['PHP_SELF'];


$orderDir = getParam('orderDir', 'DESC');
$orderBy = getParam('orderBy', 'id');
$recordsPerPage = getParam('recordsPerPage', getConfig('recordsPerPage'));
$recordsPerPageOptions = getConfig ('recordsPerPageOptions',[5,10,15,20,50]);
$roletype = getConfig ('roletype'.'');
$ambMenu = getAmbiente();
$search1 = getParam ('search1','');
$page =getParam ('page',1);

?>


<!-- Start wrapper-->
<div class="wrapper " style="height:94vh;">
  <!--Start sidebar-wrapper-->
<?php
    require_once 'view/sidebar.php';
?>
   <!--End sidebar-wrapper-->
<!--Start topbar header-->
<div class="main-panel" >
<?php
    require_once 'view/topbar_header.php';
?>    
<!--End topbar header-->

 