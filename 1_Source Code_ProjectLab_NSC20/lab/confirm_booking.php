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

<?php
function alphanumeric_rand($num_require=8) {
	$alphanumeric = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',0,1,2,3,4,5,6,7,8,9);
	if($num_require > sizeof($alphanumeric)){
		echo "Error alphanumeric_rand(\$num_require) : \$num_require must less than " . sizeof($alphanumeric) . ", $num_require given";
		return;
	}
	$rand_key = array_rand($alphanumeric , $num_require);
	for($i=0;$i<sizeof($rand_key);$i++) $randomstring .= $alphanumeric[$rand_key[$i]];
	return $randomstring;
}

$b_code = alphanumeric_rand(6); //จำนวนตัวอักษรที่ต้งการ
?>
</head>

<body>
<?
$sql5 = "SELECT * FROM equipment \n";
$query5 = mysql_query($sql5)or die("<pre>$sql</pre>").mysql_error();
$eq = mysql_fetch_assoc($query5);

$sql = "SELECT * FROM incart WHERE std_id = '$u[std_id]' \n";
$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
$i=1;
while($data = mysql_fetch_assoc($query)){
	if($i==1){
		$check = 1;
	}else{
		$check = 0;
	}
	$sql2 = "INSERT INTO booking SET \n";
	$sql2 .="std_id = '$data[std_id]', \n";
	$sql2 .="b_amount = '$data[cart_amount]', \n";
	$sql2 .="b_code = '$b_code', \n";
	$sql2 .="check_dup = '$check', \n";
	$sql2 .="send_date = '$_POST[send_date]', \n";
	$sql2 .="b_date = NOW(), \n";
	$sql2 .="eq_id = '$data[eq_id]' \n";
	$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
	
	$sql3 = "DELETE FROM incart WHERE cart_id = '$data[cart_id]'\n";
	$query3 = mysql_query($sql3)or die("<pre>$sql</pre>").mysql_error();
	
	$i++;
}
?>
<script>
	window.alert("เพิ่มข้อมูลเรียบร้อยแล้ว กรุณามาสิ่งของภายใน 24 ชั่วโมง!!");
	window.location = "borrow.php";
</script>
</body>
</html>
