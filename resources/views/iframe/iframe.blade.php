<!DOCTYPE html>
<html>
  <head>
    <title>Iframe Window</title>
  </head>
  <body>
    <input type="text" id="myInput">
    <button onclick="sendMessage()">Send Message to Parent Window</button>
    <p id="response_disp"></p>
    <script>
      function sendMessage() {
        var message = document.getElementById('myInput').value;
        window.parent.postMessage(message, '*');
      }

      window.addEventListener('message', onMessageReceived);
      function onMessageReceived(event) {
        var response = event.data;
        document.querySelector('#response_disp').innerHTML = response;
        console.log('Received message in the iframe:', response);
      }

    </script>
  </body>
</html>
