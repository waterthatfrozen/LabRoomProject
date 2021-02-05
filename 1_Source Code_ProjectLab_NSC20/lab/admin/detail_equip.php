<? include "../conn_db.php";
include "header.php";
echo "<br>";
?>

<? //to call the data
$sql="SELECT * FROM equipment where eq_id = '$_GET[id]'";
$query=mysql_query($sql);
$data=mysql_fetch_assoc($query);
$location=$_GET[to];
?>


<table align="center" width="80%" border="0" cellpadding="5" cellspacing="1" class="form_table">
<tr align="center">
<td colspan="2">
ดูข้อมูลของ : <?=$data[eq_name]?>
</td>
</tr>
<tr align="left">
	<th width="25%" align="right">รหัสอุปกรณ์ :</th>
	<td ><?=$data[eq_code]?></td>
</tr>
<tr align="left">
	<th width="25%" align="right">ชื่อวัสดุ-อุปกรณ์ :</th>
	<td ><?=$data[eq_name]?></td>
</tr>
<tr>
	<th align="right">จำนวน :</th>
	<td align="left"><?=$data[eq_amount]?></td>
</tr>
<tr>
	<th align="right">คงเหลือ :</th>
	<td align="left"><?=$data[eq_total]?></td>
</tr>
<tr>
	<th align="right">จำนวนเสียหาย :</th>
	<td align="left"><?=$data[eq_damage]?></td>
</tr>
<tr>
	<th align="right" valign="top">หน่วย :</th>
	<td align="left"><?=$data[eq_counter]?></td>
</tr>
<tr>
	<th align="right">ประเภท :</th>
	<td align="left"><? if($data[eq_type]=="bio") {echo "อุปกรณ์ชีววิทยา";}elseif($data[eq_type]=="chm") {echo "อุปกรณ์เคมี";}elseif($data[eq_type]=="phy") {echo "อุปกรณ์ฟิสิกส์";}else {echo "สารเคมี";} ?></td>
</tr>
<tr>
	<th align="right">ความอันตราย :</th>
	<td align="left"><? if ($data[eq_danger]==No) {echo "ไม่อันตราย";}else{echo "มี่ความอันตราย";}?></td>
</tr>
<tr>
	<th align="right">คำอธิบาย :</th>
	<td align="left"><?=$data[eq_detail]?></td>
</tr>
<tr>
	<th align="right">&nbsp;</th>
	<td align="left"><a href="add_equipment.php?id=<?=$data[eq_id]?>&act=edit&to=<?=$location?>">แก้ไขข้อมูล</a></td>
</tr>
</table>
</body>
</html>