<?php

// セキュリティ的なところは.htaccessとHTMLとJS負担

// 複数ファイルがアップロードされた場合、Arrayで渡ってくる
// Arrayのlength分アップロード処理を回す（1つずつしかアップできないので）
for($i = 0; $i < count($_FILES["upload"]["name"]); $i++)
{
  $upload_dir = __DIR__."/data/";
  $tmp_file = $_FILES["upload"]["tmp_name"][$i];

  // ファイル名変更（重複回避のため）
  $original = $_FILES["upload"]["name"][$i];
  list($filename, $extension) = explode(".", $original);
  $copy = date("YmdHis")."_".$filename.".".$extension;
  $result = @move_uploaded_file($tmp_file, $upload_dir.$copy);

  // Success / Error メッセージ
  if($result === true)
  {
    echo $original."をアップロードしました。<br>";
    echo "<a href=\"./data/".$copy."\" target=\"_blank\">$original</a>";
  }
  else
  {
    echo $original."をアップロード出来ませんでした。";
  }
}

?>