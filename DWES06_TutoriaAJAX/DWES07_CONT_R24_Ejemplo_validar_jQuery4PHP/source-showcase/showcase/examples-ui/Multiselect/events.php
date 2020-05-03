<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>

<span id="multiselectLog"></span>
<br/>
<select id="optGroup" name="example-optgroup" multiple="multiple" size="5">
    <optgroup label="Group One">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </optgroup>
    <optgroup label="Group Two">
        <option value="option4">Option 4</option>
        <option value="option5">Option 5</option>
        <option value="option6">Option 6</option>
        <option value="option7">Option 7</option>
    </optgroup>
</select>

<?php echo YsUIDialog::endWidget() ?>

<script language="javascript" type="text/javascript">

    function logValue(event, ui) {
        jQuery('#multiselectLog').html(ui.value + ' ' + (ui.checked ? 'checked' : 'unchecked'));
    }

    function logValues(event, ui) {
        var values = $.map(ui.inputs, function (checkbox) {
            return checkbox.value;
        }).join(", ");
        jQuery('#multiselectLog').html("Checkboxes " + (ui.checked ? "checked" : "unchecked") + ": " + values);
    }

</script>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_height(400)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIMultiSelect::build()->in('#optGroup')
            ->_click(YsJsFunction::call('logValue'))
            ->_optgroupToggle(YsJsFunction::call('logValues'))
            ->_beforeopen(new YsJsFunction(
                YsJQuery::html('Select about to be opened...')->in('#multiselectLog')
            ))
            ->_beforeopen(new YsJsFunction(
                YsJQuery::html('Select opened!')->in('#multiselectLog')
            ))
            ->_beforeclose(new YsJsFunction(
                YsJQuery::html('Select about to be closed...')->in('#multiselectLog')
            ))
            ->_close(new YsJsFunction(
                YsJQuery::html('Select closed!')->in('#multiselectLog')
            ))
            ->_checkAll(new YsJsFunction(
                YsJQuery::html('Check all clicked!')->in('#multiselectLog')
            ))
            ->_uncheckAll(new YsJsFunction(
                YsJQuery::html('Uncheck all clicked!')->in('#multiselectLog')
            ))
    );
?>