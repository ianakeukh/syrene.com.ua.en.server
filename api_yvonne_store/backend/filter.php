<?php 

require '../core/cors.php';
require '../core/db.php';

//if($_SERVER['REQUEST_METHOD'] == 'POST')
//{

    $Type = DB::getAll("type ORDER BY type_priority DESC");
    $Brand = DB::getAll("brand");
    $Seria = DB::getAll("seria");
    $Amount = DB::getAll("amount");
    $Appointment = DB::getAll('appointment');
    $Hairtype = DB::getAll('hairtype');
    $Gender = DB::getAll('gender');

    $Data = [
        'type' => $Type,
        'brand' => $Brand,
        'seria' => $Seria,
       'amount' => $Amount,
       'appointment' => $Appointment,
       'hairtype' => $Hairtype,
       'gender' => $Gender,
    ];

//     echo '<pre>';
//    print_r($Data);
//    echo '</pre>';

    echo $Data ? json_encode($Data) : '[]'; 
    
//    echo 'vse ok filter';
//}

?>