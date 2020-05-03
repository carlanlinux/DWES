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

    var warning = jQuery("#multiselectLog");

    function maxChecked(event, ui) {
        if (jQuery(this).multiselect("widget").find("input:checked").length > 2) {
            warning.addClass("error").removeClass("success").html("You can only check two checkboxes!");
            return false;
        } else {
            warning.addClass("success").removeClass("error").html("Check a few boxes.");
        }
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
            ->_click(YsJsFunction::call('maxChecked'))
    );
?>