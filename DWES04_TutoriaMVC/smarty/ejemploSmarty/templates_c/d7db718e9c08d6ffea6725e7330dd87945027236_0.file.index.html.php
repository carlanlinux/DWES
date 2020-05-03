<?php
/* Smarty version 3.1.33, created on 2019-01-03 09:12:40
  from 'C:\xampp\htdocs\smarty\ejemploSmarty\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c2dc3f8693914_14743677',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'd7db718e9c08d6ffea6725e7330dd87945027236' =>
                array(
                    0 => 'C:\\xampp\\htdocs\\smarty\\ejemploSmarty\\templates\\index.html',
                    1 => 1546502521,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_5c2dc3f8693914_14743677 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value; ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Hola</h1>
<p>nombre: <?php echo $_smarty_tpl->tpl_vars['nombre']->value; ?>
</p>
</body>
</html>
<?php }
}
