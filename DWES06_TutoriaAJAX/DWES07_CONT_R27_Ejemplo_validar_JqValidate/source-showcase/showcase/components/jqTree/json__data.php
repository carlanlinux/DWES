<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$tree = new YsTree('treeId');
$tree->setURL('examples/response/treeJSONResponse.php');
$tree->setData(YsArgument::value('function (n) { return {"operation" : n.attr ? "get_children" : "first_request","id" : n.attr ? n.attr("id") : 1}}'));

$playerType = new YsTreeNodeType('player', 'http://www.wavingthewheat.com/forum/posticons/soccer.png');
$tree->addTypes($playerType);

$tree->enableJSONData();
$tree->enableTypes();


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
    )
?>