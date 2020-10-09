<?php



    function getTestride(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : '';
        $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';
        $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
        $search2 = (int)array_key_exists('search2', $params) ? $params['search2'] : '';
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
            
            $sql ='SELECT * FROM testride';
        /*    if($search1 or $search2 or $search3){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" codtab = '$search1' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 or $search3){
                    $sql .="AND";
                }
                
            }
            if($search2){
                $sql .="  codtab = '$search2'";
                if($search3){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  finimp ='$search3'";
            }
        */
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

    function getTest(int $id){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT * FROM testride WHERE id = '.$id;
            //echo $sql;
            $res = $conn->query($sql);
            
            if($res && $res->num_rows){
              $result = $res->fetch_assoc();
              
            }
          return $result;
        
        
    }

    function getEvent(){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ='SELECT * FROM testride ';
            //echo $sql;
           
            
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;
        
        
    }

    function countTestride(array $params = []){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'lisdve';
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
            
            $sql ='SELECT count(*) as totalList FROM testride';
            /*if($search1 or $search2 or $search3){
                $sql .=" WHERE";
            }
            if ($search1){
                $sql .=" lisdes LIKE '%$search1%' ";
                //$sql .=" OR lisdve LIKE '%$search1%' ";
                if($search2 or $search3){
                    $sql .="AND";
                }
                
              }
            if($search2){
                $sql .="  listip = '$search2'";
                if($search3){
                    $sql .="AND";
                }
            }
            if($search3){
                $sql .="  lisgam ='$search3'";
            }

            */
             // var_dump($sql);
             $res = $conn->query($sql);
             if($res) {
     
              $row = $res->fetch_assoc();
              $totalList = $row['totalList'];
             }
     
         return $totalList;


    }

    function getCliente($id){

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM anagr_clienti WHERE id = '$id'";
           // echo $sql;
           
                
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
              }
         return $result;
    
    }

    function getClientecf($id){

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM anagr_clienti WHERE codfiscale = '$id'";
           // echo $sql;
           
                
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
              }
         return $result;
    
    }

    function getMotoinfo($id){

        $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM veicoli_usati WHERE targa = '$id' AND ab_testride = 'S'";
           // echo $sql;
           
                
            $res = $conn->query($sql);
            if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
              }
         return $result;
    
    }

    function getComune($id){

        $conn = $GLOBALS['mysqli'];
            $des=0;
            $sql ="SELECT comune as des FROM tab_comuni WHERE codcata = '$id'";
            //echo $sql;
           
                
            $res = $conn->query($sql);
            if($res) {
        
             $row = $res->fetch_assoc();
             $des = $row['des'];
            }
        
           return $des;
    
    }

    function getMoto(){

        /**
         * @var $conn mysqli
         */
      
          $conn = $GLOBALS['mysqli'];
            $result=[];
            $sql ="SELECT * FROM veicoli_usati WHERE ab_testride = 'S' ORDER BY id";
            //echo $sql;
            $res = $conn->query($sql);
            
           
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

     return $records;
        
        
    }

    function getKM(){

        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $data =[];
        $targa = $_REQUEST['targa'];
        $sql ="SELECT * FROM veicoli_usati WHERE targa = '$targa'";
        //print_r($sql);
        //echo $sql;die;
        $result = $conn->query($sql);


        
        if ($result->num_rows > 0) {
        // output data of each row
                while( $row = $result->fetch_assoc()) {
                break; 
                
                }
        }
        


        echo json_encode($row);
    }

    function saveTestride(array $data){ 

        /**
         * @var $conn mysqli
         */
      
            $conn = $GLOBALS['mysqli'];
                   
            $cod_ambiente = $_SESSION['userData']['ambiente'];
            $cod_azienda = $_SESSION['userData']['azienda'];
            $cod_filiale = $_SESSION['userData']['filiale'];
            $user_ins = $_SESSION['userData']['username'];
            $data_ins = date('Y-m-d H:i:s');
            $user_pren = $_SESSION['userData']['username'];
            $data_pren = $conn->escape_string($data['data_pren']);
            $id_cliente =  $conn->escape_string($data['codfiscale']);
            $id_veicolo =  $conn->escape_string($data['targa']);
            $durata_test =  $conn->escape_string($data['durata_test']);
            $ora_test =  $conn->escape_string($data['ora_test']);

            
            $result=0;
            $sql ='INSERT INTO testride (id, cod_ambiente, cod_azienda, cod_filiale, user_ins, data_ins, user_pren, data_pren, id_cliente, id_veicolo) ';
            
            $sql .=" VALUE ( NULL,'$cod_ambiente', '$cod_azienda', '$cod_filiale', '$user_ins', '$data_ins',  '$user_pren', '$data_pren $ora_test', '$id_cliente', '$id_veicolo' )";
            
            
            
            
            //print_r($data);
            //echo $sql;die;
            $res = $conn->query($sql);
            
            if($res ){
              $result =  $conn->affected_rows;
              
            }else{
              $result -1;  
            }
          return $result;
        
        
    }