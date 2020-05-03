<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQTREE);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<div id="myTree" style="height: 100%">
    <ul>
        <li id="phtml_1">
            <a href="#">Root node 1</a>
            <ul>
                <li id="phtml_2">
                    <a href="#">Child node 1</a>
                    <ul>
                        <li id="phtml_21" onclick="alert('Click in : ' + this.id)">
                            <a href="#">Child node 11</a>
                        </li>
                        <li id="phtml_22">
                            <a href="#">Child node 22</a>
                        </li>
                    </ul>
                </li>
                <li id="phtml_3">
                    <a href="#">Child node 2</a>
                    <ul>
                        <li id="phtml_31">
                            <a href="#">Child node 31</a>
                        </li>
                        <li id="phtml_32">
                            <a href="#">Child node 32</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li id="phtml_4">
            <a href="#">Root node 2</a>
        </li>
    </ul>
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