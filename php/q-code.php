<?php
class qCreator {
  private $questions;
  private $result;
  function __construct($jsonData) {
    $this->questions = $jsonData['questions'];
    $this->result = $jsonData['resultImg'];
  }

  function createQuestions() {
    foreach($this->questions as $question):?>
      <div class="question">
        <h1 class="question__title"><?=$question['title']?></h1>
        <div class="question__img">
          <img src="./img/for-q/<?=$question['img']?>" alt="">
        </div>
        <div class="question__answers-wrapper" style="grid-template-rows: repeat(<?=$this->answerCount($question)?>, 1fr)">
          <?=$this->createAnswers($question)?>
        </div>
      </div>
    <?php
    endforeach;
  }

  function answerCount($question) {
    return count($question["answers"]);
  }
  
  function createAnswers($question) {
    foreach($question['answers'] as $answer):?>
      <div class="question__answer"><?=$answer?></div>
    <?php
    endforeach;
  }
}