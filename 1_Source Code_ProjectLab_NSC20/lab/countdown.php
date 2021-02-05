<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Science Laboratory Assitant and Management System</title>
<link rel="stylesheet" href="css/counter.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/line.css">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link rel="stylesheet" href="css/countdown.css" />
<link rel="stylesheet" href="css/w3.css">

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/counter.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style type="text/css">
body {
	background-image: url(img/bg2.jpg);
}
</style>
</head>

<body>
<div class="navbar" align="right">
	<a href="home.php">Home</a>
	<a href="calculator.php">เครื่องคำนวณความเข้มข้นของสาร</a>
    <a href="counter.php">เครื่องนับจำนวน</a>
    <a href="stopwatch.php">นาฬิกาจับเวลา</a>
	<a href="" title="Under Development #NextVersion">เขียนสรุปผลการทดลอง</a>
    
  <img src="img/header_white.png" width="452" height="63"  /> 
</div>	
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="80">
<tr>
	<td bgcolor="#CC6600">&nbsp;</td>
</tr>
</table><br /><br /><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr align="center">
    <td style="font-family:'Circular'; color:white; font-size:24px;" class="w3-text-white"><a href="stopwatch.php" class="hover_unterline w3-text-white">ไปหน้านาฬิกาจับเวลา</a></td>
  </tr>
  <tr align="center">
    <td style="font-family:'Circular'; color:white; font-size:24px;" class="w3-text-white">&nbsp;</td>
  </tr>
  
</table><div class="container">
	<div id="pm">
		<input type="button" id="plus" value="&#xf0de;">
		<input type="button" id="minus" value="&#xf0dd;">
  </div>
	<p id="result">30</p>
	<p id="sec">sec</p>
	<canvas id="progress" width="200" height="200"></canvas><!-- progress bar -->
</div>
<div class="buttons">
	<input type="button" id="start" value="Start">
	<input type="button" id="stop" value="Stop">
</div>
    <script  src="js/countdown.js"></script>
</body>
</html>
