<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQFILEMANAGER);

$fileManager = new YsFileManager('fileManagerId');
$fileManager->setUrl('examples/response/elfinder/connector.php');

$dialogOptions = new YsUIDialog();
$dialogOptions->_title("My Title Dialog");
$dialogOptions->_buttons(
    array(
        'Ok' => new YsJsFunction('alert("Hello world")'),
        'Close' => new YsJsFunction(YsUIDialog::close('this')))
);
$dialogOptions->noClosableNever();
$fileManager->setDialog($dialogOptions);

?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo $fileManager->draw(); ?>