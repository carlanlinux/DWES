<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>

<?php echo YsUIButton::initButtonset('buttons', 'style="display:none"') ?>
<a class="types fancybox.iframe" href="http://www.youtube.com/embed/aDgl4VqWwj4?autoplay=1">Video</a>
<?php echo YsUIButton::endButtonset() ?>

<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsJQBox::build('.types')
            ->_width(640)
            ->_height(390)
            ->_autoSize(false),
        YsUIButton::build('.types')
            ->_icons(array('primary' => YsUIConstant::ICON_VIDEO)),
        YsJQuery::show()->in('#buttons')
    );
?>