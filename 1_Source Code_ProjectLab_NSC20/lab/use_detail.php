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

if($_GET['act']=="cancel"){
	$sql2="DELETE FROM use_room WHERE use_id = '$_GET[use_id]'";
	$q2=mysql_query($sql2);
	?>
    <script>
	alert('ยกเลิกการจองเสร็จสมบูรณ์');
	</script>
    <?
}
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
<table align="center" border="1" cellpadding="1" cellspacing="1" width="80%">
<tr>
	<td height="200" bgcolor="#0099CC" valign="top">
1111
	</td>
</tr>
<tr valign="top">
	<td>ประวัติการจองห้องปฏิบัติการ</td>
</tr>
<tr>
  <td height="24" valign="top">PATH:<a href="book.php">การจองห้องปฏิบัติการ</a> / <a href="history_book.php">ประวัติการจองห้องปฏิบัติการ</a> / รายละเอียดการจองห้อง</td>
</tr>
<tr align="center">
  <td><table align="center" border="1" cellpadding="3" cellspacing="3" width="90%">
    <tr>
      <th width="23%">หมายเลขห้อง</th>
      <th width="23%">วันขอใช้งาน</th>
      <th width="13%">เวลาการใช้งาน</th>
      <th width="17%">ยกเลิก</th>
    </tr>
    <? $sql3="SELECT * FROM use_room WHERE std_id = '$_SESSION[login_user]' AND use_id = '$_GET[id]'";
		$q3=mysql_query($sql3);
	$data=mysql_fetch_assoc($q3);
	?>
    <tr align="center">
      <td align="left" style="padding-left:10px;"><?=$data[lab_code]?> | <? $sql4="SELECT * FROM labroom WHERE lab_code = '$data[lab_code]'"; $q4=mysql_query($sql4); $room=mysql_fetch_assoc($q4); echo $room[lab_name];?></td>
      <td><?=$data[use_date]?></td>
      <td><?=$data[start_time]?> - <?=$data[end_time]?></td>
      
      <td><? if($data[use_status]=="yes"){?>
        <img src="img/cancel2.png" height="25" width="25" />
        <? }else{?>
        <a href="history_book.php?act=cancel&use_id=<?=$data[use_id]?>" onClick="return confirm('ยืนยันการลบ!')"><img src="img/cancel.png" height="25" width="25" />
          <? }?>
        </a></td>
    </tr>
    <tr align="center">
      <td colspan="4">รายละเอียด : <?=$data[use_detail]?></td>
      </tr>
  </table></td>
</tr>
<tr>
	<td height="150">Footer</td>
</tr>
</table>
</body>
</html>