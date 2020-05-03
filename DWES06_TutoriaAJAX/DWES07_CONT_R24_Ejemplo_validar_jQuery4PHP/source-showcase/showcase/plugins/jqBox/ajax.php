<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>

<?php echo YsUIButton::initButtonset('buttons', 'style="display:none"') ?>
<a class="types fancybox.ajax" href="examples/response/plotResponse.php">Plot</a>
<a class="types fancybox.ajax" href="examples/response/subGridAsGridResponse.php">Grid</a>
<?php echo YsUIButton::endButtonset() ?>

<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsJQBox::build('.types'),
        YsUIButton::build()->in('.types'),
        YsJQuery::show()->in('#buttons')
    );
?>