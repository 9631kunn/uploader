(function () {
  // 使うやつ
  const d = document,
    a = d.querySelector(".upload__area"),
    r = d.querySelector(".upload__result"),
    i = d.querySelector(".upload__file--input"),
    b = d.querySelector(".upload__button--upload"),
    c = d.querySelector(".upload__button--copy"),
    o = d.querySelector(".upload__option");
  console.log(r);

  // UI用
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
  // アップロード処理
  b.addEventListener("click", (e) => {
    e.preventDefault();
    a.classList.add("fadeOut");
    b.classList.add("fadeOut");
    setTimeout(() => {
      a.classList.add("none");
      b.classList.add("none");
    }, 1500);
    const req = new XMLHttpRequest(),
      data = new FormData(d.querySelector(".upload__form")),
      path = location.href + "upload.php";
    req.open("POST", path);
    req.send(data);
    req.onreadystatechange = () => {
      if (req.readyState !== 4 || req.status !== 200) return;
      r.classList.remove("none");
      c.classList.remove("none");
      r.classList.add("fadeIn");
      c.classList.add("fadeIn");
      o.classList.add("none");
      d.querySelector(".upload__title").textContent = "Yay! Uploaded!!";
      r.insertAdjacentHTML("afterbegin", req.responseText);
    };
  });
  // クリップボードにコピー
  c.addEventListener("click", (e) => {
    e.preventDefault();
    // リンク一覧
    const links = d.querySelectorAll(".upload__result--link"),
      linkList = [];
    links.forEach((link) => {
      linkList.push(link.href);
    });
    // コピー処理
    const linkText = d.createElement("textarea");
    linkText.textContent = linkList.join("\n");
    d.body.appendChild(linkText);
    linkText.select();
    const copy = d.execCommand("copy");
    d.body.removeChild(linkText);
    // ツールチップ
    copy ? d.querySelector(".upload__copy-success").classList.add("success") : console.log("f");
  });
})();

// アップロードに関する処理
// [ref]https://qiita.com/yasumodev/items/516de8445d254ab12cbf
// [ref]https://ja.javascript.info/xmlhttprequest
