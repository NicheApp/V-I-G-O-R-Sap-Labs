<?php
 session_start();
 if(!isset($_SESSION["usertype"]))
 {
	 header("Location:Autherror.php");
	 die();
 }
 $ut=$_SESSION["usertype"];
 $e1=$_SESSION["enrollmentno"];
 if($ut!="admin")
 {
	 header("Location:Autherror.php");
	 die();
 }

?>
<html>
<head>
<title>Globalshala</title></head>
<?php
	require_once("mylib.php");
	$sql="delete from photodata where enrollmentno='$e1'";
	$n=mysqli_query($cn,$sql);
	header("Location:adminhome.php");
	die();
	

?>
<body>
</body>
</html>