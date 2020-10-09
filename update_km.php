<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/autoparco.php';
//$updateUrl = 'anagr_cliUpdate.php';
//$deleteUrl = 'controller/updateAnagr_cli.php';
//$pageShowUrl = 'anagr_cliPage.php';

require_once 'headerInclude.php';
?>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<div class="clearfix"></div> 
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     

    <?php
    
    $authPage = $_SESSION['userData']['ambiente'];
    $authThisPage =basename($_SERVER['PHP_SELF']);
    
    if(!checkAuthPage($authPage,$authThisPage)){
        
    require_once 'view/403.php' ;
        
     
    }else{
	  
		require_once 'view/kmUpdate.php' ;
	   
	}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  
</script>


    </body>
</html>    