
<?php
session_start();
require_once 'functions.php';
$pagTitle = getTitle();
if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/test_ride.php';
$updateUrl = 'test_rideUpdate.php';
$deleteUrl = 'controller/updateTestride.php';
$pageShowUrl = 'test_ridePage.php';
$authPage = $_SESSION['userData']['ambiente'];
$authThisPage =basename($_SERVER['PHP_SELF']);
require_once 'headerInclude.php';
?>
<div class="content" style="background-image: url(images/6.jpg);background-size:cover;background-attachment: fixed;">
        <div class="container-fluid">
          <!-- your content here -->
        

    <?php
    
   
	  if(!checkAuthPage($authPage,$authThisPage)){
		
		require_once 'view/403.php' ;
		
	  }else{	  
	  
		require_once 'controller/displayTestride.php' ;
	   
	  }	

	?>


    
</div>
      </div>   
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  function allowNumbersOnly(e){
        code =(e.which) ? e.which : e.keyCode;
  
        if (code >31 && (code< 44 || code > 57 ) ){
            e.preventDefault();
        }
        
    };

   
</script>


    </body>
</html>    