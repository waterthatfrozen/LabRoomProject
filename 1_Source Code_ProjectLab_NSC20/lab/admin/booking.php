<? 
include("header.php");
include "../conn_db.php";
date_default_timezone_set('Asia/Bangkok');
if($_GET[act]=="delete"){
	$sql3="DELETE FROM use_room WHERE use_id = '$_GET[id]'"	;
	$q3=mysql_query($sql3);
	?>
    	<script>
			alert('DELETE successfully!');
			window.location="booking.php";
		</script>
    <?
}

$sql="SELECT * FROM use_room ORDER BY use_date";
$q=mysql_query($sql);


?>
			<table width="100%" cellpadding="2" cellspacing="2" align="center" class="form_table borrowfont">
            <tr align="center">
            <td colspan="8"><h3>รายการการขออนุญาตใช้ห้องปฏิบัติการ</h3></td>
            </tr>
			<tr>
				<th width="8%">รายการที่</th>
				<th width="11%">ชื่อผู้ขอใช้งาน</th>
				<th width="16%">ชื่อห้องปฏิบัติการ</th>
				<th width="15%">วันที่ขอใช้งาน</th>
				<th width="21%">ช่วงเวลาที่ขอใช้งาน</th>
				<th width="14%">สถานะ</th>
				<th width="15%">ลบ</th>
			</tr>
	<? if(mysql_num_rows($q)==0){ ?>
			<td colspan="7" align="center">ยังไม่มีคำขออนุมัติการยืมอุปกรณ์ในขณะนี้</td>
		<? }else{
				$i=1;
				while($data=mysql_fetch_assoc($q)){
			?>
        	
			<tr align="center">
				<td><?=$i++?></td>
				<td align="left" style="padding-left:10px;"><?
                	$sql2="SELECT * FROM student WHERE std_id = '$data[std_id]'";
					$name=mysql_fetch_assoc(mysql_query($sql2));
					echo $name[std_name];
				?></td>
				<td align="left" style="padding-left:10px;"><?
                	$sql2="SELECT * FROM labroom WHERE lab_code = '$data[lab_code]'";
					$lab=mysql_fetch_assoc(mysql_query($sql2));
					echo $lab[lab_name];
				?></td>
				<td><?=$data[use_date]?></td>
				<td><?=$data[start_time]?>&nbsp;-&nbsp;<?=$data[end_time]?></td>
				
				<td><?
                	if($data[use_status]=="no"&&$data[use_date]<date('Y-m-d')){
						echo "พ้นกำหนดการใช้งาน";	
					}else{
						echo "ยังไม่ใช้งานห้อง";	
					}
				?></td>
				<td><a href="booking.php?act=delete&id=<?=$data[use_id]?>" onClick="return confirm('ยืนยันการลบ!!')"><img src="../img/delete.png" height="22" width="22"/></a></td>
			</tr>
		<? 
				}
		} ?>
			</table>

</body>
</html>
