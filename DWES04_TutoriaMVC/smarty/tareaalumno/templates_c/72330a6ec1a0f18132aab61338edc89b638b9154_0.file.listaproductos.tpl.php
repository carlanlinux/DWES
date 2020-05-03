<?php
/* Smarty version 3.1.33, created on 2019-02-01 19:54:25
  from 'G:\xampp\htdocs\smarty\tareaalumno\templates\listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c5495e15e59d0_33028557',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '72330a6ec1a0f18132aab61338edc89b638b9154' =>
                array(
                    0 => 'G:\\xampp\\htdocs\\smarty\\tareaalumno\\templates\\listaproductos.tpl',
                    1 => 1548004895,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_5c5495e15e59d0_33028557 (Smarty_Internal_Template $_smarty_tpl)
    {
        ?><?php
        $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
                ?>
                <p>
                <form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
' action='productos.php' method='post'>
                    <input type='hidden' name='cod'
                           value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
'/>
                    <input type='submit' name='enviar' value='Añadir'/>
                    <?php if ($_smarty_tpl->tpl_vars['producto']->value->getfamilia() == "ORDENA") { ?>
                        <a href="ordenador.php?codigo=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
"> <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto(); ?>
                            : <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP(); ?>
                            euros.</a>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto(); ?>
                        : <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP(); ?>
                        euros.
                    <?php } ?>
                </form>
                </p>
                <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
    }
}
