<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$root = new YsTreeNode('rootId');

$node0 = new YsTreeNode('node0', array('es' => 'Mi Nodo Número 0', 'en' => 'My Node 0'), $root);
$node1 = new YsTreeNode('node1', array('es' => 'Mi Nodo Número 1', 'en' => 'My Node 1'), $root);

$node00 = new YsTreeNode('node00', array('es' => 'Mi Nodo Número 00', 'en' => 'My Node 00'), $node0);
$node01 = new YsTreeNode('node01', array('es' => 'Mi Nodo Número 01', 'en' => 'My Node 01'), $node0);

$node000 = new YsTreeNode('node000', array('es' => 'Mi Nodo Número 000', 'en' => 'My Node 000'), $node00);
$node001 = new YsTreeNode('node001', array('es' => 'Mi Nodo Número 001', 'en' => 'My Node 001'), $node00);

$node10 = new YsTreeNode('node10', array('es' => 'Mi Nodo Número 10', 'en' => 'My Node 10'), $node1);
$node11 = new YsTreeNode('node11', array('es' => 'Mi Nodo Número 11', 'en' => 'My Node 11'), $node1);

$tree = new YsTree('treeId', $root);
$tree->enableL10N('es', 'en');
$tree->noPrependId();
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $tree->draw(); ?>
<br/>

<?php echo YsUIButton::initToolbar('toolbarId') ?>
<button onclick="<?php echo $tree->changeLang('es') ?>">es</button>
<button onclick="<?php echo $tree->changeLang('en') ?>">en</button>
<button onclick="<?php echo $tree->renameNode($node00, 'The new value') ?>">Rename the visible Node 00</button>
<button onclick="<?php echo $tree->renameNode($node00, 'Mi Nuevo Valor', 'es') ?>">Renombrar el nodo 00 ('es' lang)
</button>
<?php echo YsUIButton::endToolbar() ?>
<?php echo YsUIDialog::endWidget() ?>

<?php

echo
YsJQuery::newInstance()
    ->onClick() // On Click
    ->in('#btnOpenDialog') // In the button with id "btnOpenDialog"
    ->execute( // DO
        YsUIDialog::build('#dialogId') // Build and open the UI Dialog
        ->_modal(true)
            ->_width(670)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIButton::build()->in('#toolbarId > button')
    );
?>