<?php
require_once 'functions.php';
require_once 'connection.php';
        /**
         * @var $conn mysqli
         */
        $conn = $GLOBALS['mysqli'];
        $data =[];
        $targa = $_REQUEST['targa'];
        $sql ="SELECT km, targa FROM veicoli_usati WHERE targa = '$targa'";
        //print_r($sql);
        //echo $sql;die;
        $result = $conn->query($sql);


        
        if ($result->num_rows > 0) {
        // output data of each row
        while( $row = $result->fetch_assoc()) {
        break; 
        // A single record picked up from database so quit loop
        }
        }
        


        echo json_encode($row);