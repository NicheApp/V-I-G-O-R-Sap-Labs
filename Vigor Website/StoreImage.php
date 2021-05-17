<?php 
 
class StoreImage{
	
	private $con; 
 
	public function __construct(){
		//getting the connection file
		require_once dirname(__FILE__) . '/DbConnect.php';
 
		//creating the object of the dbconnect class
		$db = new DbConnect; 
 
		//getting the connection
		$this->con = $db->connect();
	}
 
	//the method will save the image to database
	public function saveImage($desc, $image){
 
		$stmt = $this->con->prepare("INSERT INTO images (description, image) VALUES (?, ?)");
		$stmt->bind_param("ss", $desc, $image);
 
		if($stmt->execute())
			return true; 
		return false; 
	}
 
	//the method will return all the images from the database
	//excluding the image, we will create a separate method for getting the image content
	//as the image is stored in string format we need to fetch it separately
	public function getAllImages(){
		$stmt = $this->con->prepare("SELECT id, description FROM images ORDER BY id DESC");
		$stmt->execute();
		$stmt->bind_result($id,$desc);
		$images = array();
		while($stmt->fetch()){
			array_push($images, array('id'=>$id, 'desc' => $desc));
		}
		$stmt->close();
		return $images; 
	}
 
	//this method will return the actual image content 
	public function getImageContent($imageid){
		$stmt = $this->con->prepare("SELECT image FROM images WHERE id = ?");
		$stmt->bind_param("i", $imageid);
		$stmt->execute();
		$stmt->bind_result($image);
		$stmt->fetch();
		return $image; 
	}
	
}