<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQFILEMANAGER);

$fileManager = new YsFileManager('fileManagerId');
$fileManager->setUrl('examples/response/elfinder/connector.php');
$fileManager->setLang('en');
$fileManager->setDocked(true);

$contextMenu = new YsFileManagerContextMenu();

$contextMenu->addOptionsInFileContextMenu(
    YsFileManagerContextMenu::$OPTION_COPY,
    YsFileManagerContextMenu::$OPTION_PASTE,
    YsFileManagerContextMenu::$OPTION_SEPARATOR,
    YsFileManagerContextMenu::$OPTION_RENAME
);

$contextMenu->addOptionsInCWDContextMenu(
    YsFileManagerContextMenu::$OPTION_RELOAD,
    YsFileManagerContextMenu::$OPTION_SEPARATOR,
    YsFileManagerContextMenu::$OPTION_MKDIR,
    YsFileManagerContextMenu::$OPTION_MKFILE
);

$fileManager->setContextmenu($contextMenu);
?>

<button id="btnOpenDialog">Show Demo</button>

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
    )
?>