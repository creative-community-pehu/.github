'use strict'

const collection = document.querySelector('#collection');
if(!localStorage.getItem('yourInfo')) {
  collection.remove()
}

const selectModal = document.querySelector('#modal select');
const optionModal = document.querySelectorAll("#modal select option");
selectModal.addEventListener('change', function() {
  const index =  this.selectedIndex;
  window.location.assign(optionModal[index].value);
});

const dateAll = document.querySelectorAll('#log ul li button')
for (const dateLi of dateAll) {
  dateLi.addEventListener('click', function () {
    const uttr = new SpeechSynthesisUtterance()
    uttr.text = this.innerText + this.dataset.date
    uttr.lang = "ja-JP"
    uttr.pitch = 0.9
    uttr.rate = 0.9
    speechSynthesis.speak(uttr)

    const sekkiName = document.querySelector('#log h1 b')
    sekkiName.innerText = this.dataset.name + this.innerText

    const sekkiDates = document.querySelector('#lastModified')
    sekkiDates.innerText = this.dataset.date

    const sekkiAbout = document.querySelector('#log h2')
    sekkiAbout.innerText = this.dataset.hello
  }, false)
}

// 発話の停止・一時停止・再開
const cancelBtn = document.querySelector('#cancel-btn')
const pauseBtn = document.querySelector('#pause-btn')
const resumeBtn = document.querySelector('#resume-btn')

cancelBtn.addEventListener('click', function () {
  speechSynthesis.cancel()
})

pauseBtn.addEventListener('click', function () {
  speechSynthesis.pause()
})

resumeBtn.addEventListener('click', function () {
  speechSynthesis.resume()
})
