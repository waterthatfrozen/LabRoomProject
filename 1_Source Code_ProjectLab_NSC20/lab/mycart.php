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
<title>Science Laboratory Assitant and Management System</title>
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/line.css">
<link rel="stylesheet" href="css/table.css">

<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?
$choice = $_GET[c];
//$a = $_GET[a];
?>

<style type="text/css">
<!--
body {
	background-color: #FF9933;
	background-image: url(img/background.jpg);
}
.style1 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style></head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<!--------------------------------------------------------------POPUP---------------------------------------------------------->
<?
$id = $_GET[id];
?>

<!----------------------------------------------------------------------------------------------------------------------------->
<div class="navbar" align="right"> <a href="home.php">Home</a> <a href="borrow.php">รายชื่ออุปกรณ์และสารเคมีทั้งหมด</a> <a href="mycart.php">ตะกร้าอุปกรณ์ของฉัน</a> <a href="booking_history.php">ประวัติการยืมคืนอุปกรณ์</a> <img src="img/header_white.png" width="452" height="63"  /></div>
<table align="center" border="0" cellpadding="3" cellspacing="3" width="100%" bgcolor="#3333FF" height="80">
<tr>
	<td>&nbsp;</td>
</tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF" style="padding-top:10px; margin-top:10px;">
<tr height="300" valign="top">
	<td>
	<form name="confirm_booking" id="confirm_booking" action="confirm_booking.php" method="post">
	<table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" valign="top"><img src="img/borrow.png" height="80" /></td>
	</tr>
	<tr>
		<td>
		<table align="center" border="0" cellpadding="2" cellspacing="0" width="90%">
		<tr align="right"><br />
			<td align="center">.: <a href="borrow.php" class="hover_unterline">รายชื่อวัสดุ อุปกรณ์และสารเคมี</a> | | <span style="color:#FF3300">ตะกร้าของฉัน</span><img src="img/mycart_2.png" height="25" /></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%" style="padding-top:10px;">
		  <tr>
		    <td align="center">ระบุวันที่ส่งคืน:&nbsp;		      <input type="date" name="send_date" id="send_date" required></td>
		    </tr>
		  <tr>
		    <td align="right">&nbsp;</td>
		    </tr>
		  </table>
		<table align="center" border="0" cellpadding="2" cellspacing="1" width="90%" class="form_table">
		<tr>
			<th rowspan="2" width="7%">ลำดับที่</th>
			<th rowspan="2" width="15%">รหัส</th>
			<th rowspan="2" width="40%">รายการสิ่งของในตะกร้า</th>
			<th rowspan="2" width="15%">จำนวน</th>
			<th colspan="2" width="14%">Action</th>
		</tr>
		<tr>
			<th width="7%">แก้ไข</th>
			<th width="7%">ลบ</th>
		</tr>
		<?
		if($_GET[act]=="delete"){
			$sql = "SELECT * FROM incart WHERE cart_id = '$_GET[id]'\n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			$cart = mysql_fetch_assoc($query);
			
			$sql = "SELECT * FROM equipment WHERE eq_id = '$cart[eq_id]'\n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			$eq = mysql_fetch_assoc($query);
			
			$total = $cart[cart_amount]+$eq[eq_total];
			
			$sql = "UPDATE equipment SET \n";
			$sql .= "eq_total = '$total' \n";
			$sql .= "WHERE eq_id = '$cart[eq_id]'\n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			
			$sql = "DELETE FROM incart WHERE cart_id = '$_GET[id]'\n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();	
			
			
		}
		
		$sql = "SELECT * FROM incart WHERE std_id = '$u[std_id]'\n";
		$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
		$row = mysql_num_rows($query);
		$i=1;
		while($mycart = mysql_fetch_assoc($query)){
			$sql2 = "SELECT * FROM equipment WHERE eq_id = '$mycart[eq_id]'\n";
			$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
			$eq = mysql_fetch_assoc($query2);
		?>
		<tr align="center">
			<td><?=$i?></td>
			<td><?=$eq[eq_code]?></td>
			<td align="left" style="padding-left:10px;"><a href="equip_detail.php?id=<?=$eq[eq_id]?>"><?=$eq[eq_name]?></td>
			<td><?=$mycart[cart_amount]?></td>
			<td><a href="#" onClick="myFunction2(<?=$mycart[cart_id]?>)"><img src="img/edit.png" width="25" height="25"></a></td>
			<td><a href="mycart.php?act=delete&id=<?=$mycart[cart_id]?>" onClick="return confirm('ยืนยันการลบ!')"><img src="img/delete.png" width="25" height="25"></a></td>
		</tr>
		<? 
			$i++;
		}
		?>
		<?
		if($row == 0){
		?>
		<tr align="center">
			<td colspan="6">-ไม่มีข้อมูล-</td>
		</tr>
		<? }?>
		</table>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%" style="padding-top:10px;">
		<tr>
			<td align="right"><button class="mdl-button mdl-js-button  mdl-button--raised mdl-js-ripple-effect mdl-button--accent">ยืนยันการขอยืมอุปกรณ์</button></td>
		</tr>
		</table>
		</td>
	</tr>
	</table>	
	</form>
	</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" align="center" style="font-weight:600; font-size:18px; color:white;">&nbsp;</td>
</tr>
<tr>
  <td bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
</tr>
</table>
<br />
</body>
</html>
