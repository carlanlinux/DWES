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
</select>
<br/><br/>
<div id="myButtons">
    <input id="btnDisable" type="button" value="Disable"/>
    <input id="btnEnable" type="button" value="Enable"/>
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
            ->_height(400)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIButton::build()->in('#myButtons > input'),
        YsUIMultiSelect::build()->in('#optMultiselect')
    );

echo
YsJQuery::newInstance()->onClick()->in('#btnDisable')
    ->execute(
        YsUIMultiSelect::disable('#optMultiselect')
    );

echo
YsJQuery::newInstance()->onClick()->in('#btnEnable')
    ->execute(
        YsUIMultiSelect::enable('#optMultiselect')
    );
?>