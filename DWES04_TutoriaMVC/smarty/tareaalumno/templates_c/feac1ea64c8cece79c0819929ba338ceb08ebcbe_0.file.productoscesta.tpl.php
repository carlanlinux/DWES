<?php
/* Smarty version 3.1.33, created on 2019-02-01 19:54:25
  from 'G:\xampp\htdocs\smarty\tareaalumno\templates\productoscesta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.33',
    'unifunc' => 'content_5c5495e1526323_98236645',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'feac1ea64c8cece79c0819929ba338ceb08ebcbe' =>
                array(
                    0 => 'G:\\xampp\\htdocs\\smarty\\tareaalumno\\templates\\productoscesta.tpl',
                    1 => 1312200025,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_5c5495e1526323_98236645 (Smarty_Internal_Template $_smarty_tpl)
    {
        ?>    <h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
        <hr/>
        <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) { ?>
        <p>Cesta vacía</p>
    <?php } else { ?>
        <?php
        $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productoscesta']->value, 'producto');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
                ?>
                <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo(); ?>
                </p>
                <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
    <?php } ?>

        <form id='vaciar' action='productos.php' method='post'>
            <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) { ?>
                <input type='submit' name='vaciar' value='Vaciar Cesta' disabled='true'/>
            <?php } else { ?>
                <input type='submit' name='vaciar' value='Vaciar Cesta'/>
            <?php } ?>
        </form>
        <form id='comprar' action='cesta.php' method='post'>
            <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) { ?>
                <input type='submit' name='comprar' value='Comprar' disabled='true'/>
            <?php } else { ?>
                <input type='submit' name='comprar' value='Comprar'/>
            <?php } ?>
        </form>
    <?php }
}
