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

$b_code = $_GET[b_code];
if($_GET[c]==1){
	$sql = "SELECT * FROM labboy WHERE lb_id = '$login_user' \n";
	$q = mysql_query($sql);
	$u = mysql_fetch_assoc($q);
	
	$sql = "UPDATE booking SET \n";
	$sql .= "b_status = '2', \n";
	$sql .= "lb_id2 = '$u[lb_id]', \n";
	$sql .= "b_damage = '0', \n";
	$sql .= "send_date2 = NOW() \n";
	$sql .= "WHERE b_code = '$b_code'\n";
	$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
	
	$sql2 = "SELECT * FROM booking WHERE b_code = '$_GET[b_code]'\n";
	$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
	while($book = mysql_fetch_assoc($query2)){
		$sql3 = "SELECT * FROM equipment WHERE eq_id = '$book[eq_id]'\n";
		$query3 = mysql_query($sql3)or die("<pre>$sql</pre>").mysql_error();
		$eq = mysql_fetch_assoc($query3);
		
		$total = $eq[eq_total]+$book[b_amount];
		if($eq[eq_type]!="che"){
			$sql = "UPDATE equipment SET \n";
			$sql .= "eq_total = '$total' \n";
			$sql .= "WHERE eq_id = '$eq[eq_id]'\n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
		}
	}
	
	?>
		<script>
			alert("Successfully!!");
			window.location = "borrow_send.php";
		</script>
	<?
}else{
	?>
		<script>
			window.location = "check_recive.php?b_code=<?=$b_code?>";
		</script>
	<?
}
?>


