
<? 
include ("header.php");
if($_GET[act]=="delete"){
	$sql = "DELETE FROM equipment WHERE eq_id = '$_GET[id]' \n";
	$query=mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
	?>
		<script> 
			history.back();
		</script>
	<?
}
if ($_POST['submit']){
	
	if($_GET[act]=="edit"){
		$sql  ="UPDATE equipment SET \n";
		$sql .="eq_name = '$_POST[eq_name]' ,";
		$sql .="eq_amount = '$_POST[eq_amount]' ,";
		$sql .="eq_total = '$_POST[eq_amount]' ,";
		$sql .="eq_counter = '$_POST[eq_counter]' ,";
		$sql .="eq_danger = '$_POST[danger]' ,";
		$sql .="eq_detail = '$_POST[eq_detail]' ";
		$sql .="WHERE eq_id = '$_GET[id]' ";
		$query=mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
		?> <script> 
			alert ("บันทึกข้อมูลแล้ว!!"); 
			window.location="<?=$_GET[to]?>";
		</script>
		<?
	}else{
		$sql2 = "SELECT * FROM equipment WHERE eq_type = 'chm' \n";
		$query2 = mysql_query($sql2)or die("<pre>$sql2</pre>".mysql_error());
		$r2 = mysql_num_rows($query2);
		$p2 = mysql_fetch_assoc($query2);
		
		$sql3 = "SELECT * FROM equipment WHERE eq_type = 'phy' \n";
		$query3 = mysql_query($sql3)or die("<pre>$sql3</pre>".mysql_error());
		$r3 = mysql_num_rows($query3);
		$p3 = mysql_fetch_assoc($query3);
		
		$sql4 = "SELECT * FROM equipment WHERE eq_type = 'bio' \n";
		$query4 = mysql_query($sql4)or die("<pre>$sql4</pre>".mysql_error());
		$r4 = mysql_num_rows($query4);
		$p4 = mysql_fetch_assoc($query4);
		
		if($_POST[eq_type]=="che"){
			$pre = "CHE";
			
			$sql6 = "SELECT * FROM equipment WHERE eq_type = 'che' ORDER BY eq_id DESC LIMIT 0, 1 \n";
			$query6 = mysql_query($sql6)or die("<pre>$sql6</pre>".mysql_error());
			$r1 = mysql_num_rows($query6);
			$p1 = mysql_fetch_assoc($query6);
			
			if($r1 == 0){
				$x = $pre."001";
			}else{
				$s = substr($p1[eq_code],-3)+1;
				$x = $pre.sprintf("%03d",$s);
			}
		}elseif($_POST[eq_type]=="chm"){
			$pre = "CHM";
			
			$sql7 = "SELECT * FROM equipment WHERE eq_type = 'chm' ORDER BY eq_id DESC LIMIT 0, 1 \n";
			$query7 = mysql_query($sql7)or die("<pre>$sql7</pre>".mysql_error());
			$r2 = mysql_num_rows($query7);
			$p2 = mysql_fetch_assoc($query7);
			
			if($r2 == 0){
				$x = $pre."001";
			}else{
				$s = substr($p2[eq_code],-3)+1;
				$x = $pre.sprintf("%03d",$s);
			}
		}elseif($_POST[eq_type]=="phy"){
			$pre = "PHY";
			
			$sql8 = "SELECT * FROM equipment WHERE eq_type = 'phy' ORDER BY eq_id DESC LIMIT 0, 1 \n";
			$query8 = mysql_query($sql8)or die("<pre>$sql8</pre>".mysql_error());
			$r3 = mysql_num_rows($query8);
			$p3 = mysql_fetch_assoc($query8);
			
			if($r3 == 0){
				$x = $pre."001";
			}else{
				$s = substr($p3[eq_code],-3)+1;
				$x = $pre.sprintf("%03d",$s);
			}
		}else{
			$pre = "BIO";
			
			$sql9 = "SELECT * FROM equipment WHERE eq_type = 'bio' ORDER BY eq_id DESC LIMIT 0, 1 \n";
			$query9 = mysql_query($sql9)or die("<pre>$sql9</pre>".mysql_error());
			$r4 = mysql_num_rows($query9);
			$p4 = mysql_fetch_assoc($query9);
			
			if($r4 == 0){
				$x = $pre."001";
			}else{
				$s = substr($p4[eq_code],-3)+1;
				$x = $pre.sprintf("%03d",$s);
			}
		}
		//echo $x;
	
		$sql  ="INSERT INTO equipment SET \n";
		$sql .="eq_code ='$x' ,";
		$sql .="eq_name = '$_POST[eq_name]' ,";
		$sql .="eq_amount = '$_POST[eq_amount]' ,";
		$sql .="eq_total = '$_POST[eq_amount]' ,";
		$sql .="eq_counter = '$_POST[eq_counter]' ,";
		$sql .="eq_type = '$_POST[eq_type]' ,";
		$sql .="eq_danger = '$_POST[danger]' ,";
		$sql .="eq_detail = '$_POST[eq_detail]' ";
		$query=mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
		?> <script> alert ("วัสดุอุปกรณ์ถูกเพิ่มเข้าสู่ระบบแล้ว"); 
		window.location="<?=$_GET[to]?>";
		</script>
		<?
	
	}
	
	
}
?><br />

<?
if($_GET[act]=="edit"){
	$sql = "SELECT * FROM equipment WHERE eq_id = '$_GET[id]' \n";
	$query = mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
	$r = mysql_num_rows($query);
	$edit = mysql_fetch_assoc($query);
	
}
?>
<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">
	<? if ($_GET[act]=="edit") {
		echo "แก้ไขข้อมูลอุปกรณ์";
	}else {
		echo "เพิ่มอุปกรณ์";
	}
    ?>
    </td>
</tr>
<tr align="left">
	<th width="25%" align="right">ชื่อวัสดุ-อุปกรณ์ :</th>
	<td ><input name="eq_name" type="text" required class="input" id="eq_name" style="width:200px;" value="<?=$edit[eq_name]?>"></td>
</tr>
<tr>
	<th align="right">จำนวน :</th>
	<td align="left"><input name="eq_amount" type="number" required class="input" id="eq_amount" style="width:100px;" value="<?=$edit[eq_amount]?>"></td>
</tr>
<tr>
	<th align="right">หน่วย :</th>
	<td align="left"><input name="eq_counter" type="text" required class="input" id="eq_counter" style="width:100px;" value="<?=$edit[eq_counter]?>"></td>
</tr>
<tr>
	<th align="right">ประเภท :</th>
	<td align="left">
	<select name="eq_type" required  class="input" id="eq_type" style="width:204px;" <? if($_GET[act]=="edit"){?><? }?>>
		<option value="che" <? if($edit[eq_type]=="che"){?> selected="selected"<? }?>>สารเคมี</option>
		<option value="chm" <? if($edit[eq_type]=="chm"){?> selected="selected"<? }?>>อุปกรณ์เคมี</option>
		<option value="phy" <? if($edit[eq_type]=="phy"){?> selected="selected"<? }?>>อุปกรณ์ฟิสิกส์</option>
		<option value="bio" <? if($edit[eq_type]=="bio"){?> selected="selected"<? }?>>อุปกรณ์ชีวะ</option>
	</select>
	</td>
</tr>
<tr>
	<th align="right">ความอันตราย :</th>
	<td align="left"><input type="radio" name="danger" id="1" value="No" <? if($edit[eq_danger]=="No"){?> checked="checked"<? }?>checked="checked" /> NO
					 <input type="radio" name="danger" id="2" value="Yes" <? if($edit[eq_danger]=="Yes"){?>checked="checked"<? }?> /> Yes
	</td>
</tr>
<tr>
	<th align="right" valign="top">คำอธิบาย :</th>
	<td align="left"><textarea name="eq_detail" rows="5" required  class="input" id="eq_detail" style="width:400px;"><?=$edit[eq_detail]?></textarea></td>
</tr>
<tr>
	<th>&nbsp;</th>
	<td><input name="submit" type="submit" id="submit" value="Submit">
	</td>
</tr>
</table>
</form>

<? 
include ("footer.php");
?>
