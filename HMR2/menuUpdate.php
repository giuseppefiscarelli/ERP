<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}

require_once 'model/menu.php';
$updateUrl = 'menuUpdate.php';
$deleteUrl = 'controller/updateMenu.php';
require_once 'headerInclude.php';
?>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">


<?php
$id = getParam('id',0);
$action = getParam('action',0);
$ambiente = getParam('ambiente',0);
$menu = getParam('menu',0);
$sub1 = getParam('sub1','');
if($id){
    $mMenu = getmMenu($id);
}else{
    $mMenu =[
        'id' =>'',
        'menu'=> $menu,
        'posizione'=>'',
        'sub1'=>$sub1,
        'sub2' =>'',
        'sub3'=>'',
        'icona' =>'',
        'funzione'=>'',
        'nome'=>'',
        'ambiente' => $ambiente

    ];
}

//var_dump($user);

require_once 'view/formMenuUpdate.php';
require_once 'view/footer.php';


?>

<script type="text/javascript">
  
</script>
</body>
</html>  
