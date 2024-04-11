<?php 

include "driver/vendor/autoload.php";
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;


class Conexion{

	public function conectar(){

		$client = ClientBuilder::create()
	    ->withDriver(
	        'aura',
	        'neo4j+s://9ba4a486.databases.neo4j.io',
	        Authenticate::basic('neo4j', 'qr4qu-J0fHnlCxvRaORRpGCggYwzJQ61T_aTT8YuIWM')
	    )
	    ->build();

   		 return $client;

	}

}


 ?>