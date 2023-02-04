<?php 
include "../data/data.php";


  $pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $response = array();
    // DB details
    $id =  intval($_GET['id']);		  		  
    // Read 
    if ( $_SERVER['REQUEST_METHOD'] == "GET" ) {
        // Dont forget to sanitize!
        
		$sql="SELECT * FROM `tbruta` WHERE `rutacodigo`=".$id;
        
        // Build the query
        $stmt = $pdo->query($sql);
         $response = $stmt->fetch(PDO::FETCH_ASSOC);
        
		
        echo json_encode($response);
		
}

//$val =  intval($_GET['id']);


/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdbuses";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$response = $conn->query($sql);
print_r($response);



echo json_encode($response);*/

/*
//--------------------------------------------------------------------------
  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "bdbuses";
  $tableName = "tbruta";

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  
  $con = mysqli_connect($host,$user,$pass);
  $dbs = mysqli_select_db($databaseName, $con);
  
  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  $result = mysql_query($sql);          //query
  $array = mysql_fetch_row($result);                          //fetch result    

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($array);


$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','bdbuses');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"dbsaf2");
$sql="SELECT * FROM tbcliente WHERE clientemedidor = '".$q."'";

$result = mysqli_query($con,$sql);

// Set up the response
    $pdo = Database::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $response = array();
    // DB details
    
    // Read 
    if ( $_SERVER['REQUEST_METHOD'] == "GET" ) {
        // Dont forget to sanitize!
        $id = 1;
		echo $q = "SELECT * FROM `tbruta` WHERE `rutaid` =  ".$id."";
        
        // Build the query
        $stmt = $pdo->query($q);
         $response = $stmt->fetch(PDO::FETCH_ASSOC);
        
		
        echo json_encode($response);
		

}*/

?>