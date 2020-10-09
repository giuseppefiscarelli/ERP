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
$pageShowUrl = 'prenotazioni.php';

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
	  
		require_once 'controller/displayPrenotazioni.php' ;
	   
	}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
 
function subform(){
    $('#addform').find(':disabled').removeAttr('disabled');
    $('#addform').submit();
}
function modPren(id){

    $.ajax({
            url: "controller/updateAutoparco.php?action=upPren",
            type:"POST",
            data: {id:id},
            dataType: 'json',
            success:function(results){
                data_da_format = results[0].data_inizio.split(" ");
                data_da = data_da_format[0];
                ora_da = data_da_format[1];
                data_a_format = results[0].data_fine.split(" ");
                data_a = data_a_format[0];
                ora_a = data_a_format[1];
                

                $('#id').val(results[0].id);
                $('#data_da').val(data_da);
                $('#ora_da').val(ora_da);
                $('#data_a').val(data_a);
                $('#ora_a').val(ora_a);
                $('#id_veicolo').val(results[0].id_veicolo);
                $('#id_dipendente').val(results[0].user_assegnazione);
                $('#commessa').val(results[0].commessa);
                $('#destinazione').val(results[0].destinazione);
               // $('#largesizemodal').modal('hide');
              //  $('#id_veicolo').append('<option style="color:black;background-color:'+colore_tr+'" selected>'+targa+' '+marca+' '+modello+'</option>');
               // $('#km_cons').val(km);
               // $("#message2").show();
             //   $('#tex_msg2').html('Nuovo Veicolo Inserito!')
              //  $('#message2').fadeOut(4000);
             }
        });
}
$(document).ready(function() {

    <?php
$id = getParam('id',0);
   
if($id){?>
 modPren(<?=$id?>);
 $('#prenmodal').modal('show'); 


<?}
?>



});


</script>


    </body>
</html>    