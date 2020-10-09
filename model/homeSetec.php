<?php

function countErpUsers(){

    /**
     * @var $conn mysqli
     */

        $conn = $GLOBALS['mysqli'];
            
        $totalUser = 0;

        

        $sql = 'SELECT COUNT(*) as totalUser FROM users';
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
        $totalUser = $row['totalUser'];
        

    return $totalUser;

}

function countAmbienti(){

    $conn = $GLOBALS['mysqli'];
            
    $totalAmb = 0;

    

    $sql = 'SELECT COUNT(*) as totalAmb FROM ambienti';
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $totalAmb = $row['totalAmb'];
    

     return $totalAmb;

}