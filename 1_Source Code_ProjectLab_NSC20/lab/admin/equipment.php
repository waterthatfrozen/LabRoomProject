<? include "../conn_db.php";
?>
<!DOCTYPE>
<html>
<head>
<title>.:substance:.</title>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?
$sql="SELECT * FROM equipment ORDER BY eq_id";
$query=mysql_query($sql);
?>
<table align="center" width="100%" cellpadding="5" border="1px">
<tr align="center" valign="middle">
<td align="center" valign="middle">
<h1>วัสดุอุปกรณ์ทั้งหมด</h1>
<table align="center" border="1px" width="60%" cellpadding="1" cellspacing="1">
<tr>
  <td colspan="7" align="right"><a href="edit_equip_inform.php?act=add">เพิ่มวัสดุอุปกรณ์</a></td>
  </tr>
<tr>
<td align="center" width="8%">ที่</td>
<td align="center">ชื่อวัสดุอุปกรณ์</td>
<td align="center" width="8%">จำนวน</td>
<td align="center" width="10%">หน่วย</td>
<td align="center" width="8%">ประเภท</td>
<td align="center" width="8%">แก้ไข</td>
<td align="center" width="8%">ลบ</td>
</tr>
<?
$i=1;
while($q=mysql_fetch_assoc($query)){
?>
<tr>
<td align="center"><?=$i?></td>
<td align="center"><?=$q[eq_name]?></td>
<td align="center"><?=$q[eq_amount]?></td>
<td align="center"><?=$q[eq_counter]?></td>
<td align="center"><?=$q[eq_type]?></td>
<td align="center"><a href="edit_equip_inform.php?id=<?=$q[eq_id]?>&act=edit">แก้ไข</a></td>
<td align="center"><a href="">ลบ</a></td>
</tr>
<? 
	$i++;
}
?>
</table>
</td>
</tr>
</table>
</body>
</html>
