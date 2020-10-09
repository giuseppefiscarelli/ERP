<?php

    function getRegistro(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'data_ins';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'DESC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
        $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);

        
        //$search2 = $conn->escape_string($search2);

    
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
        $orderDir = 'ASC';
        }
        $records = [];
            
            $sql ='SELECT * FROM registro_km';
            if($search1 or $search2 or $search3){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" user LIKE '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 or $search3){
                    $sql .="AND";
                }
                
            }
            if($search2){
                $sql .="  id_veicolo = '$search2'";
                if($search3){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  lisgam ='$search3'";
            }
               
            $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
            // var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function countRegistro(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'data_ins';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'DESC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
        $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);

        
        //$search2 = $conn->escape_string($search2);

    
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
        $orderDir = 'ASC';
        }
        $totalList = 0;
            
            $sql ='SELECT count(*) as totalList FROM registro_km';
            if($search1 or $search2 or $search3){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" user LIKE '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 or $search3){
                    $sql .="AND";
                }
                
            }
            if($search2){
                $sql .="  id_veicolo = '$search2'";
                if($search3){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  lisgam ='$search3'";
            }
               
            $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
            // var_dump($sql);
            $res = $conn->query($sql);
             if($res) {
     
              $row = $res->fetch_assoc();
              $totalList = $row['totalList'];
             }
     
         return $totalList;


    }
    function getPrenotazioni(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'data_ins';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'DESC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = $params['search3']?date("Y-m-d H:i:s", strtotime($params['search3'])):'';
        $search4 = $params['search4']?date("Y-m-d H:i:s", strtotime($params['search4'])):'';
        $search5 = array_key_exists('search5', $params) ? $params['search5'] :'';
        $search6 = array_key_exists('search6', $params) ? $params['search6'] :'' ;
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
        $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);

        
        //$search2 = $conn->escape_string($search2);

    
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
        $orderDir = 'ASC';
        }
        $records = [];
            
            $sql ='SELECT * FROM prenotazioni_veicoli';
            if($search1 || $search2 || $search3 || $search4|| $search5|| $search6){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" user LIKE '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 || $search3|| $search4|| $search5|| $search6){
                    $sql .="AND";
                }
                
            }
            if($search2){
                $sql .="  user_richiesta = '$search2'";
                if($search3|| $search4|| $search5|| $search6){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  data_inizio >= '$search3'";
                 if( $search4|| $search5|| $search6){
                 $sql .=" AND ";
              }
            }
            if($search4){
                $sql .="  data_fine <= '$search4' ";
                if($search5|| $search6){
                  $sql .=" AND ";
              }
            }
             if($search5){
                $sql .="  user_assegnazione = '$search5'";
                if($search6){
                  $sql .=" AND ";
              }
            }
            if($search6){
              $sql .="  id_veicolo ='$search6'";
              
            }
               
            $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
             //var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function getPren(){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

       
        $records = [];
            
            $sql ='SELECT * FROM prenotazioni_veicoli';
           
               
          
             //var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function getPrenDip(){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        $username = $_SESSION['userData']['username'];
        $records = [];
            
            $sql ="SELECT * FROM prenotazioni_veicoli where user_assegnazione ='$username'";
            $sql .= " ORDER BY data_inizio ASC";
            //var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function getPrenDip2($user){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        //$username = $_SESSION['userData']['username'];
        $records = [];
            
            $sql ="SELECT * FROM prenotazioni_veicoli where user_assegnazione ='$user'";
            $sql .= " ORDER BY data_inizio ASC";
            //var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function countPrenotazioni(array $params = []){

        /**
         * @var $conn mysqli
         */
    
        $conn = $GLOBALS['mysqli'];
        //var_dump($params);
        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'data_ins';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = $params['search3']?date("Y-m-d H:i:s", strtotime($params['search3'])):'';
        $search4 = $params['search4']?date("Y-m-d H:i:s", strtotime($params['search4'])):'';
        $search5 = array_key_exists('search5', $params) ? $params['search5'] :'';
        $search6 = array_key_exists('search6', $params) ? $params['search6'] :'' ;
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
          $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);
    
        
        //$search2 = $conn->escape_string($search2);
    
       
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
          $orderDir = 'ASC';
        }
        $totalList = 0;
            
            $sql ='SELECT count(*) as totalList FROM prenotazioni_veicoli ';
            if($search1 || $search2 || $search3 || $search4|| $search5|| $search6){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" user LIKE '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 || $search3|| $search4|| $search5|| $search6){
                    $sql .="AND";
                }
                
            }
            if($search2){
                $sql .="  user_richiesta = '$search2'";
                if($search3|| $search4|| $search5|| $search6){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  data_inizio >= '$search3'";
                 if( $search4|| $search5|| $search6){
                 $sql .=" AND ";
              }
            }
            if($search4){
                $sql .="  data_fine <= '$search4' ";
                if($search5|| $search6){
                  $sql .=" AND ";
              }
            }
             if($search5){
                $sql .="  user_assegnazione = '$search5'";
                if($search6){
                  $sql .=" AND ";
              }
            }
            if($search6){
              $sql .="  id_veicolo ='$search6'";
              
            }
    
            
            //  var_dump($sql);
             $res = $conn->query($sql);
             if($res) {
     
              $row = $res->fetch_assoc();
              $totalList = $row['totalList'];
             }
     
         return $totalList;
    
    
    }
    function getRiders(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'DESC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
        $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);

        
        //$search2 = $conn->escape_string($search2);

    
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
        $orderDir = 'ASC';
        }
        $records = [];
            
            $sql ='SELECT * FROM users where azienda = 2';
            if($search1 or $search2 or $search3){
                $sql .=" AND";
            }
            if ($search1){
                $sql .=" user LIKE '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 or $search3){
                    $sql .="AND";
                }
                
            }
            if($search2){
                $sql .="  filiale = $search2";
                if($search3){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  lisgam ='$search3'";
            }
               
            $sql .= " ORDER BY $orderBy $orderDir LIMIT $start, $limit";
            // var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function countRider(array $params = []){

        /**
         * @var $conn mysqli
         */
    
        $conn = $GLOBALS['mysqli'];
    
        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = array_key_exists('search2', $params) ? $params['search2'] : '';
        $search3 = array_key_exists('search3', $params) ? $params['search3'] : '';
        $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
        $start =$limit * ($page -1);
        if($start<0){
          $start = 0;
        }
        $search1 = array_key_exists('search1', $params) ? $params['search1'] : '';
        $search1 = $conn->escape_string($search1);
    
        
        //$search2 = $conn->escape_string($search2);
    
       
        
        if($orderDir !=='ASC' && $orderDir !=='DESC'){
          $orderDir = 'ASC';
        }
        $totalList = 0;
            
            $sql ='SELECT count(*) as totalList FROM users where azienda = 2';
            if($search1 or $search2 or $search3){
                $sql .=" AND";
            }
            if ($search1){
                $sql .=" cognome LIKE '%$search1%' OR nome LIKE '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 or $search3){
                    $sql .="AND";
                }
                
              }
            if($search2){
                $sql .="  filiale = $search2";
                if($search3){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  lisgam ='$search3'";
            }
    
            
            //  var_dump($sql);
             $res = $conn->query($sql);
             if($res) {
     
              $row = $res->fetch_assoc();
              $totalList = $row['totalList'];
             }
     
         return $totalList;
    
    
    }
    function getVeicoli(){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT DISTINCT `id_veicolo` from `autoparco_setec`order by `id_veicolo` ASC';
            //echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function getVeicolo(){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT * from veicoli';
            //echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function getVeicoloAb(){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * from veicoli where stato != 'N'";
            //echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


    }
    function saveKM(array $data = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        $tipo = $conn->escape_string($data['tipo']);
        $id_veicolo =  $conn->escape_string($data['id_veicolo']);
        $user = $_SESSION['userData']['username'];
        $data_arrivo = date('Y-m-d H:i:s');
        $km = $conn->escape_string($data['km']);
        $commessa = $conn->escape_string($data['commessa']);
        $destinazione =  $conn->escape_string($data['destinazione']);
        $result=0;
        $dipData = getDip($user);
        $veiData =getVeicolopage($id_veicolo);
        if($tipo =='P'){
            $data_partenza = date('Y-m-d H:i:s');
            $sql ='INSERT INTO registro_km (id, id_veicolo, user, data_partenza, km, commessa, destinazione,stato) ';
        
            $sql .=" VALUES ( NULL, $id_veicolo, '$user', '$data_partenza', $km, $commessa, '$destinazione','$tipo')";
             // print_r($data);
        //echo $sql;die;
        $res = $conn->query($sql);
        
        if($res ){
          $result =  $conn->affected_rows;
          $sql2 ="UPDATE veicoli SET";
          $sql2 .=" stato = 'W', km = $km ";
          $sql2 .=" WHERE id_veicolo = $id_veicolo";
          $res2 = $conn->query($sql2);
          $km_partenza = $conn->escape_string($data['km_partenza']);
          if($km_partenza!=$km){
            $alertPetto=[
                'to' => 'stefano.pettinari@setec.it',
                'veicolo'=> $veiData['modello']." ".$veiData['id_veicolo'],
                'body'=> "il veicolo ".$veiData['modello']." ".$veiData['id_veicolo']."<br>Prelevato dal Dipendente: ".$dipData['nome']." ".$dipData['cognome']."<br>Alle ore ".date(" H:i:s")."<br>Commessa: ".$commessa."<br>Destinazione: ".$destinazione."<br><br><b>Presenta Alert</b><br>KM inseriti: ".$km."<br>Ultimo rilievo: ".$km_partenza."<br>Per Maggiori informazioni, recati sulla Home Page del portale Setec",  
                'soggetto' =>'Alert KM',
                'link' =>'https://portfolio.setec.cloud/ERP/index.php',
                'buttonTitle'=> 'Vai alla tua Home'
    
    
              ];
              sendMail($alertPetto);
          }
          //echo $sql2;die;
          $notPetto=[
            'to' => 'stefano.pettinari@setec.it',
            'veicolo'=> $veiData['modello']." ".$veiData['id_veicolo'],
            'body'=> "è stato prelevato il veicolo ".$veiData['modello']." ".$veiData['id_veicolo']."<br>Dal Dipendente: ".$dipData['nome']." ".$dipData['cognome']."<br>Alle ore ".date(" H:i:s")."<br>Commessa: ".$commessa."<br>Destinazione: ".$destinazione."<br>KM in Partenza :".$km."<br>Per Maggiori informazioni, recati sulla Home Page del portale Setec",  
            'soggetto' =>'Veicolo Prelevato',
            'link' =>'https://portfolio.setec.cloud/ERP/index.php',
            'buttonTitle'=> 'Vai alla tua Home'


          ];

          
          
         // sendMail($notPetto);
          
        }else{
          $result -1;  
        }
        //echo $result;die;
      return $result;
       
        }elseif($tipo =='A'){
            $data_arrivo = date('Y-m-d H:i:s');
            $km_arrivo = $conn->escape_string($data['km']);
            $km_partenza = $conn->escape_string($data['km_partenza']);
            $km_totali = $km_arrivo-$km_partenza;
            $id=$conn->escape_string($data['id_reg']);
            $lat=$conn->escape_string($data['lat']);
            $lon=$conn->escape_string($data['lon']);

            $sql ="UPDATE registro_km  SET km_arrivo = $km_arrivo, data_arrivo = '$data_arrivo', stato = '$tipo', lat = $lat, lon = $lon WHERE id=$id ";
            //var_dump($sql);
            //die;
            $res = $conn->query($sql);
            if($res ){
                $result =  $conn->affected_rows;
                $sql2 ="UPDATE veicoli SET";
                $sql2 .=" stato = 'D', km = $km,last_lat=$lat, last_lon=$lon ";
                $sql2 .=" WHERE id_veicolo = $id_veicolo";
                $res2 = $conn->query($sql2);
                //echo $sql2;die;
                $notPetto=[
                    'to' => 'stefano.pettinari@setec.it',
                    'veicolo'=> $veiData['modello']." ".$veiData['id_veicolo'],
                    'body'=> "è stato consegnato il veicolo ".$veiData['modello']." ".$veiData['id_veicolo']."<br>Dal Dipendente: ".$dipData['nome']." ".$dipData['cognome']."<br>Alle ore :".date(" H:i:s")."<br>Commessa: ".$commessa."<br>Destinazione: ".$destinazione."<br>Km in Partenza: ".$km_partenza."<br>Km in Arrivo: ".$km."<br>Km Totali: ".$km_totali."<br>Posizione Park: <a href=\"https://www.google.com/maps/place/".$lat.",".$lon."\" target=\"_blank\">Apri in Maps </a><br>Per Maggiori informazioni, recati sulla Home Page del portale Setec",  
                    'soggetto' =>'Veicolo Consegnato',
                    'link' =>'https://portfolio.setec.cloud/ERP/index.php',
                    'buttonTitle'=> 'Vai alla tua Home'
        
        
                  ];
               //   sendMail($notPetto);
                
              }else{
                $result -1;  
              }
              //echo $result;die;
            return $result;
        
        }
        
        
        sendMail($notPetto);
        
        
        
      


    }
    function getDisp($stato){
        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ="SELECT * from veicoli WHERE stato = '$stato' order by id_veicolo ASC";
            //echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {
                
                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                         
                }



            }

        return $records;

    }
    function getDispDip($stato,$user){
        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ="SELECT * from veicoli WHERE stato = '$stato' and user ='$user' order by id_veicolo ASC";
           // echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;

    }
    function getWork($id){
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ="SELECT * from registro_km WHERE id_veicolo = $id AND data_arrivo  IS NULL ";
       // echo $sql;
        
        
       $res = $conn->query($sql);
      
       if($res && $res->num_rows){
         $result = $res->fetch_assoc();
         
       }
     return $result;



    }
    function getWorkDip($user){
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        $records=[];
        $sql ="SELECT * from registro_km WHERE user = '$user' AND data_arrivo IS NULL AND stato != 'A'  ";
      //  echo $sql;
        
        
       $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;



    }
    function getVeicolopage($id){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * from veicoli where id_veicolo = $id";
            //echo $sql;
            
            
            $res = $conn->query($sql);
      
       if($res && $res->num_rows){
         $result = $res->fetch_assoc();
         
       }
     return $result;


    }
    Function getDip($user){
          /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * from users where username = '$user'";
            //echo $sql;
            
            
            $res = $conn->query($sql);
      
       if($res && $res->num_rows){
         $result = $res->fetch_assoc();
         
       }
     return $result;


    }
    function getRider($ab){

            /**
             * @var $conn mysqli
             */
            if($ab)
            $conn = $GLOBALS['mysqli'];
            $recods=[];

                $sql ='SELECT * from users where azienda = 2';
                if($ab){
                    $sql .=' AND ab_guida ="S"';
                }
                $sql .=' order by cognome ASC';
                //echo $sql;
                
                
                
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;


        

    }
    function checkPren($id){

        /**
         * @var $conn mysqli
         */
        //var_dump($data);die;
        $conn = $GLOBALS['mysqli'];
        //$id = $data['id_veicolo'];
        $data_inizio = date("Y-m-d H:i:s");
        $records=[];
        $sql= "SELECT * FROM prenotazioni_veicoli where id_veicolo = $id AND data_inizio <= '$data_inizio' and data_fine >='$data_inizio' order by ID";
        //var_dump($sql);
        $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }
       // var_dump($records);
        return $records;
    

    }
    function checkPrenotazioni(array $data = []){

        /**
         * @var $conn mysqli
         */
        $data_inizio = $data['data_inizio']." 00:00:00";
        $data_fine = $data['data_fine']." 23:59:00";
        $id_veicolo=$data['id_veicolo']?$data['id_veicolo']:'';
        $conn = $GLOBALS['mysqli'];
        $stato ="D";
        $records=[];
        $sql= "SELECT * FROM prenotazioni_veicoli where  data_inizio >= '$data_inizio' and data_fine <='$data_fine'";// order by data_inizio";
        if($id_veicolo){
            $sql .=" AND id_veicolo = $id_veicolo";
        }
        //echo $sql;
        
        
        $res = $conn->query($sql);
        if($res) {
            
            while( $row = $res->fetch_assoc()) {
                $vei = getVeicolopage($row['id_veicolo']);
                $dip = getDip($row['user_assegnazione']);
            
                $records[] = array(
                    'id'   => $row["id"],
                  'veicolo'   => $vei['modello']." ".$row["id_veicolo"],
                  'commessa'=> $row['commessa'],
                  'dipendente' =>$dip['nome']." ".$dip['cognome'],
                  'start'   => date("H:i d/m/Y",strtotime($row["data_inizio"])),
                  'end'   => date("H:i d/m/Y",strtotime($row["data_fine"])),
                );
                     
            }



        }
        echo json_encode($records);
       
        //return $records;
    }
    function upPrenotazioni(array $data = []){

        /**
         * @var $conn mysqli
         */
        $id = $data['id'];
        
        $conn = $GLOBALS['mysqli'];
        
        $records=[];
        $sql= "SELECT * FROM prenotazioni_veicoli where  id=".$id;
        //echo $sql;
        
        
        $res = $conn->query($sql);
        if($res) {
            
            while( $row = $res->fetch_array()) {
                $records[] = $row;
                     
            }



        }
        echo json_encode($records);
        //return $records;
    }
    function savePren(array $data){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            
            $id_veicolo = $data['id_veicolo'];
            $user_richiesta = $conn->escape_string($_SESSION['userData']['username']);
            $data_richiesta = date("Y-m-d H:i:s");
            $user_assegnazione = $data['id_dipendente'];
            $data_inizio = $data['data_da']." ".$data['ora_da'];
            $data_fine = $data['data_a']." ".$data['ora_a'];
            $commessa =  array_key_exists('commessa',$data)?$data['commessa']:'0';
            $destinazione =array_key_exists('destinazione',$data)?$data['destinazione']:'';
            $tipo = array_key_exists('tipo',$data)?$data['tipo']:'';
            $note = array_key_exists('note',$data)?$data['note']:'';
                      
            $result=0;
            $sql ='INSERT INTO prenotazioni_veicoli (id, id_veicolo, user_richiesta,data_richiesta,user_assegnazione,data_inizio,data_fine,commessa,destinazione,tipo,note) ';
            $sql .= "VALUES (NULL, $id_veicolo, '$user_richiesta', '$data_richiesta', '$user_assegnazione', '$data_inizio', '$data_fine', $commessa, '$destinazione', '$tipo', '$note') ";
            
            //echo $sql;die;
            $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              $pmData= getDip($user_richiesta);
              $dipData = getDip($user_assegnazione);
              $veiData =getVeicolopage($id_veicolo);
              $maildata =[
                'to' => $dipData['email'],
                'veicolo'=> $veiData['modello']." ".$veiData['id_veicolo'],
                'body'=> "ti è stato assegnato il veicolo ".$veiData['modello']." ".$veiData['id_veicolo']."<br>Dal PM: ".$pmData['nome']." ".$pmData['cognome']."<br>Dal ".date("d/m/Y H:i",strtotime($data_inizio))."<br> Al ".date("d/m/Y H:i",strtotime($data_fine))."<br>Commessa: ".$commessa."<br>Destinazione: ".$destinazione."<br>Per Maggiori informazioni, recati sulla Home Page del portale Setec",  
                'soggetto' =>'Assegnazione veicolo',
                'link' =>'https://portfolio.setec.cloud/ERP/index.php',
                'buttonTitle'=> 'Vai alla tua Home'
              ];
              $notPetto=[
                'to' => 'stefano.pettinari@setec.it',
                'veicolo'=> $veiData['modello']." ".$veiData['id_veicolo'],
                'body'=> "è stato prenotato il veicolo ".$veiData['modello']." ".$veiData['id_veicolo']."<br>Dal PM: ".$pmData['nome']." ".$pmData['cognome']."<br>Al Dipendente: ".$dipData['nome']." ".$dipData['cognome']."<br>Dal ".date("d/m/Y H:i",strtotime($data_inizio))."<br> Al ".date("d/m/Y H:i",strtotime($data_fine))."<br>Commessa: ".$commessa."<br>Destinazione: ".$destinazione."<br>Per Maggiori informazioni, recati sulla Home Page del portale Setec",  
                'soggetto' =>'Assegnazione veicolo',
                'link' =>'https://portfolio.setec.cloud/ERP/index.php',
                'buttonTitle'=> 'Vai alla tua Home'


              ];

              
              sendMail($maildata);
              
              sendMail($notPetto);
              
            }else{
              $result -1;  
            }
          return $result;
        
        
    }
    function updatePren(array $data){
          /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $id=$data['id'];
        $data_inizio = $data['data_da']." ".$data['ora_da'];
        $data_fine = $data['data_a']." ".$data['ora_a'];
        $id_veicolo = $data['id_veicolo'];
        $user_richiesta = $conn->escape_string($_SESSION['userData']['username']);
        $data_richiesta = date("Y-m-d H:i:s");
        $user_assegnazione = $data['id_dipendente'];
        
        $commessa =  array_key_exists('commessa',$data)?$data['commessa']:'0';
        $destinazione =array_key_exists('destinazione',$data)?$data['destinazione']:'';
        $tipo = 'P';
        $note = array_key_exists('note',$data)?$data['note']:'';
        $conn = $GLOBALS['mysqli'];
        $sql ="UPDATE prenotazioni_veicoli  SET id_veicolo = $id_veicolo, user_richiesta = '$user_richiesta', data_richiesta = '$data_richiesta', user_assegnazione = '$user_assegnazione', data_inizio = '$data_inizio', data_fine='$data_fine', commessa='$commessa', destinazione='$destinazione', note='$note' WHERE id=$id ";
        var_dump($sql);
        die;
        $res = $conn->query($sql);
        if($res ){
            $result =  $conn->affected_rows;
           
            
          }else{
            $result -1;  
          }
          //echo $result;die;
        return $result;
    }
    function getEvent(){
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $sql= "SELECT * FROM prenotazioni_veicoli order by ID";
       // echo $sql;
        $result = $conn->query($sql);
        $response = array();
        //print_r($res);
      
        while($row = $result->fetch_array() ){
            $vei = getVeicolopage($row['id_veicolo']);
            $dip = getDip($row['user_assegnazione']);
            
            $response[] = array(
                'id'   => $row["id"],
              'title'   => $vei['modello']." ".$row["id_veicolo"]." commessa:".$row['commessa']." Dip:".$dip['cognome'],
              'start'   => $row["data_inizio"],
              'end'   => $row["data_fine"]
            );
        }
        echo json_encode($response);



    }
    function getVeinfo($id){
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $sql= "SELECT * FROM veicoli where id_veicolo = $id";
        //echo $sql;
        $result = $conn->query($sql);
        $response = array();
        //print_r($res);
      
        while($row = $result->fetch_array() ){
           // $vei = getVeicolopage($row['id_veicolo']);
            //$dip = getDip($row['user_assegnazione']);
          
            $response[] = array(
              'id'   => $row["id"],
              'modello'   => $row['modello'],
              'id_veicolo' => $row["id_veicolo"],
              'km'   => $row["km"],
              'multicard' =>$row['multicard'],
              'pin' =>$row['pin'],
              'tipo_pneumatici' =>$row['tipo_pneumatici'],
              'catene' =>$row['catene'],
              'gilet' =>$row['gilet'],
              'kit_soccorso' =>$row['kit_soccorso'],
            );
        }
        echo json_encode($response);



    }
    function getPreninfo($id){
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $sql= "SELECT * FROM prenotazioni_veicoli where id = $id";
        //echo $sql;
        $result = $conn->query($sql);
        $response = array();
        //print_r($res);
      
        while($row = $result->fetch_array() ){
           // $vei = getVeicolopage($row['id_veicolo']);
            //$dip = getDip($row['user_assegnazione']);
            
            $response[] = array(
              'commessa'   => $row["commessa"],
              'destinazione'   => $row['destinazione']
              
            );
        }
        echo json_encode($response);



    }
    function getReginfo($id){
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $sql= "SELECT * FROM registro_km where id = $id";
        //echo $sql;
        $result = $conn->query($sql);
        $response = array();
        //print_r($res);
      
        while($row = $result->fetch_array() ){
           // $vei = getVeicolopage($row['id_veicolo']);
            //$dip = getDip($row['user_assegnazione']);
            
            $response[] = array(
              'commessa'   => $row["commessa"],
              'destinazione'   => $row['destinazione'],
              'km'=> $row['km']
              
            );
        }
        echo json_encode($response);



    }
    function getFiliali(){
         /**
       * @var $conn mysqli
       */

      $conn = $GLOBALS['mysqli'];

      
      $records = [];

      

      $sql = 'SELECT distinct filiale FROM users';
      
      $sql .= " ORDER BY filiale ";
      

      $res = $conn->query($sql);
      if($res) {

        while( $row = $res->fetch_assoc()) {
            $records[] = $row;
            
        }

      }

        return $records;

    }
    function getNome($username){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        $result=[];
        $sql ="SELECT * from users WHERE username = '$username' ";
       // echo $sql;
        
        
       $res = $conn->query($sql);
      
       if($res && $res->num_rows){
         $result = $res->fetch_assoc();
         
       }
     return $result;

    }
    function getNomeD($type){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        $records=[];
        $sql ="SELECT distinct $type from prenotazioni_veicoli ";
       // echo $sql;
        
        
        $res = $conn->query($sql);
       if($res) {

           while( $row = $res->fetch_assoc()) {
               $records[] = $row;
               
           }

       }

        return $records;
    }
    function sendMail(array $maildata){

        require_once "Mail.php";
        $host    = "smtp.gmail.com";
        $port    = "587";
        $user    = "giuseppe.fiscarelli@setec.it";
        $pass    = "ziofiska84";
        $smtp    = @Mail::factory("smtp", array("host"=>$host, "port"=>$port, "auth"=> true, "username"=>$user, "password"=>$pass));
        $from    = "\"Setec APP\" <service@setec.it>";
  
       // $to      = $data['email'];
        $to = $maildata['to'];
  
        $subject =  $maildata['soggetto']." - ".$maildata['veicolo'];
        $logomail ='https://portfolio.setec.cloud/ERP/images/logo_setec_250.png';
        //$body = '<html> <style></style> <body >';
        //$body .='<div class="container"';
        
        //$body .='<h1 style="color: #5e9ca0; text-align: center"><span style="color:  #ff0000;";">Raccontaci cosa ne pensi (ci vuole 1 minuto, promesso).</span></h1>';
          
        //$body .= '</body></html>';
        $body =  $maildata['body'];
        $body='<!doctype html>
                    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                    <head>
                        <title>
                        
                        </title>
                        <!--[if !mso]><!-- -->
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <!--<![endif]-->
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <style type="text/css">
                        #outlook a { padding:0; }
                        .ReadMsgBody { width:100%; }
                        .ExternalClass { width:100%; }
                        .ExternalClass * { line-height:100%; }
                        body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
                        table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
                        img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
                        p { display:block;margin:13px 0; }
                        </style>
                        <!--[if !mso]><!-->
                        <style type="text/css">
                        @media only screen and (max-width:480px) {
                            @-ms-viewport { width:320px; }
                            @viewport { width:320px; }
                        }
                        </style>
                        
                        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet" type="text/css">
                        <style type="text/css">
                        @import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700);
                        </style>
                    
                
                    
                        
                            <style type="text/css">
                                            @media only screen and (min-width:480px) {
                                                .mj-column-per-66 { width:66.66666666666666% !important; max-width: 66.66666666666666%; }
                                        .mj-column-per-33 { width:33.33333333333333% !important; max-width: 33.33333333333333%; }
                                        .mj-column-per-100 { width:100% !important; max-width: 100%; }
                                        .mj-column-per-50 { width:50% !important; max-width: 50%; }
                                            }
                            </style>
                    
                
                        <style type="text/css">
                        
                        
                        </style>
                        <style type="text/css">.hide_on_mobile { display: none !important;} 
                        @media only screen and (min-width: 480px) { .hide_on_mobile { display: block !important;} }
                        .hide_section_on_mobile { display: none !important;} 
                        @media only screen and (min-width: 480px) { .hide_section_on_mobile { display: table !important;} }
                        .hide_on_desktop { display: block !important;} 
                        @media only screen and (min-width: 480px) { .hide_on_desktop { display: none !important;} }
                        .hide_section_on_desktop { display: table !important;} 
                        @media only screen and (min-width: 480px) { .hide_section_on_desktop { display: none !important;} }
                        [owa] .mj-column-per-100 {
                            width: 100%!important;
                        }
                        [owa] .mj-column-per-50 {
                            width: 50%!important;
                        }
                        [owa] .mj-column-per-33 {
                            width: 33.333333333333336%!important;
                        }
                        p {
                            margin: 0px;
                        }
                        @media only print and (min-width:480px) {
                            .mj-column-per-100 { width:100%!important; }
                            .mj-column-per-40 { width:40%!important; }
                            .mj-column-per-60 { width:60%!important; }
                            .mj-column-per-50 { width: 50%!important; }
                            mj-column-per-33 { width: 33.333333333333336%!important; }
                            }</style>
                        
                    </head>
                    <body style="background-color:#D1D2DD;">
                        
                        
                    
                        
                    
                    
                    
                        
                            <div style="Margin:0px auto;;">
                                
                            <!--Logo-->
                                <div style="background:#FEFEFF;background-color:#FEFEFF;Margin:0px auto;max-width:600px;">  
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FEFEFF;background-color:#FEFEFF;width:100%;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="direction:ltr;font-size:0px;padding:0px 0px 0px 0px;text-align:center;vertical-align:top;">
                                                                <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                                        
                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                                        
                                                                            <tr>
                                                                                <td align="center" style="font-size:0px;padding:0px 0px 0px 0px;word-break:break-word;">
                                                                                    
                                                                                        <div style="font-family:Ubuntu, sans-serif;font-size:11px;line-height:1.5;text-align:center;color:#0059FF;">
                                                                                        <img src="'.$logomail.'" style="padding: 5px;height: inherit;max-width: -webkit-fill-available;">
                                                                                        </div>
                                                                        
                                                                                </td>
                                                                            </tr>
                                                        
                                                                    </table>
                                                                
                                                                </div>
                                                            
                                                    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                    </table>
                                </div>
                            
                            <!--End logo-->
                            <!--body-->           
                            <div style="background-color: #6eaa27ad;Margin:0px auto;max-width:600px;">
                                <div style="line-height:0;font-size:0;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                        <tbody>
                                            <tr>
                                                <td style="direction:ltr;font-size:0px;padding:12px 0px 12px 0px;text-align:center;vertical-align:top;">
                                                
                                                            
                                                    <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                    
                                                    <tr>
                                                                    <td  style="font-size:0px;padding:20px 20px 20px 20px;word-break:break-word;">
                                                                        
                                                                            <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:1.5;color:#000000;">
                                                                                <p><span style="color:#ffffff;"><span style="font-size:16px;"><strong>Salve, </strong></span></span></p>
                                
                                                                                
                                                     
        ';
        $body .='               
                                                <p><span style="font-size:12px;">
                                                        <span style="color:#ffffff;">'.$maildata['body'].'
               
                                                      
                                                        </span>
                                                    </span>
                                                </p>
                                            </div>
                            
                                    </td>
                    </tr>
            
                    <tr>
                        <td align="center" vertical-align="middle" style="font-size:0px;padding:0px 0px 0px 0px;word-break:break-word;">
                            
                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
                                <tr>
                                <td align="center" bgcolor="#FFFFFF" role="presentation" style="border:0px solid #000;border-radius:none;cursor:auto;mso-padding-alt:9px 26px;background:#FFFFFF;" valign="middle">
                                    <a href="'.$maildata['link'].'" style="display:inline-block;background:#FFFFFF;color:#1F1C1C;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:13px;font-weight:normal;line-height:100%;Margin:0;text-decoration:none;text-transform:none;padding:9px 26px;mso-padding-alt:0px;border-radius:none;" target="_blank">
                                    '.$maildata['buttonTitle'].'
                                    </a>
                                </td>
                                </tr>
                            </table>
                
                        </td>
                    </tr>
        
                </table>
            ';
            $body .='  

                                                    </div>
                                        
                                            
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <!--endbody--> 
                        
                        
                        
                        
                        
                        
                        </div>
                    
                </body>
                </html>
        ';
        
        $headers = array("From"=> $from, "To"=>$to, "Subject"=>$subject, "MIME-Version"=>"1.0", "Content-Type"=>"text/html; charset=ISO-8859-1");
        
        $mail    = @$smtp->send($to, $headers, $body);
  
      // echo json_encode($data['id']);
  
    }
    function abVeicolo($id,$stato){
         /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
        $sql ="UPDATE veicoli  SET stato = '$stato' WHERE id=$id ";
        var_dump($sql);
        //die;
        $res = $conn->query($sql);
        if($res ){
            $result =  $conn->affected_rows;
           
            
          }else{
            $result -1;  
          }
          //echo $result;die;
        return $result;
    }
    function upVeicolo(array $data){
        /**
        * @var $conn mysqli
        */

       $conn = $GLOBALS['mysqli'];
       $id=$data['id'];
       $id_veicolo = $data['id_veicolo'];
       $modello = $data['modello'];
       $targa = $data['targa'];
       $km =$data['km'];
       $sql ="UPDATE veicoli  SET id_veicolo = $id_veicolo, modello = '$modello', targa = '$targa', km = $km WHERE id=$id ";
       //var_dump($sql);
       //die;
       $res = $conn->query($sql);
       if($res ){
           $result =  $conn->affected_rows;
          
           
         }else{
           $result -1;  
         }
         //echo $result;die;
       return $result;
    }
    function insertVeicolo(array $data){
        /**
        * @var $conn mysqli
        */

        $conn = $GLOBALS['mysqli'];
        
        $id_veicolo = $data['id_veicolo'];
        $modello = $data['modello'];
        $targa = $data['targa'];
        $km =$data['km'];
        $result = 0;
        $sql ="INSERT INTO veicoli  (id, id_veicolo, modello, targa, km) VALUES (NULL, $id_veicolo, '$modello', '$targa', $km)";
        // var_dump($sql);
        // die;
        $res = $conn->query($sql);
        
        if($res ){
            $result =  $conn->affected_rows;
            
        }else{
            $result -1;  
        }
        return $result;
    }
    function delVeicolo($id){
        
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM veicoli WHERE id = '.$id;

        $res = $conn->query($sql);
        
        return $res && $conn->affected_rows;

    }
    function updateDot(array $data){
          /**
         * @var $conn mysqli
         */
        $tipo_pneumatici = $data['tipo_pneumatici'];
        $portapacchi = $data['portapacchi'];
        $catene =$data['catene'];
        $gilet =$data['gilet'];
        $kit_soccorso = $data['kit_soccorso'];
        $id =$data['id'];
        $conn = $GLOBALS['mysqli'];
        $sql ="UPDATE veicoli  SET tipo_pneumatici = '$tipo_pneumatici', portapacchi = '$portapacchi',catene ='$catene', gilet ='$gilet', kit_soccorso = '$kit_soccorso' WHERE id=$id ";
       // var_dump($sql);
        //die;
        $res = $conn->query($sql);
        if($res ){
            $result =  $conn->affected_rows;
           
            
          }else{
            $result -1;  
          }
          //echo $result;die;
        return $result;



    }
    function updateMulti(array $data){
        /**
       * @var $conn mysqli
       */
      $multicard = $data['multicard'];
      $pin = $data['pin'];
      
      $id =$data['id'];
      $conn = $GLOBALS['mysqli'];
      $sql ="UPDATE veicoli  SET multicard = '$multicard', pin = '$pin' WHERE id=$id ";
      //var_dump($sql);
      //die;
      $res = $conn->query($sql);
      if($res ){
          $result =  $conn->affected_rows;
         
          
        }else{
          $result -1;  
        }
        //echo $result;die;
      return $result;



    }
    function addAllegato(array $data){
        /**
        * @var $conn mysqli
        */

        $conn = $GLOBALS['mysqli'];
        
        
        $data_ins = date("Y-m-d H:i:s");
        $user_ins=$_SESSION['userData']['username'];
        $id_veicolo = $data['id'];
        $tipo = $data['tipo'];
        $tipo_file = $data['tipo_file'];
        $descrizione = $data['descrizione'];
        $nome_file1 = $data['nome_file1'];
        $nome_file2 = array_key_exists('nome_file2', $data) ? $data['nome_file2'] : '';
       // var_dump($data);
       // die;
        $result = 0;
        if($nome_file2){
            $sql ="INSERT INTO allegati_veicolo (id, data_ins,user_ins, id_veicolo, tipo, tipo_file, descrizione,nome_file1,nome_file2) VALUES (NULL, '$data_ins','$user_ins',$id_veicolo, '$tipo','$tipo_file', '$descrizione','$nome_file1','$nome_file2')";
        //  var_dump($sql);
         // die;
            $res = $conn->query($sql);
        }else{
            $sql ="INSERT INTO allegati_veicolo (id, data_ins,user_ins, id_veicolo, tipo, tipo_file, descrizione,nome_file1) VALUES (NULL, '$data_ins','$user_ins',$id_veicolo, '$tipo','$tipo_file', '$descrizione','$nome_file1')";
            //  var_dump($sql);
             // die;
             $res = $conn->query($sql);
     


        }
        //  var_dump($sql);
         
          //die;
        if($res ){
            $result =  $conn->affected_rows;
            
        }else{
            $result -1;  
        }
        return $result;
    }
    function upAllegato(array $data){
        /**
        * @var $conn mysqli
        */

        $conn = $GLOBALS['mysqli'];
        
        
        $data_ins = date("Y-m-d H:i:s");
        $user_ins=$_SESSION['userData']['username'];
        $id = $data['idAlle'];
        $id_veicolo = $data['id'];
        $tipo = $data['up_tipo'];
        $tipo_file = $data['up_tipo_file'];
        $descrizione = $data['up_descrizione'];
        $nome_file1 = $data['up_nome_file1'];
        $nome_file2 = array_key_exists('up_nome_file2', $data) ? $data['up_nome_file2'] : '';
        //var_dump($data);
        //die;
        $result = 0;
        if($nome_file2){
            $sql ="UPDATE allegati_veicolo  SET data_ins='$data_ins',user_ins = '$user_ins',tipo='$tipo', tipo_file='$tipo_file', descrizione='$descrizione',nome_file1='$nome_file1', nome_file2='$nome_file2'  WHERE id=$id ";

          //var_dump($sql);
          //die;
            $res = $conn->query($sql);
        }else{
            $sql ="UPDATE allegati_veicolo  SET id_veicolo=$id_veicolo,data_ins='$data_ins',user_ins = '$user_ins',tipo='$tipo', tipo_file='$tipo_file', descrizione='$descrizione',nome_file1='$nome_file1'  WHERE id=$id ";
             // var_dump($sql);
             // die;
             $res = $conn->query($sql);
     


        }
        //  var_dump($sql);
         
          //die;
        if($res ){
            $result =  $conn->affected_rows;
            
        }else{
            $result -1;  
        }
        return $result;
    }
    function getAllegati($id){
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ='SELECT * from allegati_veicolo where id_veicolo = '.$id;
            //echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;
    }
    function getAllegato($id){
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ="SELECT * from allegati_veicolo where id = $id " ;
            //echo $sql;
            
            
            $res = $conn->query($sql);
            
       if($res && $res->num_rows){
        $records = $res->fetch_assoc();
        
      }

        return $records;
    }
    function delAllegato($id){
        
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM allegati_veicolo WHERE id = '.$id;

        $res = $conn->query($sql);
        
        return $res && $conn->affected_rows;

    }
    function checkAllegati($id){
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ="SELECT * from allegati_veicolo where tipo = 'CC' OR tipo = 'CP' AND id_veicolo = ".$id;
            //echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;
    }
    function addScadenza(array $data){
        /**
        * @var $conn mysqli
        */

        $conn = $GLOBALS['mysqli'];
        
        
        $data_ins = date("Y-m-d H:i:s");
        $user_ins=$_SESSION['userData']['username'];
        $id_veicolo = $data['id'];
        $tipo = $data['tiposcad'];
        $data_scad = date("Y-m-d",strtotime($data['scadrev']));
        $data_alert =$data['data_alert']?$data['data_alert']:'';
        $km_ins =$data['km_ins']?$data['km_ins']:'';
        $intervallo=$data['intervallo']?$data['intervallo']:'';
        $km_alert=$data['km_alert']?$data['km_alert']:'';
        $km_scadenza=$data['km_scad']?$data['km_scad']:'';
        $stato ='A';
        if(!$data_alert){
            list($anno,$mese,$giorno) = explode("-",$data_scad);
            $mese_scad = 60;
            $data_alert= date("Y-m-d",mktime(0,0,0,$mese,$giorno-$mese_scad,$anno));
        }
        //die;
        $result = 0;
        
            $sql ="INSERT INTO scadenze_veicolo (id, data_ins,user_ins, id_veicolo, tipo, data_scad,data_alert,km_ins,intervallo,km_alert,km_scadenza,stato) VALUES (NULL, '$data_ins','$user_ins',$id_veicolo, '$tipo','$data_scad', '$data_alert',$km_ins,$intervallo,$km_alert,$km_scadenza,'$stato')";
             // var_dump($sql);
            //  die;
             $res = $conn->query($sql);
     


        
        //  var_dump($sql);
         
          //die;
        if($res ){
            $result =  $conn->affected_rows;
            
        }else{
            $result -1;  
        }
        return $result;
    }
    function upScadenza(array $data){
        /**
        * @var $conn mysqli
        */

        $conn = $GLOBALS['mysqli'];
        
        
        $data_ins = date("Y-m-d H:i:s");
        $user_ins=$_SESSION['userData']['username'];
        $id_veicolo = $data['id'];
        $ids = $data['idScad'];
        $tipo = $data['tiposcad'];
        $data_scad = date("Y-m-d",strtotime($data['up_scadrev']));
        $data_alert = $data['data_alert'];
        if(!$data_alert){
            list($anno,$mese,$giorno) = explode("-",$data_scad);
            $mese_scad = 60;
            $data_alert= date("Y-m-d",mktime(0,0,0,$mese,$giorno-$mese_scad,$anno));
        }
        //die;
        $result = 0;
       // $sql ="UPDATE scadenze_veicolo  SET data_ins= '$data_ins', user_ins ='$user_ins',data_scad = '$data_scad',data_alert = '$data_alert' WHERE id_veicolo = $id_veicolo AND tipo = '$tipo' ";
          $sql ="UPDATE scadenze_veicolo  SET data_ins= '$data_ins', user_ins ='$user_ins',data_scad = '$data_scad',data_alert = '$data_alert' WHERE id = $ids ";
       
              //var_dump($sql);
             // die;
             $res = $conn->query($sql);
     


        
        //  var_dump($sql);
         
          //die;
        if($res ){
            $result =  $conn->affected_rows;
            
        }else{
            $result -1;  
        }
        return $result;
    }
    function getScadenza($id,$tipo){
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ="SELECT * from scadenze_veicolo where tipo = '$tipo' and id_veicolo=$id " ;
            //echo $sql;
            
            
            $res = $conn->query($sql);
            
       if($res && $res->num_rows){
        $records = $res->fetch_assoc();
        
      }

        return $records;
    }
    function getScadenze($id){
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];
            $records=[];
            $sql ='SELECT * from scadenze_veicolo where id_veicolo = '.$id;
            //echo $sql;
            
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;
    }
    function delScadenza($id){
        
        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM scadenze_veicolo WHERE id = '.$id;

        $res = $conn->query($sql);
        
        return $res && $conn->affected_rows;

    }
    


    


   

    


    


    