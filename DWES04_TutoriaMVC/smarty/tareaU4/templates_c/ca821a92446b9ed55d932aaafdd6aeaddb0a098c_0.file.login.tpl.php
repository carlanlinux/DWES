<?php
/* Smarty version 3.1.33, created on 2019-01-03 10:47:14
  from 'C:\xampp\htdocs\smarty\tareaU4\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c2dda226b6b32_22647571',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'ca821a92446b9ed55d932aaafdd6aeaddb0a098c' =>
                array(
                    0 => 'C:\\xampp\\htdocs\\smarty\\tareaU4\\templates\\login.tpl',
                    1 => 1312210748,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_5c2dda226b6b32_22647571 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Tarea: login.php -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tarea Tema 5: Login Tienda Web con Ordenadores</title>
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
