<?php
include "../conn_db.php";
?>
<script>
var answer = confirm("Erase data?")
if (answer==true) {
    <? $sql="DELETE FROM equipment WHERE eq_id='$_GET[id]'";
	$query=mysql_query($sql);
	?>
	history.back();
}
else {
	do.nothing();
    history.back();
}
</script>
<?
?>