<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>
<label for="speedA">Select a Speed:</label>
<select id="speedA" name="speedA">
    <option value="Slower">Slower</option>
    <option selected="selected" value="Slow">Slow</option>
    <option value="Medium">Medium</option>
    <option value="Fast">Fast</option>
    <option value="Faster">Faster</option>
</select>

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
        YsUISelectMenu::build()->in('#speedA')
            ->_style(YsUISelectMenu::$POPUP_STYLE)
            ->_menuWidth('auto')
    );
?>