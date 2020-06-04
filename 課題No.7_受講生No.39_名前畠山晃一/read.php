<?php
//ファイル名を変数に入れる
$filename = 'data/data.txt';//階層のdataを書く。

$fp = fopen($filename,'r');//'r'リード：読み込む

//データの数だけ描画する処理
//→for文を使わない：while文
while ( !feof($fp) ) {

  //feofというメソッド：今回のアンケート課題ぐらいしか使わん。
  //fgetsでデータを取得:$txtの変数に代入している。
  $txt = fgets($fp);

  //出力
  echo $txt.'<br>';

}
//fclose：開いているファイルを閉じる
fclose($fp);
?>