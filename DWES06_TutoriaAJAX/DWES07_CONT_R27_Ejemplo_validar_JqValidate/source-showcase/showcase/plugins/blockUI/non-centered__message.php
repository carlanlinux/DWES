<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_BLOCKUI); ?>

<button id="btnBlock">Block</button>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnBlock")
    ->execute(
        YsBlockUI::block()
            ->_timeout(5000)
            ->_centerY(0)
            ->_css(array('top' => '10px',
                'left' => '',
                'right' => '10px'))
    )
?>