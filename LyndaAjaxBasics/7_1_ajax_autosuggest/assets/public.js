// note: IE8 doesn't support DOMContentLoaded - Quiere decir que sólo se cargará una vez haya cargado el DOM completamente
document.addEventListener('DOMContentLoaded', function () {

    //Variable que toma el valor del elemento con la sugerencias
    var suggestions = document.getElementById("suggestions");
    var form = document.getElementById("search-form");
    var search = document.getElementById("search");

    function suggestionsToList(items) {
        //Se tiene que parceer lo del json al HTML que queremos mostrar en el output:
        //<li><a href="./search.php?q=alpha">Alpha</a> </li>
        var output = '';
        for (i = 0; i < items.length; i++) {
            output += '<li>';
            output += '<a href="./search.php?q=' + items[i] + '">';
            output += items[i];
            output += '</a>';
            output += '</li>';
        }
        return output;
    }

    function showSuggestions(json) {
        //de esta forma mostramos las sugerencias
        var li_list = suggestionsToList(json);
        suggestions.innerHTML = li_list;
        suggestions.style.display = 'block'
    }

    function getSuggestions() {
        //Capturamos el valor del campo search
        var q = search.value;

        if (q.length < 3) {
            suggestions.style.display = 'none';
        }

        //console.log('getSuggestions')
        //return;

        var xhr = new XMLHttpRequest();
        //Pasamos q por GET porque estamos recuperando datos y apuntamos a la de autosuggest porque lo que queremos es la
        // funcion de mostrar los autosuggests.
        xhr.open('GET', './autosuggest.php?q=' + q, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log('Result: ' + result);

                //La recibimos como JSON
                var json = JSON.parse(result);
                showSuggestions(json);
            }
        };
        xhr.send();
    }

    //Llamamos al event listener la acción change cmbia cada vez que salgo del input field, apra eso tenemos que ver cada
    // vez que alguien pulsa una tecla, eso es input
    search.addEventListener("input", getSuggestions, false);

});
