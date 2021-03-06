<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<?php echo YsUIPanel::initWidget('panelDraggabble', 'style="height:auto;width:auto"') ?>
<p>Revert the original</p>
<?php echo YsUIPanel::endWidget() ?>
<br/><br/>
<?php echo YsUIPanel::initWidget('panelDraggabble2', 'style="height:auto;width:auto"') ?>
<p>Revert the helper</p>
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
            ->_width(500)
            ->_height(300)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    );
echo
YsJQuery::newInstance()
    ->execute(
        YsUIDraggable::build()->in('#panelDraggabble')
            ->_revert(true)
        , YsUIDraggable::build()->in('#panelDraggabble2')
        ->_revert(true)
        ->_helper(YsUIConstant::CLONE_HELPER)
    )
?>