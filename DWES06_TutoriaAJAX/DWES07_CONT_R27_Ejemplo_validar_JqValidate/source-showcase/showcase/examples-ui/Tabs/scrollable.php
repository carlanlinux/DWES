<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>


<br/>
<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<?php echo YsUITabs::initWidget('tabsId') ?>
<?php echo YsUITabs::initHeader() ?>
<?php for ($i = 0; $i <= 10; $i++): ?>
    <?php echo YsUITabs::tab('Tab ' . $i, '#tabs-' . $i) ?>
<?php endfor; ?>
<?php echo YsUITabs::endHeader() ?>

<?php for ($i = 0; $i <= 10; $i++): ?>
    <?php echo YsUITabs::initTabContent('tabs-' . $i) ?>
    <p>Tab <?php echo $i ?> Content.</p>
    <?php echo YsUITabs::endTabContent() ?>
<?php endfor; ?>

<?php echo YsUITabs::endWidget() ?>

<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_width(500)
            ->_height(300)
            ->_modal(true)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUITabs::tabs('#tabsId'),
        YsUITabs::scrollabletabs('#tabsId')
            ->_animationSpeed(50)
            ->_loadLastTab(true)
            ->_resizable(true)
            ->_resizeHandles('e,s,se')
            ->_easing('easeInOutExpo')
    )
?>