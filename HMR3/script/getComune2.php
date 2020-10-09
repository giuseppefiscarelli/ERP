<?php
require_once '../functions.php';
require_once '../connection.php';
        /**
         * @var $conn mysqli
         */

    $conn = $GLOBALS['mysqli'];
    $data =[];
    $comune = $_REQUEST['testb']; 
        $sql ="SELECT * FROM tab_comuni WHERE codcata = '$comune'";
        //echo $sql;
       
        $result = $conn->query($sql);


        
        if ($result->num_rows > 0) {
        // output data of each row
                while( $row = $result->fetch_assoc()) {
                break; 
                
                }
        }
        


        echo json_encode($row);