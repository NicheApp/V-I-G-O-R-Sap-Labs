<?php 
if(!isset($_POST["b1"]))
{
	header("Location:kunal.php");
	die();
}
?>
<html>
<head>
<title>Untitled Document</title>
</head>

<body>

<h1>Manage Student</h1>
<?php 
$cn=mysqli_connect("localhost" ,"root","","globalshala");
if(!$cn)
{
	echo "unable to conect";
	die();
}

if(isset($_POST["b1"]))
 {
	 
	$a=$_POST["t1"];
	$b=$_POST["t2"];
	$c=$_POST["t3"];
	
	
	
	$sql="update seat set enrollmentno='$a',password='$b' where seatno='$c'";
	$sql.="select * from logindata where enrollmentno='$a' and password='$b'";
	$n=mysqli_query($cn,$sql);
	if($n==1)
	{
		?>
		<h2>Changes are saved successfully</h2>
        <h3><a href="admintodolist.php">Continue...</a></h3>
		<?php
	}
	else
	{
		?>
        <h3>Changes NO</h3>
        <?php
	}
}
?>
</body>
</html>