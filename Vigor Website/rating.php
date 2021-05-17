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
    <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="aboutus.php"> About us</a>
          </li>
    <li><i class="fa fa-address-book fa-fw"></i><a href="todolist.php"> To Do list</a>
          </li>
	<li><i class="fa fa-support fa-fw"></i><a href="submissions.php"> Submissions</a>
          </li>

    <li><i class="fa fa-envelope fa-fw"></i><a href="query.php"> Query/Answer</a>
      
      
    </li>
    <li><i class="fa fa-connectdevelop fa-fw"></i><a href="rating.php">Feedback</a>
      
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
            <h2>Welcome to Your Feedback</h2>
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
            <h2>Ratings </h2>
<?php 
$cn=mysqli_connect("localhost","root","","globalshala");
if(!$cn)
{
	echo "Unable to connect";
	die();
}
$sql="select * from rating where enrollmentno='$e1'";
//Fetch data
$result=mysqli_query($cn,$sql);

//Check number of rows
$n=mysqli_num_rows($result);
if($n>0)
{
	echo "You have already Submitted";
}
else
{
	?>	
			
  			<form id="form1" name="form1" method="post" action="rating1.php">
  <table style="border-collapse: separate;
    border-spacing: 0 1em;">
  <tr>
  <th style="color:#FFF; font-family:'MS Serif', 'New York', serif;">Enrollment No</th>
    <td><label for="t1"></label>
    <input readonly value="<?php echo $e1; ?>" type="text" name="t1" required/></td>
    </tr>

<tr>
  <th style="color:#FFF; font-family:'MS Serif', 'New York', serif;">Ambience</th>

  <td style="color:#FF0;">
   <input type="radio" name="t2" id="t2" value="1"  /><span class="fa fa-star"></span><br/>
<input type="radio" name="t2" id="t2"  value="2"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t2" id="t2" value="3" /><span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t2" id="t2"  value="4"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>


<br/>
<input type="radio" name="t2" id="t2"  value="5"/>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span><br/>
    
    
   </td></tr>
  </tr>





    <tr>
  <th style="color:#FFF; font-family:'MS Serif', 'New York', serif;">Work environment</th>

  <td style="color:#FF0;">
   <input type="radio" name="t3" id="t3" value="1"  /><span class="fa fa-star"></span><br/>
<input type="radio" name="t3" id="t3"  value="2"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t3" id="t3" value="3" /><span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t3" id="t3"  value="4"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>


<br/>
<input type="radio" name="t3" id="t3"  value="5"/>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span><br/>
    
    
   </td></tr>
  </tr>


  

      <tr>
  <th style="color:#FFF; font-family:'MS Serif', 'New York', serif;">Food Court</th>

  <td style="color:#FF0;">
   <input type="radio" name="t4" id="t4" value="1"  /><span class="fa fa-star"></span><br/>
<input type="radio" name="t4" id="t4"  value="2"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t4" id="t4" value="3" /><span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t4" id="t4"  value="4"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>


<br/>
<input type="radio" name="t4" id="t4"  value="5"/>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span><br/>
    
    
   </td></tr>
  </tr>


      <tr>
  <th style="color:#FFF; font-family:'MS Serif', 'New York', serif;">Resources quality</th>

  <td style="color:#FF0;">
   <input type="radio" name="t5" id="t5" value="1"  /><span class="fa fa-star"></span><br/>
<input type="radio" name="t5" id="t5"  value="2"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t5" id="t5" value="3" /><span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t5" id="t5"  value="4"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>


<br/>
<input type="radio" name="t5" id="t5"  value="5"/>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span><br/>
    
    
   </td></tr>
  </tr>

<tr>
  <th style="color:#FFF; font-family:'MS Serif', 'New York', serif;">Facilities</th>

  <td style="color:#FF0;">
   <input type="radio" name="t6" id="t6" value="1"  /><span class="fa fa-star"></span><br/>
<input type="radio" name="t6" id="t6"  value="2"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t6" id="t6" value="3" /><span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<br/>
<input type="radio" name="t6" id="t6"  value="4"/><span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>


<br/>
<input type="radio" name="t6 id="t6"  value="5"/>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span><br/>
    
    
   </td></tr>
  </tr>

  
  
  <tr>
  <td>
    <input type="submit" name="b1" id="b1" value="Submit" />
  </td></tr>
</form>
</table>
<?php
}
?>
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
          
  	
	</p>
</div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>