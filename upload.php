<?php

// セキュリティ的なところは.htaccessとHTMLとJS負担

// 複数ファイルがアップロードされた場合、Arrayで渡ってくる
// Arrayのlength分アップロード処理を回す（1つずつしかアップできないので）
for($i = 0; $i < count($_FILES["upload"]["name"]); $i++)
{
  $upload_dir = __DIR__."/data/";
  $tmp_file = $_FILES["upload"]["tmp_name"][$i];

  // アップされた画像
  $original = $_FILES["upload"]["name"][$i];
  list($filename, $extension) = explode(".", $original);

  // ファイル名変更しない場合とする場合
  if ($_POST["overwrite"]){
    // dataディレクトリ内から同名ファイルの検索
    $matches = preg_grep("/".$filename."/", glob("data/*"));
    if(empty($matches)){
      $upload_name = date("YmdHis")."_".$filename.".".$extension;
    }else{
      // マッチしたものがあれば一応その中で最新のものを取得する
      $path = end($matches);
      $format_path = str_replace('data/', '', $path);
      $upload_name = $format_path;
    }
  } else {
    $upload_name = date("YmdHis")."_".$filename.".".$extension;
  }

  // アップロード処理
  $result = @move_uploaded_file($tmp_file, $upload_dir.$upload_name);
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