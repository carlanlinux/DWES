<?php
/* Smarty version 3.1.33, created on 2019-02-01 19:51:11
  from 'G:\xampp\htdocs\smarty\tareaalumno\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c54951f559cb8_14429557',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '77255a56e0585c39b917ec4faa4d132513ecbbd7' =>
                array(
                    0 => 'G:\\xampp\\htdocs\\smarty\\tareaalumno\\templates\\login.tpl',
                    1 => 1312200025,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_5c54951f559cb8_14429557 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: login.php -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 5: Login Tienda Web con Plantillas</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id='login'>
    <form action='login.php' method='post'>
        <fieldset>
            <legend>Login</legend>
            <div><span class='error'><?php echo $_smarty_tpl->tpl_vars['error']->value; ?>
</span></div>
            <div class='campo'>
                <label for='usuario'>Usuario:</label><br/>
                <input type='text' name='usuario' id='usuario' maxlength="50"/><br/>
            </div>
            <div class='campo'>
                <label for='password'>Contraseña:</label><br/>
                <input type='password' name='password' id='password' maxlength="50"/><br/>
            </div>

            <div class='campo'>
                <input type='submit' name='enviar' value='Enviar'/>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html><?php }
}
