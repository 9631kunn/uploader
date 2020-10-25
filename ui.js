(function () {
  const a = document.querySelector(".upload__area");
  const i = document.querySelector(".upload__file--input");
  const b = document.querySelector(".upload__button");

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
    i.files = e.dataTransfer.files;
    // デザイン修正のためここのタイミングでファイル名取得してspanとかで要素挿入
  });
  b.addEventListener("click", () => {
    const req = new XMLHttpRequest();
    const data = new FormData(document.querySelector(".upload__form"));
    const path = location.href + "upload.php";
    req.onreadystatechange = () => {
      if (req.readyState !== 4 || req.status !== 200) return;
      console.log(req.responseText);
    };
    req.open("POST", path);
    req.send(data);
  });
})();

// アップロードに関する処理
// [ref]https://qiita.com/yasumodev/items/516de8445d254ab12cbf
