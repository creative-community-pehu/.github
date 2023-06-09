"use strict"

document.addEventListener('readystatechange', event => {
  if (event.target.readyState === 'loading') {
    // 文書の読み込み中に実行する
  } else if (event.target.readyState === 'interactive') {
    const yourInfo = JSON.parse(localStorage.getItem('yourInfo'))

    if(!localStorage.getItem('yourInfo')) {
      const logAll = document.querySelectorAll('.log')
      for  (let log of logAll) {
        log.remove()
      }
      const nowForm = document.querySelector('form');
      nowForm.innerHTML = `<button type="button" onclick="location.replace('/')">creative-community.space</button>`
    } else {
      document.querySelector('#update').remove()
    }
  } else if (event.target.readyState === 'complete') {
  }
});
