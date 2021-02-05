<?
session_start();
if(!isset($_SESSION['login_user'])){
?>
	<script>alert("กรุณาเข้าสู๋ระบบ");
	window.location="index.php"</script>
<?
}
include("conn_db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?
$amount = $_GET[a];
$cart_id = $_GET[cart_id];

$sql = "SELECT * FROM incart WHERE cart_id = '$cart_id' \n";
$query = mysql_query($sql);
$cart = mysql_fetch_assoc($query);

$sql = "SELECT * FROM equipment WHERE eq_id = '$cart[eq_id]' \n";
$query = mysql_query($sql);
$eq = mysql_fetch_assoc($query);

if(($eq[eq_total]>=$amount)&&($amount>0)){

	$total = $eq[eq_total]-$amount;
	
	$sql2 = "UPDATE incart SET \n";
	$sql2 .= "cart_amount = '$amount' \n";
	$sql2 .= "WHERE cart_id = '$cart_id' \n";
	$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
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
