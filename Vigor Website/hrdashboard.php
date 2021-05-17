<?php 
session_start();
if(!isset($_SESSION["usertype"]))
{
	header("location:autherror.php");
	die();
}
$ut=$_SESSION["usertype"];
$e1=$_SESSION["enrollmentno"];
if($ut!="hr")
{
	header("location:autherror.php");
	die();
}
?>

<html>
<head>

<title>Globalshala</title><link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/javascript" href="https://code.jquery.com/jquery-3.4.1.min.js">
<link rel="stylesheet" type="text/javascript" href="https://cdn.jsdelivr.net/npm/chart.js@2.8.0">
<link rel="stylesheet" type="text/css" href="kota.css">
<link rel="stylesheet" type="text/javascript" href="kota.js">
<link rel="stylesheet" type="text/css" 
href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<aside class="side-nav" id="show-side-navigation1">
  <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
  <div class="heading">


<?php 
require_once("mylib.php");
$ta=countmyemployee();
$tb=seat($e1);
$photo=check_photo($e1);
if($photo=="no")
{
	?>
    <form method="post" enctype="multipart/form-data" action="uploadphoto.php">
    <p>Photo<input type="file" name="F1"  /></p>
    <p><input style="color:#000;" type="submit" name="B1"  /></p>
    </form>
    <?php
}
else
{
	?>
    <p>
    <img src="<?php echo $photo; ?>" width="100" height="123"   />
    </p>
   <a href="changephoto.php">Change</a>
    <?php
}
?>





    <div class="info">




<?php 
$cn=mysqli_connect("localhost","root","","globalshala");
if(!$cn)
{
	echo "Unable to connect";
	die();
}
$sql="select * from employeedata where enrollmentno='$e1'";

//Fetch data
$result=mysqli_query($cn,$sql);

//Check number of rows
$n=mysqli_num_rows($result);

if($n>0)
{
	//show data
	$rw=mysqli_fetch_array($result);
	$a=$rw["name"];
	
	?>
	<p>
    	<h3><?php echo $a; ?> <br/></h3>
     	
	</p>
	






      
    </div>
  </div>
  
  <ul class="categories">
    <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="aboutus.php"> About us</a>
          </li>
    <li><i class="fa fa-address-book fa-fw"></i><a href="todolist.php"> To Do list</a>
          </li>
	<li><i class="fa fa-support fa-fw"></i><a href="submissions.php"> Submissions</a>
          </li>

    <li><i class="fa fa-envelope fa-fw"></i><a href="query.php"> Query/Answer</a>
        <li><i class="fa fa-connectdevelop fa-fw"></i><a href="rating.php">Feedback</a>
      
    </li>
      
      
    </li>
    
  </ul>
</aside>
<section id="contents">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button ="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <i class="fa fa-align-right"></i>
        </button>
        <a class="navbar-brand" href="dashboard.php">my<span class="main-color">Dashboard</span></a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="profile.php" class="dropdown-toggle"  role="button" aria-haspopup="true" 
            aria-expanded="false">My profile <span class="caret"></span></a>
          <li><a href="logout.php"><i class="fa fa-power-off"></i><span>logout</span></a></li>
         
        </ul>
      </div>
    </div>
  </nav>
  <div class="welcome">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h2>Welcome to Dashboard</h2>
            </div>
        </div>
      </div>
    </div>
  </div>
  <section class="statistics">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="box">
            <i class="fa fa-briefcase fa-fw bg-primary"></i>
            <div class="info">
              <h3><span>Seat No.</span><?php echo $tb; ?></h3> 
            
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <i class="fa fa-file fa-fw danger"></i>
            <div class="info">
              <h3>34 <span>Projects</span></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <i class="fa fa-users fa-fw success"></i>
            <div class="info">
              <h3> <span>Total Employees </span><?php echo $ta; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <?php
	
}
else
{
	?>
	<h2>No data found</h2>
	<?php
}
?>
  <section class="admins">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="box">type
            <h3>Admins:</h3>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148906966/small/1501685402/enhance" alt="admin">
              </div>
              <div class="info">
                <h3>Rahul Jain</h3>
                <p>Tech Lead</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907137/small/1501685404/enhance" alt="admin">
              </div>
              <div class="info">
                <h3>Avi Agarwal</h3>
                <p>Hr Lead</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907019/small/1501685403/enhance" alt="admin">
              </div>
              <div class="info">
                <h3>Utkarsh Nadar</h3>
                <p>Finance Lead</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <h3>Moderators:</h3>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907114/small/1501685404/enhance" alt="admin">
              </div>
              <div class="info">
                <h3>Sannindhya Bansal</h3>
                <p>Tech Moderator</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907086/small/1501685404/enhance" alt="admin">
              </div>
              <div class="info">
                <h3>Yash Tripathi</h3>
                <p>Hr Moderator</p>
              </div>
            </div>
            <div class="admin">
              <div class="img">
                <img class="img-responsive" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="admin">
              </div>
              <div class="info">
                <h3>Sahil Singhal</h3>
                <p>Finance Moderatot</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
    
  </section>





</body>
</html>