<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCOLORPICKER); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsJQColorPicker::input('txtColorpicker') ?>

<button onclick="<?php echo YsJQColorPicker::showPicker()->in('#txtColorpicker') ?>">Show</button>
<button onclick="<?php echo YsJQColorPicker::hidePicker()->in('#txtColorpicker') ?>">Hide</button>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnOpenDialog")
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQColorPicker::build()->in('#txtColorpicker')

    )
?>