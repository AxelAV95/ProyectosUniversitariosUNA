<?php 

	class Database{

		private static $dbName = "dbsaf2";
    private static $dbHost = "localhost" ;
    private static $dbUsername = "root";
    private static $dbUserPassword = "";
     
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
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
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





<?php  
/*
error_reporting(0);
	$servername = "localhost";
	$username = "root";
	$pass = "";
	$database = "dbbues";*/

	/*$conn = mysqli_connect($servername, $username, $pass, $database) or die ("No se ha podido conectar al servidor de Base de datos");;
	  $conn->set_charset('utf8');*/

?>