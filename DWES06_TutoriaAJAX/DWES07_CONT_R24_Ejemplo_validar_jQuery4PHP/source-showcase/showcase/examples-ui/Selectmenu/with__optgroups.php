<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>
<label for="filesC">Select a File:</label>
<select name="filesC" id="filesC">
    <optgroup label="images">
        <option value="jquerylogo" class="image">jQuery Logo</option>

        <option value="jqueryuilogo" selected="selected" class="image">jQuery UI Logo</option>
    </optgroup>
    <optgroup label="scripts">
        <option value="jquery" class="script">jQuery.js</option>
        <option value="jqueryui" class="script">ui.jQuery.js</option>
    </optgroup>
    <optgroup label="other">

        <option value="somefile">Some unknown file</option>
        <option value="someotherfile">Some other unknown file</option>
    </optgroup>
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
        YsUISelectMenu::build()->in('#filesC')
            ->_style(YsUISelectMenu::$POPUP_STYLE)
            ->_icons(array(
                array('find' => '.script', 'icon' => YsUIConstant::ICON_SCRIPT),
                array('find' => '.image', 'icon' => YsUIConstant::ICON_IMAGE),
            ))
            ->_menuWidth('auto')
    );
?>