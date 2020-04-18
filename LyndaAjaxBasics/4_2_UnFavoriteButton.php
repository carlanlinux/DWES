<?php
//Abirmos la sesión para que nos guarde los favorites en la sesión
session_start();

//Con esto vaciamos el array de que contiene los artículos favoritos.
//$_SESSION['favorites'] = [];

//Si no está ya creado en la sesión el array favorites lo creamos.
if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

function is_favorited($id){
    //PAsamos un ID y devolverá true o false en función de si ese ID que le pasamos se enceuntra dentro del array de
    //Session dentro de favoritos. (Buscamos ID dentro de favorites)
    return in_array($id, $_SESSION['favorites']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Asynchronous Button</title>
    <style>
        #blog-posts {
            width: 700px;
        }
        .blog-post {
            border: 1px solid black;
            margin: 10px 10px 20px 10px;
            padding: 6px 10px;
        }

        button.favorite-button, button.unfavorite-button {
            background: #0000FF;
            color: white;
            text-align: center;
            width: 70px;
        }
        button.favorite-button:hover, button.unfavorite-button:hover {
            background: #000099;
        }

        button.favorite-button{
            display: inline;
        }

        .favorite button.favorite-button {
            display: none;
        }

        .favorite button.unfavorite-button{
            display: inline;
        }

        button.unfavorite-button {
            display: none;
        }

        .favorite-heart{
            color: red;
            font-size: 2em;
            float: right;
            display: none;
        }
        /* Si la clase favorite está por encima de la clase favorite heart entonces que me muestre el corazón. Esto es porque
         primero tenemos el dev con el bloque, luego el de la entrada del blog y este además es al que se le pone la clase
         favorite cuando se hace favorito*/
        .favorite .favorite-heart {
            display: block;
        }


    </style>
</head>
<body>
<?php
//Con esto mostramos los IDs en la parte superior de la pantalla
//Se usa método join para juntar cadenas con un separador ', ' si queremos comprobar que se guarda
//echo join(', ', $_SESSION['favorites']);
?>
<div id="blog-posts">
    <!-- Añadimos PHP en la parte de la clase para que en el caso que busque en la sesión y se marcara como favorito
     con anterioridad, lo que haga sea añadir la clase favorito al artículo que le corresponda para que se vea el
     corazón -->
    <div id="blog-post-101" class="blog-post <?php if (is_favorited(101)) echo 'favorite'; ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>Blog Post 101</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo.
            Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris
            interdum id. Nulla porta egestas nisi, et eleifend nisl tincidunt suscipit. Suspendisse massa ex, fringilla quis orci a, rhoncus porta nulla. Aliquam diam velit, bibendum sit amet suscipit eget, mollis in purus. Sed mattis ultricies scelerisque. Integer ligula magna, feugiat non purus eget, pharetra volutpat orci. Duis gravida neque erat, nec venenatis dui dictum vel. Maecenas molestie tortor nec justo porttitor, in sagittis libero consequat. Maecenas finibus porttitor nisl vitae tincidunt.</p>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
    </div>
    <div id="blog-post-102" class="blog-post <?php if (is_favorited(102)) echo 'favorite'; ?>" >
        <span class="favorite-heart">&hearts;</span>
        <h3>Blog Post 102</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id. Nulla porta egestas nisi, et eleifend nisl tincidunt suscipit. Suspendisse massa ex, fringilla quis orci a, rhoncus porta nulla. Aliquam diam velit, bibendum sit amet suscipit eget, mollis in purus. Sed mattis ultricies scelerisque. Integer ligula magna, feugiat non purus eget, pharetra volutpat orci. Duis gravida neque erat, nec venenatis dui dictum vel. Maecenas molestie tortor nec justo porttitor, in sagittis libero consequat. Maecenas finibus porttitor nisl vitae tincidunt.</p>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
    </div>
    <div id="blog-post-103" class="blog-post <?php if (is_favorited(103)) echo 'favorite'; ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>Blog Post 103</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id. Nulla porta egestas nisi, et eleifend nisl tincidunt suscipit. Suspendisse massa ex, fringilla quis orci a, rhoncus porta nulla. Aliquam diam velit, bibendum sit amet suscipit eget, mollis in purus. Sed mattis ultricies scelerisque. Integer ligula magna, feugiat non purus eget, pharetra volutpat orci. Duis gravida neque erat, nec venenatis dui dictum vel. Maecenas molestie tortor nec justo porttitor, in sagittis libero consequat. Maecenas finibus porttitor nisl vitae tincidunt.</p>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
    </div>
</div>

<script>
    function favorite() {
        //Necesitamos saber cuál de los botones es el que hace click para saber cuál es el favorito.
        //Lo que activa la función es el clic en alguno de los botones de la clase favorite button, por lo que podemos
        //Usar el this (para llamar al elemento que lo ha ejecutado, sí mismo) y de ahí nos movemos al elemento padre
        //Para después poder sacar el id de cada uno de los post.
        var parent = this.parentElement;

        var xhr = new XMLHttpRequest();
        //como vamos a hacer un envío, cambiamos el método a post
        xhr.open('POST', '4_1_favorite.php', true);
        //Añadimos el content type como datos envío del un formulario encoded
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log('Result: ' + result);
                //Si el resultado que nos devuelve la consulta es true...
                if (result == 'true') {
                    //añadaimos al padre del elemento (en este caso el div) una clase más a su lista de clases llamada
                    //favorite.
                    parent.classList.add("favorite")
                }
            }
        };
        xhr.send("id=" + parent.id);
    }

    //Cogemos todos los botones seleccionandolos por su clase y los metemos en una variable
    var buttons = document.getElementsByClassName("favorite-button");
    //Nos recorremos el array de los botones para que a todos ellos les asociemos el evento click y se cargue el método
    //favorite.
    for(i=0; i < buttons.length; i++) {

        buttons.item(i).addEventListener("click", favorite);
    }


    function unfavorite() {
        //Necesitamos saber cuál de los botones es el que hace click para saber cuál es el favorito.
        //Lo que activa la función es el clic en alguno de los botones de la clase favorite button, por lo que podemos
        //Usar el this (para llamar al elemento que lo ha ejecutado, sí mismo) y de ahí nos movemos al elemento padre
        //Para después poder sacar el id de cada uno de los post.
        var parent = this.parentElement;

        var xhr = new XMLHttpRequest();
        //como vamos a hacer un envío, cambiamos el método a post
        xhr.open('POST', '4_2_Unfavorite.php', true);
        //Añadimos el content type como datos envío del un formulario encoded
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log('Result: ' + result);
                //Si el resultado que nos devuelve la consulta es true...
                if (result == 'true') {
                    //añadaimos al padre del elemento (en este caso el div) una clase más a su lista de clases llamada
                    //favorite.
                    parent.classList.remove("favorite")
                }
            }
        };
        xhr.send("id=" + parent.id);
    }

    //Cogemos todos los botones seleccionandolos por su clase y los metemos en una variable
    var buttons = document.getElementsByClassName("unfavorite-button");
    //Nos recorremos el array de los botones para que a todos ellos les asociemos el evento click y se cargue el método
    //favorite.
    for(i=0; i < buttons.length; i++) {

        buttons.item(i).addEventListener("click", unfavorite);
    }


</script>

</body>
</html>
