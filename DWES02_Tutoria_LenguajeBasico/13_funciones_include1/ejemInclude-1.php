<?php
/* Este va a ser el fichero a incluir
 * Contiene una función a la que se le pasa una variable como argumento
 * La función genera código HTML y el título de la página corresponde al
 * valor de la variable que se ha pasado por parámetro
 */
function cabecera ($titulo)
{
    print "<!DOCTYPE html>\n";
    print "<html lang=\"es\">\n";
    print "<head>\n";
    print "  <meta charset=\"utf-8\" />\n";
    print "  <title>$titulo</title>\n";
    print "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />";
    print "  <link rel=\"stylesheet\" type=\"text/css\" href=\"estilo.css\"/>\n";
    print "</head>\n";
    print "\n";
    print "<body>\n";
    print "  <h1>$titulo</h1>\n";
    print "\n";
}

?>