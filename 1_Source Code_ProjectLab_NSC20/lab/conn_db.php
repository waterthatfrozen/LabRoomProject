<?
$h="localhost";
$u="root";
$p="12345678";
$c=mysql_connect($h,$u,$p);
if(!$c){
	echo "Can't Connect to DATABASE";
	exit();
}
$char="SET names 'UTF-8'";
mysql_db_query(lab,$char);
?>