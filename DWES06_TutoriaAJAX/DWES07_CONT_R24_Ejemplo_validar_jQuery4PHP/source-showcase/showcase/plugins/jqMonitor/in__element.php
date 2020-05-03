<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQMONITOR);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsUIPanel::initWidget('panelId', 'style="height:150px"') ?>
<?php echo YsUIPanel::title('Mi Test', YsUIConstant::ICON_ALERT) ?>
<?php echo YsUIPanel::initContent() ?>
The Panel has its own idletimer instance set to 3 seconds (3000 ms).
<?php echo YsUIPanel::endContent() ?>
<?php echo YsUIPanel::initFooter() ?>
This is my footer
<?php echo YsUIPanel::endFooter() ?>
<?php echo YsUIPanel::endWidget() ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    );

echo
YsJQMonitor::build('#panelId')
    ->_timeout(3000)
    ->_onActive(YsJQuery::removeClass(YsUIConstant::DISABLED_STATE)->in('#panelId'))
    ->_onIdle(YsJQuery::addClass(YsUIConstant::DISABLED_STATE)->in('#panelId'))
    ->execute()
?>