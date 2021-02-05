<? include "../conn_db.php";
include "header.php";
?><br>

<? // to call data
$sql="SELECT * FROM student WHERE std_id = '$_GET[id]'";
$query=mysql_query($sql);
$data=mysql_fetch_assoc($query);
$id=$_GET[id]
?>

<table align="center" width="80%" border="0" cellpadding="5" cellspacing="1" class="form_table">
<tr align="center">
<td colspan="2">
ดูข้อมูลของ : <?=$data[std_name]?>
</td>
</tr>
<tr align="left">
	<th width="25%" align="right">รหัสนักเรียน :</th>
	<td ><?=$data[std_id]?></td>
</tr>
<tr align="left">
	<th width="25%" align="right">ชื่อ-นามสกุล :</th>
	<td ><?=$data[std_name]?></td>
</tr>
<tr>
	<th align="right">ระดับชั้น :</th>
	<td align="left"><?=$data[std_level]?></td>
</tr>
<tr>
	<th align="right">ห้อง :</th>
	<td align="left"><?=$data[std_room]?></td>
</tr>
<tr>
	<th align="right">รหัสผ่าน :</th>
	<td align="left"><?=$data[std_pass]?></td>
</tr>
<tr>
	<th align="right" valign="top">Line ID :</th>
	<td align="left"><?=$data[std_line]?></td>
</tr>
<tr>
	<th align="right">E-mail :</th>
	<td align="left"><?=$data[std_email]?></td>
</tr>
<tr>
  <th align="right">เกรดเฉลี่ย :</th>
  <td align="left"><?=$data[std_grade]?></td>
</tr>
<tr>
	<th align="right">&nbsp;</th>
	<td align="left"><a href="edit_student.php?id=<?=$id?>&act=edit">แก้ไขข้อมูลนักเรียน</a></td>
</tr>
</table>
</body>
</html>