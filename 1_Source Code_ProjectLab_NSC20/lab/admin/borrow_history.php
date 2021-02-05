<? 
include("header.php");
?>

			<form name="check1" id="check1" action="" method="post">
			<table width="100%" cellpadding="2" cellspacing="2" align="center" class="form_table borrowfont">
            <tr align="center">
            <td colspan="11"><h3>ประวัติการยืมอุปกรณ์ทั้งหมด</h3></td>
            </tr>
			<tr>
				<th width="5%">รายการที่</th>
				<th width="7%">รหัสอ้างอิง</th>
				<th width="11%">ชื่อผู้ยืม</th>
				<th width="18%">รายการสิ่งของที่ขอยืม (จำนวน)</th>
				<th width="7%">วันที่รับ</th>
				<th width="12%">วันที่ส่งคืน</th>
				<th width="10%">ผู้ให้ยืม</th>
				<th width="10%">ผู้รับคืน</th>
				<th width="9%">หมายเหตุ</th>
				<th width="11%">พริ้นรายงาน</th>
				</tr>
			<?
			$i = 1;
			$sql = "SELECT * FROM booking WHERE check_dup = '1' AND b_status = '2' ORDER BY b_id DESC \n";	
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
				<td><?=$book[send_date2]?></td>
				<?
					$sql9 = "SELECT * FROM labboy WHERE lb_id = '$book[lb_id]' \n";	
					$query9 = mysql_query($sql9)or die("<pre>$sql</pre>").mysql_error();
					$lb1 = mysql_fetch_assoc($query9)
				?>
				<td><?=$lb1[lb_name]?></td>
				<?
					$sql4 = "SELECT * FROM labboy WHERE lb_id = '$book[lb_id2]' \n";	
					$query4 = mysql_query($sql4)or die("<pre>$sql</pre>").mysql_error();
					$lb2 = mysql_fetch_assoc($query4)
				?>
				<td><?=$lb2[lb_name]?></td>
				<td><? if($book[b_damage]!=0){?><a href="broken.php?b_id=<?=$book[b_id]?>">ของชำรุด</a><? }?></td>
				<td><a href="pdfprinter.php?id=<?=$book[b_code]?>"><img src="../img/print-icon.png" width="25" height="25" /></a></td>
				</tr>
			<? 
				$i++;
				}
			?>
			</table>
			</form>


</body>
</html>
