<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$root = new YsTreeNode('rootId');

$node0 = new YsTreeNode('female', 'Male', $root);
$node1 = new YsTreeNode('male', 'Female', $root);

$maleNode1 = new YsTreeNode('node00', 'Jhon', $node0);
$maleNode2 = new YsTreeNode('node01', 'Omar', $node0);
$maleNode3 = new YsTreeNode('node01', 'Sebastian', $node0);

$femaleNode1 = new YsTreeNode('node00', 'Rossana', $node1);
$femaleNode2 = new YsTreeNode('node01', 'Maria', $node1);
$femaleNode3 = new YsTreeNode('node01', 'Judith', $node1);


// The first way of doing it
$maleRootType = new YsTreeNodeType('maleRoot');
$maleRootType->setIconImage('http://cdn.varjanta.com/static2/gender/Male.png');
$maleRootType->applyTo($node0);


// The second way of doing it
$femaleRootType = new YsTreeNodeType('femaleRoot', 'http://cdn.varjanta.com/static2/gender/Female.png');
$femaleRootType->applyTo($node1);

$maleType = new YsTreeNodeType('male', 'http://www.namedrop.it/Content/i/male.png');
$maleType->applyTo($maleNode1, $maleNode2, $maleNode3);

// Applying the types to the nodes
$femaleType = new YsTreeNodeType('female', 'http://www.namedrop.it/Content/i/female.png');
$femaleNode1->setType($femaleType);
$femaleNode2->setType($femaleType);
$femaleNode3->setType($femaleType);

$tree = new YsTree('treeId', $root);

$tree->addTypes($maleRootType, $femaleRootType, $maleType, $femaleType);
$tree->enableTypes();


?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $tree->draw(); ?>
<br/>
<?php echo YsUIButton::initToolbar('toolbarId') ?>
<button onclick="<?php echo $tree->setNodeType($femaleRootType, $node0) ?>">Set Type (Female)</button>
<button onclick="<?php echo $tree->setNodeType($maleRootType, $node0) ?>">Set Type (Male)</button>
<button onclick="<?php echo $tree->setDefaultType($node0) ?>">Set Default Type</button>
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
    )
?>