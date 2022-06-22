<?php 

require '../core/cors.php';
require '../core/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $Data = json_decode($_POST['data']);
    
    $pass = md5($Data->password);
    $reg_date = Date('d.m.Y - H:i');
    $token = md5(time() . $pass);

    $sql = "users SET name='".$Data->name."', last_name='".$Data->last_name."', email='".$Data->email."', phone='".$Data->phone."', password='".$pass."', reg_date='".$reg_date."', token='".$token."', status='0'";
    
//    echo $sql;
    
    if(DB::setData(insert, $sql))
        echo json_encode(['success' => 'ok', 'token' => $token]);
}