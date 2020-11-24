<?php

class IndexCode {
  private $qBarQ = [];

  function __construct($qBarQ = []){
    $this->qBarQ = $qBarQ;
  }

  function createQBar(int $eval, int $howMany) {
    for($i = $eval; $i < $howMany*2; $i+=2) {
      if(@$this->qBarQ[$i])
        $this->createQBarQ($this->qBarQ[$i]);
      else
        break;
    }
  }
  private function createQBarQ($qBarQData) {
    ?>
      <section class="q-bar-q">
        <a href="q.php?q-id=<?= $qBarQData['id'] ?>">
          <h1 href="/q-<?= $qBarQData['id'] ?>" class="q-bar-q__title"><?= $qBarQData['title'] ?></h1>
        </a>
        <p class="q-bar-q__description"><?= $qBarQData['description'] ?></p>
        <div class="q-bar-q__author"><?= $qBarQData['author'] ?></div>
        <a href="q.php?q-id=<?= $qBarQData['id'] ?>">
          <div class="q-bar-q__img" style="background-image: url(./img/for-q/<?= $qBarQData['img_name'] ?>);"></div>
        </a>
        <div class="q-bar-q__bottom">
          <div class="q-bar-q__likes"><i class="fas fa-heart" style="margin-right: 3px;"></i>
            <?= $qBarQData['likes'] ?>
          </div>
          <div class="q-bar-q__start-q">
            rozpoczni
            <span class="q">Q </span>→
          </div>
        </div>
      </section>
    <?php
  }
}