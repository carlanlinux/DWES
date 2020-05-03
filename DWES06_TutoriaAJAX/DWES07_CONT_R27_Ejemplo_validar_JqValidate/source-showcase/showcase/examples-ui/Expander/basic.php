<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div id="expander">
    <h3>Header</h3>
    <div>
        Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna.
        Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien,
        cursus in.
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
            )
    );
echo YsUIExpander::build('#expander')->execute();
?>