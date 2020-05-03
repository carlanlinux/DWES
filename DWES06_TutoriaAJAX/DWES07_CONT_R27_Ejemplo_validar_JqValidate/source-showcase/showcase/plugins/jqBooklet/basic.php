<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOOKLET);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div id="mybook">
    <div class="b-load">
        <div>
            <h3>Yay, Page 1!</h3>
        </div>
        <div>
            <h3>Yay, Page 2!</h3>
        </div>
        <div>
            <h3>Yay, Page 3!</h3>
        </div>
        <div>
            <h3>Yay, Page 4!</h3>
        </div>
    </div>
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
            ->_width(650)
            ->_height(510)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQBooklet::build('#mybook')
    );

?>