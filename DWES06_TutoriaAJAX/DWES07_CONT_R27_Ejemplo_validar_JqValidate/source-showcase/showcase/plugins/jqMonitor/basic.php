<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQMONITOR);
?>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
There has been no activity in the last 5 seconds
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_autoOpen(false)
            ->_modal(true)
            ->_position(YsUIPosition::$RIGHT_BOTTOM_POSITION)
            ->_show(YsUIConstant::BLIND_EFFECT)
            ->_hide(YsUIConstant::BLIND_EFFECT)
    );

echo
YsJQMonitor::build()
    ->_timeout(5000)
    ->_onActive(YsUIDialog::close('#dialogId'))
    ->_onIdle(YsUIDialog::open('#dialogId'))
    ->execute()
?>