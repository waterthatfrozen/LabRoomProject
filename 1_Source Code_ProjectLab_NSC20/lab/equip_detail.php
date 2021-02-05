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
<?
$id = $_GET[id];
$sql="SELECT * FROM equipment WHERE eq_id = '$_GET[id]'";
$q=mysql_query($sql);
$data=mysql_fetch_assoc($q);
?>
<div class="navbar" align="right"> <a href="home.php">Home</a> <a href="borrow.php">รายชื่ออุปกรณ์และสารเคมีทั้งหมด</a> <a href="mycart.php">ตะกร้าอุปกรณ์ของฉัน</a> <a href="booking_history.php">ประวัติการยืมคืนอุปกรณ์</a> <img src="img/header_white.png" width="452" height="63"  /></div>
<table align="center" border="0" cellpadding="3" cellspacing="3" width="100%" bgcolor="#3333FF" height="80">
<tr>
	<td>&nbsp;</td>
</tr>
</table>
<form name="form_search" id="form_search" method="get">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF" style="padding-top:10px; margin-top:10px;">
<tr height="300" valign="top">
	<td>
	<table align="center" width="100%" border="0" cellpadding="5" cellspacing="5">
	<tr>
		<td align="center" valign="top"><img src="img/borrow.png" height="80" /></td>
	</tr>
	<tr>
		<td>
		  <table align="center" width="100%" border="0" cellpadding="3" cellspacing="3">
		<tr align="right">
			<td valign="top" align="left"><a href="borrow.php" class="hover_unterline">กลับไปหน้าที่แล้ว</a></td>
			<td align="right"><a href="booking_history.php" class="hover_unterline">ประวัติการยืม/ คืน</a></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td><table align="center" width="90%" border="0" cellpadding="3" cellspacing="3" bgcolor="#FFFFCC" class="rcorners">
		  <tr valign="top">
				<td width="41%" rowspan="8" valign="top" align="center"><img src="<?=$data[eq_path]?>" width="300" height="300" class="rcorners2"/></td>
				<td width="18%" align="right" bgcolor="#FFFFFF" style="padding-right:10px;">รหัสอุปกรณ์ :</td>
				<td width="40%" bgcolor="#FFFFFF"><?=$data[eq_code]?></td>
			</tr>
			<tr valign="top">
				<td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">ชื่ออุปกรณ์ :</td>
				<td bgcolor="#FFFFFF"><?=$data[eq_name]?></td>
			</tr>
			<tr valign="top">
			  <td align="right" valign="top" bgcolor="#FFFFFF" style="padding-right:10px;">จำนวนที่ยืมได้ :</td>
			  <td valign="top" bgcolor="#FFFFFF" height="33"><?=$data[eq_total]?></td>
			  </tr>
			<tr valign="top">
			  <td align="right" valign="top" bgcolor="#FFFFFF" style="padding-right:10px;">จำนวนทั้งหมดที่มี :</td>
			  <td valign="top" bgcolor="#FFFFFF" height="33"><?=$data[eq_amount]?></td>
			  </tr>
			<tr valign="top">
			  <td align="right" valign="top" bgcolor="#FFFFFF" style="padding-right:10px;">ประเภท :</td>
			  <td valign="top" bgcolor="#FFFFFF" height="33"><?
              	if($data[eq_type]=="bio"){
					echo อุปกรณ์สาขาชีววิทยา;	
				}else if($data[eq_type]=="chm"){
					echo อุปกรณ์สาขาเคมี;	
				}else if($data[eq_type]=="phy"){
					echo อุปกรณ์สาขาฟิสิกส์;	
				}else if($data[eq_type]=="che"){
					echo สารเคมี;	
				}
			  ?></td>
			  </tr>
			<tr valign="top">
			  <td align="right" valign="top" bgcolor="#FFFFFF" style="padding-right:10px;">มีความอันตราย :</td>
			  <td valign="top" bgcolor="#FFFFFF" height="33"><?=$data[eq_danger] ?></td>
			  </tr>
			<tr valign="top">
				<td align="right" valign="top" bgcolor="#FFFFFF" style="padding-right:10px;">รายละเอียด :</td>
				<td valign="top" bgcolor="#FFFFFF" height="34"><?=$data[eq_detail]?></td>
			</tr>
			</table>
			<table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" >
			</table>
			

		</td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  </tr>
	</table>	</td>
</tr>
<tr>
  <td bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
</tr>
</table>
</form>
</body>
</html>
