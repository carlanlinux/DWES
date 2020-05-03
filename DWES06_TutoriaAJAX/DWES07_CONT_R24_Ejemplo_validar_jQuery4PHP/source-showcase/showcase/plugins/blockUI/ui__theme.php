<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_BLOCKUI); ?>

<button id="btnBlock">Block</button>
<button id="btnUnblock">Unblock</button>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnBlock")
    ->execute(
        YsBlockUI::block()
            ->_message('Blocking the source code')
            ->_title('<p>This is your message.</p>')
            ->_theme(true)
            ->_timeout(5000)
            ->_onBlock(new YsJsFunction('alert("Block callback")'))
            ->_onUnblock(new YsJsFunction('alert("Unblock callback")'))
    )
?>