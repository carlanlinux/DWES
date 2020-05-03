<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<style type="text/css">
    div.growlUI {
        background: url(http://jquery.malsup.com/block/check48.png) no-repeat 10px 10px
    }

    div.growlUI h1, div.growlUI h2 {
        color: white;
        padding: 5px 5px 5px 75px;
        text-align: left;
        border: none
    }
</style>

<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_BLOCKUI); ?>

<button id="btnBlock">Block</button>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnBlock")
    ->execute(
        YsBlockUI::growlUI('Growl Notification', 'Have a nice day!')
    )
?>