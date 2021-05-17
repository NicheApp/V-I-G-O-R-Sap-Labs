<?php 
if(!isset($_POST["b1"]))
{
	header("Location:adminquery.php");
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
	 
	$a=$_POST["t10"];
	$b=$_POST["t1"];
	
	
	$sql="update querydata set answer='$a' where enrollmentno='$b'";
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
      	<h2>Query answered successfully</h2>
        <h3><a href="adminquery.php">Continue...</a></h3>
      </div>

		
		<?php
	}
}
?>
</body>
</html>