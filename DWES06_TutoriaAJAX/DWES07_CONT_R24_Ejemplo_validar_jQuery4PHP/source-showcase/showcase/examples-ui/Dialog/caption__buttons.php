<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_canMaximize()
            ->_showAllCaptionButtons()
            ->_resizable(true)
            ->_buttons(array(
                    'Min' => new YsJsFunction(YsUIDialog::minimize('#dialogId')),
                    'Restore' => new YsJsFunction(YsUIDialog::restore('#dialogId')),
                    'Max' => new YsJsFunction(YsUIDialog::maximize('#dialogId')))
            )
    )
?>