<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$root = new YsTreeNode('rootId');

$node0 = new YsTreeNode('node0', 'Node 0', $root);
$node0->setInitiallyOpen(true);

new YsTreeNode('node00', 'jQuery', $node0);
new YsTreeNode('node00', 'jQueryUI', $node0);
new YsTreeNode('node00', 'jQuery4PHP', $node0);

$tree = new YsTree('treeId', $root);
$tree->enableContextMenu();
$tree->enableUnique();

?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
Prevents from nodes with same titles coexisting (create/move/rename) in the same parent
<br/>
<br/>
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
    )
?>