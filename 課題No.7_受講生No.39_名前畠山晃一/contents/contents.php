<!--speech to textでの翻訳と文字起こしを行います。後に投稿はまとめてtextページで閲覧やコピペが可能です。
大衆の前でのピッチや講義の際、このページリンクを送り、お客さんは様々な端末から翻訳情報をリアルタイムで受け取れればと思ってつくりました
（オンライン用にビデオ機能もつけました）-->

<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>contents</title>
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
      .logo{
          width:100%;
      }
      .video{
        margin-left:30px;
      }
      .s-tbl{
        margin:30px;
      }
      .s-tbl p:nth-child(2n+1) {
        border-radius: 5px;
        height:80px;
        background-color: #ccffcc;
      }
      .s-tbl p:nth-child(2n) {
        background-color: #ffffcc;
      }
      .s-tbl p:hover {
        background: #ff0;
        color:red;
      }
      .input:hover{
        background: #ff0;
        color:red;
      }
</style>
</head>

<body>

<a class="top" href="contents2.php">text</a>

<div class="video">
<input type="button" value="video" id="video_onoff" class="btn btn-info btn-lg"></div>
<img class="logo" src="../image/test.001.png">

<div class="videoPreview" id="videoPreview" style="display:none;"></div>
</div>


  <div id="content">
    <table width="100%">
      <tr style="display:none">
        <td align="right"><a href="https://docs.microsoft.com/azure/cognitive-services/speech-service/get-started" target="_blank">Subscription</a>:</td>
        <!--ここにmicrsoft API keyを入力-->
        <td><input id="APIkey" type="text" size="40" value="xxxxxxxxxxxxxxxxxxxxxxxxxxxx"></td>
      </tr>
      <tr  style="display:none">
        <td align="right">Region</td>
        <td><input id="japaneast" type="text" size="40" value="japaneast"></td>
      </tr>
      <tr>
        <td align="right">Source Language</td>
        <td><select id="languageSourceOptions">
          <option value="ar-EG">Arabic - EG</option>
          <option value="de-DE">German - DE</option>
          <option value="en-US">English - US</option>
          <option value="es-ES">Spanish - ES</option>
          <option value="fi-FI">Finnish - FI</option>
          <option value="fr-FR">French - FR</option>
          <option value="hi-IN">Hindi - IN</option>
          <option value="it-IT">Italian - IT</option>
          <option selected="selected" value="ja-JP">Japanese - JP</option>
          <option value="ko-KR">Korean - KR</option>
          <option value="pl-PL">Polish - PL</option>
          <option value="pt-BR">Portuguese - BR</option>
          <option value="ru-RU">Russian - RU</option>
          <option value="sv-SE">Swedish - SE</option>
          <option value="zh-CN">Chinese - CN</option>
        </select></td>
      </tr>
      <tr>
        <td align="right">Target Language</td>
        <td><select id="languageTargetOptions">
          <option value="ar-EG">Arabic - EG</option>
          <option value="de-DE">German - DE</option>
          <option selected="selected" value="en-US">English - US</option>
          <option value="es-ES">Spanish - ES</option>
          <option value="fi-FI">Finnish - FI</option>
          <option value="fr-FR">French - FR</option>
          <option value="hi-IN">Hindi - IN</option>
          <option value="it-IT">Italian - IT</option>
          <option value="ja-JP">Japanese - JP</option>
          <option value="ko-KR">Korean - KR</option>
          <option value="pl-PL">Polish - PL</option>
          <option value="pt-BR">Portuguese - BR</option>
          <option value="ru-RU">Russian - RU</option>
          <option value="sv-SE">Swedish - SE</option>
          <option value="zh-CN">Chinese - CN</option>
        </select></td>
      </tr>

      <form action="write2.php" method="post">
        <tr>
        <td align="right" valign="top">Results</td>
        <td><textarea name="comment" id="phraseDiv" style="display: inline-block;font-weight:500;width:500px;height:50px;"></textarea>
        <input type="submit" value="POST" od="post" class="input"></form>

        <form action="twitter_post.php" method="post">    
        <textarea name="tweet"  style="display: inline-block;font-weight:500;width:500px;height:50px;"></textarea>
        <input type="submit" value="TWITTER" od="post" class="input"></td></form>
        </tr>
      <tr>
        <td align="right">record and post</td>
        <td>
        <button id="startRecognizeOnceAsyncButton" class="input">Start record</button></td>
      </tr>
      
    </table>
  </div>

  <div class="s-tbl">  
        <?php
            $filename = 'data/data2.txt';
            $fp = fopen($filename,'r');

            while ( !feof($fp) ) {
              $txt = fgets($fp);
              echo '<p>'.$txt.'</p>'.'<br>';
            }
        ?>
        <?php fclose($fp);?>
  </div>



  <!-- <speechsdkdiv> -->
  <!-- Speech SDK reference sdk. -->
  <script src="microsoft.cognitiveservices.speech.sdk.bundle.js"></script>
  <!-- </speechsdkdiv> -->

  <!-- <authorizationfunction> -->
  <!-- Speech SDK Authorization token -->
  <script>
  // Note: Replace the URL with a valid endpoint to retrieve
  //       authorization tokens for your subscription.
  var authorizationEndpoint = "token.php";

  function RequestAuthorizationToken() {
    if (authorizationEndpoint) {
      var a = new XMLHttpRequest();
      a.open("GET", authorizationEndpoint);
      a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      a.send("");
      a.onload = function() {
        var token = JSON.parse(atob(this.responseText.split(".")[1]));
        serviceRegion.value = token.region;
        authorizationToken = this.responseText;
        subscriptionKey.disabled = true;
        subscriptionKey.value = "using authorization token (hit F5 to refresh)";
        console.log("Got an authorization token: " + token);
      }
    }
  }
  </script>
  <!-- </authorizationfunction> -->

  <!-- <quickstartcode> -->
  <!-- Speech SDK USAGE -->
  <script>
    // status fields and start button in UI
    var phraseDiv;
    var startRecognizeOnceAsyncButton;

    // subscription key and region for speech services.
    var subscriptionKey, serviceRegion, languageTargetOptions, languageSourceOptions;
    var authorizationToken;
    var SpeechSDK;
    var recognizer;

    document.addEventListener("DOMContentLoaded", function () {
      startRecognizeOnceAsyncButton = document.getElementById("startRecognizeOnceAsyncButton");
      subscriptionKey = document.getElementById("APIkey");
      serviceRegion = document.getElementById("japaneast");
      languageTargetOptions = document.getElementById("languageTargetOptions");
      languageSourceOptions = document.getElementById("languageSourceOptions");
      phraseDiv = document.getElementById("phraseDiv");

      startRecognizeOnceAsyncButton.addEventListener("click", function () {
      //startRecognizeOnceAsyncButton.addEventListener("onmousedown", function () {
        startRecognizeOnceAsyncButton.disabled = true;
        phraseDiv.innerHTML = "";

        // if we got an authorization token, use the token. Otherwise use the provided subscription key
        var speechConfig;
        if (authorizationToken) {
          speechConfig = SpeechSDK.SpeechTranslationConfig.fromAuthorizationToken(authorizationToken, serviceRegion.value);
        } else {
          if (subscriptionKey.value === "" || subscriptionKey.value === "subscription") {
            alert("Please enter your Microsoft Cognitive Services Speech subscription key!");
            startRecognizeOnceAsyncButton.disabled = false;
            return;
          }
          speechConfig = SpeechSDK.SpeechTranslationConfig.fromSubscription(subscriptionKey.value, serviceRegion.value);
        }

        speechConfig.speechRecognitionLanguage = languageSourceOptions.value;
        let language = languageTargetOptions.value
        speechConfig.addTargetLanguage(language)

        var audioConfig  = SpeechSDK.AudioConfig.fromDefaultMicrophoneInput();
        recognizer = new SpeechSDK.TranslationRecognizer(speechConfig, audioConfig);

        recognizer.recognizeOnceAsync(
          function (result) {
            startRecognizeOnceAsyncButton.disabled = false;
            let languageKey = language.substring(0,2)
            let translation = result.translations.get(languageKey);
            window.console.log(translation);
            phraseDiv.innerHTML += translation;

            recognizer.close();
            recognizer = undefined;
          },
          function (err) {
            startRecognizeOnceAsyncButton.disabled = false;
            phraseDiv.innerHTML += err;
            window.console.log(err);

            recognizer.close();
            recognizer = undefined;
          });
      });

      /*startRecognizeOnceAsyncButton.addEventListener("onmouseup", function () {
      startRecognizeOnceAsyncButton.disabled = false;});*/


      if (!!window.SpeechSDK) {
        SpeechSDK = window.SpeechSDK;
        startRecognizeOnceAsyncButton.disabled = false;

        document.getElementById('content').style.display = 'block';
        document.getElementById('warning').style.display = 'none';

        // in case we have a function for getting an authorization token, call it.
        if (typeof RequestAuthorizationToken === "function") {
          RequestAuthorizationToken();
        }
      }
    });
  </script>
  <!-- </quickstartcode> -->

<!-- jquery が先 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
const cameraSize = { w: 1080, h: 720};
const resolution = { w: 1080, h: 720 };
let video;
let media;

video          = document.createElement('video');
video.id       = 'video';
video.width    = cameraSize.w;
video.height   = cameraSize.h;
video.autoplay = true;

document.getElementById('videoPreview').appendChild(video);

media = navigator.mediaDevices.getUserMedia({

  audio: false,
  video: {
    width: { ideal: resolution.w },
    height: { ideal: resolution.h }
  }
}).then(function(stream) {
  video.srcObject = stream;
});
</script>
<script>
  $("#video_onoff").on("click", function () {
      $(".videoPreview").fadeIn(500);
      $(".logo").fadeOut(500);
  });
  $("#video_onoff").on("dblclick", function () {
      $(".videoPreview").fadeOut(500);
      $(".logo").fadeIn(500);
  });
</script>

</body>
</html>
