<?
	include('conn_db.php');
	if($_POST['submit']){
		$sql="INSERT INTO pratice SET img_name = '$_POST[img_name]'";
		$q=mysql_query($sql);
		$id=mysql_insert_id();
		if($_FILES['fileupload']['name']){
			$path=$_FILES['fileupload']['name'];
			$ext=pathinfo($path,PATHINFO_EXTENSION);
			$newfile="pratice_upload/".$id.".".$ext;
			if(move_uploaded_file($_FILES['fileupload']['tmp_name'],$newfile)){
				$sql="UPDATE pratice SET img_path = '$newfile' WHERE img_id = '$id'";
				$q=mysql_query($sql);
				?>
                <script>
					alert('complete');
				</script>
                <?
			}
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
<p>ทดลองอัพโหลดรูป </p>
<form action="pratice.php" method="post" enctype="multipart/form-data" name="upload_img" id="upload_img">
  <p>ชื่อรูปภาพ &nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="img_name" type="text" id="img_name" maxlength="50" required="required"/>
  </p>
  <p>
    รูปภาพที่ต้องการ &nbsp;
<input type="file" name="fileupload" id="fileupload"  required="required"/>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="submit" />
  </p>
  <p><a href="pratice_view.php">View Image/Picture</a></p>
</form>
<p>&nbsp;</p>
</body>
</html>