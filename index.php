<!DOCTYPE html>
<html lang="ja">
<head>
  <title>うpろだ</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <main class="upload">
    <form class="upload__form" enctype="multipart/form-data">
      <h2 class="upload__title">Let's Upload</h2>
      <div class="upload__icon">
        <!-- <img class="upload__icon--unicorn" src="./baby.svg" /> -->
      </div>
      <div class="upload__area">
        <div class="upload__icon">
          <!-- <image class="upload__icon--camera" src="./camera.svg" /> -->
        </div>
        <div class="upload__file">
          <input id="inputFile" type="file" class="upload__file--input" name="upload" value="ファイルを選択" multiple="multiple" accept="image/*" />
          <label for="inputFile" class="upload__file--label">ファイルを選択</label>
        </div>
      </div>
      <button type="button" class="upload__button">アップロードする</button>
    </form>
  </main>
  <script src="./ui.js" defer></script>
</body>
</html>