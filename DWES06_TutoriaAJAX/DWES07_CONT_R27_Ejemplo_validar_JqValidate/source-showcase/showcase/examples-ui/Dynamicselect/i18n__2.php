<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>

<?php
//Loading assets when the document is ready
echo
YsJQueryAssets::loadScriptsOnReady(
    'jquery4php-assets/js/ui/addons/i18n/dynamicselect/jquery.ui.dynamicselect-es.js',
    // callback: ENABLE THE BUTTON
    YsJQuery::removeAttr('disabled')->in('#btnOpenDialog')
);
?>

<button id="btnOpenDialog" disabled="disabled">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId',
    'style="display:none"
                                   title="Demo"') ?>
<select multiple="on" size="5" name="color[]" id="optDynamicSelect">
    <option value="white">White</option>
    <option value="black" selected="selected">Black</option>
    <option value="red">Red</option>
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
        YsUIDynamicSelect::build('#optDynamicSelect')
    );
?>