<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCALCULATOR);
?>

<?php
//Loading assets when the document is ready
echo
YsJQueryAssets::loadScriptsOnReady(
    'jquery4php-assets/js/plugins/calculator/i18n/jquery.calculator-es.js',
    // callback: ENABLE THE BUTTON
    YsJQuery::removeAttr('disabled')->in('#btnOpenDialog')
);
?>

<button id="btnOpenDialog" disabled="disabled">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsJQCalculator::input('txtCalculator') ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(670)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQCalculator::build("#txtCalculator")
    )
?>