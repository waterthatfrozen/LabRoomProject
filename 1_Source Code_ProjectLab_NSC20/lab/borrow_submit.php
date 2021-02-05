<?
session_start();
if(!isset($_SESSION['login_user'])){
?>
	<script>alert("กรุณาเข้าสู๋ระบบ");
	window.location="index.php"</script>
<?
}
include("conn_db.php");
$login_user = $_SESSION[login_user];

$sql = "SELECT * FROM student WHERE std_id = '$login_user' \n";
$q = mysql_query($sql);
$u = mysql_fetch_assoc($q);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?
$amount = $_GET[a];
$eq_id = $_GET[eq_id];

$sql = "SELECT * FROM equipment WHERE eq_id = '$eq_id' \n";
$query = mysql_query($sql);
$data = mysql_fetch_assoc($query);
if(($data[eq_total]>=$amount)&&($amount>0)){

	$total = $data[eq_total]-$amount;
	
	$sql = "UPDATE equipment SET \n";
	$sql .= "eq_total = '$total' \n";
	$sql .= "WHERE eq_id = '$data[eq_id]'\n";
	$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
	
	
	$sql2 = "SELECT * FROM incart WHERE eq_id = '$data[eq_id]' AND std_id = '$u[std_id]' \n";
	$query2 = mysql_query($sql2);
	$up = mysql_fetch_assoc($query2);
	$row = mysql_num_rows($query2);
	$amount_new = $up[cart_amount] + $amount;
	if($row > 0){
		$sql = "UPDATE incart SET \n";
		$sql .= "cart_amount = '$amount_new' \n";
		$sql .= "WHERE eq_id = '$up[eq_id]'\n";
		$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
	}else{
		$sql = "INSERT INTO incart SET \n";
		$sql .= "std_id = '$u[std_id]' ,\n";
		$sql .= "eq_id = '$eq_id' ,\n";
		$sql .= "cart_amount = '$amount' \n";
		$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
	}
	?>
	<script>
			window.location = "mycart.php";
	</script>
<?
}else{
?>
	<script>
		alert("ระบุจำนวนไม่ถูกต้อง!!");
		history.back();
	</script>
<?
}
?>
</head>

<body>

</body>
</html>
