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