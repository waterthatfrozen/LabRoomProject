<?
include("conn_db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="5">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <p>อย่าปิดหน้านี้</p>
  <p>ใช้สำหรับตรวจสอบและส่งแจ้งเตือนไปยังผู้ใช้งาน</p>
</div>
<?
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d");

$h = date("H");
$m = date("i");
$time_now = $h.":".$m;

$sql = "SELECT * FROM reservation WHERE r_date = '$today' AND r_alert != 'no' AND alert_status = '0' AND time_alert = '$time_now' \n";
$query = mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
$row = mysql_num_rows($query);


while($alert = mysql_fetch_assoc($query)){
	if($alert[r_alert]=="sms"){
		//echo "sms".$alert[std_id];
		include("alert_sms.php");
		
		
		
		
	}elseif($alert[r_alert]=="line"){
		echo "line".$alert[std_id];
	}elseif($alert[r_alert]=="email"){
		include("alert_mail.php");
	}
$sql = "UPDATE reservation SET alert_status = '1' WHERE r_id = '$alert[r_id]'\n";
$query = mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
}	


?>
</body>
</html>
