<?php
    session_start();
    include('../../conn/db.php');

    if($_SESSION['loggedin'] != true){
        session_destroy();
        header("LOCATION: ../../");
        exit;
    }

   
?>