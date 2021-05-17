<?php 
 
	define("DB_HOST", "localhost");
	define("DB_NAME", "globalshala");
	define("DB_USER", "root");
	define("DB_PASS", "");
 
	define("MAX_SIZE_ALLOWED", 1048576);
?>
	<?php 
 
class DbConnect{
	
	private $con; 
 
	public function __construct(){
	
	}
 
	public function connect(){
		//getting the constants from the file
		require_once dirname(__FILE__). '/Constants.php';
 
		//connecting to database
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
		//if there is an error 
		//return null
		if(mysqli_connect_errno()){
			echo 'Failed to connect with database'. mysqli_connect_error();
			return null; 
		}
 
		//if everything goes well return the connection 
		return $this->con; 
	}
	
}