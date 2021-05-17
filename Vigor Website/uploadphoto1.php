<?php
 session_start();
 if(!isset($_SESSION["usertype"]))
 {
	 header("Location:Autherror.php");
	 die();
 }
 $ut=$_SESSION["usertype"];
 $e1=$_SESSION["enrollmentno"];
 if($ut!="admin")
 {
	 header("Location:Autherror.php");
	 die();
 }
?>
<html>
<head>
<title>Globalshala</title></head>

<body>
<h1>Profile photo</h1>
<?php
	if(count($_FILES))
	{
		if($_FILES["F1"]["size"])
		{
			$trg=dirname(__FILE__)."/".basename($_FILES["F1"]["name"]);
			if(move_uploaded_file($_FILES["F1"]["tmp_name"],$trg))
			{
				require_once("mylib.php");
				$addr=basename($_FILES["F1"]["name"]);
				$sql="insert into photodata values('$e1','$addr')";
				$n=mysqli_query($cn,$sql);
				if($n>0)
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
        <h1>Photo uploaded successfully</h1> 
      </div>
                    <?php
				}
				else
				{
					?>
                    <h3>Error:unable to connect database.</h3>
                    <?php
				}
			}
			else
			{
				?>
                <h3>Unable to upload</h3>
                <?php
			}
		}
		else
		{
			?>
            <h3>Zero byte uploaded</h3>
            <?php
		}
	}
	else
	{
		?>
        <h3>No file uploaded</h3>
        <?php
	}
	?>
    <h3><a href="adminhome.php">Continue..</a></h3>
    
</body>
</html>