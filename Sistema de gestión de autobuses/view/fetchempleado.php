<?php

// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'bdbuses';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
$query = $db->query("SELECT * FROM tbempleado WHERE empleadocedula LIKE '%".$searchTerm."%'");

// Generate skills data array
$array = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data = $row['empleadocedula'];
       
        array_push($array, $data);
    }
}

// Return results as json encoded array
echo json_encode($array);

?>