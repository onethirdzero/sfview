// https://medium.com/@bryanjenningz/how-to-record-and-play-audio-in-javascript-faa1b2b3e49b
'use strict';

// Trigger speech recognition by pressing the space bar.
document.onkeyup = (event) => {
  // Graceful degradation: https://medium.com/@uistephen/keyboardevent-key-for-cross-browser-key-press-check-61dbad0a067a
  if (event.defaultPrevented) {
    return;
  }
  var key = event.key || event.keyCode;
  if (key == ' ') {
    startRecognition();
  }
}

var startRecognition = () => {
// In dev, it's fine to serve over localhost.
// In prod, we'll need to serve over HTTPS to use the Web Audio API.
// https://stackoverflow.com/questions/34165614/navigator-mediadevices-getusermedia-is-not-working-and-neither-does-webkitgetuse
  navigator.mediaDevices.getUserMedia({ audio: true })
    .then(stream => {
      // https://developer.mozilla.org/en-US/docs/Web/API/MediaRecorder/MediaRecorder#Syntax
      // mimeType indicates the container format.
      const mediaRecorder = new MediaRecorder(stream, {
        mimeType: 'audio/webm'
      });
      mediaRecorder.start();

      const audioChunks = [];
      mediaRecorder.addEventListener("dataavailable", event => {
        audioChunks.push(event.data);
      });

      mediaRecorder.addEventListener("stop", () => {
        // https://developer.mozilla.org/en-US/docs/Web/API/Blob/Blob#Parameters
        // The mimeType here might also refer to container format, but it's not explicit.
        const audioBlob = new Blob(audioChunks, {type: 'audio/webm'});
        console.log('Audio recorded: ' + audioBlob);

        // https://stackoverflow.com/questions/18650168/convert-blob-to-base64
        var reader = new window.FileReader();
        reader.readAsDataURL(audioBlob);
        reader.onloadend = () => {
          var dataUrl = reader.result;
          var base64Encoded = dataUrl.split(',')[1]

          // Send it off to api/speech endpoint.
          $.post('http://localhost:8000/api/speech', {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'audio': base64Encoded,
          },
            'json'
          ).done((response) => {
            console.log('Response: ', response);
          });
        }
      });

      setTimeout(() => {
        mediaRecorder.stop();
      }, 3000);
  });
}
