<?php

// 複数ファイルがアップロードされた場合、Arrayで渡ってくる
// Arrayのlength分アップロード処理を回す（1つずつしかアップできないので）
for($i = 0; $i < count($_FILES["upload"]["name"]); $i++)
{
  $upload_dir = __DIR__."/data/";
  $tmp_file = $_FILES["upload"]["tmp_name"][$i];

  // ファイル名変更（重複回避のため）
  $original = $_FILES["upload"]["name"][$i];
  list($filename, $extension) = explode(".", $original);
  if (exif_imagetype($tmp_file)) {
    $upload_name = date("YmdHis")."_".$filename.".".$extension;
    $result = @move_uploaded_file($tmp_file, $upload_dir.$upload_name);
  } else {
    $result = false;
  }


  // ファイル名変更処理なし
  // if($_GET["overwrite"] === true){
  //   echo "test";
  // }
  // checkbox用意してその値による分岐
  // checkがあれば既存のファイルとアップロードされたファイルを上書き

  // Success / Error メッセージ
  if($result === true)
  {
    echo "<a href=\"./data/".$upload_name."\" class=\"upload__result--link\" target=\"_blank\">"
    ."<img src=\"./data/".$upload_name."\" class=\"upload__result--img\" loading=\"lazy\">"
    ."<div class=\"upload__result--filename\">"
    .$original
    ."</div>"
    ."</a>";
  }
  else
  {
    echo $original."をアップロード出来ませんでした。";
  }
}

?>