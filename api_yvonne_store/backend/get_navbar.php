<?php 

require '../core/cors.php';
require '../core/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $Data = json_decode($_POST['data']);

    if($Data->type == 'brand_id')
        $where = " WHERE brand_id = '" . $Data->value . "'";
    else
        $where = " WHERE type_id = '" . $Data->value . "'";
        
    
    $sql_query = "products " . $where;
    
    $Res = DB::getAll($sql_query);
    
//     echo $sql_query;
   
    echo $Res ? json_encode($Res) : "[]";
    
}

?>