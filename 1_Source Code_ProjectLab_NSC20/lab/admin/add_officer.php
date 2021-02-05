<? include "../conn_db.php";
include "header.php";
$sql1="SELECT * FROM labboy WHERE lb_id = '$_GET[id]'";
$query1=mysql_query($sql1);
$data=mysql_fetch_assoc($query1);
$id=$_GET[id];
?>

<? //in case of act=edit
if ($_GET[act]=="edit") {
	if ($_POST['submit']) {
	if ($_POST[pass1]==$data[lb_pass]) {
		$sql="UPDATE labboy SET \n";
		$sql.="lb_id = '$_POST[lb_id]' ,";
		$sql.="lb_pass = '$_POST[pass2]' ,";
		$sql.="lb_name = '$_POST[lb_name]' ,";
		$sql.="lb_mobile = '$_POST[lb_mobile]' ,";
		$sql.="lb_email = '$_POST[lb_email]' ";
		$sql.="WHERE lb_id='$_GET[id]' ";
		$query=mysql_query($sql);
	}else{
	?> <script>alert ("Wrong Password");</script>
	<?
	}
	}
	?> 
	<br>
	<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">
    แก้ไขข้อมูลเจ้าหน้าที่และครูผู้สอน
    </td>
</tr>
<tr align="left">
	<th width="25%" align="right">รหัสประจำตัวเจ้าหน้าที่ :</th>
	<td ><input name="lb_id" type="text" required class="input" value="<?=$data[lb_id]?>" id="lb_id" style="width:200px;"></td>
</tr>
<tr>
	<th align="right">ชื่อ-นามสกุล :</th>
	<td align="left"><input name="lb_name" type="text" required class="input" value="<?=$data[lb_name]?>" id="lb_name" style="width:350px;" ></td>
</tr>
<tr>
	<th align="right">เบอร์โทรศัพท์ :</th>
	<td align="left"><input name="lb_mobile" type="text" required class="input" id="lb_mobile" style="width:200px;" value= <?=$data[lb_mobile]?>></td>
</tr>
<tr>
	<th align="right">E-mail :</th>
	<td align="left"><input name="lb_email" type="text" required class="input" id="lb_email" style="width:300px;" value="<?=$data[lb_email]?>"></td>
</tr>
<tr>
	<th align="right"> Password เดิม :</th>
	<td align="left"><input name="pass1" type="password" required class="input" id="pass1" style="width:200px;" value="<?=$data[lb_pass]?>"></td>
</tr>
<tr>
	<th align="right" valign="top">Password ใหม่:</th>
	<td align="left"><input name="pass2" type="password" required class="input" id="pass2" style="width:200px;" ></td>
</tr>
<tr>
	<th>&nbsp;</th>
	<td><input name="submit" type="submit" id="submit" value="Submit">
	</td>
</tr>
</table>
</form>
<?
} else if ($_GET[act]=="view") {
	if ($_POST['submit']) {
	if ($_POST[pass1]==$_POST[pass2]) {
		$sql="INSERT INTO labboy SET \n";
		$sql.="lb_id = '$_POST[lb_id]' ,";
		$sql.="lb_pass = '$_POST[pass2]' ,";
		$sql.="lb_name = '$_POST[lb_name]' ,";
		$sql.="lb_mobile = '$_POST[lb_mobile]' ,";
		$sql.="lb_email = '$_POST[lb_email]' ";
		$query=mysql_query($sql);
	}else{
	?> <script>alert ("Wrong Password");</script>
	<?
	}
	}
	?> 
	<br>
	<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">
    ดูข้อมูลของ <?=$data[lb_name]?>
    </td>
</tr>
<tr align="left">
	<th width="25%" align="right">รหัสประจำตัวเจ้าหน้าที่ :</th>
	<td ><?=$data[lb_id]?></td>
</tr>
<tr>
	<th align="right">ชื่อ-นามสกุล :</th>
	<td align="left"><?=$data[lb_name]?></td>
</tr>
<tr>
	<th align="right">เบอร์โทรศัพท์ :</th>
	<td align="left"><?=$data[lb_mobile]?></td>
</tr>
<tr>
	<th align="right">E-mail :</th>
	<td align="left"><?=$data[lb_email]?></td>
</tr>
<tr>
	<th>&nbsp;</th>
	<td><a href="add_officer.php?id=<?=$id?>&act=edit">แก้ไขข้อมูล</a>
	</td>
</tr>
</table>
</form>
<?
}
 //in case of delete
else if ($_GET[act]=="delete") {
$sql2="DELETE FROM labboy WHERE lb_id = '$_GET[id]'";	
$query2=mysql_query($sql2);
?>
<script> 
alert ("ข้อมูลได้ถูกลบออกจากระบบแล้ว");
window.location="officer.php";
</script>
<?
}
//in case of add
else if ($_GET[act]=="add") {
	if ($_POST['submit']) {
	
		$sql="INSERT INTO labboy SET \n";
		$sql.="lb_id = '$_POST[lb_id]' ,";
		$sql.="lb_pass = '$_POST[pass2]' ,";
		$sql.="lb_name = '$_POST[lb_name]' ,";
		$sql.="lb_mobile = '$_POST[lb_mobile]' ,";
		$sql.="lb_email = '$_POST[lb_email]' ";
		$query=mysql_query($sql);
		?>
        <script>
        alert ("ข้อมูลได้ถูกเพิ่มลงในระบบแล้ว");
		window.location="officer.php";
        </script>
        <?
	}
?>
	<br>
	<form name="form_insert" id="form_insert" action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="60%" border="0" cellpadding="3" cellspacing="1" class="form_table">
<tr>
	<td colspan="2" align="center">
    เพิ่มข้อมูลเจ้าหน้าที่และครูผู้สอน
    </td>
</tr>
<tr align="left">
	<th width="25%" align="right">รหัสประจำตัวเจ้าหน้าที่ :</th>
	<td ><input name="lb_id" type="text" required class="input" id="lb_id" maxlength="4" style="width:200px;"></td>
</tr>
<tr>
	<th align="right">ชื่อ-นามสกุล :</th>
	<td align="left"><input name="lb_name" type="text" required class="input" id="lb_name" style="width:350px;" ></td>
</tr>
<tr>
	<th align="right">เบอร์โทรศัพท์ :</th>
	<td align="left"><input name="lb_mobile" type="text" required class="input" id="lb_mobile" maxlength="10" style="width:200px;"></td>
</tr>
<tr>
	<th align="right">E-mail :</th>
	<td align="left"><input name="lb_email" type="text" required class="input" id="lb_email" style="width:300px;"></td>
</tr>
<tr>
	<th align="right" valign="top">Password :</th>
	<td align="left"><input name="pass2" type="password" required class="input" id="pass2" style="width:200px;" ></td>
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