<?
include("conn_db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LearningPHP</title>

<script type="text/javascript">
function changeFunc() {
	var std_class = document.getElementById("std_class");
	var ValueClass = std_class.options[std_class.selectedIndex].value;
	
	var std_room = document.getElementById("std_room");
	var ValueRoom = std_room.options[std_room.selectedIndex].value;
	//alert(selectedValue);
	location.href = 'JS_ChangeSelect.php?c=' + ValueClass + '&r=' + ValueRoom;
}
</script>
</head>

<body>
<?
$c = $_GET[c];
$r = $_GET[r];
?>
<table align="center" width="60%" border="1">
<tr>
	<td>ระดับชั้น:
	<select name="std_class" id="std_class" style="width:100px;" onchange="changeFunc();">
		<option value="ม.1" <? if($c=="ม.1"){?>selected="selected"<? }?>>ม.1</option>	
		<option value="ม.2" <? if($c=="ม.2"){?>selected="selected"<? }?>>ม.2</option>	
		<option value="ม.3" <? if($c=="ม.3"){?>selected="selected"<? }?>>ม.3</option>	
	</select>
	ห้อง:
	<select name="std_room" id="std_room" style="width:100px;" onchange="changeFunc();">
		<option value="1" <? if($r=="1"){?>selected="selected"<? }?>>1</option>	
		<option value="2" <? if($r=="2"){?>selected="selected"<? }?>>2</option>	
		<option value="3" <? if($r=="3"){?>selected="selected"<? }?>>3</option>	
	</select>
	</td>
</tr>
</tr>
</table>
<br />
<table align="center" width="60%" border="1">
<tr bgcolor="#CCCCCC">
	<td width="20%">No</td>
	<td width="80%">name</td>
</tr>
<?

if(($_GET[c])||($_GET[r])){
	$sql = "SELECT * FROM student WHERE std_class = '$c' AND std_room = '$r' \n";
	$query = mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
}else{
	$sql = "SELECT * FROM student WHERE std_class = 'ม.1' AND std_room = '1' \n";
	$query = mysql_query($sql)or die("<pre>$sql</pre>".mysql_error());
}
$i=1;
while($std = mysql_fetch_assoc($query)){
?>
<tr>
	<td><?=$i?></td>
	<td><?=$std[std_name]?></td>
</tr>
<?
	$i++;
}
?>
</tr>
</table>
</body>
</html>
