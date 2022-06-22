<?php 

require 'core/cors.php';
require 'core/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $sql = "users WHERE email = '".$_POST['email']."'";
    
//    echo $sql;

    if(DB::getRow($sql) != null)
    {
        $token = md5(Date('d.m.Y.H.i.s') . $_POST['email']);

        $sql = "users SET forgot_token = '$token' WHERE email = '" . $_POST['email'] . "'";

        DB::setData(update, $sql);

        $to = $_POST['email'];
        $from = 'noreply.forgot@' . $_SERVER['SERVER_NAME'];

        $subject = 'Forgot password';
        $subject = '=?utf=8?B?'.base64_encode($subject).'?=';
        $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=utf-8/r/n";

        $message = "
            <h1>Forgot password</h1>
            <p>Go to link <a href='http://site.com/forgot?token=$token'>link text</a></p>
        ";

        if(mail($to, $subject, $message, $headers))
            echo 'ok';
    }
    else 
    {
        echo 'fail';
    }
    
}