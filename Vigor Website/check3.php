<?php 
session_start();
if(!isset($_SESSION["usertype"]))
{
	header("location:autherror.php");
	die();
}
$ut=$_SESSION["usertype"];
$e1=$_SESSION["enrollmentno"];
if($ut!="employee")
{
	header("location:autherror.php");
	die();
}
?>
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
<link rel="stylesheet" type="text/css" href="check4.css">
<script type="text/javascript" src="check4.js"></script>

<link type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

</head>

<body>
<?php 
$cn=mysqli_connect("localhost" ,"root","","globalshala");
if(!$cn)
{
	echo "unable to conect";
	die();
}

if(isset($_POST["b1"]))
 {
	 
		$c=$_POST["t3"];
	
	
	
	$sql="update seat set enrollmentno='$e1' where seatno='$c'";
	$n=mysqli_query($cn,$sql);
	if($n==1)
	{
		?>
		<div class="contain">
	<div class="congrats">
		<h1>Congratulations<span class="hide"></span></h1>
		<div class="done">
			<svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
<path class="circ path" style="fill:#0cdcc7;stroke:#07a796;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" d="
	M30.5,6.5L30.5,6.5c6.6,6.6,6.6,17.4,0,24l0,0c-6.6,6.6-17.4,6.6-24,0l0,0c-6.6-6.6-6.6-17.4,0-24l0,0C13.1-0.2,23.9-0.2,30.5,6.5z"
	/>
<polyline class="tick path" style="fill:none;stroke:#fff;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
	11.6,20 15.9,24.2 26.4,13.8 "/>
</svg>
			</div>
		<div class="text">
		<p>You have successfully booked a seat for your day. 
        <br>Here are your details<br>
			<p>ID: <?php echo $e1;?></p>
			<p>Seat No.: <?php echo $c;?></p>
		</p>
			<p>Eagerly awaiting your visit
			</p>
			</div>
		<p class="regards">Regards, Globalshala</p>
        <p><a href="login.php">Click on the link to login</a></p>
	</div>
</div>

		<?php
	}
	else
	{
		?>
        <h3>404error</h3>
        <?php
	}
}
?>
</body>
</html>