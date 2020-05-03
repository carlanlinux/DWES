<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_KEYS); ?>

<span><b>Alt + o</b> To open the dialog.</span>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
Hello World
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsKeys::hotkeys()
    ->_hotkey('Alt+o')
    ->_handler(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_title("Title")
            ->_width(300)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    )->execute()
?>