<?
session_start();
include('../conn_db.php');
require_once('../mpdf/mpdf.php');
ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

</head>

<body>
<?
	$sql="SELECT * FROM booking WHERE b_code = '$_GET[id]'";
	$q=mysql_query($sql);
	$data=mysql_fetch_assoc($q);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td rowspan="3" align="center"><img src="../img/27292854_1163589493776118_444410425_n.png" width="87" height="106" alt=""/></td>
      <td valign="bottom" style="font-size:22px;"><strong>&nbsp;Science Laboratory Management and Assistant System</strong></td>
    </tr>
    <tr>
      <td valign="baseline">&nbsp;&nbsp;&nbsp;ระบบช่วยเหลือนักเรียนและจัดการฐานข้อมูลห้องปฏิบัติการทางวิทยาศาสตร์ </td>
    </tr>
    <tr>
      <td valign="baseline"><strong>&nbsp;&nbsp;&nbsp;&nbsp;โรงเรียนจุฬาภรณราชวิทยาลัย ตรัง <br>
      </strong><span style="font-size:12px">&nbsp;&nbsp;&nbsp;196 ม.4 ถนนตรัง-สิเกา ตำบลบางรัก อำเภอเมือง จังหวัดตรัง 92000</span></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><hr></td>
    </tr>
    <tr>
      <td colspan="2" align="left" style="font-size:24px;">&nbsp;รายงานสรุปการขอยืมอุปกรณ์</td>
    </tr>
    <tr>
      <td colspan="2" align="left">รหัสอ้างอิงที่ <?=$_GET[id]?></td>
    </tr>
    <tr>
      <td colspan="2" align="left"  style="font-size:3px;">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left"><strong>ยืนคำร้องขอยืมอุปกรณ์ในระบบเมื่อวันที่&nbsp;</strong><?=$data[b_date]?></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><strong>รับอุปกรณ์แล้วเมื่อ</strong>&nbsp;<?=$data[recive_date]?></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><strong>คืนอุปกรณ์แล้ววันที่</strong>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left"><strong>ผู้ยื่นคำร้อง</strong>&nbsp;
      <?
	$sql2="SELECT * FROM student WHERE std_id = '$data[std_id]'";
	$q2=mysql_query($sql2);
	$name=mysql_fetch_assoc($q2);
	echo $name[std_name];
?>
      <strong>รหัสผู้ใช้</strong>&nbsp;<?=$data[std_id]?></td>
    </tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="left"><strong>ได้ทำการยืมอุปกรณ์ดังต่อไปนี้</strong></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><table width="100%" border="1" cellspacing="0" cellpadding="8" style="border:1px black groove;">
        <tbody>
          <tr>
            <td width="50" align="center" valign="middle">ที่</td>
            <td width="150" align="center" valign="middle">รหัสอุปกรณ์</td>
            <td width="350" align="center" valign="middle">ชื่ออุปกรณ์</td>
            <td width="150" align="center" valign="middle">จำนวนที่ขอยืม</td>
          </tr>
         <?
         	$sql3="SELECT * FROM booking WHERE b_code = '$_GET[id]'";
			$q3=mysql_query($sql3);
			$i=1;
			while($book=mysql_fetch_assoc($q3)){
		 ?>
           <tr>
             <td><?=$i++?></td>
             <td><?
             	$sql_eq="SELECT * FROM equipment WHERE eq_id = '$book[eq_id]'";
				$q_eq=mysql_query($sql_eq);
				$eq=mysql_fetch_assoc($q_eq);
				echo $eq[eq_code];
			 ?></td>
             <td><?=$eq[eq_name]?></td>
            <td><?=$book[b_amount]?>&nbsp;<?=$eq[eq_counter]?></td>
           </tr>
         <? } ?>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <? 
		 	$sql4="SELECT * FROM booking WHERE b_code = '$_GET[id]' AND b_damage != 0";
			$q4=mysql_query($sql4);
			
		 ?> 
     <tr>
      <td colspan="2" align="left"><strong>และมีรายการอุปกรณ์ที่เสียหายดังต่อไปนี้</strong></td>
    </tr>
    <tr>
      <td colspan="2" align="left"><table width="100%" border="1" cellspacing="0" cellpadding="8" style="border:1px black groove;">
        <tbody>
          <tr>
            <td width="50" align="center" valign="middle">ที่</td>
            <td width="150" align="center" valign="middle">รหัสอุปกรณ์</td>
            <td width="350" align="center" valign="middle">ชื่ออุปกรณ์</td>
            <td width="150" align="center" valign="middle">จำนวนที่ขอยืม</td>
          </tr>
         <?
		 	$j=1;
         		while($data2=mysql_fetch_assoc($q4)){
					$sql5="SELECT * FROM equipment WHERE eq_id = '$data2[eq_id]'";
					$damage=mysql_fetch_assoc(mysql_query($sql5));
		 ?>
          <tr>
            <td><?=$j++?></td>
            <td><?=$damage[eq_code]?></td>
            <td><?=$damage[eq_name]?></td>
            <td><?=$data2[b_amount]?>&nbsp;<?=$damage[eq_counter]?></td>
          </tr>
          <? } ?>
          
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" align="center">ระบบขอยืนยันว่ารายการว่าการยืมคืนอุปกรณ์นี้ได้ดำเนินการเสร็จสิ้นแล้วเมื่อวันที่ <?=$data[send_date2]?></td>
  </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center">ลงชื่อผู้ขอยืมอุปกรณ์&nbsp;&nbsp;&nbsp;......................................................................................</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center">ลงชื่อผู้อนุมัติการยืมอุปกรณ์&nbsp;&nbsp;&nbsp;......................................................................................</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><em>พริ้นรายงานนี้เมื่อวันที่ <?=date('Y-m-d')?></em></td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
    <tr>
    <td>
    </td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>