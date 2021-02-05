<?
session_start();
include("conn_db.php");
?>
<?
$sql = "SELECT * FROM student WHERE std_id = '$_POST[login_user]' AND std_pass = '$_POST[login_pass]'";
$query = mysql_query($sql) or die ("<pre>$sql</pre>".mysql_error());
$row1 = mysql_num_rows($query);

if($row1 == 1){
	$_SESSION['login_user'] = $_POST[login_user];
	?>
		<script>alert("ยินดีต้อนรับเข้าสู๋ระบบ");
		window.location="home.php";
		</script>;
	<?
}else{
	$sql2 = "SELECT * FROM admin WHERE admin_id = '$_POST[login_user]' AND admin_pass = '$_POST[login_pass]'";
	$query2 = mysql_query($sql2) or die ("<pre>$sql</pre>".mysql_error());
	$row2 = mysql_num_rows($query2);
	if($row2 == 1){
	$_SESSION['login_user'] = $_POST[login_user];
	?>
		<script>
			alert("ยินดีต้อนรับเข้าสู๋ระบบ");
			window.location="admin/home.php";
		</script>;
	<?
	}else{
		$sql3 = "SELECT * FROM labboy WHERE lb_id = '$_POST[login_user]' AND lb_pass = '$_POST[login_pass]'";
		$query3 = mysql_query($sql3) or die ("<pre>$sql</pre>".mysql_error());
		$row3 = mysql_num_rows($query3);
		if($row3 == 1){
		$_SESSION['login_user'] = $_POST[login_user];
		?>
			<script>
				alert("ยินดีต้อนรับเข้าสู๋ระบบ");
				window.location="admin/home.php";
			</script>;
		<?
		}else{
			?>
			<script>
				alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณากรอกใหมม่อีกครั้ง");
				history.back();
			</script>;
			<?
		}
	}
}
?>