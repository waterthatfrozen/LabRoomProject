<? include "../conn_db.php";
	if($_POST[submit]){
		if($_GET[act]=="edit"){
			$sql2="UPDATE equipment SET eq_name = '$_POST[eq_name]' , eq_amount = '$_POST[eq_amount]' , eq_counter = '$_POST[eq_counter]' , eq_type = '$_POST[eq_type]' , eq_danger = '$_POST[eq_danger]' , eq_detail = '$_POST[eq_detail]' WHERE eq_id = '$_GET[id]'";
			$q2=mysql_query($sql2);
			?>
            <script>
			alert('Edit successfully!');
			history.back();
			history.back();
			</script>
            <?
		}else{
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.:Edit equipment:.</title>
</head>

<body>
<table align="center" border="1px" cellpadding="1" width="100%" cellspacing="1">
<tr>
<td>
<h1 align="center">แก้ไขรายละเอียดของอุปกรณ์</h1>
</td>
</tr>
<tr>
<td>

	<? $sql="SELECT * FROM equipment WHERE eq_id = '$_GET[id]'";
	$query=mysql_query($sql);
	$data=mysql_fetch_assoc($query);
	?>
<form id="equipment" name="equipment" method="post">
  <table align="center" border="1px" cellpadding="1" width="60%" cellspacing="1">
    <tr>
      <td colspan="2" align="center">รายละเอียดของอุปกรณ์ :
        <?=$data[eq_name]?></td>
    </tr>
    <tr>
      <td width="25%">ชื่อวัสดุ-อุปกรณ์</td>
      <td align="left"><input type="text" name="eq_name" id="eq_name" value="<?=$data[eq_name]?>"></td>
    </tr>
    <tr>
      <td>จำนวน</td>
      <td align="left"><input type="text" name="eq_amount" id="eq_amount" value="<?=$data[eq_amount]?>">
        <?=$data1[eq_counter]?></td>
    </tr>
    <tr>
      <td>หน่วย</td>
      <td align="left"><input type="text" name="eq_counter" id="eq_counter" value="<?=$data[eq_counter]?>"></td>
    </tr>
    <tr>
      <td>ประเภท</td>
      <td align="left"><input type="text" name="eq_type" id="eq_type" value="<?=$data[eq_type]?>"></td>
    </tr>
  <td>ความอันตราย</td>
    <td align="left"><input type="text" name="eq_danger" id="eq_danger" value="<?=$data[eq_danger]?>"></td>
  </tr>
  <tr>
    <td>คำอธิบาย</td>
    <td align="left"><textarea name="eq_detail" id="eq_datail"><?=$data[eq_detail]?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input name="submit" type="submit" id="submit" formaction="edit_equip_inform.php?act=<?=$_GET[act]?>&id=<?=$_GET[id]?>"></td>
  </tr>
  </table>
</form>

</td>
</tr>
</table>
</body>
</html>