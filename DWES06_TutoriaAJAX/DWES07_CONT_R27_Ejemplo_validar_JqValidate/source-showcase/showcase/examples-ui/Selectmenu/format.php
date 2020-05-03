<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>
<label for="speedB">Select an Address:</label>
<select name="speedB" id="speedB">
    <option>John Doe - 78 West Main St Apt 3A | Bloomsburg, PA 12345 (footer text)</option>
    <option selected="selected">Jane Doe - 78 West Main St Apt 3A | Bloomsburg, PA 12345 (footer text)</option>
    <option>Joseph Doe - 78 West Main St Apt 3A | Bloomsburg, PA 12345 (footer text)</option>
    <option>Mad Doe Kiiid - 78 West Main St Apt 3A | Bloomsburg, PA 12345 (footer text)</option>
</select>
<?php echo YsUIDialog::endWidget() ?>

<script type="text/javascript">
    //a custom format option callback
    var addressFormatting = function (text) {
        var newText = text;
        //array of find replaces
        var findreps = [
            {find: /^([^\-]+) \- /g, rep: '<span class="ui-selectmenu-item-header">$1</span>'},
            {find: /([^\|><]+) \| /g, rep: '<span class="ui-selectmenu-item-content">$1</span>'},
            {find: /([^\|><\(\)]+) (\()/g, rep: '<span class="ui-selectmenu-item-content">$1</span>$2'},
            {find: /([^\|><\(\)]+)$/g, rep: '<span class="ui-selectmenu-item-content">$1</span>'},
            {find: /(\([^\|><]+\))$/g, rep: '<span class="ui-selectmenu-item-footer">$1</span>'}
        ];
        for (var i in findreps) {
            newText = newText.replace(findreps[i].find, findreps[i].rep);
        }
        return newText;
    }
</script>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_width(600)
            ->_modal(true)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUISelectMenu::build()->in('#speedB')
            ->_style(YsUISelectMenu::$POPUP_STYLE)
            ->_format(YsJsFunction::call('addressFormatting'))
    );
?>