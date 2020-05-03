<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCOLORPICKER); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsJQColorPicker::inline('colorPickerId') ?>
<br/>
<button onclick="<?php echo YsJQColorPicker::setColor('#15ff00')->in('#colorPickerId') ?>">Green</button>
<button onclick="<?php echo YsJQColorPicker::setColor('#ff0000')->in('#colorPickerId') ?>">Red</button>
<button onclick="<?php echo YsJQColorPicker::setColor('#1100ff')->in('#colorPickerId') ?>">Blue</button>
<br/>
<input type="text" id="txtCustomColor"/>
<button onclick="<?php echo YsJQColorPicker::setColor(YsJQuery::val()->in('#txtCustomColor'))->in('#colorPickerId') ?>">
    Custom
</button>
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
    )
?>