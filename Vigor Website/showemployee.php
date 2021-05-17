<html>
<head>
<title>Globalshala</title><link rel="stylesheet" type="text/css" href="profile.css">

</head>

<body>
<h1>Employees</h1>

<div class="zigzag"></div>
<?php 
$cn=mysqli_connect("localhost","root","","globalshala");
if(!$cn)
{
	echo "Unable to connect";
	die();
}
$sql="select * from employeedata";

//Fetch data
$result=mysqli_query($cn,$sql);

//Check number of rows
$n=mysqli_num_rows($result);

if($n>0)
{
	//show data
	while($rw=mysqli_fetch_array($result))
	{
		$a=$rw["enrollmentno"];
		$b=$rw["name"];
		$c=$rw["department"];
		$d=$rw["email"];
		$e=$rw["todolist"];
		
		?>
        <p>
        	Enrollment No : <?php echo $a; ?> <br/>
            Name : <?php echo $b; ?> <br/>
            Department : <?php echo $c; ?> <br/>
            E-mail : <?php echo $d; ?> <br/>
            To do List : <?php echo $e; ?> <br/>
            
            <table>
            	<tr>
                	<td>
                    	<form method="post" action="managestudent.php">
                            <input type="hidden" name="h1" value="<?php echo $a; ?>" />
                            <input type="submit" value="Edit" name="b1"  />
                        </form>
                    </td>
                    <td>
                        <form method="post" action="managestudent.php">
                            <input type="hidden" name="h1" value="<?php echo $a; ?>" />
                            <input type="submit" value="Delete" name="b2"  />
                        </form>
                    </td>
                </tr>
            </table>
            
            
        </p>
        <hr  />
		<?php
	}
}
else
{
	?>
	<h2>No data found</h2>
	<?php
}
?>
</body>
</html>