<?php
$sekki = "shosho";
$seasonName = "秋";
$sekkiName = "処暑";
$date = "August 23 - September 7";
$description = "Hot weather abates";
$hello = "暑さが和らぐ頃。マツムシや鈴虫など心地よい虫の声が聞こえ、朝夕は心地よい涼風が吹く。同時に台風の季節も到来する。";

$title = $sekkiName .' | '. $date;
$site = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}";
$url = "{$site}" . "{$_SERVER['REQUEST_URI']}";

require_once('../../all/head.php');
?>

<body>
  <main id="log">
    <div>
      <h1>
        <b>
          <code><?php echo $greeting;?></code>
          <?php echo $sekkiName;?> <?php echo $sekki;?>
        </b><br/>
        <code id="lastModified"><?php echo $date;?></code>
      </h1>
      <h2><?php echo $description;?></h2>
    </div>
    <?php
    function h($str) {
      return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
    require('../../all/log.php');
    ?>
  </main>
  <?php require('../../all/controls.html'); ?>
  <script src="../../js/log.js"></script>

  <dialog id="modal" class="color bgcolor">
    <h3>
      <small><?php echo $date;?></small><br/>
      <?php echo $sekkiName;?> <?php echo $sekki;?>
    </h3>
    <button class="color bgcolor" id="closeButton">×</button>
    <p><?php echo $description;?></p>
    <p><?php echo $hello;?></p>
    <br/>
    <?php require('../../all/timeframe.php'); ?>
  </dialog>
  <script src="../color.js"></script>
  <script type="text/javascript">
  let namesForm = document.querySelectorAll('#bgcolor, #color')
  for (const names of namesForm) {
    Object.entries(colors).forEach(eachArr => {
      let option = document.createElement('option')
      option.textContent = Object.values(eachArr)[0]
      option.value = Object.values(eachArr)[1]
      names.appendChild(option)
    })
  }
  </script>
  <script src="../../../profile/js/setStyles.js"></script>
</body>
</html>
