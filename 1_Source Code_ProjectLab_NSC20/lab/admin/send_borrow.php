<?
include("header.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td>
	<table width="100%" border="1" cellpadding="2" cellspacing="2" height="400">
	<tr>
		<td valign="top"><br />
		<table width="95%" border="1" cellpadding="1" cellspacing="1" align="center">
		<tr>
			<td>NAVI: คืนอุปกรณ์</td>
		</tr>
		<tr>
			<td>
			<form name="check1" id="check1" action="" method="post">
			<table width="100%" border="1" cellpadding="2" cellspacing="2" align="center">
			<tr>
				<th rowspan="2" width="5%">รายการที่</th>
				<th rowspan="2" width="8%">รหัสอ้างอิง</th>
				<th rowspan="2" width="12%">ชื่อผู้ยืม</th>
				<th rowspan="2" width="20%">รายการสิ่งของที่ขอยืม (จำนวน)</th>
				<th rowspan="2" width="8%">วันที่รับ</th>
				<th rowspan="2" width="8%">กำหนดส่งคืน</th>
				<th rowspan="2" width="7%">สถานะ</th>
				<th rowspan="2" width="12%">ผู้ให้ยืม</th>
				<th colspan="2" width="9%">การตรวจสอบ</th>
				</tr>
			<tr>
				<th width="6%">ถูกต้อง</th>
				<th width="6%">ไม่ถูกต้อง</th>
			</tr>
			<?
			$i = 1;
			$sql = "SELECT * FROM booking WHERE check_dup = '1' AND b_status = '1' ORDER BY b_id DESC \n";	
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			$row = mysql_num_rows($query);
			while($book = mysql_fetch_assoc($query)){
				$sql2 = "SELECT * FROM student WHERE std_id = '$book[std_id]' \n";	
				$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
				$std = mysql_fetch_assoc($query2);
			?>
			<tr align="center">
				<td><?=$i?></td>
				<td><?=$book[b_code]?></td>
				<td align="left" style="padding-left:10px;"><?=$std[std_name]?></td>
				<td align="left" style="padding-left:10px;">
				<?
				$sql2 = "SELECT * FROM booking WHERE b_code = '$book[b_code]' \n";	
				$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
				
				while($data = mysql_fetch_assoc($query2)){
					$sql3 = "SELECT * FROM equipment WHERE eq_id = '$data[eq_id]' \n";	
					$query3 = mysql_query($sql3)or die("<pre>$sql</pre>").mysql_error();
					$data2 = mysql_fetch_assoc($query3)?>
					<a href=""><?=$data2[eq_name]?>(<?=$data[b_amount]?>)</a> 
				<? }?>				</td>
				<td><?=$book[recive_date]?></td>
				<td><?=$book[send_date]?></td>
				<?
				if($book[b_status]==0){
					$status = "รอรับของ";
				}elseif($book[b_status]=="1"){
					$status = "กำลังยืม";
				}else{
					$status = "ส่งคืนแล้ว";
				}
				?>
				<td><?=$status?></td>
				<?
					$sql4 = "SELECT * FROM labboy WHERE lb_id = '$book[lb_id]' \n";	
					$query4 = mysql_query($sql4)or die("<pre>$sql</pre>").mysql_error();
					$lb = mysql_fetch_assoc($query4)
				?>
				<td><?=$lb[lb_name]?></td>
				<td><a href="send_submit.php?c=1&b_code=<?=$book[b_code]?>"><img src="../img/confirm.png" height="20" width="20"/></a></td>
				<td><a href="send_submit.php?c=2&b_code=<?=$book[b_code]?>"><img src="../img/cancel.png" height="20" width="20"/></a></td>
				</tr>
			<? 
				$i++;
				}
			?>
			</table>
			</form>
			</td>
		</tr>
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
  	<td>
  	<table width="100%" border="1" cellpadding="2" cellspacing="2" height="100">
	<tr>
		<td>Footer</td>
	</tr>
	</table>
  	</td>
</tr>
</table>

</body>
</html>
