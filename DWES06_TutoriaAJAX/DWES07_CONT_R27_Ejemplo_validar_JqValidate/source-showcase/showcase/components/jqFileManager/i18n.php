<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQFILEMANAGER);

//Loading assets when the document is ready
echo
YsJQueryAssets::loadScriptsOnReady(
    'jquery4php-assets/js/plugins/elfinder/i18n/elfinder.es.js',
    // callback: ENABLE THE BUTTON
    YsJQuery::removeAttr('disabled')->in('#btnOpenDialog'));


$fileManager = new YsFileManager('fileManagerId');
$fileManager->setUrl('examples/response/elfinder/connector.php');
$fileManager->setLang('es');
$fileManager->setDocked(true);
$fileManager->setViewAsList();

?>

<button id="btnOpenDialog" disabled="disabled">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $fileManager->draw(); ?>
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
            ->noClosable()
    )
?>