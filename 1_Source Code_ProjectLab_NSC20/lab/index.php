<?
date_default_timezone_set('Asia/Bangkok');
?>
<!doctype html><html><head>
<meta charset="utf-8">
<title>Science Laboratory Assitant and Management System</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Athiti|Roboto" rel="stylesheet">
<style type="text/css">
body{
	margin: 0;
	background-color: #7fb1b2;
	font-family: 'Athiti', sans-serif;
	font-size: 16px;
	font-weight: 700;
	color: white;
	background-image: url(img/background.jpg);
}
footer{
	margin:0;
	width:100%;
	padding:0.5rem;
	bottom:0;
	left:0;
	right:0;
	height:20px;
	background-color:#003;
	color:#FFF;
	text-align:center;
}
#submit{
    border-radius: 15px 50px 30px;
	 border:grey thin groove;
    background: #333333;
    padding: 5px; 
    width: 300px;
    text-align: center;
    overflow: auto;
	color:white;
	font-family: 'Athiti', sans-serif;
}
#submit:hover{
	background:#ECECEC;
	color:black;
	font-weight:bold;
	font-family: 'Athiti', sans-serif;
	border:#ECECEC thin groove;
}
#username,#password{
	border-radius:10px;
	padding:0.75rem;
	width:75%; max-width:500px; min-width:300px; border:grey thin groove;
	font-family: 'Athiti', sans-serif;
	outline:none;
}
.fontTH18{
	font-size:20px;
}
body,td,th {
	font-family: Athiti, sans-serif;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="725px">
  <tbody>
    <tr align="center">
      <td align="center" valign="middle">
      
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="500px" bgcolor="#FFFFFF" style="color:black;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><form action="check_login.php" method="post" name="login" id="login">
        <table width="100%" border="0" cellspacing="0" cellpadding="4" style="color:black;" class="fontTH18">
          <tbody>
            <tr>
              <td align="center" style="font-size:24px;"><img src="img/header.jpg" width="726" height="105"></td>
              </tr>
            <tr>
              <td align="center" bgcolor="#0F5057" style="font-size:24px; color:white;"><i class="material-icons">accessibility</i> &nbsp;Login | ลงชื่อเข้าสู่ระบบ</td>
              </tr>
            <tr>
              <td align="center" bgcolor="#25A9B6" style="font-size:15px; color:white;"><? echo date("l jS F Y");
 ?> |
                <?
    $date = date("l-j-F-Y");
    $ex = explode("-", $date);
	$ex[3]+=543;
	if($ex[0]=="Sunday"){
		echo "วันอาทิตย์ที่ ".$ex[1];
	}else if($ex[0]=="Monday"){
		echo "วันจันทร์ที่ ".$ex[1];
	}else if($ex[0]=="Tuesday"){
		echo "วันอังคารที่ ".$ex[1];
	}else if($ex[0]=="Wednesday"){
		echo "วันพุธที่ ".$ex[1];
	}else if($ex[0]=="Thursday"){
		echo "วันพฤหัสบดีที่ ".$ex[1];
	}else if($ex[0]=="Friday"){
		echo "วันศุกร์ที่ ".$ex[1];
	}else if($ex[0]=="Saturday"){
		echo "วันเสาร์ที่ ".$ex[1];
	}
	if($ex[2]=="January"){
		echo " เดือน มกราคม พ.ศ. ".$ex[3];
	}else if($ex[2]=="February"){
		echo " เดือน กุมภาพันธ์ พ.ศ. ".$ex[3];
	}else if($ex[2]=="March"){
		echo " เดือน มีนาคม พ.ศ. ".$ex[3];
	}else if($ex[2]=="April"){
		echo " เดือน เมษายน พ.ศ. ".$ex[3];
	}else if($ex[2]=="May"){
		echo " เดือน พฤษภาคม พ.ศ. ".$ex[3];
	}else if($ex[2]=="June"){
		echo " เดือน มิถุนายน พ.ศ. ".$ex[3];
	}else if($ex[2]=="July"){
		echo " เดือน กรกฏาคม พ.ศ. ".$ex[3];
	}else if($ex[2]=="August"){
		echo " เดือน สิงหาคม พ.ศ. ".$ex[3];
	}else if($ex[2]=="September"){
		echo " เดือน กันยนยน พ.ศ. ".$ex[3];
	}else if($ex[2]=="October"){
		echo " เดือน ตุลาคม พ.ศ. ".$ex[3];
	}else if($ex[2]=="November"){
		echo " เดือน พฤศจิกายน พ.ศ. ".$ex[3];
	}else if($ex[2]=="December"){
		echo " เดือน ธันวาคม พ.ศ. ".$ex[3];
	}
 ?>              </td>
            </tr>
            <tr>
              <td align="center" style="font-size:1px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" style="font-size:24px;"><input name="login_user" type="text" required id="username" placeholder="Username | ชื่อผู้ใช้งาน">
                <span style="font-weight:400; font-size:15px;">
                  &nbsp;&nbsp;&nbsp;
                  <input name="login_pass" type="password" required id="password" placeholder="Password | รหัสผ่าน">
                  </span></td>
            </tr>
            <tr>
              <td align="center"> </td>
            </tr>
            <tr>
              <td align="center"><input name="submit" type="submit" id="submit" formaction="check_login.php" formmethod="POST" value="Login | ลงชื่อเข้าสู่ระบบ"></td>
              </tr>
            <tr>
              <td align="center" style="font-weight:400; font-size:14px;">&nbsp;</td>
              </tr>
            <tr>
              <td align="center"><span style="font-weight:400; font-size:14px;">&lt; Update Log of SLabAssist | การอัปเดตของระบบในแต่ละเวอร์ชั่น&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;Fatal Error Report | รายงานข้อผิดพลาดของโปรแกรม&gt;</span></td>
            </tr>
            <tr>
              <td align="center" bgcolor="#57CFDD" style="font-weight:400; font-size:14px;"><span style="font-weight:600; font-size:14px;">©Copyright Reserved 2018 SLabAssist Development Team PCSHS Trang</span></td>
            </tr>
            </tbody>
          </table>
      </form></td>
    </tr>
  </tbody>
</table>

      </td>
    </tr>
  </tbody>
</table>
</body>
</html>