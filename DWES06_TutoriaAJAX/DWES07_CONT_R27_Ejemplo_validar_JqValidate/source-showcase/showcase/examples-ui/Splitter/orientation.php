<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsUISplitter::initWidget('splitter') ?>
<?php echo YsUISplitter::initSection() ?>
Content 1
<?php echo YsUISplitter::endSection() ?>
<?php echo YsUISplitter::initSection() ?>
Content 2
<?php echo YsUISplitter::endSection() ?>
<?php echo YsUISplitter::endWidget() ?>
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

echo
YsUISplitter::build('#splitter')
    ->_fullSplit(true)
    ->_splitterDistance(30)
    ->_orientation(YsOrientation::$HORIZONTAL)
    ->execute()
?>