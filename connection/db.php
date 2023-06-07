<?php
    $host = "localhost";
    $port = "5432";
    $dbname = "high";
    $user = "postgres";
    $password = "Dhiru@1234"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string);


    
?>