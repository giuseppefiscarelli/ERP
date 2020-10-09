<?php

session_start();

require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/anagr_cli.php';
$updateUrl = 'anagr_cliUpdate.php';
$deleteUrl = 'controller/updateAnagr_cli.php';
$pageUrl = 'anagr_cliPage.php';

require_once 'headerInclude.php';

?>
<div class="clearfix"></div> 
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     

    <?php
    if(!empty($_SESSION['message'])){
        $message = $_SESSION['message'];
        $alertType = $_SESSION['success'] ? 'success':'danger';
        $iconType = $_SESSION['success'] ? 'check':'exclamation-triangle';
        require 'view/messageDelete.php';
        unset($_SESSION['message'],$_SESSION['success']);
    
      }
    $authPage = $_SESSION['userData']['ambiente'];
    $authThisPage =basename($_SERVER['PHP_SELF']);
    
  //  if(!checkAuthPage($authPage,$authThisPage)){
        
  //  require_once 'view/403.php' ;
        
     
    //}else{
    $id = getParam('id',0);
    $cli = getCliente($id); 
    $cf = $cli['codfiscale'];
    $patente = getPatente($cf);
    
	require_once 'view/cliente_page.php' ;
	   
	//}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  
      
      $(function(){
             CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
             $("#provres").val("<?=$cli['provres']?$cli['provres']:'RM'?>").change();
             setTimeout(()=>$("#luogores").val("<?=$cli['luogores']?$cli['luogores']:'H501'?>"), 200);
  
             CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
             $("#provnasc").val("<?=$cli['provnasc']?$cli['provnasc']:'RM'?>").change();
             setTimeout(()=>$("#luogonasc").val("<?=$cli['luogonasc']?$cli['luogonasc']:'H501'?>"), 200);
             $('#cf').click(function(ev){
                     ev.preventDefault();
                     let cf = new CodiceFiscale({
                         name : $("#nome").val(),
                         surname : $("#cognome").val(),
                         gender : $("#sesso").val(),
                         birthday : $("#datanasc").val(),
                         birthplace : $("#luogonasc").val()
                     });
                     $("#codfiscale").val(cf.toString());
 
             });
 
     });
    
         $(document).ready(function() { 
             $("input").keypress(function() { 
                 $("#modbutton").show(); 
             });
             $("select").change(function(){
                $("#modbutton").show();       
             }); 
         }); 
    
             
         
    
</script>


    </body>
</html>    