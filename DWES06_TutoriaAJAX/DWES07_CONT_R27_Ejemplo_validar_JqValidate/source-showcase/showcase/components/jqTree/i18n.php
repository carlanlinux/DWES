<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

//Loading assets when the document is ready
echo
YsJQueryAssets::loadScriptsOnReady(
    'jquery4php-assets/js/plugins/jstree/i18n/jstree.es.js',
    // callback: ENABLE THE BUTTON
    YsJQuery::removeAttr('disabled')->in('#btnOpenDialog'));

$root = new YsTreeNode('rootId');

$node0 = new YsTreeNode('node0', 'Nodo número 0', $root);
$node1 = new YsTreeNode('node1', 'Nodo número  1', $root);

$node00 = new YsTreeNode('node00', 'Nodo número 00', $node0);
$node01 = new YsTreeNode('node01', 'Nodo número 01', $node0);

$node000 = new YsTreeNode('node000', 'Nodo número 000', $node00);
$node001 = new YsTreeNode('node001', 'Nodo número 001', $node00);

$node10 = new YsTreeNode('node10', 'Nodo número 10', $node1);
$node11 = new YsTreeNode('node11', 'Nodo número 11', $node1);

$tree = new YsTree('treeId', $root);
$tree->enableContextMenu();

?>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $tree->draw(); ?>
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
            )
    );
?>