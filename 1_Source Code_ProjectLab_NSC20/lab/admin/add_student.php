<? include "../conn_db.php";
include "header.php";
?>
<? echo "&nbsp;";
?>

<? if ($_POST['submit']) {
	if($_POST[std_grade]<=4&&$_POST[std_grade]>=0){
	$sql="INSERT INTO student SET \n";	
	$sql.="std_id = '$_POST[std_id]' , ";
	$sql.="std_name = '$_POST[std_name]' ,";
	$sql.="std_level = '$_POST[std_level]' ,";
	$sql.="std_room = '$_POST[std_room]' ,";
	$sql.="std_line = '$_POST[std_line]' ,";
	$sql.="std_pass = '$_POST[std_pass]' ,";
	$sql.="std_grade = '$_POST[std_grade]' ,";
	$sql.="std_email = '$_POST[std_email]'";
	$query=mysql_query($sql);
	?> <script> alert ("ระบบได้ทำการเพิ่มนักเรียนแล้ว");
	history.back();
	history.back();
    </script>
    <?
	}else{
	?> <script> alert ("เกรดเฉลี่ยผิดนะครับ");
				history.back();

    </script>
    <?
	}
}
?>

<? // this is for erase data
if ($_GET[act]=="delete") {
$sql1="DELETE FROM student WHERE std_id='$_GET[id]'";
$query1=mysql_query($sql1);
?>
	<script>
	alert('DELETE successfully');
	window.location="student.php";
	</script>
<?
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/menu.css">
<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">เพิ่มนักเรียน</td>
</tr>
<tr align="left">
  <th width="25%" align="right">เลขประจำตัว :</th>
  <td ><input name="std_id" type="text" required class="input" id="std_id" style="width:90px;" maxlength="5"></td>
</tr>
<tr>
  <th align="right">ชื่อนักเรียน :</th>
  <td align="left"><input name="std_name" type="text" required class="input" id="std_name" style="width:300px;"></td>
</tr>
<tr>
  <th align="right">ระดับชั้น :</th>
  <td align="left">
    <select name="std_level" required class="input" id="std_level" style="width:100px;">
      <option value="1">ม.1</option>
      <option value="2">ม.2</option>
      <option value="3">ม.3</option>
      <option value="4">ม.4</option>
      <option value="5">ม.5</option>
      <option value="6">ม.6</option>
      </select>
    </td>
</tr>
<tr>
	<th align="right">ห้อง :</th>
	<td align="left">
	<select name="std_room" required class="input" id="std_room" style="width:100px;">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
	</select>
	</td>
</tr>
<tr>
	<th align="right">Password :</th>
	<td align="left"><input name="std_pass" type="password" required class="input" id="std_pass">
	</td>
</tr>
<tr>
	<th align="right">Line ID :</th>
	<td align="left"><input name="std_line" type="text" required="required" class="input" id="std_line">
	</td>
</tr>
<tr>
	<th align="right" valign="top">E-mail :</th>
	<td align="left"><input name="std_email" type="text" required="required" class="input" id="std_email"></td>
</tr>
<tr>
  <th align="right" valign="top">เกรดเฉลี่ย :</th>
  <td align="left"><input name="std_grade" type="text" required="required" class="input" id="std_grade" /></td>
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