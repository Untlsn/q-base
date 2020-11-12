<?php

class IndexCode {

  private $categories = [];
  private $qBarQ = [];

  function __construct($categories = [], $qBarQ = []){
    $this->qBarQ = $qBarQ;
    $this->categories = $categories;
  }

  function createCategory($to) {
    if($to == null)
      $to = count($this->categories);
    for($i = 0; $i < $to; $i++):
      $category = $this->categories[$i];
    ?>
      <a class="category" href="/category?category_id=<?=$category['id']?>">
        <?=$category['name']?>
      </a>
    <?php endfor;
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
        <a href="q?q-id=<?= $qBarQData['id'] ?>">
          <h1 href="/q-<?= $qBarQData['id'] ?>" class="q-bar-q__title"><?= $qBarQData['title'] ?></h1>
        </a>
        <p class="q-bar-q__description"><?= $qBarQData['description'] ?></p>
        <div class="q-bar-q__author"><?= $qBarQData['author'] ?></div>
        <a href="q?q-id=<?= $qBarQData['id'] ?>">
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