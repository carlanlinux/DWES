<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>
<label for="files">Select a File:</label>
<select name="files" id="files">
    <option value="jquery" class="script">jQuery.js</option>

    <option value="jquerylogo" class="image">jQuery Logo</option>
    <option value="jqueryui" class="script">ui.jQuery.js</option>
    <option value="jqueryuilogo" selected="selected" class="image">jQuery UI Logo</option>
    <option value="somefile">Some unknown file</option>
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
        YsUISelectMenu::build()->in('#files')
            ->_style(YsUISelectMenu::$POPUP_STYLE)
            ->_icons(array(
                array('find' => '.script', 'icon' => YsUIConstant::ICON_SCRIPT),
                array('find' => '.image', 'icon' => YsUIConstant::ICON_IMAGE),
            ))
            ->_menuWidth('auto')
    );
?>