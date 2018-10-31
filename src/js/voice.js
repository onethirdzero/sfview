// https://developer.mozilla.org/en-US/docs/Web/API/Web_Speech_API/Using_the_Web_Speech_API
// Speech-to-text currently only works for Chrome: https://github.com/mdn/web-speech-api/issues/3.
// webkitSpeechRecognition is an experimental feature, so ESLint must not
// not recognize it in its rules yet, which is why it fails the lint.
// Build without lint for now.
var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition
var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList
var SpeechRecognitionEvent = SpeechRecognitionEvent || webkitSpeechRecognitionEvent

var locations = ['aqua', 'azure', 'beige', 'bisque', 'black', 'blue', 'brown', 'chocolate', 'coral', 'crimson', 'cyan', 'fuchsia', 'ghostwhite', 'gold', 'goldenrod', 'gray', 'green', 'indigo', 'ivory', 'khaki', 'lavender', 'lime', 'linen', 'magenta', 'maroon', 'moccasin', 'navy', 'olive', 'orange', 'orchid', 'peru', 'pink', 'plum', 'purple', 'red', 'salmon', 'sienna', 'silver', 'snow', 'tan', 'teal', 'thistle', 'tomato', 'turquoise', 'violet', 'white', 'yellow'];
var grammar = '#JSGF V1.0; grammar locations; public <location> = ' + locations.join(' | ') + ' ;'

// Instantiate SpeechRecognition object and list.
var recognition = new SpeechRecognition();
var speechRecognitionList = new SpeechGrammarList();

// Add our JSGF grammar.
speechRecognitionList.addFromString(grammar, 1);
recognition.grammars = speechRecognitionList;

//recognition.continuous = false;
recognition.lang = 'en-US';
recognition.interimResults = false; // We'll return final results instead.
recognition.maxAlternatives = 1;

var button = document.querySelector('#voice-input-button');
button.onclick = () => {
    recognition.start(); // This is where the magic starts.
    console.log('Ready to receive command.');
};

recognition.onresult = function (event) {
    // The SpeechRecognitionEvent results property returns a SpeechRecognitionResultList object
    // The SpeechRecognitionResultList object contains SpeechRecognitionResult objects.
    // It has a getter so it can be accessed like an array
    // The [last] returns the SpeechRecognitionResult at the last position.
    // Each SpeechRecognitionResult object contains SpeechRecognitionAlternative objects that contain individual results.
    // These also have getters so they can be accessed like arrays.
    // The [0] returns the SpeechRecognitionAlternative at position 0.
    // We then return the transcript property of the SpeechRecognitionAlternative object

    var last = event.results.length - 1;
    var location = event.results[last][0].transcript;
    console.log(location);
    console.log('Result received: ' + location + '.');
    console.log('Confidence: ' + event.results[0][0].confidence);
}

recognition.onspeechend = function () {
    recognition.stop();
}

recognition.onnomatch = function (event) {
    console.log('Location not recognized.');
}

recognition.onerror = function (event) {
    console.log('Error occurred in recognition: ' + event.error);
}
