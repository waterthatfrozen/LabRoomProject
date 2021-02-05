<? include "../conn_db.php";
include "header.php";
$sql="SELECT * FROM labroom WHERE lab_id = '$_GET[id]'";
$query=mysql_query($sql);
$data=mysql_fetch_assoc($query);
if ($_GET[act]=="edit") {
	if ($_POST['submit']) {
		$sql1="UPDATE labroom SET \n";	
		$sql1.="lab_code = '$_POST[no]' , ";
		$sql1.="lab_name = '$_POST[name]' , ";
		$sql1.="lab_building = '$_POST[b]' , ";
		$sql1.="lab_floor = '$_POST[fl]' , ";
		$sql1.="lab_type = '$_POST[type]'  ";
		$sql1.="WHERE lab_id= '$_GET[id]'";
		$query1=mysql_query($sql1);
		?>
        <script>
        alert ("ข้อมูลในระบบได้รับการแก้ไขแล้ว");
		window.location="labroom.php";
        </script>
        <?
	}
?>
<br>
<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">แก้ไขข้อมูลห้องวิทยาศาสตร์
    </td>
</tr>
<tr align="left">
	<th width="25%" align="right">หมายเลขห้องวิทยาศาสตร์ :</th>
	<td ><input name="no" type="text" required class="input" id="no" style="width:200px;" maxlength="4" value="<?=$data[lab_code]?>"></td>
</tr>
<tr>
	<th align="right">ฃื่อห้อง :</th>
	<td align="left"><input name="name" type="text" required class="input" id="name" style="width:350px;" value="<?=$data[lab_name]?>"></td>
</tr>
<tr>
	<th align="right">อาคารเรียน :</th>
	<td align="left"><input name="b" type="text" required class="input" id="b" style="width:350px;" value="<?=$data[lab_building]?>"></td>
</tr>
<tr>
	<th align="right">ชั้น :</th>
	<td align="left">
    <select name="fl" required  class="input" id="fl" style="width:150px;">
		<option value="1" <? if($data[lab_floor]=="1"){?> selected="selected"<? }?>>ชั้น 1</option>
		<option value="2" <? if($data[lab_floor]=="2"){?> selected="selected"<? }?>>ชั้น 2</option>
        <option value="3" <? if($data[lab_floor]=="3"){?> selected="selected"<? }?>>ชั้น 3</option>
	</select>
    </td>
</tr>
<tr>
	<th align="right">ประเภท :</th>
	<td align="left">
	<select name="type" required  class="input" id="type" style="width:150px;" >
		<option value="all" <? if($data[lab_type]=="all"){?> selected="selected"<? }?>>ทั่วไป</option>
		<option value="chm" <? if($data[lab_type]=="chm"){?> selected="selected"<? }?>>เคมี</option>
		<option value="phy" <? if($data[lab_type]=="phy"){?> selected="selected"<? }?>>ฟิสิกส์</option>
		<option value="bio" <? if($data[lab_type]=="bio"){?> selected="selected"<? }?>>ชีววิทยา</option>
	</select>
	</td>
</tr>


<tr>
	<th>&nbsp;</th>
	<td><input name="submit" type="submit" id="submit" value="Submit">
	</td>
</tr>
</table>
</form>
<? 	
}elseif ($_GET[act]=="erase") {
$sql2="DELETE FROM labroom WHERE lab_id ='$_GET[id]'";
$query2=mysql_query($sql2);
?>
	<script>
	alert('DELETE successfully');
	window.location="labroom.php";
	</script>
<?
}elseif($_GET[act]=="add"){ 
	if($_POST['submit']){
		$sql1="INSERT INTO labroom SET \n";	
		$sql1.="lab_code = '$_POST[no]' , ";
		$sql1.="lab_name = '$_POST[name]' , ";
		$sql1.="lab_building = '$_POST[b]' , ";
		$sql1.="lab_floor = '$_POST[fl]' , ";
		$sql1.="lab_type = '$_POST[type]'  ";
		$query1=mysql_query($sql1);
		?>
        <script>
        alert ("ข้อมูลในระบบได้รับการเพิ่มแล้ว");
		window.location="labroom.php";
        </script>
        <?
	}
?>
	<br>
<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">เพิ่มข้อมูลห้องวิทยาศาสตร์
    </td>
</tr>
<tr align="left">
	<th width="25%" align="right">หมายเลขห้องวิทยาศาสตร์ :</th>
	<td ><input name="no" type="text" required class="input" id="no" style="width:200px;" maxlength="4" ></td>
</tr>
<tr>
	<th align="right">ฃื่อห้อง :</th>
	<td align="left"><input name="name" type="text" required class="input" id="name" style="width:350px;"></td>
</tr>
<tr>
	<th align="right">อาคารเรียน :</th>
	<td align="left"><input name="b" type="text" required class="input" id="b" style="width:350px;"></td>
</tr>
<tr>
	<th align="right">ชั้น :</th>
	<td align="left">
    <select name="fl" required  class="input" id="fl" style="width:150px;">
		<option value="1">ชั้น 1</option>
		<option value="2">ชั้น 2</option>
        <option value="3">ชั้น 3</option>
	</select>
    </td>
</tr>
<tr>
	<th align="right">ประเภท :</th>
	<td align="left">
	<select name="type" required  class="input" id="type" style="width:150px;" >
		<option value="all" >ทั่วไป</option>
		<option value="chm" >เคมี</option>
		<option value="phy" >ฟิสิกส์</option>
		<option value="bio" >ชีววิทยา</option>
	</select>
	</td>
</tr>


<tr>
	<th>&nbsp;</th>
	<td><input name="submit" type="submit" id="submit" value="Submit">
	</td>
</tr>
</table>
</form>
<?
}
?>
</body>
</html>