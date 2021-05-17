<?php 
session_start();
if(!isset($_SESSION["usertype"]))
{
	header("location:autherror.php");
	die();
}
$ut=$_SESSION["usertype"];
$e1=$_SESSION["enrollmentno"];
if($ut!="admin")
{
	header("location:autherror.php");
	die();
}
?>

<html>
<head>
<title>Globalshala</title><link rel="stylesheet" type="text/css" href="profile.css">

</head>
<body>
<div class='box'>
  <div class='wave -one'></div>
  <div class='wave -two'></div>
  <div class='wave -three'></div>
</div>
<!-- this is the markup. you can change the details (your own name, your own avatar etc.) but don’t change the basic structure! -->

<aside class="profile-card">

    <header>
    
        <!-- here’s the avatar -->
        <?php 
require_once("mylib.php");

$photo=check_photo($e1);
if($photo=="no")
{
	?>
    <form method="post" enctype="multipart/form-data" action="uploadphoto.php">
    <p>Photo<input type="file" name="F1"  /></p>
    <p><input type="submit" name="B1"  /></p>
    </form>
    <?php
}
else
{
	?>
    <p>
    <img src="<?php echo $photo; ?>" width="100" height="123"   />
    </p>
    <?php
}
?>
</header>

    <!-- bit of a bio; who are you? -->
    <div class="profile-bio">
    

            
        
        <!-- the username -->
        <?php 
$cn=mysqli_connect("localhost","root","","globalshala");
if(!$cn)
{
	echo "Unable to connect";
	die();
}
$sql="select * from admindata where enrollmentno='$e1'";

//Fetch data
$result=mysqli_query($cn,$sql);

//Check number of rows
$n=mysqli_num_rows($result);

if($n>0)
{
	//show data
	$rw=mysqli_fetch_array($result);
	$a=$rw["name"];
	$c=$rw["email"];
	$d=$rw["contact"];
	
	?>
	<p>
    	<h1 style="color:#300"><?php echo $a; ?></h1>
		<h3>ADMIN</h3>
		<p style="font-size:14px;"><?php echo $d; ?></p>
        <p style="font-size:14px;"><?php echo $c; ?></p>
	</p>
	<?php
	
}
else
{
	?>
	<h2>No data found</h2>
	<?php
}
?>

        
    
        <p>“when you don't create things, you become defined by your tastes rather than ability. your tastes only narrow & exclude people. so create.”</p>
    
    </div>

    <!-- some social links to show off -->
    <ul class="profile-social-links">
        
        <!-- twitter - el clásico  -->
        <li>
           <a href="admintodolist.php">
           <img src="https://img.icons8.com/fluent/34/000000/todo-list.png"/>
          </a>
        </li>
        
        <!-- envato – use this one to link to your marketplace profile -->
        <li>
           <a href="editprofile.php">
             <img src="https://img.icons8.com/fluent/30/000000/edit.png"/>
          </a>
        </li>
        
        <!-- codepen - your codepen profile-->
        <li>
           <a href="adminhome.php">
<img src="https://img.icons8.com/metro/26/000000/reply-arrow.png"/>
          </a>
        </li>
        
        <!-- add or remove social profiles as you see fit -->
    
    </ul>

</aside>
<!-- that’s all folks! -->
</body>
</html>