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
<link rel="stylesheet" href="css/home.css">
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
<table width="1366" border="0" cellspacing="0" cellpadding="0" height="768">
  <tr>
    <td align="center" valign="middle"><table width="1366" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td colspan="4" align="center" bgcolor="#FFFFFF"><table width="1366" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td colspan="5" bgcolor="#FFFFFF"><img src="img/header.jpg" width="100%" height="200" /></td>
          </tr>
          <tr>
            <td></td>
            <td align="center"><div class="container"><a href="borrow.php"><img src="img/borrow.png" class="image" /></a></div></td>
            <td align="center"><div class="container"><a href="book.php"><img src="img/booking.png" class="image" /></a></div></td>
            <td align="center"><div class="container"><img src="img/assistant.png" class="image" /></div></td>
            <td></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td width="15%"></td>
            <td width="20%" align="center">&nbsp;</td>
            <td width="20%" align="center">&nbsp;</td>
            <td width="20%" align="center">&nbsp;</td>
            <td width="15%"></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td></td>
            <td align="center">&nbsp;</td>
            <td align="center">logout</td>
            <td align="center">&nbsp;</td>
            <td></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td></td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
