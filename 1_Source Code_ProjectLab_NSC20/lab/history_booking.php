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
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/header.css">

<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?
$choice = $_GET[c];
//$a = $_GET[a];
?>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<!--------------------------------------------------------------POPUP---------------------------------------------------------->
<?
echo $id = $_GET[id];
?>

<div class="w3-container" >
  <div id="111" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
      <div class="w3-center" ><br>
        <span onClick="document.getElementById('111').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div><br><br>
	 
<?
//$sql = "SELECT * FROM equipment WHERE ";
?>
<table align="center" border="0" width="95%" cellpadding="1" cellspacing="1" class="rcorners" bgcolor="#FFCC66">
<tr>
<td width="35%" rowspan="2" align="center" valign="top"><img src="img/assistant.png" width="250" height="200"><p>
(รูปภาพประกอบ)</td>
</tr>
<tr>
<td align="left" valign="top" style="padding-left:5px;">
<table width="100%" border="0" cellpadding="3" cellspacing="3" class="fontTH">
  <tr>
	<td width="5%"></td>
	<td width="20%">รหัสอุปกรณ์</td>
	<td width="40%">12345</td>
  </tr>
  <tr>
	<td width="5%"></td>
	<td>ชื่ออุปกรณ์</td>
	<td>หหหหหหหหหหหหห</td>
  </tr>
  <tr>
	<td width="5%"></td>
	<td>จำนวนทั้งหมด</td>
	<td>30 ชิ้น </td>
  </tr>
  <tr>
	<td width="5%"></td>
	<td>จำนวนคงเหือ</td>
	<td>22 ชิ้น </td>
  </tr>
  <tr>
	<td width="5%"></td>
	<td>สถานที่จัดเก็บ</td>
	<td>ตู้ที่ 02 ชั้น 4 </td>
  </tr>
  <tr>
	<td width="5%"></td>
	<td>ข้อควรระวัง</td>
	<td>-</td>
  </tr>
  <tr valign="top">
	<td width="5%"></td>
	<td>วิธีใช้งาน</td>
	<td>ssssssss sssssssss<br>ssss ssssssss </td>
  </tr>
</table></td>
</tr>
</table>
<br>
    </div>
  </div>
</div>
<!----------------------------------------------------------------------------------------------------------------------------->

<div class="navbar" align="center">
	<a href="home.php">Home</a>
	<a href="#news">News</a>
	<a href="#contact">Contact</a>
	<a href="#contact">Contact</a>
	<a href="#contact">Contact</a>
	<a href="logout.php">Logout</a>
</div>
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
		window.location = "history_booking.php";
	</script>
	<?
}
?>
<table align="center" border="1" cellpadding="1" cellspacing="1" width="80%">
<tr>
	<td height="200" bgcolor="#0099CC" valign="top">
1111
	</td>
</tr>
<tr height="300" valign="top">
	<td>
	<form name="confirm_booking" id="confirm_booking" action="confirm_booking.php" method="post">
	<table align="center" width="100%" border="1">
	<tr>
		<td valign="top">ระบบยืม/คืน วัสดุอุปกรณ์และสารเคมี</td>
	</tr>
	<tr>
		<td height="24" valign="top">PATH:<a href="borrow.php">รายชื่อวัสดุ อุปกรณ์และสารเคมี</a> || ประวัติการยืม/คืน</td>
	</tr>	
	<tr>
		<td valign="top"><br>
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
		<table align="center" border="1" cellpadding="3" cellspacing="3" width="90%">
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
			<a href="equip_detail.php?id=<?=$data2[eq_id]?>"><?=$data2[eq_name]?>(<?=$data[b_amount]?>)</a> 
			<? }?>			</td>
			<td><?=$all[b_date]?></td>
			<td><?=$all[send_date]?></td>
			<?
			if($all[b_status]==0){
				$status = "รอรับของ";
			}elseif($all[status]=="1"){
				$status = "กำลังยืม";
			}else{
				$status = "ส่งคืนแล้ว";
			}
			?>
			<td><?=$status?></td>
			<td><? if($all[b_status]=="2"){?><img src="img/cancel2.png" height="25" width="25" /><? }else{?><a href="history_booking.php?act=delete&b_code=<?=$all[b_code]?>" onClick="return confirm('ยืนยันการลบ!')"><img src="img/cancel.png" height="25" width="25"><? }?></a></td>
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
		<table align="center" border="1" cellpadding="3" cellspacing="3" width="90%">
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
		<? }?>

		<br />

		</td>
	</tr>
	</table>
	</form>
	</td>
</tr>
<tr>
	<td height="150">Footer</td>
</tr>
</table>
</body>
</html>
