<? include ("header.php");?><br />
<table align="center" width="80%" border="0" cellpadding="5" cellspacing="1" class="form_table">
<tr>
	<td colspan="8" align="center">รายการสารเคมี</td>
    <td align="center" colspan="3"><a href="add_equipment.php">เพิ่มสารเคมี</a></td>
    </tr>
<tr align="center">
	<th width="5%">ที่</th>
	<th width="7%">รหัสอุปกรณ์</th>
	<th width="20%">ชื่อวัสดุ-อุปกรณ์
	<th width="5%">จำนวน</th>
	<th width="5%">คงเหลือ</th>
	<th width="9%">จำนวนเสียหาย</th>
	<th width="5%">หน่วย</th>
	<th width="8%">ความอันตราย</th>
	<th width="4%">ดู</th>
	<th width="4%">แก้ไข</th>
	<th width="4%">ลบ</th>
</tr>
<? include "../conn_db.php";
$sql="SELECT * FROM equipment WHERE eq_type = 'che'";
$query=mysql_query($sql);
if(mysql_num_rows($query)==0){
?>
<tr align="center">
	<td colspan="11">ไม่มีอุปกรณ์ใดเลย </td>
</tr>
<? }else{$i=1; 
while($data=mysql_fetch_assoc($query)) {
?>

<tr align="center">
	<td><?=$i++?></td>
	<td><?=$data[eq_code]?></td>
	<td align="left" style="padding-left:5px;"><?=$data[eq_name]?></td>
	<td><?=$data[eq_amount]?></td>
	<td><?=$data[eq_total]?></td>
	<td><?=$data[eq_damage]?></td>
	<td><?=$data[eq_counter]?></td>
	<td><?=$data[eq_danger]?></td>
	<td><a href="detail_equip.php?id=<?=$data[eq_id]?>&to=equip_che.php" title="ดูข้อมูลอย่างละเอียด"><img src="../img/16.png" width="20" height="20"/></a></td>
	<td><a href="add_equipment.php?act=edit&id=<?=$data[eq_id]?>&to=equip_che.php" title="แก้ไขข้อมูล"><img src="../img/edit.png" width="20" height="20"/></a></td>
	<td><a href="add_equipment.php?act=delete&id=<?=$data[eq_id]?>" title="ลบข้อมูล" onclick="return confirm('ยืนยันการลบ!')"><img src="../img/cancel.png" width="20" height="20"/></a></td>
</tr>
<? 
	} 
} 
?>
</form>
</table>
</body>
</html>