<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOOKLET);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsJQBooklet::initWidget('mybook') ?>
<?php echo YsJQBooklet::initPage() ?>
<h3>Yay, Page 1!</h3>
<?php echo YsJQBooklet::endPage() ?>
<?php echo YsJQBooklet::initPage() ?>
<h3>Yay, Page 2!</h3>
<?php echo YsJQBooklet::endPage() ?>
<?php echo YsJQBooklet::initPage() ?>
<h3>Yay, Page 3!</h3>
<?php echo YsJQBooklet::endPage() ?>
<?php echo YsJQBooklet::initPage() ?>
<h3>Yay, Page 4!</h3>
<?php echo YsJQBooklet::endPage() ?>
<?php echo YsJQBooklet::endWidget() ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(650)
            ->_height(510)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQBooklet::build('#mybook')
            ->_tabs(true)
            ->_tabWidth(100)
            ->_tabHeight(20)
    );

?>