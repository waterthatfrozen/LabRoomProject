<?
include("header.php");
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td>
	<table width="100%" cellpadding="2" cellspacing="2">
	<tr>
		<td valign="top"><br />
		
		<table width="95%" cellpadding="1" cellspacing="1" align="center">
		<tr>
		  <td><br />
		    <form name="input" id="input" action="" method="post">
		      ชุดรายการทดลองในระบบ
              <br />
		    </form>
		    <form name="check1" id="check1" action="" method="post">
		      <table width="80%" border="1" cellpadding="2" cellspacing="2" align="center">
		        <tr>
		          <th width="10%">รหัสการทดลอง</th>
		          <th width="10%">สาขาวิชา</th>
		          <th width="20%">ชื่อการทดลอง</th>
		          <th width="30%">รายการสิ่งของที่ต้องใช้ (จำนวน)</th>
		          <th width="5%">ดู</th>
		          <th width="5%">แก้ไข</th>
		          <th width="5%">ลบ</th>
		          </tr>
		        <?
			$i=1;
			$sql = "SELECT * FROM lab \n";
			$query = mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
			while($lab = mysql_fetch_assoc($query)){
			?>
		        <tr align="center" valign="top">
		          <td><?=$lab[lab_code]?></td>
		          <?
				if($lab[lab_type]=="phy"){
					$type = "ฟิสิกส์";
				}elseif($lab[lab_type]=="che"){
					$type = "เคมี";
				}else{
					$type = "ชีวะ";
				}
				?>
		          <td><?=$type?></td>
		          <td align="left"><?=$lab[lab_name]?></td>
		          <td align="left">
		            <?
				$sql2 = "SELECT * FROM packet_lab WHERE lab_id = '$lab[lab_id]' \n";
				$query2 = mysql_query($sql2)or die("<pre>$sql2</pre>".mysql_error());
				$j=1;
				while($pack = mysql_fetch_assoc($query2)){
					$sql3 = "SELECT * FROM equipment WHERE eq_id = '$pack[eq_id]' \n";
					$query3 = mysql_query($sql3)or die("<pre>$sql3</pre>".mysql_error());
					$eq = mysql_fetch_assoc($query3);
					echo $j.") ".$eq[eq_name]." (".$pack[pack_amount].") <br />";
					$j++;
				}
				?>
		            </td>
		          <td><a href="#"><img src="../img/16.png" width="20" height="20"/></a></td>
		          <td><a href="packet_lab.php?act=edit&id=<?=$data[eq_id]?>"><img src="../img/edit.png" width="20" height="20"/></a></td>
		          <td><a href="packet_lab.php?act=delete&id=<?=$data[eq_id]?>" onclick="return confirm('ยืนยันการลบ!')"><img src="../img/cancel.png" width="20" height="20"/></a></td>
		          </tr>
		        <? 
				$i++;
			}
			
			?>
		        </table>
		      </form>
		    </td>
		  </tr>
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>
