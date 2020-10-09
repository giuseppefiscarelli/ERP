<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/autoparco.php';
$updateUrl = 'controller/updateAutoparco.php';
$deleteUrl = 'controller/updateAutoparco.php';
$pageShowUrl = 'scheda_veicolo.php';

require_once 'headerInclude.php';
?>
<div class="clearfix"></div> 
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid" style="display:none;">

    
	   
     

    <?php
    
   // $authPage = $_SESSION['userData']['ambiente'];
  //  $authThisPage =basename($_SERVER['PHP_SELF']);
    
  //  if(!checkAuthPage($authPage,$authThisPage)){
        
  //  require_once 'view/403.php' ;
        
     
  //  }else{
	  
		require_once 'controller/displayVeicolo.php' ;
	   
//	}	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function(){
    activaTab('tabe-<?=$actTab?>');
   
       
   
       $('.container-fluid').fadeIn("slow");
       
      
     

  });
  function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};
</script>
<script type="text/javascript">
      function prtAll(id) {
          
          var url = 'report/allegati/allegato.php?id='+id;
          window.open(url,"Stampa");
          
        };
     
    $("#tipo_alle").on('change select',function(event) {
      $("#t_file").show();
      $("#scad,#row_alert,#row_service").hide();
      $('#scadrev').attr({"required":false});
      tipo = $(this ).val();
      if (tipo =='CC'){
        $("#scad").show();
        $('#scadrev').attr({"required":true});
      }
      if(tipo=='DS'){
       $('#row_alert,#row_service').show();

      }
      
    });
    $('#ds_al_en').on('change',function(event){
      $('#row_km_ins_alle,#row_intervallo_alle,#row_km_scad_alle,#row_km_alert_alle,#row_data_scad_alle,#row_data_alert_alle').hide();
      ab = $(this).is(':checked'); 
      if (ab){
        $('#row_km_ins_alle,#row_intervallo_alle,#row_km_scad_alle,#row_km_alert_alle,#row_data_scad_alle,#row_data_alert_alle').show();
      }
      console.log(ab);
    });
    $("#tipo_file").on('change select',function(event) {

      tipo = $(this ).val();
      if(tipo =='PDM'){
        $('#file_alle1,#file_alle2').attr({"accept":'.pdf',"required":true});
        $("#f_alle1,#f_alle2").show();
      }else if(tipo == 'PDS'){
        $('#file_alle1').attr({"accept":'.pdf',"required":true});
        $('#file_alle2').attr({"required":false});
        $("#f_alle1").show();
        $('#f_alle2').hide();

      }else if(tipo =='IMG'){
        $('#file_alle1').attr({"accept":'image/*',"required":true});
        $('#file_alle2').attr({"required":false});
        $("#f_alle1").show();
        $('#f_alle2').hide();
      }else if(tipo =='IMM'){
        $('#file_alle1,#file_alle2').attr({"accept":'image/*',"required":true});
        $("#f_alle1,#f_alle2").show();


      }


    });
    $('[id^=up_tipo_file]').on('change select',function(event) {

      tipo = $(this ).val();
      if(tipo =='PDM'){
        $('[id^=up_file_alle1],[id^=up_file_alle2]').attr({"accept":'.pdf',"required":true});
        $('[id^=up_f_alle1],[id^=up_f_alle2]').show();
      }else if(tipo == 'PDS'){
        $('[id^=up_file_alle1]').attr({"accept":'.pdf',"required":true});
        $('[id^=up_file_alle2]').attr({"required":false});
        $('[id^=up_f_alle1]').show();
        $('[id^=up_f_alle2]').hide();

      }else if(tipo =='IMG'){
        $('[id^=up_file_alle1]').attr({"accept":'image/*',"required":true});
        $('[id^=up_file_alle2]').attr({"required":false});
        $('[id^=up_f_alle1]').show();
        $('[id^=up_f_alle2]').hide();
      }else if(tipo =='IMM'){
        $('[id^=up_file_alle1],[id^=up_file_alle2]').attr({"accept":'image/*',"required":true});
        $('[id^=up_f_alle1],[id^=up_f_alle2]').show();


      }


    });
    $("#t_scad").on('change select',function(event) {
      $("#row_data_scad,#row_data_alert").show();
      tipo = $(this ).val();
      
      if(tipo=='SER'){
        $("#row_km_ins,#row_intervallo,#row_km_scad,#row_km_alert").show();
        $('#km_ins,#intervallo,#km_scad,#km_alert').attr({"required":true});

      }else{
        $("#row_km_ins,#row_intervallo,#row_km_scad,#row_km_alert").hide();
        $('#km_ins,#intervallo,#km_scad,#km_alert').attr({"required":false});


      }
      
    });
    $("#intervallo").on('change select',function(event) {

          intervallo = parseInt($(this ).val());
          km_ins = parseInt($('#km_ins').val());
          $('#km_scad').val(km_ins+intervallo);
          alert = 1000;
          $('#km_alert').val(km_ins+intervallo-alert);
          d = new Date();
          anno = d.getFullYear();
          mese = d.getMonth()+1;
          mese= mese < 10 ? '0' + mese : '' + mese;
          giorno =  d.getDate();
          giorno= giorno < 10 ? '0' + giorno : '' + giorno;
          d_scad =[anno+1,mese,giorno].join('-');
          mese_alert = d.getMonth();
          mese_alert= mese_alert < 10 ? '0' + mese_alert : '' + mese_alert;
          d_alert =[anno+1,mese_alert,giorno].join('-');
       
          console.log(d_alert);
          $('#add_data_scad').val(d_scad);
          $('#add_data_alert').val(d_alert);
          
          


    });
    $("#intervallo_alle").on('change select',function(event) {

          intervallo = parseInt($(this ).val());
          km_ins = parseInt($('#km_ins_alle').val());
          $('#km_scad_alle').val(km_ins+intervallo);
          alert = 1000;
          $('#km_alert_alle').val(km_ins+intervallo-alert);
          d = new Date();
          anno = d.getFullYear();
          mese = d.getMonth()+1;
          mese= mese < 10 ? '0' + mese : '' + mese;
          giorno =  d.getDate();
          giorno= giorno < 10 ? '0' + giorno : '' + giorno;
          d_scad =[anno+1,mese,giorno].join('-');
          mese_alert = d.getMonth();
          mese_alert= mese_alert < 10 ? '0' + mese_alert : '' + mese_alert;
          d_alert =[anno+1,mese_alert,giorno].join('-');

          console.log(d_alert);
          $('#add_data_scad_alle').val(d_scad);
          $('#add_data_alert_alle').val(d_alert);




    });
    $('#km_ins_alle').keypress(function(){
      $("#intervallo_alle option:first").prop('selected',true);
      $('#km_scad_alle').val("");
      $('#km_alert_alle').val("");



    });
    $("#add_data_scad").on('change', function(event){

          d = new Date($(this ).val());
          anno = d.getFullYear();
          mese = d.getMonth()+1;
          mese= mese < 10 ? '0' + mese : '' + mese;
          giorno =  d.getDate();
          mese_alert = d.getMonth();
          mese_alert= mese_alert < 10 ? '0' + mese_alert : '' + mese_alert;
          giorno= giorno < 10 ? '0' + giorno : '' + giorno;
          d_alert =[anno,mese_alert,giorno].join('-');
          console.log(d_alert);
          $('#add_data_alert').val(d_alert);

    });
    $("#add_data_scad_alle").on('change', function(event){

      d = new Date($(this ).val());
      anno = d.getFullYear();
      mese = d.getMonth()+1;
      mese= mese < 10 ? '0' + mese : '' + mese;
      giorno =  d.getDate();
      mese_alert = d.getMonth();
      mese_alert= mese_alert < 10 ? '0' + mese_alert : '' + mese_alert;
      giorno= giorno < 10 ? '0' + giorno : '' + giorno;
      d_alert =[anno,mese_alert,giorno].join('-');
      console.log(d_alert);
      $('#add_data_alert_alle').val(d_alert);

    });
   
    function abilitazione(a,id){ 
    
        if (a.checked) {
            check = "D";
            	
        $( "#stato" ).removeClass( "badge-danger" ).addClass( "badge-success" ).html("Disponibile");
        }else{
            check = "N";
            $( "#stato" ).removeClass( "badge-success" ).addClass( "badge-danger" ).html("Non Disponibile");
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
    function upDotazioni(id){
      $("#dotmodal").modal("toggle");
      tipo_pneumatici = $('#tipo_pneumatici').val();
      portapacchi =  $('#portapacchi').val();
      catene =  $('#catene').val();
      gilet =  $('#gilet').val();
      kit_soccorso =  $('#kit_soccorso').val();
      
    };
    $('#n_vei').keypress(function (e) {

        var inputLength = jQuery(this).val().length;

        if(inputLength >= 3) {
            e.preventDefault();
            return false;
        }
    });
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