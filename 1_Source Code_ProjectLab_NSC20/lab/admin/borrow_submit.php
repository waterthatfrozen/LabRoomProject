<?
session_start();
if(!isset($_SESSION['login_user'])){
?>
	<script>alert("กรุณาเข้าสู๋ระบบ");
	window.location="index.php"</script>
<?
}

include("../conn_db.php");
$login_user = $_SESSION[login_user];

$sql = "SELECT * FROM labboy WHERE lb_id = '$login_user' \n";
$q = mysql_query($sql);
$u = mysql_fetch_assoc($q);

//$email = $u[std_email];
$b_code = $_GET[b_code];

$sql = "UPDATE booking SET \n";
$sql .= "b_status = '1', \n";
$sql .= "lb_id = '$u[lb_id]', \n";
$sql .= "recive_date = NOW() \n";
$sql .= "WHERE b_code = '$b_code'\n";
$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();


$sql22 = "SELECT * FROM booking WHERE check_dup = '1' ORDER BY b_id DESC LIMIT 0,1 \n";
$q22 = mysql_query($sql22);
$u22 = mysql_fetch_assoc($q22);

$sql33 = "SELECT * FROM student WHERE std_id = '$u22[std_id]'\n";
$q33 = mysql_query($sql33);
$u33 = mysql_fetch_assoc($q33);
$email = $u33[std_email];

require '../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
  // include phpmailer class

  // creates object
  //$mail = new PHPMailer(true); 
  
  $full_name = $u[std_name];
  //$email = $u[std_email];
  //$email = "KRUANEK.T@GMAIL.COM";
   
   $full_name  = $full_name;
   $email      = $email;
   $subject = "=?UTF-8?B?".base64_encode("Project LAB.")."?=";
   //$subject    = "Sending HTML eMail using PHPMailer.";
   //$text_message    = "ทดสอบบบบบบบบบบบ";      
   
   
   
   // HTML email starts here
   
   $message  = "<html>";
   $message .= "<head>";
   $message .= "<style type='text/css'>";
   $message .= "body {
	margin-top: 0px;
	margin-bottom: 0px;
	font-family: circular;
	color:#FFFFFF;
}
";
   $message .= "</style>";
   $message .= "</head>";
   $message .= "<body>";
   $message .= "<table width='900' height='0' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#222'>";
   $message .= "<tr align='center'><td>";
   //text will be here
   
   $message .= "<img src='http://img.in.th/images/f5e4016be8f777968e7d413d8b049b31.png' alt='f5e4016be8f777968e7d413d8b049b31.png' border='0' width='800px'/>";
  
   $message .= "</td></tr>";
   $message .= "<tr><td align='middle' style='color:white'>";
   $message .= "รหัสอ้างอิงของรายการขอยืมอุปกรณ์ที่ ".$b_code;
   $message .= "</td></tr>";
   
   $message .= "<tr><td align='middle' style='color:white'>";
   $message .= "ได้รับการอนุมัติและสามารถใช้อุปกรณ์ทดลองที่ขอยืมไว้ได้";
   $message .= "</td></tr>";
   
   $message .= "<tr><td align='middle' style='color:white'>";
   $message .= "ท่านต้องนำอุปกรณ์มาคืนในวันที่ ".$u22[send_date];
   $message .= "</td></tr>";
   
   $sql="SELECT * FROM labboy WHERE lb_id = '$u22[lb_id]'";
   $data=mysql_fetch_assoc(mysql_query($sql));
   
   $message .= "<tr><td align='middle' style='color:white'>";
   $message .= "รายการนี้ได้ทำการอนุมัติโดย ".$data[lb_name];
   $message .= "</td></tr>";
   
   $message .= "<tr><td align='middle' style='color:white'>";
   $message .= "ขอบคุณครับ";
   $message .= "</td></tr>";
   
   $message .= "<tr><td align='middle' style='color:white'>";
   $message .= "&nbsp;</td></tr>";
   
   $message .= "<tr><td align='middle' bgcolor='#000' style='color:white'>";
   $message .= "Science Laboratory Assistant and Management System";
   $message .= "</td></tr>";
  
   $message .= "<tr><td align='middle' bgcolor='#000' style='color:white'>";
   $message .= "โรงเรียนจุฬาภรณราชวิทยาลัย ตรัง";
   $message .= "</td></tr>";
   
   $message .= "</table>";
   
   $message .= "</body></html>";
   
   // HTML email ends here
   
   try
   {
    $mail->CharSet = "utf-8";
    $mail->IsSMTP(); 
    $mail->isHTML(true);
    $mail->SMTPDebug  = 0;                     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "ssl";                 
    $mail->Host       = "smtp.gmail.com";      
    $mail->Port       = 465;             
    $mail->AddAddress($email);
    $mail->Username   ="kruanek.t@gmail.com";  
    $mail->Password   ="ava191160";            
    $mail->SetFrom('noreply@projectlab.com','AdminTeam from ProjectLAB');
                         //$mail->AddReplyTo("your_gmail_id@gmail.com","Coding Cage");
    $mail->Subject    = $subject;
    $mail->Body       = $message;
    $mail->AltBody    = $message;
     
    if($mail->Send())
    {
     
     $msg = "<div class='alert alert-success'>
       สวัสดีคุณ,<br /> ".$full_name." mail was successfully sent to ".$email." go and check, cheers :)
       </div>";
     
    }
   }
   catch(phpmailerException $ex)
   {
    $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
   }
   
?>
	<script>
		alert("Successfully!!");
		window.location = "borrow.php";
	</script>
<?
?>

