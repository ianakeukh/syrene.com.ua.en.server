<?php

require '../core/cors.php';
require '../core/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    
   $sql_query = "products" . where . $_POST['id'];
    
   $Res = DB:getRow($_sql_query);
    
   echo $Res ? json_encode($Res) : "[]";   
    
    
    
    
    
    
}

?>