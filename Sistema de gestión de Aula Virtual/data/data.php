<?php 


class Database{

    private static $dbName = "bdaula";
    private static $dbHost = "DESKTOP-6JNDBA9" ;
    private static $dbUsername = "sa";
    private static $dbUserPassword = "12345";

 
    private static $cont  = null;
    
    public function __construct() {
        die('Inicialización no permitida.');
    }
    
    public static function conectar()
    {
    // One connection through whole application
    if ( null == self::$cont )
    {     
        try
        {
        self::$cont =  new PDO( "sqlsrv:server=".self::$dbHost.";"."database=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
       
     
        }
        catch(PDOException $e)
        {
        die($e->getMessage()); 
        }
    }
    return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
}



?>