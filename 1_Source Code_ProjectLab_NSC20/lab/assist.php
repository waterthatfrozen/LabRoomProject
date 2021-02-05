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
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td height="550" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	      <tr align="center">
	        <td colspan="4">&nbsp;</td>
	        </tr>
	      <tr align="center">
	        <td colspan="4" style=" vertical-align:middle; color:white; font-size:36px; font-weight:bold; background:#C60;">ระบบช่วยเหลือผู้ทดลอง | Assistant System</td>
	        </tr>
	      <tr align="center">
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        </tr>
	      <tr align="center" height="250">
	        <td><div class="container w3-animate-zoom"><a href="calculator.php">
	          <div class="rcorners"><img src="img/concal.png" width="300" height="300" class="image" style="border-radius:20px;" /></div>
	          </a></div></td>
	        <td><div class="container w3-animate-zoom"><a href="counter.php"><img src="img/counter.png" width="300" height="300" class="image" style="border-radius:20px;" /></a></div></td>
	        <td><div class="container w3-animate-zoom"><a href="stopwatch.php"><img src="img/stopwatch.png" width="300" height="300" class="image" style="border-radius:20px;" /></a></div></td>
	        <td width="25%"><div class="container w3-animate-zoom"><img src="img/labreport.png" width="300" height="300" class="image" style="border-radius:20px;"  title="Under Development #NextVersion"/></div></td>
	        </tr>
	      <tr align="center">
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        </tr>
	      <tr align="center">
	       <td colspan="4" bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
	        </tr>
	      </table></td>
	    </tr>
    </table></td>
</tr>
</table>
<br />
</body>
</html>
