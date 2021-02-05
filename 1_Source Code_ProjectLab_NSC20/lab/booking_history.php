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
<?
if($_GET[act]=="delete"){
	$sql = "SELECT * FROM booking WHERE b_code = '$_GET[b_code]'\n";
	$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
	while($book = mysql_fetch_assoc($query)){
		$sql2 = "SELECT * FROM equipment WHERE eq_id = '$book[eq_id]'\n";
		$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
		$eq = mysql_fetch_assoc($query2);
		
		$total = $book[b_amount]+$eq[eq_total];
	
		$sql3 = "UPDATE equipment SET \n";
		$sql3 .= "eq_total = '$total' \n";
		$sql3 .= "WHERE eq_id = '$book[eq_id]'\n";
		$query3 = mysql_query($sql3)or die("<pre>$sql</pre>").mysql_error();
	}
	
	$sql = "DELETE FROM booking WHERE b_code = '$_GET[b_code]'\n";
	$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();	
	
	
	?>
	<script>
		window.location = "booking_history.php";
	</script>
	<?
}
?>
<table align="center" border="0" cellpadding="3" cellspacing="3" width="100%" bgcolor="#3333FF" height="80">
<tr>
	<td>&nbsp;</td>
</tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF" style="padding-top:10px; margin-top:10px;">
<tr height="300" valign="top">
	<td>
	<form name="confirm_booking" id="confirm_booking" action="confirm_booking.php" method="post">
	<table align="center" width="100%" border="0" cellpadding="3" cellspacing="3">
	<tr>
		<td align="center" valign="top"><img src="img/borrow.png" height="80" /></td>
	</tr>
	<tr>
		<td valign="top">
		<table align="center" border="0" cellpadding="2" cellspacing="0" width="90%">
		<tr align="right"><br />
			<td width="60%" align="left">.: <a href="borrow.php" class="hover_unterline">รายชื่อวัสดุ อุปกรณ์และสารเคมี</a> | | <span style="color:#FF3300"><a href="booking_history.php" class="w3-text-red hover_unterline">ประวัติการยืม/คืน</a></span></td>
			<td align="right" width="13%"><a href="mycart.php" class="hover_unterline"><img src="img/mycart.png" height="40"/></a></td>
		</tr>
		<tr align="right">
		  <td align="left">&nbsp;</td>
		  <td align="right">&nbsp;</td>
		  </tr>
		</table>
		<?
		$i = 1;
		$sql = "SELECT * FROM booking WHERE std_id = '$u[std_id]' AND check_dup = '1' ORDER BY b_id DESC\n";	
		$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
		$row = mysql_num_rows($query);
		while($all = mysql_fetch_assoc($query)){
			$tmp_code = $all[b_code]; //code 1
			
			$sql2 = "SELECT * FROM booking WHERE std_id = '$u[std_id]' AND b_code = '$tmp_code' \n";	
			$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
			while($data = mysql_fetch_assoc($query2)){

			}
		?>
		<table align="center" border="0" cellpadding="3" cellspacing="1" width="90%" <? if($all[b_status]==2){?>class="form_table2"<? }elseif($all[b_status]==1){?>class="form_table3"<? }else{?> class="form_table"<? }?>>
		<tr>
			<th width="7%">รายการที่</th>
			<th width="10%">รหัสอ้างอิง</th>
			<th width="30%">รายการสิ่งของที่ขอยืม (จำนวน)</th>
			<th width="11%">วันที่ขอยืม</th>
			<th width="11%">วันที่ส่งคืน</th>
			<th width="10%">สถานะ</th>
			<th width="8%">ยกเลิก</th>
		</tr>
		<tr align="center">
			<td><?=$i?></td>
			<td><?=$tmp_code?></td>
			<td align="left" style="padding-left:10px;">
			<?
			$sql2 = "SELECT * FROM booking WHERE std_id = '$u[std_id]' AND b_code = '$tmp_code' \n";	
			$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
			while($data = mysql_fetch_assoc($query2)){
			
			$sql3 = "SELECT * FROM equipment WHERE eq_id = '$data[eq_id]' \n";	
			$query3 = mysql_query($sql3)or die("<pre>$sql</pre>").mysql_error();
			$data2 = mysql_fetch_assoc($query3)
			?>
			<a href="equip_detail.php?id=<?=$data2[eq_id]?>" class="hover_unterline"><?=$data2[eq_name]?> (<?=$data[b_amount]?>)</a> 
			<? }?>
			</td>
			<td><?=$all[b_date]?></td>
			<td><?=$all[send_date]?></td>
			<?
			if($all[b_status]==0){
				$status = "รอรับของ";
			}elseif($all[b_status]=="1"){
				$status = "กำลังยืม";
			}else{
				$status = "ส่งคืนแล้ว";
			}
			?>
			<td><?=$status?></td>
			<td><? if($all[b_status]!="0"){?><img src="img/cancel2.png" height="25" width="25" /><? }else{?><a href="booking_history.php?act=delete&b_code=<?=$all[b_code]?>" onClick="return confirm('ยืนยันการลบ!')"><img src="img/cancel.png" height="25" width="25"><? }?></a></td>
		</tr>
		</table>
		<br />
		<?
		$i++;
		}
		?>
		
		<?
		if($row==0){
		?>
		<table align="center" border="0" cellpadding="3" cellspacing="1" width="90%" class="form_table">
		<tr>
			<th width="7%">รายการที่</th>
			<th width="10%">รหัสอ้างอิง</th>
			<th width="30%">รายการสิ่งของที่ขอยืม (จำนวน)</th>
			<th width="10%">วันที่ขอยืม</th>
			<th width="10%">วันที่ส่งคืน</th>
			<th width="10%">สถานะ</th>
			<th width="10%">ยกเลิก</th>
		</tr>
		<tr align="center">
		  <td colspan="7">-ยังไม่มีข้อมูล-</td>
		</tr>
		</table>
		<? }?></td>
	</tr>
	</table>	
	</form>
	</td>
</tr>
<tr>
  <td bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
</tr>
</table>
</body>
</html>
