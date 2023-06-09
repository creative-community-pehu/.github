<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no" />
  <script type="text/javascript">
  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    location.replace('touch.html')
  }
  </script>
  <script src="/js/index.js" async></script>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../css/menu.css" />
  <link rel="stylesheet" href="../hello/style.css" />
  <link rel="stylesheet" href="../hello/css/mobile.css" media="screen and (max-width: 750px)" />
  <link rel="icon" href="/ver/icon/android.png" sizes="192x192" type="image/png">
  <link rel="apple-touch-icon-precomposed" href="/ver/icon/apple.png" sizes="180x180" type="image/png">
  <style>
  #js-button,
  #contents a {
    filter: invert();
  }

  header {
    mix-blend-mode: difference;
  }

  #hello {
    display: grid;
    place-items: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 100vh;
    max-height: -webkit-fill-available;
  }

  #js-button {
    filter: invert();
  }

  #hello {
    padding: 1rem;
  }

  #hello h1,
  #hello section {
    color: #fff;
    margin: 1rem;
  }

  #hello h1 {
    font-family: "Times New Roman", serif;
    font-weight: 500;
    font-size: 200%;
  }

  #hello h1 sup {
    font-size: 55%;
    font-family: "ipag", "Arial Narrow", monospace;
  }

  #sketch {
    filter: invert();
  }

  @media screen and (max-width: 750px) {
    #hello {
      font-size: 2.5vw;
      padding: 5VW;
    }
  }
  </style>
  <link rel="stylesheet" href="www.css" media="print"/>
</head>

<body>
  <header id="menu" hidden>
    <button id="js-button"><b></b></button>
    <nav id="contents">
      <a href="#" onclick="window.history.back(); return false;">
        <p><b>creative-community.space</b></p>
        <u>↩︎</u>
      </a>
    </nav>
  </header>
  <script src="/js/menu.js"></script>

  <p class="hue hsl">Hue <span id="huecount"></span></p>
  <p class="saturation hsl">Saturation <span id="saturationcount"></span></p>
  <p class="lightness hsl">Lightness <span id="lightnesscount"></span></p>

  <main id="hello">
    <h1>
      <sup>Thank You for Visiting</sup><br/>
      <i class="hsl">Your Drawing is Seems So Beautiful</i>
    </h1>
    <section>
      <p>
        あなたの書いた落書きをPDFに出力する<br />
        <a class="hsl" href="#" onclick="window.print();">📄</a>
        をクリック or ⌘ + P → 出力先 「PDFに保存」
        <br /><sup>* A4 サイズ / 横 レイアウト / 余白なし 推奨</sup>
      </p>
      <p>あなたが描いた落書きを右クリックし「名前をつけて画像を保存…」？！</p>
    </section>
  </main>

  <section id="you">
    <div>
      <p class="cc">Drawing by</p>
      <p class="cc">
        IP
        <?php echo $_SERVER['REMOTE_ADDR']; ?>
      </p>
    </div>
  </section>

  <aside id="www">
    <h2>
      OMG!<br />
      <i>Your Drawing is Seems So Beautiful</i><br />
      Let's <i>Print to PDF</i> and <i>Send it</i> to us !!<br />
      <a class="cc" href="mailto:pehu@creative-community.space">pehu@creative-community.space</a> *
    </h2>
    <p class="cc">creative-community.space</p>
  </aside>

  <div id="sketch"></div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="sketch.js"></script>
  <script type="text/javascript">
  const COLOURS = ['#111'];
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

  <script>
  document.body.style.background = '#000';
  document.body.style.padding = "0";
  document.body.style.margin = "0";

  document.addEventListener('mousemove', touchHSL);
  document.addEventListener('touchstart', touchHSL);
  document.addEventListener('touchend', touchHSL);
  document.addEventListener('touchcancel', touchHSL);
  document.addEventListener('touchmove', touchHSL);

  let allHSL = document.querySelectorAll('.hsl');
  for (const colorHSL of allHSL) {
    colorHSL.style.color = '#000';
    colorHSL.style.filter = 'invert()';
  }

  function touchHSL(xy) {
    let hueraw = parseInt(360 - Math.round((xy.pageY + 0.1) / (window.innerHeight) * 360));
    document.querySelector('#huecount').innerText = hueraw;

    if ((xy.pageX <= window.innerWidth / 1)) {
      let sraw = parseInt(100 - Math.round((xy.pageX + 0.1) / (window.innerWidth) * 100));
      let lraw = parseInt(Math.round((xy.pageX + 0.1) / (window.innerWidth) * 100));

      document.querySelector('#saturationcount').innerText = sraw + '%';
      document.querySelector('#lightnesscount').innerText = lraw + '%';

      document.body.style.background = 'hsl(' + hueraw + ',' + sraw + '%,' + lraw + '%)';

      let allHSL = document.querySelectorAll('.hsl');
      for (const colorHSL of allHSL) {
        colorHSL.style.color = 'hsl(' + hueraw + ',' + sraw + '%,' + lraw + '%)';
      }
    }
  };
  </script>
</body>

</html>
