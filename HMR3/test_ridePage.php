
<?php
session_start();
require_once 'functions.php';

if(!isUserLoggedin()){

  header('Location:login.php');
  exit;
}
require_once 'model/test_ride.php';
$updateUrl = 'test_rideUpdate.php';
$updateCliUrl = 'anagr_cliUpdate.php';
//$deleteUrl = 'controller/updateMenu.php';

require_once 'headerInclude.php';
?>

<div class="clearfix"></div>
 <!--Start Dashboard Content-->	
  <div class="content-wrapper">
    <div class="container-fluid">

    
	   
     </div>

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
	  
	  //if(!checkAuthPage($authPage,$authThisPage)){
		
	//	require_once 'view/403.php' ;
	
	 // }else{	  
        $testevent = getEvent();
       // var_dump($testevent);
        $id = getParam('id',0);
        
        $action = getParam('action',0);
        
            if($id){
                $tr = getTest($id);
                $idCli = $tr['id_cliente'];
                $cli = getClientecf($idCli);
                $patente = getPatente($idCli);
                $idVei = $tr['id_veicolo'];
                $veicolo = getMotoinfo($idVei);
                //var_dump($tr);
            }else{
                $tr =[
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
    require_once 'view/testride_Page.php';
	   
	 // }	

	?>


    
      
     
<!--End Dashboard Content-->

<?php
    require_once 'view/footer.php';
?>
<script type="text/javascript">
  
</script>

<script type="text/javascript">
	var signaturePad;
	
	var canvas;
	
	$(document).ready(function() 
	{
					//signature pad 1:
			
		//signature pad 1:
			var wrapper = document.getElementById("signature-pad"),
			    clearButton = wrapper.querySelector("[data-action=clear]");
			canvas = wrapper.querySelector("canvas");
			
		//	function resizeCanvas() {
		//	    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
		//	   canvas.width = canvas.offsetWidth * ratio;
		//	    canvas.height = canvas.offsetHeight * ratio;

		//  canvas.getContext("2d").scale(ratio, ratio);
		//	}
			
		//	window.onresize = resizeCanvas;
		//	resizeCanvas();
			
			signaturePad = new SignaturePad(canvas);
			
			clearButton.addEventListener("click", function (event) {
			    signaturePad.clear();
			});
		
	});
	function conferma()
	{
      //$id = $('#id').val();
			var jsignCode = signaturePad.toDataURL();
 		
 			$("#signCode").val(jsignCode); 
      //var url = 'report/testride/cons.php?id='+$id;
	    //window.open(url,"Stampa");
      $id = $('#id').val();
	  var url = 'report/testride/ricons.php?id='+$id;
	  window.open(url,"Stampa");
   };
   function prtPdf() {
    $id = $('#id').val();
	  var url = 'report/testride/cons.php?id='+$id;
	  window.open(url,"Stampa");
  }
  function prtPdf2() {
    $id = $('#id').val();
	  var url = 'report/testride/ricons.php?id='+$id;
	  window.open(url,"Stampa");
  }
  function prtPdf3() {
    $id = $('#id').val();
	  var url = 'report/testride/full.php?id='+$id;
	  window.open(url,"Stampa");
  }
  function btnPdf1() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_cons.pdf';
	  window.open(url,"Stampa");
  }
  function btnPdf2() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_ricons.pdf';
	  window.open(url,"Stampa");
  }
  function btnPdf3() {
    $id = $('#id').val();
	  var url = 'docs/testride/report/'+$id+'_full.pdf';
	  window.open(url,"Stampa");
  }
	
				 
			  
	</script>
  <script type="text/javascript">
    $(function () {
      $('#TRMOPR').on('change',function(event) {
        var targa = $(this).val();
        $('#targa').val(targa);
        $.ajax({
		      url:'script/testride_km.php',
          //  url :'controller/updateTestride.php?action=getKm',
		      type:"POST",
		      data: {targa:targa},
          dataType: 'json',
          success:function(results){
            //for (var motoinfo in results){
              
				      $('#km').val(results['km']);
				 
		      	//}     
          }  
		    });
      });
     
      $('#data_pren').change(function() {
          var ts = $(this).val();
          $('#calendar').fullCalendar('gotoDate',ts);
          $('#calendar').fullCalendar('changeView', 'agendaDay');
         

      });

    });  
    
</script>
<script type="text/javascript">
    $(document).ready(function() {

    $('#calendar').fullCalendar({
    	monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
    	monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago','Set','Ott','Nov','Dic'],
    	dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
    	dayNamesShort: ['Dom','Lun','Mar','Mer','gio','Ven','Sab'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      
      //defaultDate: '2020-03-12',
      
      navLinks: true, // can click day/week names to navigate views
      selectable: false,
      selectHelper: true,
      
      select: function(start, end) {
        var title = prompt('Event Title:');
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: start,
            end: end
          };
          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        $('#calendar').fullCalendar('unselect');
      },
      
      businessHours: false,
      businessHours: [{
        // days of week. an array of zero-based day of week integers (0=Sunday)
         
			    dom: [ 1, 2, 3, 4, 5], // Monday - Thursday
          start: '9:00', // a start time (10am in this example)
			    end: '13:00' // an end time (6pm in this example)
      },
      {
        // days of week. an array of zero-based day of week integers (0=Sunday)
         
			    dom: [ 1, 2, 3, 4, 5], // Monday - Thursday
          start: '14:00', // a start time (10am in this example)
			    end: '18:00' // an end time (6pm in this example)
      },
    
    ],
      
      minTime: '08:00:00',
      maxTime: '19:00:00',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
                <?php
                  if($testevent){

                    foreach($testevent as $event){?>
                    {
                        title:'<?= $event['id_veicolo']?> <?= $event['id_cliente']?>',
                        start :'<?=$event['data_pren']?>'

                    },
                  <?  }
                  }
                  
                  
                  ?>
      ]
    });
   
  });

</script>
    </body>
</html>    
