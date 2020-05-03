<?php
/* Smarty version 3.1.33, created on 2019-01-17 13:42:30
  from 'C:\xampp\htdocs\smarty\tareaU4\templates\listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c407836563d76_59938683',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '5f0eb795b02b06d02aef8a38dd9efc809ae873b3' =>
                array(
                    0 => 'C:\\xampp\\htdocs\\smarty\\tareaU4\\templates\\listaproductos.tpl',
                    1 => 1547728864,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_5c407836563d76_59938683 (Smarty_Internal_Template $_smarty_tpl)
    {
        ?><?php
        $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
                ?>
                <p>
                    <?php if ($_smarty_tpl->tpl_vars['producto']->value->getfamilia() == 'ORDENA') { ?>
                    <a href='muestraordenador.php?cod=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
'>
                        <?php } ?>
                        <form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
' action='productos.php' method='post'>
                            <input type='hidden' name='cod'
                                   value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
'/>
                            <input type='submit' name='enviar' value='Añadir'/>
                            <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto(); ?>
                            : <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP(); ?>
                            euros.
                        </form>
                        <?php if ($_smarty_tpl->tpl_vars['producto']->value->getfamilia() == 'ORDENA') { ?>
                    </a>
                <?php } ?>
                </p>
                <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
    }
}
