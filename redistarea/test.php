<?php 


$redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
   echo "Connection to server sucessfully"; 
   //check whether server is running or not 
   echo "Server is running: ".$redis->ping(); 
$redis->del("tutorial-list"); 
echo $redis->lpush("tutorial-list", "Redis"); 
  echo $redis->lpush("tutorial-list", "Mongodb"); 
  echo $redis->lpush("tutorial-list", "Mysql");  
   
   // Get the stored data and print it 
   $arList = $redis->lrange("tutorial-list", 0 ,-1); 
   echo "Stored string in redis:: "; 
   echo $arList[0];
   echo 'cuenta es'.count($arList);
   print_r($arList); 

 ?>