'use strict'

const dialogModal = document.querySelector('#modal');
const openModal = document.querySelector('#openModal');

openModal.addEventListener('click', function onModal() {
  if (typeof dialogModal.showModal === "function") {
    dialogModal.showModal();
  } else {
    alert("The <dialog> API is not supported by this browser");
  }
});

const closeButton = document.querySelector('#closeButton');
closeButton.addEventListener('click', () => {
  dialogModal.close();
});

const storage = localStorage
const fontSize = document.querySelector('#fontSize')
const bgcolorForm = document.querySelector('#bgcolor')
const colorForm = document.querySelector('#color')

if(!storage.getItem('fontSize')) {
  setfontSize();
  setBGcolor()
  setCcolor()
} else {
  setStyles();
}

function setfontSize() {
  storage.setItem('fontSize', fontSize.value)
  setStyles();
}

function setBGcolor() {
  storage.setItem('bgcolor', bgcolorForm.value)
  setStyles()
}

function setCcolor() {
  storage.setItem('color', colorForm.value)
  setStyles()
}

function setStyles() {
  const currentSize = storage.getItem('fontSize')
  const currentBG = storage.getItem('bgcolor')
  const currentColor = storage.getItem('color')

  fontSize.value = currentSize;
  const mainAll = document.querySelectorAll('html, #log, #modal')

  for (const main of mainAll) {
    main.style.fontSize = currentSize
  }

  const bgcolorAll = document.querySelectorAll('html, .bgcolor')
  const colorAll = document.querySelectorAll('html, .color')

  bgcolorForm.value = currentBG
  colorForm.value = currentColor

  for (const bgcolor of bgcolorAll) {
    bgcolor.style.backgroundColor = currentBG
  }

  for (const color of colorAll) {
    color.style.color = currentColor
  }

  console.info("Font Size:", currentSize, "Background Color:", currentBG, ". Color:", currentColor)
}

fontSize.onchange = setfontSize;
bgcolorForm.onchange = setBGcolor
colorForm.onchange = setCcolor
