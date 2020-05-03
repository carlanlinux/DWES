<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$root = new YsTreeNode('rootId');

$node0 = new YsTreeNode('node0', 'Node 0', $root);

$node00 = new YsTreeNode('node00', 'A', $node0);
$node01 = new YsTreeNode('node01', 'C', $node0);
$node02 = new YsTreeNode('node01', 'B', $node0);

$tree = new YsTree('treeId', $root);
$tree->sortable();

?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $tree->draw(); ?>
<br/>
<?php echo YsUIButton::initToolbar('toolbarId') ?>
<button onclick="<?php echo $tree->rename() ?>">Rename</button>
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