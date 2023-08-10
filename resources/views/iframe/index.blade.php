<!DOCTYPE html>
<html>
  <head>
    <title>Parent Window</title>
  </head>
  <body>
    <iframe src={{ route('iframe') }} id="my-iframe"></iframe>
    <p id="message_disp"></p>

    <script>
        window.addEventListener('message', onMessageReceived);

        function onMessageReceived(event) {
          var message = event.data;
          document.querySelector('#message_disp').innerHTML = message;

          if(message != null){


            var iframe = document.getElementById('my-iframe');

            var response = 'wa alaikum o salam from the parent';

            iframe.contentWindow.postMessage(response, '*');
            // event.source.postMessage(response, '*');
          }

          console.log('Received message in the index:', message);
        }
      </script>

    {{-- <script>
      window.addEventListener('message', onMessageReceived);
      function onMessageReceived(event) {
            var message = event.data;
            document.querySelector('#message_disp').innerHTML = message;

            if(message != null){
                var response = 'wa alaikum o salam from the parent';
                event.source.postMessage(response, '*');
            }

        console.log('Received message:', message);
      }
    </script> --}}

  </body>
</html>
