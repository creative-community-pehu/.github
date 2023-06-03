<main id="log">
  <div>
    <h1>
      <b><?php echo $greeting;?></b><br/>
      <code id="lastModified"></code>
    </h1>
    <h2>
      Now is The Season named<br/>
      <a href="<?php echo $season;?>/<?php echo $seasonName;?>/"><?php echo $seasonName;?></a>
      (<b><?php echo $seasonID;?></b>) in
      <b><?php echo $season;?></b>
    </h2>
  </div>
  <section>
    <ul>
      <?php if (!empty($rows)) : ?>
        <?php shuffle($rows); foreach ($rows as $row):?>
          <li>
            <p>
              <code><?= h($row[1]) ?> (<?= h($row[2]) ?>)</code>
              <code>Pitch <?= h($row[3]) ?></code>
              <code>Rate <?= h($row[4]) ?></code>
            </p>
            <p>
              <button type="button" data-name="<?= h($row[1]) ?>" lang="<?= h($row[2]) ?>" data-pitch="<?= h($row[3]) ?>" data-rate="<?= h($row[4]) ?>" data-hello="<?= h($row[5]) ?>">
                <?= h($row[0]) ?>
              </button>
            </p>
          </li>
        <?php endforeach; ?>
      <?php else : ?>
      <?php endif; ?>
    </ul>
  </section>
</main>
