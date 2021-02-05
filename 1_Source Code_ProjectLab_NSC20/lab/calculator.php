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
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/line.css">

<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><?
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
.input{
	border-radius:20px; padding:0.25rem; padding-left:0.75rem; 
	border:1px solid black;	
}
-->
</style></head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<?
$id = $_GET[id];
?>

<div class="navbar" align="right">
	<a href="home.php">Home</a>
	<a href="calculator.php">เครื่องคำนวณความเข้มข้นของสาร</a>
    <a href="counter.php">เครื่องนับจำนวน</a>
    <a href="stopwatch.php">นาฬิกาจับเวลา</a>
	<a href="" title="Under Development #NextVersion">เขียนสรุปผลการทดลอง</a>
    
  <img src="img/header_white.png" width="452" height="63"  /> 
</div>
	
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="80">
<tr>
	<td bgcolor="#CC6600">&nbsp;</td>
</tr>
</table>
  <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF" style="padding-top:10px; margin-top:10px;">
    <tr>
      <td align="center"><img src="img/calculatorheader.png" width="395" height="81" /></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><?
    	$sql="SELECT * FROM chemdetail ORDER BY chm_form";
		$q=mysql_query($sql);
	?>
        <select name="MW" class="input" id="MW" onchange="MW()" required="required">
          <option value="">------------เลือกสารเคมีที่คุณต้องการหาความเข้มข้น------------</option>
          <? while($data=mysql_fetch_assoc($q)){?>
          <option value="<?=$data[chm_MW]?>">
            <?=$data[chm_form]?>
            &nbsp;
            <?=$data[chm_name]?>
          </option>
          <? } ?>
        </select>
        <script type="text/javascript" src="js/calculator.js"></script></td>
    </tr>
    <tr>
      <td align="center" id="gmol">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">น้ำหนักของสารที่เลือกไว้ในปัจจุบัน&nbsp;&nbsp;
        <input name="weight" type="number" class="input" id="weight" placeholder="น้ำหนักของสารที่เลือกในปัจจุบัน" onkeyup="weight()" value="0" />
      &nbsp;&nbsp;กรัม  <script type="text/javascript" src="js/calculator.js"></script></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">ปริมาตรของสารละลายที่ต้องการ&nbsp;&nbsp;
        <input name="water" type="number" class="input" id="water" placeholder="ปริมาตรของสารละลายที่ต้องการ" onkeyup="water()" value="0" />
      &nbsp;&nbsp;cm3  <script type="text/javascript" src="js/calculator.js"></script></td>
    </tr>
    <tr>
      <td height="33" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="33" align="center">ความเข้มข้นของสารละลายนี้คือ</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#333333" id="display" style="color:white;">-</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><a href="calculator.php" class="hover_unterline">RESET</a></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr align="center">
      <td colspan="4" bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
    </tr>
  </table>
<br />
</body>
</html>
