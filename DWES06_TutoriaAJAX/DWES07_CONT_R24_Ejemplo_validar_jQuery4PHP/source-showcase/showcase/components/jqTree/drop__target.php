<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JLAYOUT);

$root = new YsTreeNode('rootId');

$node0 = new YsTreeNode('node0', 'Node 0', $root);
$node1 = new YsTreeNode('node1', 'Node 1', $root);

$node00 = new YsTreeNode('node00', 'Node 00', $node0);
$node01 = new YsTreeNode('node01', 'Node 01', $node0);

$node000 = new YsTreeNode('node000', 'Node 000', $node00);
$node001 = new YsTreeNode('node001', 'Node 001', $node00);

$node10 = new YsTreeNode('node10', 'Node 10', $node1);
$node11 = new YsTreeNode('node11', 'Node 11', $node1);

$tree = new YsTree('treeId', $root);
$tree->enableDragAndDrop();
$tree->setDropTarget('#dropTarget');
$tree->setDropFinish(YsJsFunction::call('dropCallback'));

?>
<script>
    function dropCallback(data) {
        data.r.html(data.o.attr("caption"));
    }
</script>


<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsJLayout::initHorizontalLayout(array(YsJLayout::HGAP => 3,
    YsJLayout::VGAP => 3)) ?>
<?php echo YsUIPanel::initWidget('tree', 'style="width:48%"') ?>
<?php echo $tree->draw(); ?>
<?php echo YsUIPanel::endWidget() ?>
<?php echo YsUIPanel::initWidget('dropTarget', 'style="width: 48%"') ?>
Drop Here
<?php echo YsUIPanel::endWidget() ?>
<?php echo YsJLayout::endHorizontalLayout() ?>
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
        YsJLayout::build('.grid')
    );
?>