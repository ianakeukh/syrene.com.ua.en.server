<?php 

require '../core/cors.php';
require '../core/db.php';

//if($_SERVER['REQUEST_METHOD'] == 'POST')
//{

    $Data = DB::getAll("products");

   echo $Data ? json_encode($Data) : "[]";


    // echo '<pre>';
    // print_r($Data);
    // echo '</pre>';

    
//    echo 'ok products!!!!';
//}

?>