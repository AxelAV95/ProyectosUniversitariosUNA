<?php
include '../data/data.php';

function NuevosID(){

    $pdo = Database::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE `tbcliente` SET `clienteid` =:clienteid WHERE `clienteid`>9000000000';
        $inicial = 9000000000;
        $q = $pdo->prepare($sql);
        for($i = $inicial; $i < $inicial+217;$i++){
            
            
            $q -> bindParam(':clienteid', $i, PDO::PARAM_STR);
            $q -> execute();
        }
        
        
    }


?>

<?php

session_start();
   // echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    $key." ".$val."<br/>";

    //NuevosID();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Test If an Element is Visible</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("button").click(function(){
            // show hide paragraph on button click
            $("p").toggle("slow", function(){
                // check paragraph once toggle effect is completed
                if($("p").is(":visible")){
                    alert("The paragraph  is visible.");
                } else{
                    alert("The paragraph  is hidden.");
                }
            });
        });
    });
</script>
</head>
<body>
    <button type="button">Toggle Paragraph Display</button>
    <p style="display: none;">Lorem ipsum dolor sit amet adipi elit...</p>
</body> 
</html>