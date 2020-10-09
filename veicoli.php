<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/autoparco.php';
//$updateUrl = 'anagr_cliUpdate.php';
$deleteUrl = 'controller/updateAutoparco.php';
//$pageShowUrl = 'anagr_cliPage.php';

require_once 'headerInclude.php';
?>
<div class="clearfix"></div> 
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid" id="container-fluid"style="display:none;">

    
	   
      

    <?php
    
   // $authPage = $_SESSION['userData']['ambiente'];
  //  $authThisPage =basename($_SERVER['PHP_SELF']);
    
  //  if(!checkAuthPage($authPage,$authThisPage)){
        
  //  require_once 'view/403.php' ;
        
     
  //  }else{
	  
		require_once 'controller/displayVeicoli.php' ;
	   
//	}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  
</script>
<script type="text/javascript">
 $(document).ready(function(){
       
   
    $('.container-fluid').fadeIn("slow");
    
   
    });
    function abilitazione(a,id){
    
        if (a.checked) {
            check = "D";
        }else{
            check = "N";
        }
            $.ajax({
                url:'controller/updateAutoparco.php?action=abveicolo',
                type:"POST",
                data: {id:id,stato:check},
                dataType: 'json',
                success:function(results){
                
                }  
            });
    }; 
    function view(a){
    
    if (a.checked) {
        check = "grid";
    }else{
        check = "list";
    }
    url = window.location.href;
    url = url.split('?')[0];
    url += "?view="+check;
    
    window.location.href = url;
    
    //window.url.reload +="?view="+check;
       
}; 
</script>

<script>
      var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
       });
       function readURL(input) {
       if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#old_foto').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
       $("#foto").change(function() {
  readURL(this);
});
    </script>

    </body>
</html>    