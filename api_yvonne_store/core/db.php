<?php 

require 'config.php';

class DB
{
    static private $link = null;
    
    static private function connect()
    {
        self::$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(self::$link->connect_error)
            echo self::$link->connect_error;
    }

    static function getAll($param)
    {
        self::connect();

        $sql = self::$link->query(select . $param);

        
        if($sql->num_rows > 0)
        {
            while($row = $sql->fetch_assoc())
            {
                $response[] = $row;
            }
        }
        

        return $response;
    }

    static function getRow($param)
    {
        self::connect();

        return self::$link->query(select . $param)->fetch_assoc();
    }

    static function setData($type, $param)
    {
        self::connect();

        if(self::$link->query($type . $param))
            return true;
    }
    
    static function testConnect()
    {
        self::connect();
            
    }
}

//DB::testConnect();





?>