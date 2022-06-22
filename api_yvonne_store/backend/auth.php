<?php 

require 'core/cors.php';
require 'core/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $token = $_POST['token'];
   
    $sql = "users WHERE token = '".$token."'";
    
//    echo $sql;

    $response = DB::getRow($sql);
    
    echo $response ? json_encode($response) : '[]';
}