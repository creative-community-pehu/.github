<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no" />
  <?php require('ver/icon.html');?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="js/index.js" async></script>
  <script src="js/hello.js"></script>
  <script src="readyState.js"></script>
  <link rel="stylesheet" href="css/menu.css" />
  <link rel="stylesheet" href="css/modal.css" />
  <link rel="stylesheet" href="css/userMedia.css" />
  <link rel="stylesheet" href="hello/style.css" />
  <link rel="stylesheet" href="hello/css/controls.css" />
  <link rel="stylesheet" href="ver/log/style.css" />
  <link rel="stylesheet" href="thankyou/style.css" />
  <link rel="stylesheet" href="thankyou/www.css" media="print"/>
  <link rel="stylesheet" href="hello/css/mobile.css" media="screen and (max-width: 750px)" />
  <style>
  #js-button,
  #contents a,
  main {
    filter: invert();
  }

  header,
  main,
  #sketch,
  #userMedia {
    mix-blend-mode: difference;
  }
  </style>
</head>
<body>
  <header id="menu" hidden>
    <button id="js-button"><b></b></button>
    <nav id="contents">
      <a href="/ver/" target="_parent">
        <p><b>Index | creative-community.space</b></p>
        <u>ver.2.0</u>
      </a>
    </nav>
  </header>
  <script src="/js/menu.js"></script>

  <main id="hello">
    <section id="readme">
      <h1>
        <?php require('hello/all/greeting.php');?>
        <b><?php echo $greeting;?></b><br>
        IP <code><?php echo $_SERVER["REMOTE_ADDR"];?></code>
      </h1>
      <p>
        Thank you for visiting
        <u data-id="website">The Website</u>
        <b id="website" class="hide">
          that
          <u data-id="create">Creates</u>
          <b id="create" class="hide">beautiful things through</b>
          <u data-id="communicate">Communication</u>
          <b id="communicate" class="hide">that everyone can do</b>
          <br>
          <small>このウェブサイトは、誰にでもできることを自分らしく行うことの美しさを形にするコミュニティサイトです。</small>
        </b>
      </p>
      <script>
      $(function(){
        $("#readme u").on("click", function(){
          let show = $(this).data("id");
          $("#" + show).show(1000);
        })
      });
      </script>
    </section>
  </main>

  <main id="yourinfo" hidden>
    <form method="post">
      <button id="openModal" type="button">あなたの通信情報／ブラウザ等情報</button>
      <p><?php require('profile/yourinfo.php'); ?></p>
      <section>
        <button type="button" id="enter-btn" onclick="setLOG()">Enter</button>
        <button type="button" id="back-btn">Back</button>
      </section>
    </form>
    <script src="js/log.js"></script>
  </main>

  <dialog id="modal">
    <button id="closeButton">Close 閉じる</button>
    <section id="about"></section>
  </dialog>

  <script type="text/javascript">
  const dialogModal = document.querySelector('#modal');
  const openModal = document.querySelector('#openModal');

  openModal.addEventListener('click', function onModal() {
    if (typeof dialogModal.showModal === "function") {
      dialogModal.showModal();
    } else {
      alert("The <dialog> API is not supported by this browser");
    }
  });

  const closeButton = document.querySelector('#closeButton');
  closeButton.addEventListener('click', () => {
    dialogModal.close();
  });

  fetchHTML('profile/yourinfo.html','#about')
  </script>

  <section id="you">
    <img class="hsl" src="ver/qr.png">
    <div>
      <p class="cc">creative-community.space</p>
      <p class="cc">come on join us :)</p>
    </div>
  </section>
  <aside id="www">
    <h2>
      <strong>
        This is <i>The Website</i> that<br />
        <i>Creates</i> beautiful things through<br />
        <i>Communication</i> that everyone can do<br />
      </strong>
    </h2>
    <small class="cc">このウェブサイトは、誰にでもできることを自分らしく行うことの美しさを形にするコミュニティサイトです。</small>
  </aside>

  <div id="sketch"></div>
  <script src="thankyou/hsl.js"></script>
  <script src="thankyou/sketch.js"></script>

  <script type="text/javascript">
  const COLOURS = ['#EEE'];
  let radius = 0;

  Sketch.create({
    container: document.getElementById('sketch'),
    autoclear: false,
    retina: 'auto',

    setup: function() {
      console.log('setup');
    },
    update: function() {
      radius = 2 + abs(sin(this.millis * 0.002) * 25);
    },

    touchmove: function() {
      for (let i = this.touches.length - 1, touch; i >= 0; i--) {
        touch = this.touches[i];
        this.lineCap = 'round';
        this.lineJoin = 'round';
        this.fillStyle = this.strokeStyle = COLOURS[i % COLOURS.length];
        this.lineWidth = radius;

        this.beginPath();
        this.moveTo(touch.ox, touch.oy);
        this.lineTo(touch.x, touch.y);
        this.stroke();
      }
    }
  });
  </script>

  <footer id="now" class="hsl">
    <time id="showDate"></time>
    <time id=showTime></time>
  </footer>
  <script src="js/now.js"></script>
</body>
</html>
