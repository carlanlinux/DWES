<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div width="100%">
    <div id="splitter">
        <div>
            Content 1
        </div>
        <div>
            Content 2
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
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUISplitter::refresh('#splitter')
    );
echo YsUISplitter::build('#splitter')->_fullSplit(true)->execute()
?>