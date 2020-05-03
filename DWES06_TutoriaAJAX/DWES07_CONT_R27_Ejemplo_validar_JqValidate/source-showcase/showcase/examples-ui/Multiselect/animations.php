<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>

<select id="optMultiselect" title="Basic example" multiple="multiple" name="example-basic" size="5">
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
    <option value="option4">Option 4</option>
    <option value="option5">Option 5</option>
    <option value="option6">Option 6</option>
    <option value="option7">Option 7</option>
    <option value="option8">Option 8</option>
    <option value="option9">Option 9</option>
    <option value="option10">Option 10</option>
    <option value="option11">Option 11</option>
    <option value="option12">Option 12</option>
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
            ->_height(400)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIMultiSelect::build()->in('#optMultiselect')
            ->_open(YsUIConstant::BOUNCE_EFFECT)
            ->_close(YsUIConstant::EXPLODE_EFFECT)
    );
?>