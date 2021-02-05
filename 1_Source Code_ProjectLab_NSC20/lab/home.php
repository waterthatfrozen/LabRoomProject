<?
session_start();
date_default_timezone_set('Asia/Bangkok');
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

<style type="text/css">
body {
	background-image: url(img/background.jpg);
	
}
</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="768">
  <tr>
    <td align="center" valign="middle"><table width="1366" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td colspan="4" align="center" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr></tr>
          <tr>
            <td colspan="4" align="center" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td colspan="5" align="center" bgcolor="#29A9B4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="5" align="center" bgcolor="#FFFFFF"><img src="img/header.jpg" width="67%" height="133" /></td>
              </tr>
              <tr>
                <td colspan="5" align="center"><strong>ยินดีต้อนรับ</strong>&nbsp;คุณ
                  <?=$u[std_name]?>
                  &nbsp;เลือกเมนูข้างล่างเพื่อดำเนินการต่อ&nbsp;| Select to continue</td>
              </tr>
              <tr>
                <td align="right"></td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td align="center"><div class="container w3-animate-zoom"><a href="borrow.php"><img src="img/borrow1.png" width="236" height="259" class="image" /></a></div></td>
                <td align="center"><div class="container w3-animate-zoom"><a href="book.php"><img src="img/booking.png" class="image" /></a></div></td>
                <td align="center"><div class="container w3-animate-zoom"><a href="assist.php"><img src="img/assistant.png" class="image" /></a></div></td>
                <td></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td width="20%"></td>
                <td width="20%" align="center">&nbsp;</td>
                <td width="20%" align="center">&nbsp;</td>
                <td width="20%" align="center">&nbsp;</td>
                <td width="20%"></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td></td>
                <td></td>
                <td align="center" class="w3-animate-zoom" bgcolor="#790606" style="color:white; border-radius:30px; font-weight:800;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><a href="logout.php">log out&nbsp;ออกจากระบบ</a></td>
                <td></td>
                <td></td>
              </tr>
              <tr bgcolor="#FFFFFF" style="font-size:3px;">
                <td colspan="5">&nbsp;.</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td colspan="5" align="center" bgcolor="#15565B" style="font-size:14px; color:white;">©Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
