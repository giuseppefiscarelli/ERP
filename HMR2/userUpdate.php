<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}

require_once 'model/user.php';
$updateUrl = 'userUpdate.php';
$deleteUrl = 'controller/updateUser.php';
require_once 'headerInclude.php';
?>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">


<?php
$id = getParam('id',0);
$action = getParam('action',0);

if($id){
    $user = getUser($id);
}else{
    $user =[
        'id' =>'',
        'username'=>'',
        'roletype'=>'user',
        'password'=>'',
        'cognome' =>'',
        'nome'=>'',
        'email' =>'',
        'ambiente'=>'',
        'azienda'=>'',
        'filiale' =>'',
        'logoazienda' => ''

    ];
}

//var_dump($user);

require_once 'view/formUpdate.php';
require_once 'view/footer.php';


?>

<script type="text/javascript">
  
</script>
</body>
</html>  
