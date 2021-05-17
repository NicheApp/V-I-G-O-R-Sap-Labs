<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="login1.css">
<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/javascript" href="login1.js">


</head>

<body>

<form action="check3.php" method="post" >
<canvas id="dotty" width="100%" height="1600px"></canvas>
<div class="login-box">

    <div class="user-box">




<?php 
$cn=mysqli_connect("localhost","root","","globalshala");
if(!$cn)
{
	echo "Unable to connect";
	die();
}
$sql="select * from seat where enrollmentno is NULL";

//Fetch data
$result=mysqli_query($cn,$sql);

//Check number of rows
$n=mysqli_num_rows($result);

while($rw=mysqli_fetch_array($result))
{
	
	$a=$rw["seatno"];
	?>	
    <center>
	<p style="color:#3F0;"><?php echo $a;?></p> 
	</center>
	<?php
}
?>
</div>
    <div class="user-box">
      
    <input name="t3" type="password"  required=""/>
      <label>Select Seat No. from the above</label>

    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input  name="b1" type="submit" value="Submit" />
    </a>
  </form>
</div>
</body>
</html>