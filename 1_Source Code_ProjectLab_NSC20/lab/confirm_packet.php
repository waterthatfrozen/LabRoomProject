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

$lab_id = $_GET[lab_category];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$sql = "SELECT * FROM packet_lab WHERE lab_id = '$lab_id' \n";
$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
while($lab = mysql_fetch_assoc($query)){
	
	$sql1 = "SELECT * FROM equipment WHERE eq_id = '$lab[eq_id]' \n";
	$query1 = mysql_query($sql1);
	$eq = mysql_fetch_assoc($query1);
	//echo $eq[eq_total];
	//echo $lab[pack_amount];
		
	$total = $eq[eq_total]-$lab[pack_amount];
	
	$sql2 = "UPDATE equipment SET \n";
	$sql2 .= "eq_total = '$total' \n";
	$sql2 .= "WHERE eq_id = '$lab[eq_id]'\n";
	$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
		
	$sql3 = "INSERT INTO incart SET \n";
	$sql3 .= "std_id = '$u[std_id]' ,\n";
	$sql3 .= "eq_id = '$lab[eq_id]' ,\n";
	$sql3 .= "cart_amount = '$lab[pack_amount]' \n";
	$query3 = mysql_query($sql3)or die("<pre>$sql</pre>").mysql_error();

}

?>
<script>
	window.location = "mycart.php";
</script>
</body>
</html>
