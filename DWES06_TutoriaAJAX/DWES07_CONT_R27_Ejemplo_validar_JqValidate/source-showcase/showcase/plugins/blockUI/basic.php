<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_BLOCKUI); ?>

<button id="btnBlock">Show Demo</button>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnBlock")
    ->execute(
        YsBlockUI::block()->_timeout(2000)
    )
?>