<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>

<?php echo YsUIButton::initButtonset('buttons', 'style="display:none"') ?>
<a class="types fancybox.iframe" href="http://fancyapps.com">Iframe</a>
<?php echo YsUIButton::endButtonset() ?>

<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsJQBox::build('.types')
            ->_autoSize(false)
            ->_width('100%')
            ->_height('70%'),
        YsUIButton::build()->in('.types'),
        YsJQuery::show()->in('#buttons')
    );
?>