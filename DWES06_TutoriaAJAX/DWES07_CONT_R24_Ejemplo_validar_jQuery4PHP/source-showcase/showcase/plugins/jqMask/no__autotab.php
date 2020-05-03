<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQMASK);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<form class="cmxform" id="commentForm" method="get" action="">
    <input id="txtMask" name="txtMask" class="{mask:'(999) 999-999-z'}"/>
    <input id="txtMask2" name="txtMask" class="{mask:'(999) 999-999-z'}"/>
    <input id="txtMask3" name="txtMask" class="{mask:'(999) 999-999-z'}"/>
    <input id="txtMask4" name="txtMask" class="{mask:'(999) 999-999-z'}"/>
</form>

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
            ),
        YsJQMask::build()->in("#txtMask,#txtMask2,#txtMask3,#txtMask4")
            ->_autoTab(false)
    )
?>