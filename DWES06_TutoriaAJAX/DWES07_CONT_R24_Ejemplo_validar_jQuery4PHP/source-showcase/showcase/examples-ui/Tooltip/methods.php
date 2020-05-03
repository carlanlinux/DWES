<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<input id="tooltip" class="uiBtn" type="button" value="Tooltip"/>
<br/><br/><br/>
<input onclick="<?php echo YsUITooltip::show('#tooltip') ?>" class="uiBtn" type="button" value="Show"/>
<input onclick="<?php echo YsUITooltip::hide('#tooltip') ?>" class="uiBtn" type="button" value="Hide"/>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    );

echo YsUITooltip::build('#tooltip')
    ->_content('Hello World')
    ->_title('Title')
    ->_closeBehavior(YsUITooltip::$BEHAVIOR_NONE)
    ->execute();

echo YsUIButton::build('.uiBtn')->execute()

?>
