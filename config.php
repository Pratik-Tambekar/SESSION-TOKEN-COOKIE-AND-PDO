<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
class DbConnect
{
	private $server="localhost";
	private $dbname="securelogin";
	private $username="root";
	private $password="";
	function connect()
	{

		try {
		    $conn = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $conn;
		   // echo "Connection ok!";
		    } catch (PDOException $e) {
		    echo "Err: " . $e->getMessage();
		    }
		
		   
	}
}

// $db = new DbConnect;
// $db = $db->connect();
// $stmt = $db->prepare("Select * from users");
// $stmt->execute();
// $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
// //print_r($customer);
// foreach($customer as $data){

//     echo $data['user_username'];

// }

?>