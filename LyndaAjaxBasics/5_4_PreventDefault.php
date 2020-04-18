<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Asynchronous Form</title>
    <style>
      #result {
        display: none;
      }

        .error {
            border: 1px solid red;
        }

        #spinner {
            display: none;
        }
    </style>
  </head>
  <body>

    <div id="measurements">
      <p>Enter measurements below to determine the total volume.</p>
      <form id="measurement-form" action="5_4_process_measurements.php" method="POST">
        Length: <input type="text" name="length" /><br />
        <br />
        Width: <input type="text" name="width" /><br />
        <br />
        Height: <input type="text" name="height" /><br />
        <br />
          <!-- Cuando queremos usar un mismo botón para AJAX como para HTML debemos dejar el submit, ya que es el único
           que permite envíar datos. Y se linkará el Ajax a este botón -->
        <input id="html-submit" type="submit" value="Submit" />
          <!-- Ojo! Cuando se usa Ajax mejor no usar tipo submit, sino usar tipo botón. -->

      </form>
    </div>
    <div class="spinner">
        <img id="spinner" src="spinner.gif" width="50" height="50">
    </div>
    <div id="result">
      <p>The total volume is: <span id="volume"></span></p>
    </div>

    <script>

      var result_div = document.getElementById("result");
      var volume = document.getElementById("volume");
      //Creamos el botón como variable global del script para acceder a él desde el resto de funciones
      var button = document.getElementById("html-submit");
      //cComo quueremos cambiar el nombre del valor del texto del botón, vamos a guardar el original para no perderlo
      // y evitar confusiones
      var originalButtonValue = button.value;

      function showSpinner() {
          var spinner = document.getElementById('spinner');
          spinner.style.display = 'block';
      }

      function hideSpinner() {
          var spinner = document.getElementById('spinner');
          spinner.style.display = 'none';

      }

      function displayErrors(errors) {
          //Va a buscar todos los imputos y va a recorrerlos
          var inputs = document.getElementsByTagName('input');
          for (let i = 0; i < inputs.length; i++) {
              var input = inputs[i];
              //Va a buscar lso errores y va a buscar si ese nombre está en el array. Index of busca si el input name
              //Si está presnete ese nombre en el array, devuelve un index si lo encuentra o un negativo si no. Si es positivo
              //Quiere decir que ha encontrado algo. se puede usar has pero no lo sportan todos los buscadores
              if(errors.indexOf(input.name) >= 0) {
                  input.classList.add('error');
              }
          }
      }

      function clearErrors() {
          let inputs = document.getElementsByTagName('input');
          for (let i=0; i < inputs.length; i++) {
              inputs[i].classList.remove('error');
          }

      }
      
      function postResult(value) {
        volume.innerHTML = value;
        result_div.style.display = 'block';
      }

      function clearResult() {
        volume.innerHTML = '';
        result_div.style.display = 'none';
      }
        //Función que inhabilita el botón, podemos también cambiar el texto que mostramos mientras se carga.
      function disableSubmitButton() {
          button.disabled = true;
          button.value = "Loading..."
      }

      function enableSubmitButton() {
          button.disabled = false;
          button.value = originalButtonValue;
      }

      function calculateMeasurements() {
        clearResult();
        clearErrors();
        //Ponemos el spinner aquí para cuando se ejecute el envío aparezca el spinner nada más enviarse
        showSpinner();
        //En el momento que envíamos los datos queremos que se inhabilite el botón de volver a enviar
        disableSubmitButton ();


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
            console.log('Result: ' + result);;
            //Ponemos el Spinner aquí para qeu se quite en cuanto tengamos el resultado.
              hideSpinner();
             //Hacemos que se vuelva a habilitar el botón de envío una vez que ya hemos recibido los datos
              enableSubmitButton();

            //Llamamos al método que hace que haga visible el resultado
                let json = JSON.parse(result);
                //has es más compatible con diferentes navegadores
                if (json.hasOwnProperty('errors') && json.errors.length > 0) {
                    displayErrors(json.errors);
                } else {
                    postResult(json.volume);
                }

          }
        };
        xhr.send(form_data);
      }
        //Capturamos el botón y lo que hacemos es que cuando se puslse, ejecute la función de calcular
      //Capturamos el evento, y le indicamos un preventDefault para que automáticamente llame por HTML o por AJAX, con esto
      //Le decimos, lo que tengas que hacer, (enviarlo por HTML en este caso.
      button.addEventListener("click", function (event) {
          event.preventDefault();
          calculateMeasurements();
      });

    </script>

  </body>
</html>
