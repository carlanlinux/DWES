<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$tree = new YsTree('treeId');
$tree->setURL('examples/response/treeXMLResponse.php');
$tree->setData(YsJsFunction::call('myBuildData'));
$tree->setSuccessCallback(YsJsFunction::call('mySuccessCallback'));
$tree->setErrorCallback(YsJsFunction::call('myErrorCallback'));

$playerType = new YsTreeNodeType('player', 'http://www.wavingthewheat.com/forum/posticons/soccer.png');
$tree->addTypes($playerType);

$tree->enableXMLData();
$tree->enableTypes();

?>

<script>
    function myBuildData(n) {
        return {
            "operation": n.attr ? "get_children" : "first_request",
            "id": n.attr ? n.attr("id") : 1
        }
    }

    function mySuccessCallback() {
        alert('SUCCESS');
    }

    function myErrorCallback() {
        alert('ERROR');
    }
</script>


<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $tree->draw(); ?>
<?php echo YsUIButton::initToolbar('toolbarId') ?>
<button onclick="<?php echo $tree->reloadTree() ?>">Load First Node</button>
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