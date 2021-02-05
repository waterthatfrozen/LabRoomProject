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

if($_POST[submit]){
	$sql2="INSERT INTO use_room SET lab_code = '$_POST[lab_code]' , std_id = '$_SESSION[login_user]' ,\n";
	$sql2.="use_date = '$_POST[use_date]' , start_time = '$_POST[start_time]' , end_time = '$_POST[end_time]', \n";
	$sql2.="use_detail = '$_POST[use_detail]'";
	$q2=mysql_query($sql2)or die("<pre>$sql2</pre>").mysql_error();
	?>
    <script>
	alert('จองให้เสร็จแล้วครับ');
	window.location="history_book.php";
	</script>
    <?
}
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
<style type="text/css">
body {
	background-image: url(img/background.jpg);
}
.room{
	border-radius:20px; padding:0.25rem; padding-left:0.75rem; 
	border:1px solid black;	
}
</style>
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
<div class="navbar" align="right"> <a href="home.php">Home</a> <a href="book.php">การจองห้องปฏิบัติการ</a> <a href="history_book.php">ประวัติการจองห้องปฏิบัติการ</a><a href="#">การจองห้องปฏิบัติการในปัจจุบัน</a><img src="img/header_white.png" width="452" height="63"  /></div>
<table align="center" border="0" cellpadding="3" cellspacing="3" width="100%" bgcolor="#990000" height="80">
<tr>
	<td>&nbsp;</td>
</tr>
</table>
<br />
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF">
<tr valign="top">
  <td align="center" bgcolor="#990000">&nbsp;</td>
</tr>
<tr valign="top">
	<td align="center"><img src="img/reservation.png" width="410" height="85" /></td>
</tr>
<tr align="center">
  <td><form id="form1" name="form1" method="post" action="">
    <table width="600" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td colspan="2" align="right" bgcolor="#990033" style="border-radius:20px;"><a href="history_book.php" class="hover_unterline w3-text-white">ประวัติการจอง</a>&nbsp;&nbsp;</td>
        </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">ชื่อห้องปฏิบัติการ
          <? $sql="SELECT * FROM labroom ORDER BY lab_code";
	  	 $q=mysql_query($sql);	  
	  ?>
          &nbsp;
          <select name="lab_code" id="lab_code" class="room" style="width:400px;" required>
            <option value="">เลือกหมายเลขห้องปฏิบัติการ</option>
            <? while($lab=mysql_fetch_assoc($q)){?>
            <option value="<?=$lab[lab_code]?>">
              <?=$lab[lab_code]?>&nbsp;|&nbsp;
              <?=$lab[lab_name]?>
              </option>
            <? } ?>
            </select></td>
      </tr>
      <tr>
        <td>วันที่ขอใช้งาน</td>
        <td>เวลาขอใช้งาน&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td><input type="date" name="use_date" id="use_date" class="room" required="required"/></td>
        <td><input type="time" name="start_time" id="start_time" class="room" required="required" />
          &nbsp;ถึง&nbsp;
          <input type="time" name="end_time" id="end_time" class="room" required="required"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>เหตุผลที่ขอใช้งาน (ถ้ามี)</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><textarea name="use_detail" cols="30" rows="2" id="use_detail" class="room"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="submit" type="submit" value="ยืนยันการจองห้องปฏิบัติการ"  class="mdl-button mdl-js-button  mdl-button--raised mdl-js-ripple-effect mdl-button--accent"/></td>
        </tr>
      </table>
    </form></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" align="center" style="font-weight:600; font-size:18px; color:white;">&nbsp;</td>
</tr>
<tr>
  <td bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
</tr>
</table>
</body>
</html>
