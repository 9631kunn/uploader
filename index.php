<!DOCTYPE html>
<html lang="ja">
<head>
  <title>アップローダー</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
</head>
<body>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <main class="upload">
      <h2 class="upload__title">Let's Upload</h2>
      <div class="upload__icon">
        <img src="./baby.svg" class="icon__unicorn" />
      </div>
      <div class="upload__area">
        <div class="upload__icon">
          <image src="./camera.svg" class="icon__camera" />
        </div>
        <input type="file" class="upload__file" value="ファイルを選択" name="image" />
      </div>
      <input type="submit" value="アップロードする" />
    </main>
  </form>
  <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    background: #bdbff2;
    display: grid;
    height: 100vh;
    place-items: center;
    width: 100vw;
  }

  .upload__title {
    color: #fff;
    font-family: 'Quicksand', sans-serif;
    text-align: center;
  }

  .upload__title::before,
  .upload__title::after {
    color: #fff;
    content: "|";
    display: inline-block;
  }

  .upload__title::before {
    transform: rotate(-45deg);
    margin-inline-end: 10px;
  }

  .upload__title::after {
    transform: rotate(45deg);
    margin-inline-start: 10px;
  }

  .upload__icon {
    text-align: center;
  }

  .upload__icon .icon__unicorn {
    height: 150px;
    width: 150px;
  }

  .upload__icon .icon__camera {
    height: 80px;
    width: 80px;
  }

  .upload__area {
    align-items: center;
    background: #bbbcf2;
    border: 3px dashed #8c8fed;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    height: 400px;
    width: 600px;
  }

  .upload__area.active {
    background: #a7a8f2;
  }

  .upload__area.active .icon__camera {
    animation: move .1s infinite;
  }

  @keyframes move {
    0% {
      transform: translate(0px, 0px) rotateZ(0deg)
    }

    25% {
      transform: translate(2px, 2px) rotateZ(1deg)
    }

    50% {
      transform: translate(0px, 2px) rotateZ(0deg)
    }

    75% {
      transform: translate(2px, 0px) rotateZ(-1deg)
    }

    100% {
      transform: translate(0px, 0px) rotateZ(0deg)
    }
  }
  </style>
  <script>
  var a = document.querySelector(".upload__area");
  var i = document.querySelector(".upload__file");

  a.addEventListener("dragover", (e) => {
    e.preventDefault();
    a.classList.add("active");
  });
  a.addEventListener("dragleave", (e) => {
    e.preventDefault();
    a.classList.remove("active");
  });
  a.addEventListener("drop", (e) => {
    e.preventDefault();
    a.classList.remove("active");
    var f = e.dataTransfer.files;
    i.files = f
  });
  </script>
</body>
</html>
