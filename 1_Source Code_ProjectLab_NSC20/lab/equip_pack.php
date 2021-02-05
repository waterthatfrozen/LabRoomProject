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
</table><form name="form_search" id="form_search" method="get" action="confirm_packet.php">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF" style="padding-top:10px; margin-top:10px;">
<tr height="300" valign="top">
	<td><table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td rowspan="3" align="center" valign="middle"><img src="img/borrow.png" height="80" /></td>
	    <td align="right" valign="top">ประเภท: &nbsp;</td>
	    <td colspan="3" valign="top"><select name="category" id="category" onchange="changeFunc();">
	      <option value="">----เลือก----</option>
	      <option value="che" <? if($_GET[c]=="che"){?> selected="selected"<? }?>>สารเคมี</option>
	      <option value="chm" <? if($_GET[c]=="chm"){?> selected="selected"<? }?>>อุปกรณ์กลุ่มวิชาเคมีเคมี</option>
	      <option value="phy" <? if($_GET[c]=="phy"){?> selected="selected"<? }?>>อุปกรณ์กลุ่มวิชาฟิสิกส์</option>
	      <option value="bio" <? if($_GET[c]=="bio"){?> selected="selected"<? }?>>อุปกรณ์กลุ่มวิชาชีวะ</option>
	      </select></td>
	    </tr>
	  <tr>
	    <td align="right" valign="top"><?
			$sql = "SELECT * FROM lab \n";
			$query = mysql_query($sql);
			?>
	      ชุดเซตทดลอง: &nbsp;</td>
	    <td colspan="3" valign="top"><select name="lab_category" id="lab_category" onchange="changeFunc2();">
	      <option value="">-------------เลือก-------------</option>
	      <? while($lab = mysql_fetch_assoc($query)){?>
	      <option value="<?=$lab[lab_id]?>" <? if($_GET[id]==$lab[lab_id]){?> selected="selected"<? }?>>
	        <?=$lab[lab_name]?>
	        </option>
	      <? }?>
	      </select></td>
	    </tr>
	  <tr>
	    <td align="right" valign="top">&nbsp;</td>
	    <td valign="middle"><a href="booking_history.php" class="hover_unterline">ประวัติการยืม/ คืน</a></td>
	    <td valign="middle"><a href="mycart.php" class="hover_unterline"><img src="img/mycart.png" height="40"/></a></td>
	    <td valign="top">&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="5">&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="5"><?
			$sql = "SELECT * FROM lab WHERE lab_id = '$_GET[id]' \n";
			$query = mysql_query($sql);
			$lab = mysql_fetch_assoc($query);
		?>
	      <table align="center" width="90%" border="0" cellpadding="3" cellspacing="3" bgcolor="#FFFFCC" class="rcorners">
	        <tr valign="top">
	          <td rowspan="4" align="center" valign="top"><img src="<?=$lab[lab_path]?>" width="300" height="300" class="rcorners2"/></td>
	          <td width="16%" align="right" bgcolor="#FFFFFF" style="padding-right:10px;">รหัสการทดลอง :</td>
	          <td width="55%" bgcolor="#FFFFFF"><?=$lab[lab_code]?></td>
	          </tr>
	        <tr valign="top">
	          <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">ชื่อการทดลอง :</td>
	          <td bgcolor="#FFFFFF"><?=$lab[lab_name]?></td>
	          </tr>
	        <tr valign="top">
	          <td align="right" valign="top" bgcolor="#FFFFFF" style="padding-right:10px;">วัสดุ อุปกรณ์ :</td>
	          <td valign="top" bgcolor="#FFFFFF" height="215"><?
				$sql = "SELECT * FROM packet_lab WHERE lab_id = '$_GET[id]' \n";
				$query = mysql_query($sql);
				$i=1;
				while($pack = mysql_fetch_assoc($query)){
				?>
	            <?
					$sql2 = "SELECT * FROM equipment WHERE eq_id = '$pack[eq_id]' \n";
					$query2 = mysql_query($sql2);
					$eq = mysql_fetch_assoc($query2);
					
					echo $i.")"." ".$eq[eq_name]." (".$pack[pack_amount]." ".$eq[eq_counter].")"."<br />";
					$i++;
				?>
	            <?
				}
				?></td>
	          </tr>
	        </table>
	      <table align="center" width="90%" border="0" cellpadding="3" cellspacing="1" >
	        <tr>
	          <td align="right" style="padding-top:10px;"><a href="confirm_packet.php?lab_id=<?=$_GET[id]?>">
	            <button class="mdl-button mdl-js-button  mdl-button--raised mdl-js-ripple-effect mdl-button--accent">ยืมอุปกรณ์ชุดนี้</button>
	            </a></td>
	          </tr>
	        </table></td>
	    </tr>
	  <tr>
	    <td colspan="5">&nbsp;</td>
	    </tr>
	  </table></td>
</tr>
<tr>
	<td bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
</tr>
</table>
</form>
</body>
</html>
