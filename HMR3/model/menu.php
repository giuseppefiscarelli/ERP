<?php
    function delete(int $id){

        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];

            $sql ='DELETE FROM sidebar WHERE id = '.$id;

            $res = $conn->query($sql);
            
            return $res && $conn->affected_rows;


    }

    function deleteAmb(int $id){

        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        $sql ='DELETE FROM ambienti WHERE id = '.$id;

        $res = $conn->query($sql);
        
        return $res && $conn->affected_rows;


    }

    function getmMenu(int $id){

            /**
             * @var $conn mysqli
             */

            $conn = $GLOBALS['mysqli'];
                $result=[];
                $sql ='SELECT * FROM sidebar WHERE id = '.$id;
                //echo $sql;
                $res = $conn->query($sql);
                
                if($res && $res->num_rows){
                $result = $res->fetch_assoc();
                
                }
        return $result;


    }

    function storeMenu(array $data, int $id){

        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];
            $menu = $conn->escape_string($data['menu']);
            $posizione = $conn->escape_string($data['posizione']);
            $sub1 = $conn->escape_string($data['sub1']);
            $sub2 = $conn->escape_string($data['sub2']);
            $sub3 = $conn->escape_string($data['sub3']);
            $icona = $conn->escape_string($data['icona']);
            $funzione = $conn->escape_string($data['funzione']);
            $nome = $conn->escape_string($data['nome']);
            $ambiente = $conn->escape_string($data['ambiente']);


            
            $result=0;
            $sql ='UPDATE sidebar SET ';
            $sql .= "menu = '$menu', posizione = '$posizione', sub1 = '$sub1', sub2 = '$sub2', sub3 = '$sub3', icona = '$icona', funzione = '$funzione', nome ='$nome', ambiente ='$ambiente'";
            
            
            $sql .=' WHERE id = '.$id;
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

    function saveMenu(array $data){

        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];
            $menu = $conn->escape_string($data['menu']);
            $posizione = $conn->escape_string($data['posizione']);
            $sub1 = $conn->escape_string($data['sub1']);
            $sub2 = $conn->escape_string($data['sub2']);
            $sub3 = $conn->escape_string($data['sub3']);
            $icona = $conn->escape_string($data['icona']);
            $funzione = $conn->escape_string($data['funzione']);
            $nome = $conn->escape_string($data['nome']);
            $ambiente = $conn->escape_string($data['ambiente']);

            
            $result=0;
            $sql ='INSERT INTO sidebar (id, menu, posizione, sub1, sub2, sub3, icona, funzione, nome, ambiente) ';
            $sql .= "VALUES (NULL, '$menu', '$posizione', '$sub1', '$sub2', '$sub3', '$icona', '$funzione', '$nome', '$ambiente')";
            
            
            
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

    function storeAmb(array $data, int $id){

        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];
            $nomeambiente = $conn->escape_string($data['nomeambiente']);
            $homepage = $conn->escape_string($data['homepage']);
            $logo = $conn->escape_string($data['logo']);
            $favicon = $conn->escape_string($data['favicon']);
            

            
            
            $result=0;
            $sql ='UPDATE ambienti SET ';
            $sql .= "nomeambiente = '$nomeambiente', homepage = '$homepage', logo = '$logo', favicon = '$favicon'";
            
            
            $sql .=' WHERE id = '.$id;
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
  
    function saveAmb(array $data){

        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];
            $nomeambiente = $conn->escape_string($data['nomeambiente']);
            $homepage = $conn->escape_string($data['homepage']);
            $logo = $conn->escape_string($data['logo']);
            $favicon = $conn->escape_string($data['favicon']);
            
            $result=0;


            $sql ='INSERT INTO ambienti (id,  nomeambiente, homepage, logo, favicon) ';
            $sql .= "VALUES (NULL,  '$nomeambiente', '$homepage', '$logo', '$favicon') ";
            
            //echo $sql;die;
            $res = $conn->query($sql);
            
            if($res ){
                $result =  $conn->affected_rows;
                
            }else{
                $result -1;  
            }
        return $result;


    }

    function getAmbienti(){

            /**
             * @var $conn mysqli
             */

            $conn = $GLOBALS['mysqli'];

            
            $records = [];

            
            $sql = "SELECT * FROM ambienti";
            
            //var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;

    }
  
    function getMenuAmbiente(){

            /**
             * @var $conn mysqli
             */

            $conn = $GLOBALS['mysqli'];

            
            $records = [];

            
            $sql = "SELECT DISTINCT ambiente FROM sidebar WHERE menu = 'main' ORDER BY posizione ASC";
            
            //var_dump($sql);
            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;

    }

    function getMenuAmbienteMain(){
        
            /**
             * @var $conn mysqli
             */

            $conn = $GLOBALS['mysqli'];

            
            $records = [];

            
            $sql = "SELECT * FROM sidebar WHERE menu = 'main' ORDER BY posizione ASC";
            

            $res = $conn->query($sql);
            if($res) {

                while( $row = $res->fetch_assoc()) {
                    $records[] = $row;
                    
                }

            }

        return $records;

    }

    function infoAmbienti($id){


        /**
         * @var $conn mysqli
         */

        $conn = $GLOBALS['mysqli'];

        
        $records = [];


        $sql = "SELECT * FROM ambienti";

        //var_dump($sql);
        $res = $conn->query($sql);
        if($res) {

            while( $row = $res->fetch_assoc()) {
                $records[] = $row;
                
            }

        }

        return $records;
    }