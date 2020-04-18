<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Infinite Scroll</title>
    <style>
        #blog-posts {
            width: 700px;
        }

        .blog-post {
            border: 1px solid black;
            margin: 10px 10px 20px 10px;
            padding: 6px 10px;
        }

        #spinner {
            display: none;
        }
    </style>
</head>
<body>
<div id="blog-posts">


</div>

<div id="spinner">
    <img src="spinner.gif" width="50" height="50"/>
</div>

<div id="load-more-container">
    <!--Establecemos un data attribute y le amos el valor de 0 al principio y con javascript cogemos este valor. -->
    <button id="load-more" data-page="0">Load more</button>
</div>

<script>
    //En este contenedor es donde vmos a poner más entradas al blog
    var container = document.getElementById('blog-posts');
    //El botón de cargar más
    var load_more = document.getElementById('load-more');
    //Tenemos que asegurarnos que sólo se manda una request y no 50000 cuando se hace scroll y se llega ahí, para eso
    //vamos a crear una variable que nos sirva para controlar cuando hay una request en proceso.
    ;var request_in_progress = false;

    function showSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'block';
    }

    function hideSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'none';
    }

    function showLoadMore() {
        load_more.style.display = 'inline';
    }

    function hideLoadMore() {
        load_more.style.display = 'none';
    }

    //Creamos un método que vaya incrementando el atributo data-page según en qué página estemos. Lo podemos sacar
    //Por la consola para verlo. Se ejecutará una vez tengamos la respuesta.
    function setCurrentPage(page) {
        console.log("Incrementing page to: " + page);
        load_more.setAttribute('data-page', page);
    }

    //Esta función se encargará del scroll
    function scrollReaction() {
        //Vemos la altura del contenido y dónde estamos relativo a él
        var content_height = container.offsetHeight;
        //Sacamos la cordenada Y donde nos encontramos
        var current_y = window.innerHeight + window.pageYOffset;
        //Lo sacamos por la consola para verlo, y tan pronto como se acerce a la parte final, debería cargarse el nuevo contenido
        //console.log(current_y + '/' + content_height);
        //Cuando el scroll sea mayor o igual la altura del contenido entonces va mostrandolo más.
        // Esto provoca que si haces scroll muy rápido, envía demasiadas Ajax request a la vez.
        if (current_y >= content_height) {
            loadMore()
        }

    }

    //Aquí pasamos el div donde lo queremos meter y el HTMK que tenemos que incluir. En este caso no queremosusar la
    // función innerHTML, sino habría como hacemos con el DOM, pero para eso primero hay que procesar este HTML,
    //Por eso primero creamos el div temporal para que el browser lo pueda parsear como elemento y una vez ya tengamos
    //eso podemos trabajar con esos elementos y usar el inneJTML
    function appendToDiv(div, new_html) {
        var temp = document.createElement('div');
        temp.innerHTML = new_html;
        //Ahora tenemos que conseguir todos los elementos. Hay hijo de Temp y esos hijos no són los 3 divs que están
        //Debajo de ellos, sino que el espacio en blanco de bajo de ellos también es es child, por lo que si ponemos solo
        //Firstchild y dime su clase, irá a coger sólo los 3 div. Es como DOM trata los espacios en blanco
        var class_name = temp.firstElementChild.className;
        var items = temp.getElementsByClassName(class_name);

        //Ahora nos recorremos todos los que nos ha devuelto y lo mostramos. Hay que tener cuidado, porque cada vez
        //que hacemos esto nos lo saca del array, y el length es menor por eso hay que poner la variable fuera del for
        //Para que  mantenga el lenght incicial del array y lo añade al div.
        var len = items.length;
        for (i = 0; i < len; i++) {
            div.appendChild(items[0]);
        }
    }


    function loadMore() {
        //En primer lugar controlamos que si request in progress es true, salga de la función con un return y, si por
        // el contrario es false, entra a la función y cambiamos la variable a true.
        if (request_in_progress) {return;}
        request_in_progress = true;

        showSpinner();
        hideLoadMore();

        //Para contar por qué página vamos se puede hacer de forma simple con dos variables que se vayan sumando
        //Pero la mejor forma de hacerlo es con Data attraibutes en el proppio botón.
        //var page = 1;
        //var next_page = page + 1;
        //Guardamos en qué página estamos en una variable, sacándolo del atributo data-page del botón load_more y lo
        //Parseamos para asugrarnos que es un entero.
        //Tambie´´ se puee usar Dataset que es más moderno
        var page = parseInt(load_more.getAttribute('data-page'));
        var next_page = page + 1;


        //Aburmos un request con get que llama a la paágina uno de los blogs
        //cuando cambie el estado y sea succesgull entonces lo que me haces es mosrar los resultaos, ocultar el spinner
        //Y volver a mostrar el botón.
        var xhr = new XMLHttpRequest();

        //Si lo ponemos como abajo, estamos enviando siempre page 1 y luego va a devolver los articulos siempre 1, 2 3
        //Lo que tenemos que hacer es que esto sea variable.
        //xhr.open('GET', '6_1_blog_posts.php?page=1', true);
        xhr.open('GET', '6_1_blog_posts.php?page=' + next_page, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log('Result: ' + result);

                hideSpinner();
                setCurrentPage(next_page);
                // append results to end of blog posts, quermos coger el resultado y meterlo dentro del contenedor.
                appendToDiv(container, result);
                showLoadMore();
                //Una vez que se ha cargado, volvemos a poner en falso para que permita hacer la petición de nuevo.
                request_in_progress = false;

            }
        };
        xhr.send();
    }

    //cuando clclamos en el botón carga más
    load_more.addEventListener("click", loadMore);
    //Para que pueda cargarse automáticamente con el scroll, necesitamos asociar la acción al evento scroll de winddow
    window.onscroll = function () {
        //Llaamamos a la fucnión del scroll
        scrollReaction();
    };



    // Load even the first page with Ajax de esta forma carga toda la página y asíncronamente va cargando el contenido
    //que serían las entradas del blg
    loadMore();

</script>

</body>
</html>
