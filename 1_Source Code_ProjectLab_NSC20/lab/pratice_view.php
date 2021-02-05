<?
	include('conn_db.php');
	$sql="SELECT * FROM pratice ORDER BY img_id";
	$q=mysql_query($sql);
	if($_GET['act']=="delete"){
		$sql2="DELETE FROM pratice WHERE img_id = '$_GET[id]'";
		$q2=mysql_query($sql2);
		if(mysql_num_rows($q)!=0){
		header("Refresh:0");
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>praticing</title>
</head>

<body>
<p><a href="pratice.php">ทดลองอัพโหลดรูป</a> / แสดงรูปภาพ</p>
<table width="100%" border="3" cellspacing="3" cellpadding="0">
  <tr>
    <td>ที่</td>
    <td>ชื่อรูปภาพ</td>
    <td>ตำแหน่งรูป</td>
    <td>รูปฉบับเต็ม</td>
    <td>ลบ</td>
  </tr>
  <?
  	$row=mysql_num_rows($q);
	if($row==0){
  ?>
  <tr>
    <td colspan="5" align="center">ไม่มีรูป</td>
  </tr>
  <?
	}else{ $i=1;
	while($data=mysql_fetch_assoc($q)){
	?>
  <tr>
    <td><?=$i++?></td>
    <td><?=$data[img_name]?></td>
    <td><?=$data[img_path]?></td>
    <td align="center"><img src="<?=$data[img_path]?>" width="300" /></td>
    <td><a href="pratice_view.php?act=delete&id=<?=$data[img_id]?>" onclick="return confirm('DELETE?')">ลบ</a></td>
  </tr>
  <? 	}
  } ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>