<?php

$save_path = __DIR__."/data/".$_FILES["upload"]["name"];
$result = @move_uploaded_file($_FILES["upload"]["tmp_name"], $save_path);

if($result === true)
{
  echo "UPLOAD OK";
}
else
{
  echo $save_path;
  echo "\n";
  echo "UPLOAD NG";
}

?>