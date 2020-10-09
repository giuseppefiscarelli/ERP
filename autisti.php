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
	  
		require_once 'controller/displayAutisti.php' ;
	   
	}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
    function ab_guida(a,id){
    
        if (a.checked) {
            stato = "D";
        }else{
            stato = "N";
        }
            $.ajax({
                url:'controller/updateUser.php?action=abguida',
                type:"POST",
                data: {id:id,stato:stato},
                dataType: 'json',
                success:function(results){
                
                }  
            });
    }; 
</script>

  <!--Switchery Js-->
  
    <script>
      var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
       });
    </script>

    <!--Bootstrap Switch Buttons-->
  
    <script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>

    </body>
</html>    