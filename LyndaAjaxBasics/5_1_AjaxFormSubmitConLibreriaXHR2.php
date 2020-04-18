<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Asynchronous Form</title>
    <style>
      #result {
        display: none;
      }
    </style>
  </head>
  <body>

    <div id="measurements">
      <p>Enter measurements below to determine the total volume.</p>
      <form id="measurement-form" action="5_1_process_measurements.php" method="POST">
        Length: <input type="text" name="length" /><br />
        <br />
        Width: <input type="text" name="width" /><br />
        <br />
        Height: <input type="text" name="height" /><br />
        <br />
        <input id="html-submit" type="submit" value="Submit" />
          //Ojo! Cuando se usa Ajax mejor no usar tipo submit, sino usar tipo botón.
        <input id="ajax-submit" type="button" value="Ajax Submit" />
      </form>
    </div>

    <div id="result">
      <p>The total volume is: <span id="volume"></span></p>
    </div>

    <script>

      var result_div = document.getElementById("result");
      var volume = document.getElementById("volume");

      function postResult(value) {
        volume.innerHTML = value;
        result_div.style.display = 'block';
      }

      function clearResult() {
        volume.innerHTML = '';
        result_div.style.display = 'none';
      }

      function calculateMeasurements() {
        clearResult();

        var form = document.getElementById("measurement-form");
        //Aqui capturamos cualquier que sea la acción y la va a usar en el ajax, si se cambia en el formulario, en el determine form action Ajax lova a coger igual
          var action = form.getAttribute("action");

            //cogemos el formulario, nuscaos todos los elementos por su tagname, y cogemos los input, los juntamos en un
          //array y liego los juntamos todos en un string con un &
          //Esto omite las textareas, sleect-option, checkoxes y radio buttons
          function gatherFormData(form) {
              var inputs = form.getElementsByTagName('input');
              var array = [];
              for (let i = 0; i < inputs.length; i++){
                  var inputNameValue = inputs[i].name + '=' + inputs[i].value;
                  array.push(inputNameValue);
              }
              return array.join('&');
          }

          // gather form data
        //Creamos un objeto Form data que irá por todos los elementos del formulario que le mandamos.
          var form_data = new FormData(form);
        //Para ver lo que hace, vamos a hacer un log de todos los datos con un for que nos recorra todas las entries y
          //las saque por la consola
          for ([key,value] of form_data.entries()){
              console.log(key + ': '+ value);
          }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', action, true);

        //cuando se usa FormData no hay que poner el content type del header, automaticamente lo codigica y lo manda para PHP
        //xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            console.log('Result: ' + result);
            //Llamamos al método que hace que haga visible el resultado
            postResult(result);
          }
        };
        xhr.send(form_data);
      }
        //Capturamos el botón y lo que hacemos es que cuando se puslse, ejecute la función de calcular
      var button = document.getElementById("ajax-submit");
      button.addEventListener("click", calculateMeasurements);

    </script>

  </body>
</html>
