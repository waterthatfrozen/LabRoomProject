<? include "../conn_db.php";
include "header.php";
?><br>
<table align="center" width="80%" border="0" cellpadding="5" cellspacing="1" class="form_table">
<tr align="center">
	<td colspan="4" align="center">รายชื่อเจ้าหน้าที่และครูผู้สอน</td>
    <td colspan="3" align="center"><a href="add_officer.php?act=add">เพิ่มเจ้าหน้าที่</a></td>
</tr>
<tr>
	<th width="5%">ที่</th>
	<th width="7%">รหัสประจำตัว</th>
	<th width="20%">ชื่อ-นามสกุล
	
    <th width="7%">อีเมลล์</th>
    <th width="4%">ดู</th>
	<th width="4%">แก้ไข</th>
	<th width="4%">ลบ</th>
</tr>
<? include "../conn_db.php";
$sql="SELECT * FROM labboy ORDER BY lb_id";
$query=mysql_query($sql);

if(mysql_num_rows($query)==0){
?>
<tr align="center">
	<td colspan="10">ไม่มีรายการ</td>
</tr>
<? }else{$i=1; 
while($data=mysql_fetch_assoc($query)) {
?>

<tr align="center">
	<td><?=$i++?></td>
	<td><?=$data[lb_id]?></td>
	<td align="left" style="padding-left:5px;"><?=$data[lb_name]?></td>
    <td align="left" style="padding-left:5px;"><?=$data[lb_email]?></td>
    <td><a href="add_officer.php?id=<?=$data[lb_id]?>&act=view"  title="ดูข้อมูลอย่างละเอียด"><img src="../img/16.png" width="20" height="20"/></a></td>
    <td><a href="add_officer.php?act=edit&id=<?=$data[lb_id]?>&to=officer.php" title="แก้ไขข้อมูล"><img src="../img/edit.png" width="20" height="20"/></a></td>
	<td><a href="add_officer.php?act=delete&id=<?=$data[lb_id]?>&to=officer.php" title="ลบข้อมูล" onclick="return confirm('ยืนยันการลบ!')"><img src="../img/cancel.png" width="20" height="20"/></a></td>
	
</tr>
<? 
	} 
} 
?>
</form>
</table>
</body>
</html>