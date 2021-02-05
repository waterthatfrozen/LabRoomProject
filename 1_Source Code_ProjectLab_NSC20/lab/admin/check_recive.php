<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
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
			<td>NAVI: ตรวจสอบอุปกรณ์ </td>
		</tr>
		<tr>
			<td>
			<?
			$sql = "SELECT * FROM booking WHERE b_code = '$_GET[b_code]' AND check_dup = '1' \n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			$book = mysql_fetch_assoc($query);
			?>
			<table align="center" border="1" width="70%" cellpadding="1" cellspacing="1">
			<tr>
				<td>รหัสการยืม</td>
				<td><?=$book[b_code]?></td>
			</tr>
			<tr>
				<td>ข้อมูลผู้ยืม</td>
				<td>
				<?
				$sql = "SELECT * FROM student WHERE std_id = '$book[std_id]' \n";
				$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
				$std = mysql_fetch_assoc($query);
				?>
				<table width="100%" border="1">
				<tr>
					<td>ชื่อ-นามสกุล: <?=$std[std_name]?></td>
					<td>ชั้น ม.<?=$std[std_level]?>/<?=$std[std_room]?></td>
					<td>รหัสนักเรียน: <?=$std[std_id]?></td>
				</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>วันที่ยืม</td>
				<td><?=$book[recive_date]?></td>
			</tr>
			<?
			$sql = "SELECT * FROM labboy WHERE lb_id = '$book[lb_id]' \n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			$lb = mysql_fetch_assoc($query);
			?>
			<tr>
				<td>ผู้อนุมัติยืม</td>
				<td><?=$lb[lb_name]?></td>
			</tr>
			</table><br />
			<form name="form_submit" id="form_submit" action="" method="post">
			<table align="center" border="1" width="70%" cellpadding="3" cellspacing="3">
			<tr align="center">
				<td width="5%" rowspan="2">ลำดับที่</td>
				<td width="7%" rowspan="2">รหัสอุปกรณ์</td>
				<td width="20%"rowspan="2">ชื่ออุปกรณ์</td>
				<td width="10%"rowspan="2">จำนวนที่ยืม</td>
				<td width="14%"colspan="2">การตรวจเช็ค</td>
			</tr>
			<tr align="center">
				<td width="7%">ปกติ</td>
				<td width="7%">ชำรุด/เสียหาย<br />(ระบุจำนวน)</td>
			</tr>
			<?
			$i = 1;
			$sql = "SELECT * FROM booking WHERE b_code = '$_GET[b_code]' \n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
			while($b = mysql_fetch_assoc($query)){
			?>
			<tr align="center">
				<td><?=$i?></td>
				<?
				$sql2 = "SELECT * FROM equipment WHERE eq_id = '$b[eq_id]' \n";
				$query2 = mysql_query($sql2)or die("<pre>$sql</pre>").mysql_error();
				$q = mysql_fetch_assoc($query2);
				?>
				<td><?=$q[eq_code]?></td>
				<td align="left" style="padding-left:10px;"><?=$q[eq_name]?></td>
				<td><?=$b[b_amount]?></td>
				<td><input type="radio" name="<?="rd".$i?>" id="<?="a".$i?>" value="0" checked="checked"></td>
				<td><input type="radio" name="<?="rd".$i?>" id="<?="b".$i?>" value="1">
					<select name="<?="ch".$i?>" style="width:40px;">
						<option value="0">-</option>
						<?
						for($k=1;$k<=$b[b_amount];$k++){
						?>
						<option value="<?=$k?>"><?=$k?></option>
						<?
						}
						?>
					</select>
				</td>
			</tr>
			<? 
				$i++;
				}
			?>
			</table>
			<br />
			<table align="center" border="0" width="70%" cellpadding="1" cellspacing="1">
			<tr>
				<td align="right">
					<input type="submit" name="submit" id="submit" value="Submit">
				</td>
			</tr>
			</table>
			</form>
			<?
			if($_POST[submit]){
				$z=1;
				$sql = "SELECT * FROM booking WHERE b_code = '$_GET[b_code]' \n";
				$query = mysql_query($sql)or die("<pre>$sql</pre>").mysql_error();
				while($b = mysql_fetch_assoc($query)){
					$sql1 = "SELECT * FROM equipment WHERE eq_id = '$b[eq_id]' \n";
					$query1 = mysql_query($sql1)or die("<pre>$sql1</pre>").mysql_error();
					$eq1 = mysql_fetch_assoc($query1);
					
					$n = "ch".$z;
					$am = $_POST[$n];
					
					$x = "rd".$z;
					$rm = $_POST[$x];
					
					if($rm == 1){
						$total = $eq1[eq_total]-$am+$b[b_amount];
						
						$sql2 = "UPDATE equipment SET \n";
						$sql2 .= "eq_damage = '$am', \n";
						$sql2 .= "eq_total = '$total' \n";
						$sql2 .= "WHERE eq_id = '$b[eq_id]'\n";
						$query2 = mysql_query($sql2)or die("<pre>$sql2</pre>").mysql_error();
						
						
						$sql5 = "UPDATE booking SET \n";
						$sql5 .= "b_status = '2', \n";
						$sql5 .= "b_damage = '$am', \n";
						$sql5 .= "lb_id2 = '$u[lb_id]', \n";
						$sql5 .= "send_date2 = NOW() \n";
						$sql5 .= "WHERE b_id = '$b[b_id]'\n";
						$query5 = mysql_query($sql5)or die("<pre>$sql5</pre>").mysql_error();
						
					}else{
						$total = $eq1[eq_total]+$b[b_amount];
						
						$sql2 = "UPDATE equipment SET \n";
						$sql2 .= "eq_damage = '$am', \n";
						$sql2 .= "b_damage = '$am', \n";
						$sql2 .= "eq_total = '$total' \n";
						$sql2 .= "WHERE eq_id = '$b[eq_id]'\n";
						$query2 = mysql_query($sql2)or die("<pre>$sql2</pre>").mysql_error();
						
						$sql5 = "UPDATE booking SET \n";
						$sql5 .= "b_status = '2', \n";
						$sql5 .= "lb_id2 = '$u[lb_id]', \n";
						$sql5 .= "send_date2 = NOW() \n";
						$sql5 .= "WHERE b_id = '$b[b_id]'\n";
						$query5 = mysql_query($sql5)or die("<pre>$sql5</pre>").mysql_error();
					
					}
				$z++;

				}			
				?>
					<script>
						alert("Successfully!!");
						window.location = "borrow_history.php";
					</script>
				<?

			}
			?>
			<br />
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
