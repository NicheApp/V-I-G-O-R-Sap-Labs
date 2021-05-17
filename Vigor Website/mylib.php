<?php
$cn=mysqli_connect("localhost","root","","sap");
if(!$cn)
{
	echo "unable to conect";
	die();
}
function check_photo($enrollmentno)
{
	global $cn;
	$sql="Select * from photodata where enrollmentno='$enrollmentno'";
	$result=mysqli_query($cn,$sql);
	$n=mysqli_num_rows($result);
	$photo="no";
	if($n>0)
	{
		$rw=mysqli_fetch_array($result);
		$photo=$rw["photo"];
	}
	return $photo;
}

function getfee($rno)
{
	global $cn;
	$sql="select * from studentdata where enrollmentno=$rno";
	$result=mysqli_query($cn,$sql);
	$n=mysqli_num_rows($result);
	$fee=0;
	if($n>0)
	{
		$rw=mysqli_fetch_array($result);
		$fee=$rw["totalfee"];
	}
	return $fee;
}
function get_deposited_fee($rno)
{
	global $cn;
	$sql="select * from feesubmit where enrollmentno=$rno";
	$result=mysqli_query($cn,$sql);
	$n=mysqli_num_rows($result);
	$fee=0;
	if($n>0)
	{
		while($rw=mysqli_fetch_array($result))
		{
			$fee=$fee+$rw["instalment"];
		}
	}
	return $fee;
}

function countmystudents()
{
	global $cn;
	$sql="select * from logindata where usertype='student'";
	$result=mysqli_query($cn,$sql);
	$n=mysqli_num_rows($result);
	return $n;
}
function countmyemployee()
{
	global $cn;
	$sql="select * from logindata where usertype='employee'";
	$result=mysqli_query($cn,$sql);
	$n=mysqli_num_rows($result);
	return $n;
}
function seat($enrollmentno)
{
	global $cn;
	$sql="Select * from seat where enrollmentno='$enrollmentno'";
	$result=mysqli_query($cn,$sql);
	$n=mysqli_num_rows($result);
	$seatno="no";
	if($n>0)
	{
		$rw=mysqli_fetch_array($result);
		$seatno=$rw["seatno"];
	}
	return $seatno;
}
function countseat()
{
	global $cn;
	$sql="select * from seat";
	$result=mysqli_query($cn,$sql);
	$n=mysqli_num_rows($result);
	return $n;
}

?>