<? 
include("header.php");
if($_GET[act]=="delete"){
$sql = "SELECT * FROM booking WHERE b_code = '$_GET[b_code]'\n";
$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
while($book = mysql_fetch_assoc($query)){
	$sql2 = "SELECT * FROM equipment WHERE eq_id = '$book[eq_id]'\n";
	$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
	$eq = mysql_fetch_assoc($query2);
	
	$total = $book[b_amount]+$eq[eq_total];

	$sql3 = "UPDATE equipment SET \n";
	$sql3 .= "eq_total = '$total' \n";
	$sql3 .= "WHERE eq_id = '$book[eq_id]'\n";
	$query3 = mysql_query($sql3)or die("<pre>$sql</pre>").mysql_error();
}

$sql = "DELETE FROM booking WHERE b_code = '$_GET[b_code]'\n";
$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();	
?>
<script>
	window.location = "borrow.php";
</script>
<?
}
?>		
			<table width="1300" cellpadding="2" cellspacing="2" align="center" class="form_table borrowfont">
            <tr align="center">
            <td colspan="10"><h3>รายการการขออนุมัติการยืมอุปกรณ์</h3></td>
            </tr>
			<tr>
				<th rowspan="2" width="8%">รายการที่</th>
				<th rowspan="2" width="11%">รหัสอ้างอิง</th>
				<th rowspan="2" width="15%">ชื่อผู้ยืม</th>
				<th rowspan="2" width="25%">รายการสิ่งของที่ขอยืม (จำนวน)</th>
				<th rowspan="2" width="10%">วันที่ขอยืม</th>
				<th rowspan="2" width="10%">วันที่ส่งคืน</th>
				<th rowspan="2" width="10%">สถานะ</th>
				<th colspan="2">Action</th>
			</tr>
			<tr>
				<th width="6%">อนุมัติ</th>
				<th width="5%">ลบ</th>
			</tr>
			<?
			$i = 1;
			$sql = "SELECT * FROM booking WHERE check_dup = '1' AND b_status = '0' ORDER BY b_id DESC \n";	
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			$row = mysql_num_rows($query);
			if ($row==0) {
			?>
			<td colspan="9" align="center">ยังไม่มีคำขออนุมัติการยืมอุปกรณ์ในขณะนี้</td>
			<?	
			}
			while($book = mysql_fetch_assoc($query)){
				$sql2 = "SELECT * FROM student WHERE std_id = '$book[std_id]' \n";	
				$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
				$std = mysql_fetch_assoc($query2);
			?>
			<tr align="center">
				<td><?=$i++?></td>
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
				<? }?>	
				</td>
				<td><?=$book[b_date]?></td>
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
				<td><a href="borrow_submit.php?b_code=<?=$book[b_code]?>"><img src="../img/confirm.png" height="22" width="22"/></a></td>
				<td><a href="borrow.php?act=delete&b_code=<?=$book[b_code]?>" onClick="return confirm('ยืนยันการลบ!!')"><img src="../img/delete.png" height="22" width="22"/></a></td>
			</tr>
			<? 
				}
			?>
			</table>

</body>
</html>
