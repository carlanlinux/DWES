<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQTREE);

$root = new YsLinkableTreeNode('rootId');
$node0 = new YsLinkableTreeNode('node0', 'Node 0', $root);
$node1 = new YsLinkableTreeNode('node1', 'Node 1', $root);

$node00 = new YsLinkableTreeNode('node00', 'Node 00', $node0);
$node01 = new YsLinkableTreeNode('node01', 'Node 01', $node0);
$node01->setHtmlProperties('onclick="alert(\'Click in \' +  this.id)"');

$node000 = new YsLinkableTreeNode('node000', 'Node 000', $node00);
$node001 = new YsLinkableTreeNode('node001', 'Node 001', $node00);

$node10 = new YsLinkableTreeNode('node10', 'Node 10', $node1);
$node11 = new YsLinkableTreeNode('node11', 'Node 11', $node1);

?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div id="myTree" style="height: 100%">
    <?php echo $root ?>
</div>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(670)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    );

echo
YsJQuery::newInstance()
    ->execute(
        YsJQTree::build()->in('#myTree')
    );
?>