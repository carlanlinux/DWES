<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQMASK);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<form class="cmxform" id="commentForm" method="get" action="">
    <div id="maskResult">1234567</div>
    <input type="button" value="(999) 9999" id="btnChangeMask">
    <input type="button" value="***-****" id="btnChangeMask2">
    <input type="button" value="Alert" id="btnChangeMask3">
</form>

<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(670)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    )
?>

<?php
echo YsJQuery::newInstance()
    ->onClick()
    ->in('#btnChangeMask')
    ->execute(
        YsJQuery::html(
            YsJQMask::maskString('1234567')->_mask('(999) 9999')
        )->in('#maskResult')
    );

echo YsJQuery::newInstance()
    ->onClick()
    ->in('#btnChangeMask2')
    ->execute(
        YsJQuery::html(
            YsJQMask::maskString('1234567')->_mask('***-****')
        )->in('#maskResult')
    );

echo YsJQuery::newInstance()
    ->onClick()
    ->in('#btnChangeMask3')
    ->execute(
        sprintf('alert(%s)', YsJQMask::maskString('1234567')->_mask('*-*-*-*-*-*-*'))
    );
?>