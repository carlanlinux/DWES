<?php
/* Smarty version 3.1.33, created on 2019-01-03 12:45:27
  from 'C:\xampp\htdocs\smarty\tareaU4\templates\muestraordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c2df5d7e403e6_82959349',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '47a517a90b4e588ce360a43c1a55819e15ae35bf' =>
                array(
                    0 => 'C:\\xampp\\htdocs\\smarty\\tareaU4\\templates\\muestraordenador.tpl',
                    1 => 1312215344,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_5c2df5d7e403e6_82959349 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Tarea: muestraordenador.php -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tarea Tema 5: Detalle de producto tipo ordenador</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagdetalleproducto">

<div id="contenedor">
    <div id="encabezado">
        <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto(); ?>
        </h1>
        <h2>Código: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo(); ?>
        </h2>
    </div>
    <div id="detalle">
        <h2>Características:</h2>
        <p>Procesador: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador(); ?>
        </p>
        <p>RAM: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getRAM(); ?>
            GB.</p>
        <p>Tarjeta gráfica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica(); ?>
        </p>
        <p>Unidad óptica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica(); ?>
        </p>
        <p>Sistema operativo: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getSO(); ?>
        </p>
        <p>Otros: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros(); ?>
        </p>
        <p>PVP: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getPVP(); ?>
        </p>
        <h2>Descripcion:</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion(); ?>
        </p>
    </div>
</div>
</body><?php }
}
