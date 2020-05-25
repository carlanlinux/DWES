<?php
$db= new mysqli('localhost', 'root','root','oophp');
if ($db->connect_error){
    $error = $db->connect_error;
}
//Asegura que PHP usa este charset con acentos y comillas
$db->set_charset('utf-8');