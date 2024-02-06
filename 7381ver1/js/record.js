/* Video record 
   Reference: https://blog.csdn.net/fanyamin/article/details/114303004
*/ 
var localStream = null;
var mediaRecorder = null;
var recordChunks = [];
var recordElement = document.querySelector('video');
var recordMediaType = 'video/webm';
 
var mediaButton = document.getElementById('openMedia');
var recordButton = document.getElementById('startRecord');
var playButton = document.getElementById('playRecord');
var downButton = document.getElementById('downRecord');
var uploadButton = document.getElementById('uploadRecord');

mediaButton.addEventListener('click', openMedia);
recordButton.addEventListener('click', startRecord);
//uploadButton.addEventListener('click', uploadRecord);
playButton.addEventListener('click', playRecord);
downButton.addEventListener('click', downRecord);

playButton.disabled = true;
downButton.disabled = true;


var mediaConstraints = {
  audio:  {
      echoCancellation: {exact: true}
    },
  video: {
      width: 1280, 
      height: 960
  }
};

async function openMedia(e, constraints) {

  if (mediaButton.textContent === 'Close Camera') {
    closeMedia(e);
    return;
  }

  try {
      const stream = await navigator.mediaDevices.getUserMedia(mediaConstraints);
      handleSuccess(stream);
      mediaButton.textContent = 'Close Camera';    
      console.log('openMedia success ');
  } catch (ex) {
      handleError(ex);
  }


}
 
function handleSuccess(stream) {
    localStream = stream;
    recordElement.srcObject = stream;
}

function startRecord() {
  if(!localStream) {
      console.error("stream is not created.");
      return;
  }

  if (recordButton.textContent === 'Stop Record') {
      stopRecord();
      return;
  } 

  var options = {mimeType: recordMediaType};
  mediaRecorder = new MediaRecorder(localStream, options);
  mediaRecorder.start();

  recordButton.textContent = 'Stop Record';
  playButton.disabled = true;
  downButton.disabled = true;

  console.log("recorder started");

  mediaRecorder.ondataavailable = function(e) {
      console.log("data available", e.data);
      recordChunks.push(e.data);
  }

  mediaRecorder.onstop = function(e) {
      console.log('onstop fired');
      var blob = new Blob(recordChunks, { 'type' : recordMediaType });
      var blobURL = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.style.display = 'none';
      a.href = blobURL;
      a.download = 'test.webm';
      document.body.appendChild(a);
  };
}

function closeMedia(e) {

  const stream = recordElement.srcObject;
  const tracks = stream.getTracks();
  
  tracks.forEach(function(track) {
      track.stop();
  });

  recordElement.srcObject = null;

  mediaButton.textContent = 'Open Media';

  console.log('closeMedia success ');
}

function stopRecord() {

  if(!mediaRecorder) {
      console.error("stream is not created.");
      return;
  }
  mediaRecorder.stop();
  console.log("recorder stopped");

  recordButton.textContent = 'Start Record';
  playButton.disabled = false;
  downButton.disabled = false;
}

function playRecord() {
  const blob = new Blob(recordChunks, {type: recordMediaType});
  recordElement.src = null;
  recordElement.srcObject = null;
  recordElement.src = window.URL.createObjectURL(blob);
  recordElement.controls = true;
  recordElement.play();
}

function downRecord() {
  const blob = new Blob(recordChunks, {type: recordMediaType});
  const url = window.URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.style.display = 'none';
  a.href = url;
  a.download = 'test.webm';
  document.body.appendChild(a);
  a.click();
  setTimeout(() => {
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
  }, 100);
}

