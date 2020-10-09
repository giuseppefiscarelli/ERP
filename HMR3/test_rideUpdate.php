
<?php
session_start();
require_once 'functions.php';

$pagTitle = 'Test Ride';
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


 <!--Start Dashboard Content-->	
  <div class="content" style="background-image: url(images/5.jpg);background-size:cover;background-attachment: fixed;">
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
	  
	  //if(!checkAuthPage($authPage,$authThisPage)){
		
	//	require_once 'view/403.php' ;
		
	 // }else{	  
        $testevent = getEvent();
       // var_dump($testevent);
        $id = getParam('id',0);
        
        $action = getParam('action',0);
        $moto = getMoto();
        
            if($id){
                //setcookie("data_pren", time() -3600);
                $tr = getTest($id);
                $cliente = $tr['id_cliente'];
                $cli = getClientecf($cliente);
                $patente = getPatente($cli['codfiscale']);
                
                unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['TRMOPR'],$_COOKIE['durata_test'],$_COOKIE['ora_test']);
               
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
                    'datanasc' => '',
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
                $tr =[
                  'id' =>'',
                  'km_cons' => 0.0
                ];
                $cliente = getParam('cliId');
                
                  if ($cliente){
                   
                    $cli = getCliente($cliente);
                    $patente = getPatente($cli['codfiscale']);
                    if(isset($_COOKIE['data_pren'])){
                      $tr['data_pren'] =$_COOKIE['data_pren']." ".$_COOKIE['ora_test'];
                      $tr['km_cons']=$_COOKIE['km'];
                      $tr['id_veicolo']=$_COOKIE['TRMOPR'];
                      $tr['durata_test']=$_COOKIE['durata_test'];
                      unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['TRMOPR'],$_COOKIE['durata_test'],$_COOKIE['ora_test']);
                    } 
                    //var_dump($_COOKIE);
                  }else{
                    unset($_COOKIE['data_pren'],$_COOKIE['km'],$_COOKIE['TRMOPR'],$_COOKIE['durata_test'],$_COOKIE['ora_test']);
                    
                  }

            }
    require_once 'view/formTest_rideUpdate.php';
	   
	 // }	

	?>


</div></div> 
      
     
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
			
			function resizeCanvas() {
			    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
			   canvas.width = canvas.offsetWidth * ratio;
			    canvas.height = canvas.offsetHeight * ratio;

		  canvas.getContext("2d").scale(ratio, ratio);
			}
			
			window.onresize = resizeCanvas;
		//	resizeCanvas();
			
			signaturePad = new SignaturePad(canvas);
			
			clearButton.addEventListener("click", function (event) {
			    signaturePad.clear();
			});
		
	});
	function conferma()
	{

			var jsignCode = signaturePad.toDataURL();
 		
 			$("#signCode").val(jsignCode); 
 			$("#signCode2").val("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAcIAAADICAYAAAB79OGXAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAMsSURBVHhe7drBDQIxDADBhP57Pu6RBs4SArEzn7iDla3s67YAIOp1XgBIEkIA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0oQQgDQhBCBNCAFIE0IA0vZ1O/Mje+8zAcD3DXM22whFEIBfM22T0ygAaUIIQNoohNM7LAB8yrRN488yAPAPnEYBSBNCANKEEIA0IQQgTQgBSBNCANKEEIA0IQQgTQgBSBNCANKEEIA0IQQgTQgBSBNCANKEEIA0IQQgTQgBSBNCANKEEICwtd4hZRaC1K7Q+AAAAABJRU5ErkJggg==");
 	};
  
	
				 
			  
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
              
				      $('#km_cons').val(results['km']);
				 
		      	//}     
          }  
		    });
      });
     
      $('#data_pren,#ora_test,#TRMOPR,#km_cons,#durata_test').change(function() {
          var m_moto = $('#TRMOPR').val();
          var k_moto = $('#km_cons').val();
          var d_pren = $('#data_pren').val();
          var o_pren = $('#ora_test').val();
          var d_test = $('#durata_test').val();
          $('#calendar').fullCalendar('gotoDate',d_pren);
          $('#calendar').fullCalendar('changeView', 'agendaDay');
          var date = new Date();
          date.setTime(date.getTime()+(250*1000));
          var expires = "; expires="+date.toGMTString();
          dpren = "data_pren";
          opren = "ora_test";
          mmoto = "TRMOPR";
          kmoto = "km";
          dtest = "durata_test";
          document.cookie=dpren + "="+d_pren+expires+ ";path=/";
          document.cookie=opren +"="+o_pren+expires+ ";path=/";
          document.cookie=mmoto+"="+m_moto+expires+ ";path=/";
          document.cookie=kmoto+"="+k_moto+expires+ ";path=/";
          document.cookie=dtest+"="+d_test+expires+ ";path=/";
         

      });
      $("#luogonasc").bind("keyup change",function(event) {
        
        var test = $('#luogonasc').val();
        var testb = $('#luogores').val();
        var testc = $('#codfiscale').val();
        
        
       
        $.ajax({
		      url:'script/getComune2.php',
          //  url :'controller/updateTestride.php?action=getKm',
		      type:'post',
		      data: {testb:test},
          dataType: 'json',
          success:function(results){
            //for (var motoinfo in results){
              
				      $('#luogonasc').val(results['comune']);
				 
		      	//}     
          }  
		    })
        $.ajax({
		      url:'script/getComune2.php',
          //  url :'controller/updateTestride.php?action=getKm',
		      type:'post',
		      data: {testb:testb},
          dataType: 'json',
          success:function(results){
            //for (var motoinfo in results){
              
				      $('#luogores').val(results['comune']);
				 
		      	//}     
          }  
		    })
        $.ajax({
		      url:'script/getPatente.php',
          //  url :'controller/updateTestride.php?action=getKm',
		      type:'post',
		      data: {testc:testc},
          dataType: 'json',
          success:function(results){
            //for (var motoinfo in results){
              
				      $('#numero_patente').val(results['numero_patente']);
              $('#data_rilascio').val(results['data_rilascio']);
              $('#data_scadenza').val(results['data_scadenza']);
              $('#ente_rilascio').val(results['ente_rilascio']);
              $('#tipo_patente').val(results['tipo_patente']);

				 
		      	//}     
          }  
		    })      


      });
      $( "#autocomplete" ).autocomplete({
          source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "script/autoUser.php",
            type: 'post',
            dataType: 'json',
            data: {
            search: request.term
            },
            //success: function(data) {
            //response(data);
            //},
            success: function (data) {
                        if (data) {
                          //var data = [{ label: 'No results found.', val: -1}];
                                  response(data);
                               
                            
                        } else {
                          var d = [{ label: 'No results found.', val: -1}];
                          response(d);
                        }
                    
            }
            
          });
          },
          select: function (event, ui) {
          // Set selection
          //event.preventDefault();
          $('#ui-id-1').hide();
           $("#autocomplete").val(ui.item.label); // display the selected text
           $("#dati_anagrafici,#dati_patente").show();
           $("#addCli").hide();
           $("#modCli").show();
           $('input').show();
           $("#nome").val(ui.item.nome); // display the selected text
            $("#cognome").val(ui.item.cognome); // display the selected text
            $("#id_cliente").val(ui.item.id); // display the selected text
            document.getElementById("modCli").href="<?=$updateCliUrl?>?action=insertTest&id="+ui.item.id; 
            $("#codfiscale").val(ui.item.codfiscale);
            
            $("#datanasc").val(ui.item.datanasc);
            $("#nazionalita").val(ui.item.nazionalita);
            $("#sesso").val(ui.item.sesso);
            $("#indirizzores").val(ui.item.indirizzores);
            
            $("#provres").val(ui.item.provres);
            //var a = ui.item.luogores;
            //setTimeout(()=>$("#luogores").val(a), 400);
            //$("#luogores").val(ui.item.luogores);
            $("#capres").val(ui.item.capres);
            $("#mail1").val(ui.item.mail1);
            $("#mail2").val(ui.item.mail2);
            $("#tel1").val(ui.item.tel1);
            $("#tel2").val(ui.item.tel2);
            $("#mobile1").val(ui.item.mobile1);
            $("#mobile2").val(ui.item.mobile2);
            //$('#luogonasc').val(ui.item.luogonasc);
          
            $('#provnasc').val(ui.item.provnasc);
            var test = $('#luogonasc').val(ui.item.luogonasc);
            var testb = $('#luogores').val(ui.item.luogores);
            var testc = $('#codfiscale').val(ui.item.codfiscale);
            
            $.ajax({
              //url:'script/getComune2.php',
              //  url :'controller/updateTestride.php?action=getKm',
              type:"POST",
              data: {testb:test},
             dataType: 'json',
               
            })
            $.ajax({
              //url:'script/getPatente.php',
              //  url :'controller/updateTestride.php?action=getKm',
              type:"POST",
              data: {testc:testc},
              dataType: 'json',
               
           })     
            
            
          return false;
          }

        });
        







    });
    function split(val) {
      return val.split( /,\s*/ );
      }
      function extractLast( term ) {
        return split( term ).pop();
      }  
    
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
  $(function(){
            CodiceFiscale.utils.birthplaceFields("#provres", "#luogores");
            $("#provres").val("<?=$cli['provres']?$cli['provres']:'RM'?>").change();
            //setTimeout(()=>$("#luogores").val("<?=$cli['luogores']?$cli['luogores']:'H501'?>"), 200);
 
            //CodiceFiscale.utils.birthplaceFields("#provnasc", "#luogonasc");
            //$("#provnasc").val("<?=$cli['provnasc']?$cli['provnasc']:'RM'?>").change();
            //setTimeout(()=>$("#luogonasc").val("<?=$cli['luogonasc']?$cli['luogonasc']:'H501'?>"), 200);
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
</script>
    </body>
</html>    
