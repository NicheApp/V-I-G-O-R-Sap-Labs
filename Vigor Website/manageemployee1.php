<?php 
if(!isset($_POST["b1"]) && !isset($_POST["b2"]))
{
	header("Location:admintodolist.php");
	die();
}
?>
<html>
<head>
<title>Globalshala</title></head>

<body>

<h1>Manage Employee</h1>
<?php 

$cn=mysqli_connect("localhost","root","","sap");
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
	$d=$_POST["t4"];
	$e=$_POST["t5"];
	$f=$_POST["t6"];
	$g=$_POST["t7"];
	$h=$_POST["t8"];
	
	
	
	
	$sql="update employeedata set wfh='$e',designation='$f',resource='$g',mental='$h' where enrollmentno='$a'";
	$n=mysqli_query($cn,$sql);
	if($n==1)
	{
		?>
                   <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #0f0f0f;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
        background-color: green;
      }
    </style>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
      	<h2>Changes are saved successfully</h2>
        <h3><a href="admintodolist.php">Continue...</a></h3>
      </div>

		
		<?php
	}
}
elseif(isset($_POST["b2"]))
{
	$a=$_POST["h1"];
	
	
	
	
	$cn=mysqli_connect("localhost","root","","sap");

	if(!$cn)
	{
		echo "unable to conenct";
		die();
	
	}
	$q1="delete from employeedata where enrollmentno='$a'";
	$q2="delete from logindata where enrollmentno='$a'";
	$n1=mysqli_query($cn,$q1);
	$n2=mysqli_query($cn,$q2);
	if($n1==1 && $n2==1)
	{
		?>
                <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #0f0f0f;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: red;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
        background-color: red;
      }
    </style>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✘</i>
      </div>
        <h2>Deleted successfully</h2>
        <h3><a href="admintodolist.php">Continue...</a></h3>
      </div>

		
		<?php
	}
}
?>
</body>
</html>