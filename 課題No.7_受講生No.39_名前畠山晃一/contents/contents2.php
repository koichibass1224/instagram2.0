<!--postしたtextを表示するページ。speech to textで翻訳したspeechの文字起こしを確認できます-->
<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>contents_text</title>
      <!-- Required meta tags -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style>
      body{
          max-width:1200px;
          width:100%;
          margin:0 auto;
      }
      .s-tbl input{
        margin:80px 0px;
      }
      .s-tbl{
        width:80%;
        margin:0 auto;
      }
      .s-tbl p:hover {
        background: #ccffcc;
      }
</style>
</head>

<body>

<a href="contents.php">top</a>

  <div class="s-tbl">  
  <input type="button" value="text" id="text_on" class="btn btn-info btn-lg">
     <div class="text_on" style="display:none">
        <?php
            $filename = 'data/data3.txt';
            $fp = fopen($filename,'r');

            while ( !feof($fp) ) {
              $txt = fgets($fp);
              echo '<p>'.$txt.'</p>'.'<br>';
            }
        ?>
        <?php fclose($fp);?>
     </div>
  </div>


<!-- jquery が先 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
  $("#text_on").on("click", function () {
      $(".text_on").fadeIn(1000);
  });
  $("#text_on").on("dblclick", function () {
      $(".text_on").fadeOut(1000);
  });</script>

</body>
</html>
