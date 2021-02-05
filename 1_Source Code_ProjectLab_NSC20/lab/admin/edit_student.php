<? include "../conn_db.php";
include "header.php";
echo "&nbsp;";
?>
<? //to call data
 $sql="SELECT * FROM student WHERE std_id='$_GET[id]'";
$query=mysql_query($sql);
$data=mysql_fetch_assoc($query);
?>

<?
//to update
if ($_POST['submit']){
	if ($_GET[act]=="edit") {
	if($_POST[std_grade]<=4&&$_POST[std_grade]>=0){
		$sql1="UPDATE student SET \n";
		$sql1.="std_pass='$_POST[std_pass]',";
		$sql1.="std_name='$_POST[std_name]',";
		$sql1.="std_level='$_POST[std_level]',";
		$sql1.="std_room='$_POST[std_room]',";
		$sql1.="std_line='$_POST[std_line]',";
		$sql1.="std_grade='$_POST[std_grade]',";
		$sql1.="std_email='$_POST[std_email]'";
		$sql1.="WHERE std_id = $_GET[id]";
		$query1=mysql_query($sql1);
		?>
        <script>
alert ("ข้อมูลในระบบถูกแก้ไขแล้ว");
window.location="student.php";
</script>
        <?
	}else{
		?>
        	<script>
			alert('เกรดเฉลี่ยผิดนะครับ');
			history.back();
			</script>
        <?	
	}
}

?> 

<?
}
?>
<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">แก้ไขข้อมูลนักเรียน</td>
</tr>
<tr align="left">
	<th width="25%" align="right">ชื่อนักเรียน :</th>
	<td ><input type="text" name="std_name" id="std_name" value="<?=$data[std_name]?>" class="input" style="width:350px;"></td>
</tr>
<tr>
	<th align="right">ระดับชั้น :</th>
	<td align="left">
    <select name="std_level" id="std_level" class="input" style="width:204px;">
		<option value="1" <? if($data[std_level]=="1"){?> selected="selected"<? }?>>ม.1</option>
		<option value="2" <? if($data[std_level]=="2"){?> selected="selected"<? }?>>ม.2</option>
		<option value="3" <? if($data[std_level]=="3"){?> selected="selected"<? }?>>ม.3</option>
		<option value="4" <? if($data[std_level]=="4"){?> selected="selected"<? }?>>ม.4</option>
        <option value="5" <? if($data[std_level]=="5"){?> selected="selected"<? }?>>ม.5</option>
        <option value="6" <? if($data[std_level]=="6"){?> selected="selected"<? }?>>ม.6</option>
	</select>
    </td>
</tr>
<tr>
	<th align="right">ห้อง :</th>
	<td align="left">
	<select name="std_room" id="std_room" class="input" style="width:204px;">
		<option value="1" <? if($data[std_room]=="1"){?> selected="selected"<? }?>>1</option>
		<option value="2" <? if($data[std_room]=="2"){?> selected="selected"<? }?>>2</option>
		<option value="3" <? if($data[std_room]=="3"){?> selected="selected"<? }?>>3</option>
		<option value="4" <? if($data[std_room]=="4"){?> selected="selected"<? }?>>4</option>
        <option value="5" <? if($data[std_room]=="5"){?> selected="selected"<? }?>>5</option>
        <option value="6" <? if($data[std_room]=="6"){?> selected="selected"<? }?>>6</option>
	</select>
	</td>
</tr>
<tr>
	<th align="right">รหัสผ่าน :</th>
	<td align="left"><input type="password" name="std_pass" value="<?=$data[std_pass]?>" id="std_pass" class="input">
	</td>
</tr>
<tr>
	<th align="right" valign="top">Line ID :</th>
	<td align="left">
    <input type="text" name="std_line" id="std_line" value="<?=$data[std_line]?>" class="input">
    </td>
</tr>
<tr>
  <th align="right">E-mail :</th>
  <td align="left"><input type="text" name="std_email" id="std_email" class="input" value="<?=$data[std_email]?>"></td>
</tr>
<tr>
  <th align="right">เกรดเฉลี่ย :</th>
  <td align="left"><input type="text" name="std_grade" id="std_grade" class="input" value="<?=$data[std_grade]?>" /></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><input name="submit" type="submit" id="submit" value="Submit">
    </td>
</tr>
</table>
</form>
</body>
</html>