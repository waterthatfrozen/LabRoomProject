<?
session_start();
if(!isset($_SESSION['login_user'])){
?>
	<script>alert("กรุณาเข้าสู่ระบบ");
	window.location="../index.php"</script>
<?
}

include("../conn_db.php");
$login_user = $_SESSION[login_user];

$sql = "SELECT * FROM labboy WHERE lb_id = '$login_user' \n";
$q = mysql_query($sql);
$u = mysql_fetch_assoc($q);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:Admin:.</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/menu.css">
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="center" bgcolor="#333">
	<img src="../img/header_white.png" width="494" height="72" /></td>
</tr>
<tr align="center">
	<td>
		<div class="navbar" align="center">
        <a href="home.php"><i class="material-icons">home</i> หน้าหลัก</a>
            
			<div class="dropdown">
				<button class="dropbtn"><i class="material-icons">accessibility</i> ผู้ใช้งาน 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="student.php">นักเรียน</a>	
					<a href="officer.php">เจ้าหน้าที่และครูผู้สอน</a>		
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn"><i class="material-icons">transform</i> ระบบยืม/คืน 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="borrow.php">ยืมอุปกรณ์</a>	
					<a href="borrow_send.php">คืนอุปกรณ์</a>
					<a href="borrow_history.php">ประวัติการยืม-คืน วัสดุอุปกรณ์</a>		
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn"><i class="material-icons">widgets</i> วัสดุ อุปกรณ์ และสารเคมี
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="equip_che.php">สารเคมี</a>		
					<a href="equip_chm.php">วัสดุ อุปกรณ์เคมี</a>		
					<a href="equip_phy.php">วัสดุ อุปกรณ์ฟิสิกส์</a>	
					<a href="equip_bio.php">วัสดุ อุปกรณ์ชีวะ</a>
                    <a href="add_equipment.php">เพิ่มวัสดุอุปกรณ์ในระบบ</a>	
				</div>
			</div>
			<a href="labroom.php"><i class="material-icons">place</i> ข้อมูลห้องเรียน</a>
			<a href="packet_lab.php"><i class="material-icons">inbox</i> การทดลอง</a>
			<div class="dropdown">
				<button class="dropbtn"><i class="material-icons">event</i> ระบบจองห้องเรียน
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="booking.php">ข้อมูลการจอง</a>			
				</div>
			</div> 
			<a href="../logout.php"><i class="material-icons">lock</i> ออกจากระบบ</a>
			
		</div>	
		</td>
</tr>
</table>
