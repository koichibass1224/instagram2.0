<?php
$email = $_POST["email"];
$pass = $_POST["pass"];
$date = date("Y/m/d H:i:s");

$file = fopen("data/data.txt","a");//file open
  fwrite($file,$date." ".$email."".$pass."\n");//file write
  fclose($file);//file close

//header("Location: read.php");
header("Location: contents/contents.php");//re-direct
exit();

?>
<!--
<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>e-mail/pass : confirmed</h1>
<h2>data/data.txt （e-mail/password）</h2>
<h2>data/data.txt2 （communication）</h2>

<ul>
<li><a href="index.php">戻る</a></li>
</ul>
</body>
</html>-->