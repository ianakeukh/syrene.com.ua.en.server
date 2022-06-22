<?php 

require '../core/cors.php';
require '../core/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $Data = json_decode($_POST['data']);
    
    $pass = md5($Data->password);
   
    $sql = "users WHERE email = '".$Data->email."' AND password='".$pass."' ";
    
//    echo $sql;

    $response = DB::getRow($sql);
    
    echo $response ? json_encode(['success' => 'ok', 'token' => $response['token']]) : '[]';
}