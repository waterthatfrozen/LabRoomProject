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
	<form name="form_search" id="form_search" method="get" action="">

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
	<table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
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
	  <td width="110%" colspan="5"><table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
	    <tr align="right">
	      <td align="left" valign="top">&nbsp;</td>
	      </tr>
	    <tr align="right">
	      <td align="left" valign="top"><a href="mycart.php"></a></td>
	      </tr>
	    </table>
	    
	    
	    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
	      <tr class="table w3-text-white">
	        <th width="7%" rowspan="2" bgcolor="#11638A" class="table">ลำดับที่</th>
	        <th width="10%" rowspan="2" bgcolor="#11638A" class="table">รหัส</th>
	        <th width="30%" rowspan="2" bgcolor="#11638A" class="table">ชื่อวัสดุอุปกรณ์/ สารเคมี </th>
	        <th width="15%" rowspan="2" bgcolor="#11638A" class="table">จำนวนคงเหลือ/ทั้งหมด</th>
	        <th width="10%" colspan="2" bgcolor="#11638A" class="table">Action</th>
	        </tr>
	      <tr class="table w3-text-white">
	        <th width="10%" bgcolor="#11638A" class="table">ดูรายละเอียด</th>
	        <th width="10%" bgcolor="#11638A" class="table">หยิบใส่ตะกร้า</th>
	        </tr>
  <?
$i = 1;		
					
$sql2 = "SELECT * FROM equipment WHERE eq_type = '$choice' \n";	
$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
$rows = mysql_num_rows($query2);	

if($_GET[s]){
	$sql = "SELECT * FROM equipment WHERE eq_name LIKE '%$_GET[s]%' \n";	
}else{
	$sql = "SELECT * FROM equipment WHERE eq_type = '$choice' \n";	
}
$Per_Page = 10;   // Per Page
$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);

if($rows<=$Per_Page){
	$Num_Pages =1;
}elseif(($rows % $Per_Page)==0){
	$Num_Pages =($rows/$Per_Page) ;
}else{
	$Num_Pages =($rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
$sql .="ORDER BY eq_code ASC LIMIT $Page_Start, $Per_Page";
$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();

		while($mate = mysql_fetch_assoc($query)){
		$sql9 = "SELECT * FROM equipment WHERE eq_id = '$mate[eq_id]' \n";
		$query9 = mysql_query($sql9)or die("<pre>$sql</pre>").mysql_error();
		$eq = mysql_fetch_assoc($query9);
		?>
	      <tr align="center" >
	        <td class="table"><? echo $i+($Page-1)*$Per_Page; ?></td>
	        <td class="table"><?=$mate[eq_code]?></td>
	        <td class="table" align="left" style="padding-left:10px;"><?=$mate[eq_name]?></td>
	        <td class="table" align="right"><?=$mate[eq_total]?>/<?=$mate[eq_amount]?> (<?=$mate[eq_counter]?>)</td>
	        <td class="table"><a href="equip_detail.php?id=<?=$mate[eq_id]?>"><img src="img/view.png" width="30" height="30" /></a></td>
	        <td class="table"><div onClick="myFunction(<?=$mate[eq_id]?>)" class="container"><img src="img/cart.png" width="30" height="30" /></div></td>
	        </tr>
	      
	      <? 
			$i++;
			}
		?>
	      <?
		if(!$_GET[c]){
		?>
	      <tr align="center">
	        <td colspan="6" bgcolor="#7D0000" class="w3-text-white">-ยังไม่เลือกหมวดหมู่-</td>
	        </tr>
	      <? }?>
	      </table>
	    </td>
	  </tr>
	</table>	
	
	<!---------------------------------------------------------------------------------------------------------------->
	<table width="88%" border="0" align="center" cellpadding="3" cellspacing="2" bgcolor="#FFFFFF">
	<tr>
		<td>Total Record : <?=$Num_Pages;?> Page :
		<?
		if($Prev_Page){
			echo " <a href='$_SERVER[SCRIPT_NAME]?c=$choice&Page=$Prev_Page'><< Back</a> ";
		}
		
		for($i=1; $i<=$Num_Pages; $i++){
			if($i != $Page){
				echo "[ <a href='$_SERVER[SCRIPT_NAME]?c=$choice&Page=$i'>$i</a> ]";
			}else{
				echo "<b> $i </b>";
			}
		}
		
		if($Page!=$Num_Pages){
			echo " <a href ='$_SERVER[SCRIPT_NAME]?c=$choice&Page=$Next_Page'>Next>></a> ";
		}
		?>
		</td>
	</tr>
	</table>
	<!---------------------------------------------------------------------------------------------------------------->
	
	
	</td>
</tr>
<tr>
	<td bgcolor="#001246" align="center" style="font-weight:600; font-size:18px; color:white;">&copy;Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
</tr>
</table><br />
</body>
</form>
</html>
