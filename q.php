<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style/css/q-style.css" />
  <title>Main</title>
  <?php
    require './php/index-code.php';
    require './php/my-sql-n.php';
    require './php/q-code.php';
    $mysql = new MySqlN();
    $qId = @$_GET['q-id'];
    $jsonData = json_decode(
      file_get_contents(
        "./q-json/$qId.json"
      ), true
    );

    $creator = new qCreator($jsonData)
  ?>
</head>
<body>
  <?php require './partial/header.php' ?>
  <main>
    <?=$creator->createQuestions()?>
    <div class="result">
      <span class="result__score"> Twój wynik: <span class="score">?</span>/<?=count($jsonData['questions'])?></span>
      <div class="result__img" style="background-image: url(./img/for-q/<?=$jsonData['resultImg']?>)"></div>
    </div>
  </main>
  <script>qId = <?= $qId ?></script>
  <script>
    const answersWrappers = document.querySelectorAll('.question__answers-wrapper')

const gotAnswers = Array(answersWrappers.length).fill(undefined)

const getWo = (arr, number) => {
  const list = arr
  list.splice(number, 1)
  return list
}

const sawResult = () => {
  fetch(`/api.php/q/${qId}/good`)
  .then(response => response.json())
  .then(data => {
    document.querySelector('.score').innerHTML = data.questions
    .map(question => question.good)
    .reduce((count, cur, curIndex) => 
      count + (cur == gotAnswers[curIndex]), 0)
    // TODO: change visibility
    document.querySelector('.result').style = 'display: block'
    scroll(0, 10000)
  })
}

answersWrappers.forEach((answersWrapper, wrapperindex) => {
  const answers = answersWrapper.querySelectorAll('.question__answer')
  answers.forEach((answer, answerIndex) => {
    answer.addEventListener('click', () => {
      if(gotAnswers[wrapperindex] != undefined) return
      answer.classList.add('clicked')
      gotAnswers[wrapperindex] = answerIndex
      if(gotAnswers.every(val => val != undefined))
        sawResult()
    })
  })
})
  </script>
</body>
</html>