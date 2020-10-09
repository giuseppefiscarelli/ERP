<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/listino_veicoli.php';
$updateUrl = 'listino_veicoliUpdate.php';
$deleteUrl = 'controller/updateListino_veicoli.php';

require_once 'headerInclude.php';
?>
<div class="clearfix"></div> 
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     </div>

    <?php
    
    $authPage = $_SESSION['userData']['ambiente'];
	  $authThisPage =basename($_SERVER['PHP_SELF']);
	  
	  if(!checkAuthPage($authPage,$authThisPage)){
		
		require_once 'view/403.php' ;
		
	  }else{	  
	  
		require_once 'controller/displayListino.php' ;
	   
	  }	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once '../view/footer.php';
?>
<script type="text/javascript">
  
</script>


    </body>
</html>    