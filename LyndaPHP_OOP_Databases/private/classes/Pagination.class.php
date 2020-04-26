<?php


class Pagination
{
    //Ponemos los atributos que vamos a necesitar para hacer la paginación
    //Página actual, número de registros que queremos mostrar por página, total de registros a mostrar que hay en la BD.
    public $current_page;
    public $per_page;
    public $total_count;

    //Creamos el constructor con valores por defecto
    public function __construct ($page = 1, $per_page = 20, $total_count = 0)
    {
        //Parseamos a entero para evitar tener problemas
        $this->current_page = (int)$page;
        $this->per_page = (int)$per_page;
        $this->total_count = (int)$total_count;
    }

    //Calculamos cuánto será el offset de cada página, para eso la fórmula es:
    //Cuántos queremos por página multiplicado opr la página en la que estamos -1
    public function offset ()
    {
        return $this->per_page * ($this->current_page - 1);
    }

    //Para saber el total de páginas es la división del total de registros que tenemos / el número de registros que
    // queremos mostrar por página.

    public function page_links ($url)
    {
        $output = "";
        //Si las páginas totales son mayor que 1 entonces mostramos los números de paginación.
        if ($this->total_pages() > 1) {
            $output .= "<div class='pagination'>";
            //Creamos la URL a la que vamos a enviarlo

            //Pintamos el botón previo
            $output .= $this->previous_link($url);

            //pintamos los números intermedios
            $output .= $this->number_links($url);

            //Pintamos el botón Next
            $output .= $this->next_link($url);
            $output .= "</div>";
        }
        return $output;
    }

    //Decimos que la siguiente página es la actual + 1 y devolvelvemos el valor siempre que la página actual sea menor
    // o igual al total de páginas

    public function total_pages ()
    {
        return ceil($this->total_count / $this->per_page);
    }

    //Devolvemos la página anterior, sabemos que la anterior es la actual menos 1, siempre que sea mayor que cero
    // devolvemos la página anterior.

    public function previous_link ($url = '')
    {
        $link = '';
        if ($this->previous_page() != false) {
            //metemos la URL y llamamos al método de siguiente página para construir la URL
            $link = "<a href= \"{$url}?page={$this->previous_page()}\">";
            $link .= "&raquo Previous</a>";
            return $link;
        }

    }

    public function previous_page ()
    {
        $prev = $this->current_page - 1;
        return ($prev > 0) ? $prev : false;
    }

    //hacemos lo mismo pero con la página anterior

    public function number_links ($url)
    {
        $output = '';
        //Ahora queremos mostrar los núemeros de las páginas, para eso nos lo recorremos en un loop
        for ($i = 1; $i <= $this->total_pages(); $i++) {
            //Si estamos en la página actual queremos que se quite el link y aplicamos una clase css
            if ($i == $this->current_page) {
                $output .= "<span class=\"selected\">$i</span>";
            } else {
                $output .= "<a href=\"{$url}?page={$i}\">" . $i . " </a>";
            }
        }
        return $output;
    }

    public function next_link ($url = '')
    {
        $link = '';
        //Si el método next page nos devuelve true pintamos el link
        if ($this->next_page() != false) {
            //metemos la URL y llamamos al método de siguiente página para construir la URL, es mejor construirlo y cuando
            //esté tod o mandarlo en el return.
            $link = "<a href= \"{$url}?page={$this->next_page()}\">";
            $link .= "Next &raquo;</a>";
            echo $link;
        }
    }

//Función que pintará los números de la paginación

    public function next_page ()
    {
        $next = $this->current_page + 1;
        return ($next <= $this->total_pages()) ? $next : false;
    }

}