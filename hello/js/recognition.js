// Web Speech API の 音声認識を設定
SpeechRecognition = webkitSpeechRecognition || SpeechRecognition;
let recognition = new SpeechRecognition();

// 音声認識の開始・停止
const speechBtn = document.querySelector('#speech-btn');

let speechToText = false;

const stop = () => {
  recognition.stop();
  speechBtn.textContent = "Speech to Text";
  speechBtn.style.color = "inherit";
  speechBtn.style.background = "inherit";
};

const start = () => {
  recognition.start();
  speechBtn.textContent = "Stop";
  speechBtn.style.color = "#fff";
  speechBtn.style.background = "red";
};

speechBtn.addEventListener("click", event => {
  speechToText ? stop() : start();
  speechToText = !speechToText;
})

// 音声認識結果の受け取り
const readme = document.querySelector('#readme');

recognition.interimResults = true;
recognition.continuous = true;

let finalTranscript = '';
recognition.onresult = (event) => {
  let interimTranscript = '';
  for (let i = event.resultIndex; i < event.results.length; i++) {
    let transcript = event.results[i][0].transcript;
    if (event.results[i].isFinal) {
      finalTranscript += transcript;
    } else {
      interimTranscript = transcript;
    }
  }
  readme.innerHTML = finalTranscript + '<i style="color:#aaa;">' + interimTranscript + '</i>';
}

// select 要素の生成
const voiceSelect = document.querySelector('#voice-select');

function appendVoices() {
  const voices = speechSynthesis.getVoices();
  voiceSelect.innerHTML = '';
  voices.forEach(voice => {
    const option = document.createElement('option');
    option.value = voice.name;
    option.lang = voice.lang;
    option.text = `${voice.name} (${voice.lang})`;
    option.setAttribute('id', voice.name);
    voiceSelect.appendChild(option);
  });

  const lang = document.createElement('option');
  lang.text = `Select a Language & Voice`;
  lang.setAttribute('selected', true);
  lang.setAttribute('disabled', true);
  lang.setAttribute('hidden', true);
  voiceSelect.appendChild(lang);
}

appendVoices()
speechSynthesis.onvoiceschanged = e => {
  appendVoices()
}

voiceSelect.addEventListener('change', (event) => {
  const selectLang = voiceSelect.selectedIndex;
  recognition.lang = voiceSelect.options[selectLang].lang;
});
