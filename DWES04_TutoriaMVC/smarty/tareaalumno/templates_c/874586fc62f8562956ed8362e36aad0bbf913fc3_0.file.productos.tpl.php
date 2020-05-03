<?php
/* Smarty version 3.1.33, created on 2019-02-01 19:54:25
  from 'G:\xampp\htdocs\smarty\tareaalumno\templates\productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c5495e143fb70_61294040',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '874586fc62f8562956ed8362e36aad0bbf913fc3' =>
                array(
                    0 => 'G:\\xampp\\htdocs\\smarty\\tareaalumno\\templates\\productos.tpl',
                    1 => 1548003644,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(
            'file:productoscesta.tpl' => 1,
            'file:listaproductos.tpl' => 1,
        ),
), false)) {
function content_5c5495e143fb70_61294040 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: productos.php -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 5: Listado de Productos con Plantillas</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagproductos">

<div id="contenedor">
    <div id="encabezado">
        <h1>Listado de productos</h1>
    </div>

    <!-- Dividir en varios templates -->
    <div id="cesta">
        <?php $_smarty_tpl->_subTemplateRender("file:productoscesta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
        ?>
    </div>

    <div id="productos">
        <?php $_smarty_tpl->_subTemplateRender("file:listaproductos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
        ?>
    </div>

    <br class="divisor"/>
    <div id="pie">
        <form action='logoff.php' method='post'>
            <input type='submit' name='desconectar'
                   value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value; ?>
'/>
        </form>
    </div>
</div>
</body>
</html><?php }
}
