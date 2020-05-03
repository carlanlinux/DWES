<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>

<span id="multiselectLog"></span>
<br/><br/>
<select id="optGroup" style="width: 400px;" name="example-optgroup" multiple="multiple" size="5">
    <optgroup label="test">
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
    </optgroup>
    <optgroup label="foo">
        <option value="orange">Orange</option>
        <option value="purple">Purple</option>
        <option value="yellow">Yellow</option>
        <option value="brown">Brown</option>
        <option value="black">Black</option>
    </optgroup>
</select>

<?php echo YsUIDialog::endWidget() ?>

<script language="javascript" type="text/javascript">

    function logFilter(event, matches) {
        if (!matches.length) {
            jQuery('#multiselectLog').html('No matches');
        } else {
            match = (matches.length > 1) ? ' matches' : ' match';
            jQuery('#multiselectLog').html(matches.length + match);
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
            ->_width(450)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIMultiSelect::build()->in('#optGroup'),
        YsUIMultiSelect::multiselectfilter()->in('#optGroup')
            ->_filter(YsJsFunction::call('logFilter'))
            ->_label('Do filter')
    );
?>