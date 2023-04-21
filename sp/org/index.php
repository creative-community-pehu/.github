<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no" />
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../org/style.css">
  <link rel="stylesheet" href="../org/submit.css">
  <style type="text/css">
  #modal h1,
  #modal p,
  button,
  #log ul li {
    font-family: "ipag", monospace;
    line-height: 150%;
    transform: scale(1, 1.25);
  }

  #submit legend b,
  #submit legend small,
  #weight label,
  #size label {
    font-family: "ipag", monospace;
  }

  #modal h1,
  #modal p,
  button {
    font-weight: 500;
  }

  main {
    overflow: auto;
  }

  #modal {
    box-sizing: border-box;
    margin: 2.5vh auto;
    max-width: 95%;
    max-height: 95%;
    overflow: auto;
  }

  #modal h1 {
    margin: 0 0 1rem;
  }

  #log ul li {
    margin: 1rem;
  }

  @media screen and (max-width: 550px) {
    #log ul li {
      margin: 2.5vw;
    }
  }
  </style>
</head>
<body>
  <button type="button" id="mainBtn" onclick="onModal()">ORG</button>
  <button type="button" class="backBtn" onclick="window.history.back(); return false;">↩︎</button>

  <dialog id="modal">
    <h1>言葉の強さと方向と感情</h1>
    <p>
      2021年10月10日(日) - 30日(土)<br/>
      展覧会「新しい生活を集める」へ ご来場した皆様の感想
    </p>
    <br/>

    <form id="submit">
      <fieldset id="weight">
        <legend>
          <i>%</i>
          <b>強さ</b>
          <small>文字の太さは言葉の強さを表します</small>
        </legend>
      </fieldset>

      <fieldset id="size">
        <legend>
          <i>to</i>
          <b>方向</b>
          <small>文字の大きさは感情の方向を表します</small>
        </legend>
      </fieldset>

      <fieldset id="feel">
        <legend>
          <i>emoji</i>
          <b>感情</b>
          <small>感想を絵文字によって絞り込むことができます</small>
        </legend>
      </fieldset>
    </form>
    <button id="closeButton">Close</button>
  </dialog>

  <main id="log">
    <?php require('log.php'); ?>
  </main>

  <script src="script.js"></script>
  <script type="text/javascript">
  const dialogModal = document.querySelector('#modal');
  function onModal() {
    if (typeof dialogModal.showModal === "function") {
      dialogModal.showModal();
    } else {
      alert("The <dialog> API is not supported by this browser");
    }
  }

  const closeButton = document.querySelector('#closeButton');
  closeButton.addEventListener('click', () => {
    dialogModal.close();
  });
  </script>
</body>
</html>
