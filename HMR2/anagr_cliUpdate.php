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

require_once 'headerInclude.php';
?>
<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">


<?php
 $authPage = $_SESSION['userData']['ambiente'];
 $authThisPage =basename($_SERVER['PHP_SELF']);
 
 //if(!checkAuthPage($authPage,$authThisPage)){
 
  // require_once 'view/403.php' ;
   
 
 //}else{


    $id = getParam('id',0);
    $action = getParam('action',0);

        if($id){
            $cli = getCliente($id);
        }else{
            $cli =[
                'id' =>'',
                'cod_ambiente'=>'',
                'cod_azienda'=>'',
                'cod_filiale'=>'',
                'user_ins' =>'',
                'data_ins'=>'',
                'user_mod' =>'',
                'tipo_anagr'=>'',
                'ragsociale'=>'',
                'cognome' =>'',
                'nome' => '',
                'luogonasc' => '',
                'provnasc' => '',
                'nazionalita' => '',
                'sesso' => '',
                'codfiscale' => '',
                'partitaiva' => '',
                'indirizzores' => '',
                'luogores' => '',
                'provres' => '',
                'capres' => '',
                'mail1' => '',
                'mail2' => '',
                'tel1' => '',
                'tel2' => '',
                'mobile1' => '',
                'mobile2' => '',
                'fax' => ''

                

            ];
}

//var_dump($cli);

require_once 'view/formAnagr_cliUpdate.php';
require_once 'view/footer.php';

//}	
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
            $("input").keyup(function() { 
                $("#modbutton").show(); 
            });
            $("select").change(function(){
               $("#modbutton").show();       
            }); 
        }); 
   
            
        
</script>


</body>
</html>  
