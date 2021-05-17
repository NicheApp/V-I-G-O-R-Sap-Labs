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

<?php 
if(!isset($_POST["b1"]) && !isset($_POST["b2"]))
{
	header("Location:admintodolist.php");
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
	?>
	<p>
    	<h3><a href="#"><?php echo $a; ?> <br/></a></h3>
      	
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






      
    </div>
  </div>
  
  <ul class="categories">
    <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#"> About us</a>
          </li>
    <li><i class="fa fa-address-book fa-fw"></i><a href="todolist.php"> To Do list</a>
          </li>
	<li><i class="fa fa-support fa-fw"></i><a href="submission.php"> Submissions</a>
          </li>

    <li><i class="fa fa-envelope fa-fw"></i><a href="query.php"> Query/Answer</a>
      
      
    </li>
    
  </ul>
</aside>
<section id="contents">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <i class="fa fa-align-right"></i>
        </button>
        <a class="navbar-brand" href="#">my<span class="main-color">Dashboard</span></a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="profile.php" class="dropdown-toggle"  role="button" aria-haspopup="true" 
            aria-expanded="false">My profile <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user-o fw"></i> My account</a></li>
              <li><a href="#"><i class="fa fa-envelope-o fw"></i> My inbox</a></li>
              <li><a href="#"><i class="fa fa-question-circle-o fw"></i> Help</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="fa fa-sign-out"></i> Log out</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-comments"></i><span>23</span></a></li>

          <li><a href="#"><i class="fa fa-bell-o"></i><span>98</span></a></li>
          <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="welcome">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h2>Welcome to Your To Do List</h2>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="welcome">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <h2>Here are yout Tasks for today </h2>
              	<h3>lsclsm<br/></a></h3>
      <p>Lorem ipsum dolor sit amet consectetur.</p>
	<h1>Edit and Save</h1>

<?php 
$enrollmentno=$_POST["h1"];
$cn=mysqli_connect("localhost","root","","globalshala");
if(!$cn)
{
	echo "unable to conenct";
	die();
}
$sql="select * from employeedata where enrollmentno='$enrollmentno'";
$result=mysqli_query($cn,$sql);
$n=mysqli_num_rows($result);
if($n==1)
{
	$rw=mysqli_fetch_array($result);
	$a=$rw["enrollmentno"];
	$b=$rw["name"];
	$c=$rw["todolist"];
	$d=$rw["department"];
	$e=$rw["email"];
	$f=$rw["contact"];
	
	if(isset($_POST["b1"]))
	{
	?>
	
		<form id="form1" name="form1" method="post" action="manageemployee1.php">
		  <table>
          <tr>
          <th style="color:#FFF; font-family:'Comic Sans MS', cursive">
          Enrollment no</th><td><input readonly value="<?php echo $a; ?>" type="text"
           name="t1" id="t1" /></td></tr>
           <tr>
           <th style="color:#FFF; font-family:'Comic Sans MS', cursive"> 
		  Name</th><td><input value="<?php echo $b; ?>" type="text" name="t2" id="t2" /></td></tr>
		  <tr>
           <th style="color:#FFF; font-family:'Comic Sans MS', cursive"> 
		  
          To Do list</th><td><textarea cols="30" rows="10" input value="<?php echo $c; ?>" 
          type="text" name="t3" id="t3" /></textarea></td>
          </tr>
          <tr>
           <th style="color:#FFF; font-family:'Comic Sans MS', cursive">
		   Department</th><td><input value="<?php echo $d; ?>" type="text" name="t4" id="t4" /> 
		  </td></tr>
          <tr>
           <th style="color:#FFF; font-family:'Comic Sans MS', cursive"> 
		  
          E-mail</th><td><input value="<?php echo $e; ?>" type="text" name="t5" id="t5" /> 
		</td></tr>
        <tr>
           <th style="color:#FFF; font-family:'Comic Sans MS', cursive"> 
		  
        Contact</th><td><input value="<?php echo $f; ?>" type="text" name="t6" id="t6" />  
	</td></tr> 
		  
		  <p><input type="submit" name="b1" id="b1" value="Save Changes" /> </p>
		</form>
	<?php 
	}
	elseif(isset($_POST["b2"]))
	{
		?>
		<h3>Name : <?php echo $b; ?></h3>
        <p>
        	Enrollment No : <?php echo $a; ?><br />
            To Do List : <?php echo $c; ?><br />
            Department :  <?php echo $d; ?><br />
            
            E-mail :  <?php echo $e; ?><br />

            Contactt :  <?php echo $f; ?><br />
            <a href="admintodolist.php" style="color:#f00; font-size:24px;">Back</a>
        </p>
        <form method="post" action="manageemployee1.php">
        	<input type="hidden" name="h1" value="<?php echo $a; ?>" />
            <input type="submit" value="Delete" name="b2"  />
        </form>
		<?php
	}
}
else
{
	?>
	<h3>Error : No data found, try again</h3>
    <h4><a href="admintodolist.php">Continue...</a></h4>
	<?php
}
?>
<p>&nbsp;</p>
		
	</p>
</div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>