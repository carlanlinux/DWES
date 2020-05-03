<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCOLORPICKER); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsJQColorPicker::inline('colorPickerId') ?>
<br/>
Hex: <input type="text" id="txtHex"/><br/>
<hr/>
H: <input type="text" id="txtH"/><br/>
S: <input type="text" id="txtS"/><br/>
B: <input type="text" id="txtB"/><br/>
<hr/>
R: <input type="text" id="txtR"/><br/>
G: <input type="text" id="txtG"/><br/>
B: <input type="text" id="txtB2"/><br/>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnOpenDialog")
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_width(400)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQColorPicker::build()
            ->in('#colorPickerId')
            ->_flat(true)
            ->returnAllValuesIn('#txtHex', '#txtH', '#txtS', '#txtB', '#txtR', '#txtG', '#txtB2')
    )
?>