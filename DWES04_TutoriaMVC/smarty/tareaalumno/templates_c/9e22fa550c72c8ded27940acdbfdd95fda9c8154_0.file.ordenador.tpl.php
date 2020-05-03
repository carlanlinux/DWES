<?php
/* Smarty version 3.1.33, created on 2019-02-01 19:50:35
  from 'G:\xampp\htdocs\smarty\tareaalumno\templates\ordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c5494fb94ae89_98015811',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '9e22fa550c72c8ded27940acdbfdd95fda9c8154' =>
                array(
                    0 => 'G:\\xampp\\htdocs\\smarty\\tareaalumno\\templates\\ordenador.tpl',
                    1 => 1548011669,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_5c5494fb94ae89_98015811 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 5: Información ordenador.</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="contenedor">
    <div id="encabezado">
        <h1><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto(); ?>
        </h1>
        <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
        </p>
    </div>

    <div id="productos">
        <h2>Características:</h2>
        <p>Procesador: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador(); ?>
        </p>
        <p>RAM: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getRAM(); ?>
            GB</p>
        <p>Tarjeta gráfica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica(); ?>
        </p>
        <p>Unidad óptica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica(); ?>
        </p>
        <p>Sistema operativo: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getSO(); ?>
        </p>
        <p>Otros: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros(); ?>
        </p>
        <p>PVP: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP(); ?>
        </p>


        <h2>Descripción:</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getdescripcion(); ?>
        </p>
    </div>

    <br class="divisor"/>
    <div id="pie">
        <form action='productos.php' method='post'>
            <input type='submit' name='volver' value='Volver'/>
        </form>
    </div>
</div>
</body>
</html>
<?php }
}
