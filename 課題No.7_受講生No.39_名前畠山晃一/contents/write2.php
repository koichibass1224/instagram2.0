<?php
/*speech to textでの文字起こしと翻訳*/
$comment = $_POST["comment"];
$date = date("Y/m/d H:i:s");

$file = fopen("data/data2.txt","a");//file open
  fwrite($file,$date." ____ ".$comment."\n");//file write
  fclose($file);//file close

//text:write：removed time data
$file = fopen("data/data3.txt","a");//file open
fwrite($file,$comment."\n");//file write
fclose($file);//file close

header("Location: contents.php");//re-direct
exit();
?>
