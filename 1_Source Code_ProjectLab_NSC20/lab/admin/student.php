<? include ("header.php");?><br />
<table align="center" width="80%" border="0" cellpadding="5" cellspacing="1" class="form_table">
<tr align="center">
	<td colspan="6" align="center">รายชื่อนักเรียนทั้งหมด</td>
    <td colspan="3" align="center"><a href="add_student.php">เพิ่มนักเรียน</a></td>
</tr>
<tr>
	<th width="5%">ที่</th>
	<th width="7%">รหัสนักเรียน</th>
	<th width="20%">ชื่อ-นามสกุล
	<th width="5%">เกรดเฉลี่ย</th>
	<th width="5%">ระดับชั้น</th>
	<th width="5%">ห้อง</th>
	<th width="4%">ดู</th>
	<th width="4%">แก้ไข</th>
	<th width="4%">ลบ</th>
</tr>
<? include "../conn_db.php";
$sql="SELECT * FROM student ORDER BY std_id";
$query=mysql_query($sql);

if(mysql_num_rows($query)==0){
?>
<tr align="center">
	<td colspan="12">ไม่มีนักเรียน</td>
</tr>
<? }else{$i=1; 
while($data=mysql_fetch_assoc($query)) {
?>

<tr align="center">
	<td><?=$i++?></td>
	<td><?=$data[std_id]?></td>
	<td align="left" style="padding-left:5px;"><?=$data[std_name]?></td>
	<td><?=$data[std_grade]?></td>
	<td><?=$data[std_level]?></td>
	<td><?=$data[std_room]?></td>
		<td><a href="detail_std.php?id=<?=$data[std_id]?>"  title="ดูข้อมูลนักเรียนอย่างละเอียด"><img src="../img/16.png" width="20" height="20"/></a></td>
	<td><a href="edit_student.php?act=edit&id=<?=$data[std_id]?>" title="แก้ไขข้อมูลนักเรียน"><img src="../img/edit.png" width="20" height="20"/></a></td>
	<td><a href="add_student.php?act=delete&id=<?=$data[std_id]?>" title="ลบข้อมูลนักเรียน" onclick="return confirm('ยืนยันการลบ!')"><img src="../img/cancel.png" width="20" height="20"/></a></td>
</tr>
<? 
	} 
} 
?>
</form>
</table>
</body>
</html>