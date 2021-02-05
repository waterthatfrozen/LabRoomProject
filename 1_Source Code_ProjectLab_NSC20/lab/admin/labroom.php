<? include "../conn_db.php";
include "header.php";
?>
<table width="1200" cellpadding="2" cellspacing="2" align="center" class="form_table borrowfont">
            <tr align="center">
            <td colspan="7"><h3>รายการห้องวิทยาศาสตร์</h3></td>
            <td colspan="6"><a href="edit_labroom.php?act=add" style="color:#FF663;">เพิ่มห้อง</a></td>
            </tr>
			<tr>
				<th rowspan="2" width="8%">ที่</th>
				<th rowspan="2" width="17%">รหัสห้องวิทยาศาสตร์</th>
				<th rowspan="2" width="20%">ชื่อห้อง</th>
				<th rowspan="2" width="12%">อาคาร</th>
				<th rowspan="2" width="10%">ชั้น</th>
				<th rowspan="2" width="15%">ประเภท</th>
				<th colspan="2">Action</th>
			</tr>
			<tr>
				<th width="9%">แก้ไข</th>
				<th width="9%">ลบ</th>
			</tr>
			<? $sql="SELECT * FROM labroom";
			$query=mysql_query($sql);
			$row=mysql_num_rows($query);
			if ($row==0) {
				?>
				<tr>
                <td colspan="9" align="center">ยังไม่มีรายการห้องวิทยาศาสตร์</td>
                </tr>
				<?
			}
			$i=1;
			while ($data=mysql_fetch_assoc($query)) {
            ?>
			<tr align="center">
				<td><?=$i++?></td>
				<td><?=$data[lab_code]?></td>
				<td align="left" style="padding-left:10px;"><?=$data[lab_name]?></td>
				<td align="center" style="padding-left:10px;"><?=$data[lab_building]?></td>
				<td align="center"><?=$data[lab_floor]?></td>
				<td align="center"><? if ($data[lab_type]==bio) {echo "ชีววิทยา";}elseif ($data[lab_type]==phy) {echo "ฟิสิกส์";}elseif ($data[lab_type]==chm) {echo "เคมี";}else {echo "ทั่วไป";} ?></td>
				<td><a href="edit_labroom.php?id=<?=$data[lab_id]?>&act=edit"><img src="../img/confirm.png" height="22" width="22"/></a></td>
				<td><a href="edit_labroom.php?id=<?=$data[lab_id]?>&act=erase" onClick="return confirm('ยืนยันการลบ!!')"><img src="../img/delete.png" height="22" width="22"/></a></td>
			</tr>
            <? } ?>

			</table>
</body>
</html>