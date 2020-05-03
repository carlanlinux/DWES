<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php echo YsUIPanel::initWidget('panelId', 'style="display:none;height:150px"') ?>
<?php echo YsUIPanel::title('Mi test', YsUIConstant::ICON_ALERT) ?>
<?php echo YsUIPanel::initContent() ?>
<div>
    <p><label>Username:</label><input type="text" name="demo1"></p>
    <p><label>Password:</label><input type="text" name="demo1"></p>
</div>
<button id="btnUnblock">Unblock</button>
<?php echo YsUIPanel::endContent() ?>
<?php echo YsUIPanel::endWidget() ?>



<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_BLOCKUI); ?>

<button id="btnBlock">Block</button>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnBlock")
    ->execute(
        YsBlockUI::block()
            ->_message(YsJQuery::newInstance()->in('#panelId'))
            ->_css(array('border' => 'none'))
    )
?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnUnblock")
    ->execute(
        YsBlockUI::unblock()
    )
?>